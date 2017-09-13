@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="pull-left">
                    {{ trans('common.create') }}
                </h2>
                <a class="pull-right btn btn-primary"
                    href="{{ route('admin.languages.index') }}">
                    {{ trans('common.languages') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('admin.partials.errors')
                {!! Form::open(['method' => 'POST', 'files' => true,
                    'url' => route('admin.languages.store')]) !!}
                    @include('admin.languages.form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection