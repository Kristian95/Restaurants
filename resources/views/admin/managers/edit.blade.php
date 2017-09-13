@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">
                    {{ trans('common.edit') }}
                </h4>
                <a class="pull-right btn btn-primary"
                    href="{{ route('admin.managers.index') }}">
                    {{ trans('common.managers') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('admin.partials.errors')
                {!! Form::model($manager, ['method' => 'PATCH',
                    'url' => route('admin.managers.update',
                    ['manager' => $manager])]) !!}
                @include('admin.managers.form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection