@extends('admin.layout')

@section('content')
	<div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">{{ trans('common.news') }}</h4>
                <a href="{{ route('admin.news.create') }}" class="pull-right btn btn-success">
                    {{ trans('common.create') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('common.name') }}</th>
                        <th>{{ trans('common.updated_at') }}</th>
                        <th>{{ trans('common.options') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $one)
                        <tr>
                            <td>{{ $one->id }}</td>
                            <td>{{ $one->name }}</td>
                            <td>{{ $one->updated_at->format('H:i d.m.Y') }}</td>
                            <td>
                                <a href="{{ route('admin.news.edit',
                                    ['news' => $one]) }}"
                                   class="btn btn-sm btn-warning"
                                   title="{{ trans('common.edit') }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-sm btn-danger"
                                   href="#destroyModal" data-toggle="modal"
                                   title="{{ trans('common.delete') }}"
                                   data-url="{{ route('admin.news.destroy',
                                    ['one' => $one]) }}"
                                   data-text="{{ trans('common.destroy',
                                    ['id' => $one->id]) }}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    @include('admin.partials.destroy_modal')
@endsection