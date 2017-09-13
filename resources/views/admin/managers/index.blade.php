@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">{{ trans('common.managers') }}</h4>
                <a href="{{ route('admin.managers.create') }}" class="pull-right btn btn-success">
                    {{ trans('common.managers') }}
                </a>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('common.first_name') }}</th>
                        <th>{{ trans('common.last_name') }}</th>
                        <th>{{ trans('common.restaurant') }}</th>
=                    </tr>
                    </thead>
                    <tbody>
                    @foreach($managers as $manager)
                        <tr>
                            <td>{{ $manager->id }}</td>
                            <td>{{ $manager->first_name }}</td>
                            <td>{{ $manager->last_name }}</td>
                            <td>{{ $manager->restaurant->title }}</td>
                            <td>
                                <a href="{{ route('admin.managers.edit',
                                    ['manager' => $manager]) }}"
                                    class="btn btn-sm btn-warning"
                                    title="{{ trans('common.edit') }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-sm btn-danger"
                                    href="#destroyModal" data-toggle="modal"
                                    title="{{ trans('common.delete') }}"
                                    data-url="{{ route('admin.managers.destroy',
                                    ['manager' => $manager]) }}"
                                    data-text="{{ trans('common.destroy',
                                    ['id' => $manager->id]) }}">
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