<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-12">
    {!! Form::label('url', 'URL / Link:') !!}
    {!! Form::text('url', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'placeholder' => 'https://example.com']) !!}
</div>

<!-- Enabled Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('enabled', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('enabled', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('enabled', 'Enabled', ['class' => 'form-check-label']) !!}
    </div>
</div>