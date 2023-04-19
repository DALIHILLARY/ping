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
    <p>{{ $domain->enabled }}</p>
</div>

