@extends('admin.layout')

@section('content')
<div class="row-fluid">
    <section class="panel">
        <header class="panel-heading">
            <h4 class="pull-left">
                {{ trans('common.edit') }}
            </h4>
            <a class="pull-right btn btn-primary"
               href="{{ route('admin.news.index') }}">
                {{ trans('common.news') }}
            </a>
            <div class="clearfix"></div>
        </header>
        <div class="panel-body">
            {!! Form::model($news, ['method' => 'PATCH',
            'url' => route('admin.news.update',
            ['news' => $news])]) !!}
            @include('admin.news.form')
            {!! Form::close() !!}
        </div>
    </section>
</div>
@endsection