@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">
                    {{ trans('common.edit') }}
                </h4>
                <a class="pull-right btn btn-primary"
                    href="{{ route('admin.cities.index') }}">
                    {{ trans('common.cities') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('admin.partials.errors')
                {!! Form::model($city, ['method' => 'PATCH',
                    'url' => route('admin.cities.update',
                    ['city' => $city])]) !!}
                @include('admin.cities.form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection