<!-- Domain Field -->
<div class="form-group col-sm-12">
    {!! Form::label('domains[]', 'Domain:') !!}
    {!! Form::select('domains[]', $domains, null, ['class' => 'form-control select2', 'required', 'multiple'=>'multiple']) !!}
</div>


<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-12">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>


@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Select Domains',
            });
        });
    </script>
@endpush

@push('page_css')
    <style type="text/css">
        .select2-container--default .select2-selection--below {
            height: 42px !important;
        }
        .select2-container--default .select2-selection--below .select2-selection__rendered {
            line-height: 42px !important;
        }
    </style>
@endpush

@push('third_party_stylesheets')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('third_party_scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush