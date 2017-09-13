<div class="form-group">
    {!! Form::label('name', trans('common.name'),
    ['class' => 'control-label col-sm-3 text-right']) !!}
    <div class="col-sm-9">
        {!! Form::text('name', null,
        ['class' => 'form-control',
        'required' => 'required']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    {!! Form::label('code', trans('common.code'),
    ['class' => 'control-label col-sm-3 text-right']) !!}
    <div class="col-sm-9">
        {!! Form::text('code', null,
        ['class' => 'form-control',
        'required' => 'required']) !!}
    </div>
    <div class="clearfix"></div>
</div>

{!! Form::label('file', trans('common.image'), 
['class' => 'control-label text-right col-sm-3'])!!}
<div class="col-sm-9">
    {!! Form::file('file') !!}
</div> 

@if (isset($language))
    <div class="form-group">
        {!! Form::label('', trans('common.current_image'),
        ['class' => 'control-label col-sm-3 text-right']) !!}
        <div class="col-sm-9">
            <div class="col-sm-6 thumbnail">
                {!! $language->medium_image !!}
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endif

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3">
        @if (isset($language))
            {!! Form::submit(trans('common.edit'),
            ['class' => 'btn btn-warning col-sm-12']) !!}
        @else
            {!! Form::submit(trans('common.create'),
            ['class' => 'btn btn-success col-sm-12']) !!}
        @endif
    </div>
    <div class="clearfix"></div>
</div>