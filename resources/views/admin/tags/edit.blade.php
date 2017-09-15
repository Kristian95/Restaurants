@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">
                    {{ trans('common.edit') }}
                </h4>
                <a class="pull-right btn btn-primary"
                    href="{{ route('admin.tags.index') }}">
                    {{ trans('common.tags') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                @include('admin.partials.errors')
                {!! Form::model($tag, ['method' => 'PATCH',
                    'url' => route('admin.tags.update',
                    ['tag' => $tag])]) !!}
                @include('admin.tags.form')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
@endsection