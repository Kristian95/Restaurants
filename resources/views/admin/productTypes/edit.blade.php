@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">
                    {{ trans('common.edit') }}
                </h4>
                <a class="pull-right btn btn-primary"
                    href="{{ route('admin.productTypes.index') }}">
                    {{ trans('common.productTypes') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('admin.partials.errors')
                    {!! Form::model($productType, ['method' => 'PATCH',
                    'url' => route('admin.productTypes.update',
                    ['productType' => $productType])]) !!}
                @include('admin.productTypes.form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection