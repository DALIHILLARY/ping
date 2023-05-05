<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $domain->name }}</p>
</div>

<!-- Url Field -->
<div class="col-sm-12">
    {!! Form::label('url', 'Url:') !!}
    <p>{{ $domain->url }}</p>
</div>

<!-- Enabled Field -->
<div class="col-sm-12">
    {!! Form::label('enabled', 'Enabled:') !!}
    @if($domain->enabled == 1)
        <p class="text-success">YES</p>
    @else
        <p class="text-danger">NO</p>
    @endif
</div>

<!-- Domain Team Table -->
<div class="col-sm-12">
    {!! Form::label('team', 'Team:') !!}
    @include('teams.table', ['teams' => $domain->team()->paginate()])
</div>

