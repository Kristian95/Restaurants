@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">
                    {{ trans('common.edit') }}
                </h4>
                <a class="pull-right btn btn-primary"
                    href="{{ route('admin.categories.index') }}">
                    {{ trans('common.categories') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('admin.partials.errors')
                {!! Form::model($category, ['method' => 'PATCH',
                    'url' => route('admin.categories.update',
                    ['category' => $category])]) !!}
                @include('admin.categories.form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection