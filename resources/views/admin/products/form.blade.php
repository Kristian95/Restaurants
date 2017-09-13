<div class="form-group">
    {!! Form::label('name', trans('common.name'),
    ['class' => 'control-label text-right col-sm-3']) !!}
    <div class="col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    {!! Form::label('sku', trans('common.sku'),
    ['class' => 'control-label text-right col-sm-3']) !!}
    <div class="col-sm-9">
        {!! Form::text('sku', null, ['class' => 'form-control']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    {!! Form::label('price', trans('common.price'),
    ['class' => 'control-label text-right col-sm-3']) !!}
    <div class="col-sm-9">
        {!! Form::text('price', null, ['class' => 'form-control']) !!}
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
    <label class="control-label text-right col-sm-3">{{ trans('common.productType') }}</label>
    <div class="col-lg-6">
       {!! Form::select('product_type_id', $productType , null,
    ['class' => 'form-control input-sm']) !!}
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <div class="clearfix"></div>
        {!! Form::label('file', trans('common.image'),
        ['class' => 'control-label text-right col-sm-3']) !!}
    <div class="col-sm-9">
            {!! Form::file('file') !!}
    </div> 
</div>

@if(isset($product))
    <div class="form-group">
        {!! Form::label('', trans('common.current_image'),
        ['class' => 'control-label col-sm-3 text-right']) !!}
        <div class="col-sm-9">
            <div class="col-sm-6 thumbnail">
                {!! $product->large_image !!}
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endif

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3">
        @if (isset($product))
            {!! Form::submit(trans('common.update'),
            ['class' => 'col-sm-12 btn btn-warning']) !!}
        @else
            {!! Form::submit(trans('common.store'),
            ['class' => 'col-sm-12 btn btn-success']) !!}
        @endif
    </div>
    <div class="clearfix"></div>
</div>
