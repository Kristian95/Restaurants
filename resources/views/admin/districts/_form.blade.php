<div class="form-group">
    {!! Form::label('name', trans('common.name'),
    ['class' => 'control-label text-right col-sm-3']) !!}
    <div class="col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <label class="control-label text-right col-sm-3">{{ trans('city.cityType') }}</label>
    <div class="col-lg-6">
       {!! Form::select('city_id', $cityType , null,
    ['class' => 'form-control input-sm']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3">
        @if(isset($district))
            {!! Form::submit(trans('common.update'),
            ['class' => 'col-sm-12 btn btn-warning']) !!}
        @else
            {!! Form::submit(trans('common.store'),
            ['class' => 'col-sm-12 btn btn-success']) !!}
        @endif
    </div>
    <div class="clearfix"></div>
</div>
