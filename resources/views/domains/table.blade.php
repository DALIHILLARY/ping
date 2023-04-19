<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="domains-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Website</th>
                <th>Enabled</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($domains as $domain)
                <tr>
                    <td>{{ $domain->name }}</td>
                    <td>
                        <a href="{{ $domain->url }}" target="_blank"> {{ $domain->url }}</td>
                    <td>
                        @if ($domain->enabled)
                            <span class="badge badge-success">Enabled</span>
                        @else
                            <span class="badge badge-danger">Disabled</span>
                        @endif
                    </td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['domains.destroy', $domain->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('domains.show', [$domain->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('domains.edit', [$domain->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center">No Domains Found</td>
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
