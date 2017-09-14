@extends('admin.layout')

@section('content')
<div class="panel-body">
    {!! Form::open(['method' => 'POST',
    'url' => route('admin.news.store')]) !!}
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <div class="form-group">
        @include('admin.news.form')
	    {{ csrf_field() }}
	    <div class="clearfix"></div>
	</div>
    {!! Form::close() !!}
</div>
@endsection