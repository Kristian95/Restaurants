<div class="form-group">
    {!! Form::label('first_name', trans('common.first_name'),
    ['class' => 'control-label text-right col-sm-3']) !!}
    <div class="col-sm-9">
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    {!! Form::label('last_name', trans('common.last_name'),
    ['class' => 'control-label text-right col-sm-3']) !!}
    <div class="col-sm-9">
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <label class="control-label text-right col-sm-3">{{ trans('common.cityType') }}</label>
    <div class="col-lg-6">
       {!! Form::select('restaurant_id', $restaurantList , null,
    ['class' => 'form-control input-sm']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3">
        @if (isset($manager))
            {!! Form::submit(trans('common.update'),
            ['class' => 'col-sm-12 btn btn-warning']) !!}
        @else
            {!! Form::submit(trans('common.store'),
            ['class' => 'col-sm-12 btn btn-success']) !!}
        @endif
    </div>
    <div class="clearfix"></div>
</div>
