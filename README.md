# Ping

Ping is a laravel web application that monitors the uptime of domains and their SSL certificate validity. It allows you to add maintainers to various domains and sends email notifications to them when issues occur.

## Installation

1. Clone the repository
git clone https://github.com/DALIHILLARY/ping.git


2. Install dependencies
    `cd ping
     composer install`

3. Set up environment variables

    `cp .env.example .env
    php artisan key:generate`

    Update `.env` with your preferred settings, including the database configuration and email settings.

4. Run database migrations
    `php artisan migrate`

5. Start the application
    `php artisan serve`

6. Run the monitor job
    On local environment you can `php artisan schedule:work`
    On production evironment, set up a cron job per minute as
    `\bin\php \home\{username}\{project-path}\artisan schedule:run`
## Usage

### Adding Domains

To add a new domain to monitor, go to the `Domains` page and click on the `Add Domain` button. Enter the domain name and click `Save`. The system will start monitoring the domain every 5 minutes.

### Adding Maintainers

To add a maintainer to a domain, go to the `Maintainers` page and click on the `Add Maintainer` button. Enter the maintainer's name and email address, select the domain to associate with the maintainer, and click `Save`. The system will send email notifications to the maintainer when issues occur with the associated domain.

### Viewing Domain Uptime

The longs will be displayed on the home page when logged in

## License
Ping is open-sourced
