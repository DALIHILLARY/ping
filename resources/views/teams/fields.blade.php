<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Domain Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('domain_id', 'Domain:') !!}
    {!! Form::select('domain_id', $domains, null, ['class' => 'form-control select2', 'required']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'placeholder' => 'joan@domain.com']) !!}
</div>

<!-- Contact Number Field -->
<div class="form-group col-sm-12">
    {!! Form::label('contact_number', 'Contact Number:') !!}
    {!! Form::text('contact_number', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'placeholder' => '0751023877']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Select a Domain',
            });
        });
    </script>
@endpush

@push('page_css')
    <style type="text/css">
        .select2-container--default .select2-selection--single {
            height: 38px !important;
        }
    </style>
@endpush

@push('third_party_stylesheets')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('third_party_scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush