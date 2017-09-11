@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">
                    {{ trans('common.edit') }}
                </h4>
                <a class="pull-right btn btn-primary"
                    href="{{ route('admin.employees.index') }}">
                    {{ trans('common.employees') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('admin.partials.errors')
                {!! Form::model($employee, ['method' => 'PATCH',
                'url' => route('admin.employees.update',
                ['employee' => $employee])]) !!}
                @include('admin.employees._form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection