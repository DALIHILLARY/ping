<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Domain;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\MonitorLog;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            //fectch all domains randomly
            $domains = Domain::where('enabled', 1)->inRandomOrder()->get();

            foreach ($domains as $domain) {
                //strip protocol from url https or http
                $domain->url = preg_replace('#^https?://#', '', $domain->url);
                $start_time = microtime(true);
                $status_code = 0;
                try {
                    Http::withOptions(['verify' => true])->get('http://' . $domain->url);
                    $status_code = MonitorLog::STATUS_UP;
                } catch (\Exception $e) {
                    if (Str::contains($e->getMessage(), 'SSL certificate problem')) {
                        $status_code = MonitorLog::STATUS_SSL_ERROR;
                    }
                    if (Str::contains($e->getMessage(), 'Could not resolve host')) {
                        $status_code = MonitorLog::STATUS_DOWN;
                    }
                }
                $end_time = microtime(true);
                $response_time = round(($end_time - $start_time) * 1000);

                // check if last log from this domain has the same status code else create new log
                $latest_log = $domain->latestLog()->where('status_code', $status_code)->first();
                if ($latest_log) {
                    $latest_log->update([
                        'response_time' => $response_time
                    ]);
                } else {
                    MonitorLog::create([
                        'domain_id' => $domain->id,
                        'status_code' => $status_code,
                        'response_time' => $response_time
                    ]);
                }

                if ($status_code != MonitorLog::STATUS_UP) {
                    //mail all persons responsible for this domain


                }
            }
        })->everyFiveMinutes()->name('domain_monitor')->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
