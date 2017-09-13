<div class="form-group">
    {!! Form::label('name', trans('common.name'),
    ['class' => 'control-label text-right col-sm-3']) !!}
    <div class="col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    {!! Form::label('description', trans('common.description'),
    ['class' => 'control-label text-right col-sm-3']) !!}
    <div class="col-sm-9">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3">
        @if (isset($city))
            {!! Form::submit(trans('common.update'),
            ['class' => 'col-sm-12 btn btn-warning']) !!}
        @else
            {!! Form::submit(trans('common.store'),
            ['class' => 'col-sm-12 btn btn-success']) !!}
        @endif
    </div>
    <div class="clearfix"></div>
</div>
