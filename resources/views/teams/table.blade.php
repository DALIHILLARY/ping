<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="teams-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Domain</th>
                <th>Contact Number</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
                <tr>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->email }}</td>
                    <td>{{ $team->domain->name }}</td>
                    <td>{{ $team->contact_number }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['teams.destroy', $team->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('teams.show', [$team->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('teams.edit', [$team->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $teams])
        </div>
    </div>
</div>
