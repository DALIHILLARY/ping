@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Logs</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table" id="domains-table">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>ONLINE</th>
                     {{-- <td>{{ $domain->latestLog->status_code }}</td> --}}
                                        {{-- <td>{{ $domain->latestLog->response_time }}</td> --}}                    <th>SSL/TLS</th>
                                {{-- <th>UPTIME</th> --}}
                                <th>RESPONSE TIME (ms)</th>
                                <th>LAST CHECKED</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($domains as $domain)
                                @if ($domain->latestLog != null)
                                    <tr>
                                        <td><a href="{{ $domain->url }}" target="_blank">{{ $domain->name }}</a></td>
                            
                                        @if($domain->latestLog->status_code == 200)
                                            <td><i class="fas fa-check-circle text-success"></i></td>
                                            <td><i class="fas fa-check-circle text-success"></i></td>
                                        @elseif($domain->latestLog->status_code == 0)
                                            <td><i class="fas fa-times-circle text-danger"></i></td>
                                            <td><i class="fas fa-times-circle text-danger"></i></td>
                                        @else
                                            <td><i class="fas fa-exclamation-circle text-success"></i></td>
                                            <td><i class="fas fa-exclamation-circle text-danger"></i></td>
                                        @endif
                                        {{-- <td>33%</td> --}}
                                        <td>{{ $domain->latestLog->response_time }}</td>
                                        <td>
                                            <!-- Get time ago -->
                                            {{ $domain->latestLog->updated_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <div class='btn-group'>
                                                <a href="{{ route('domains.show', [$domain->id]) }}" class='btn btn-default btn-xs'><i class="fas fa-eye"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No Logs Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $domains])
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
