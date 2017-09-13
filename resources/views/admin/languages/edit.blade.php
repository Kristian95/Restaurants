@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="pull-left">
                    {{ trans('common.edit') }}
                </h2>
                <a class="pull-right btn btn-primary"
                   href="{{ route('admin.languages.index') }}">
                    {{ trans('common.languages') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('admin.partials.errors')
                {!! Form::model($language, ['method' => 'PATCH',
                    'url' => route('admin.languages.update',
                    ['language' => $language]), 'files' => true]) !!}
                    @include('admin.languages.form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection