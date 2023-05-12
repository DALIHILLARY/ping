<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="maintainers-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Domains</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($maintainers as $maintainer)
                <tr>
                    <td>{{ $maintainer->name }}</td>
                    <td>{{ $maintainer->email }}</td>
                    <td>{{ $maintainer->phone_number }}</td>
                    <td>
                        @foreach($maintainer->domains as $domain)
                            <span class="badge badge-info">{{ $domain->name }}</span>
                        @endforeach
                    </td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['maintainers.destroy', $maintainer->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('maintainers.show', [$maintainer->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('maintainers.edit', [$maintainer->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $maintainers])
        </div>
    </div>
</div>
