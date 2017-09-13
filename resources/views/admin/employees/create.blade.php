@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">
                    {{ trans('common.create') }}
                </h4>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.employees.index') }}">
                    {{ trans('common.employees') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                {!! Form::open(['method' => 'POST', 'url' => route('admin.employees.store')]) !!}
                    @include('admin.partials.errors')
                    <div class="form-group">
                        @include('admin.employees.form')
                        {{ csrf_field() }}
                        <div class="clearfix"></div>
                    </div>
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection