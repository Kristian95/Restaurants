@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">
                    {{ trans('common.edit') }}
                </h4>
                <a class="pull-right btn btn-primary"
                    href="{{ route('admin.products.index') }}">
                    {{ trans('common.products') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('admin.partials.errors')
                {!! Form::model($product, ['method' => 'PATCH',
                'url' => route('admin.products.update',
                ['product' => $product]), 'files' => true]) !!}
                @include('admin.products._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection