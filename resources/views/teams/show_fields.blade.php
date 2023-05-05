<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $team->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $team->email }}</p>
</div>

<!-- Domain Id Field -->
<div class="col-sm-12">
    {!! Form::label('domain_id', 'Domain Id:') !!}
    <p>{{ $team->domain_id }}</p>
</div>

<!-- Contact Number Field -->
<div class="col-sm-12">
    {!! Form::label('contact_number', 'Contact Number:') !!}
    <p>{{ $team->contact_number }}</p>
</div>

