@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">{{ trans('common.employees') }}</h4>
                <a href="{{ route('admin.employees.create') }}" class="pull-right btn btn-success">
                    {{ trans('common.employees') }}
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
                        <th>{{ trans('common.position') }}</th>
=                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>
                                <a href="{{ route('admin.employees.edit',
                                    ['employee' => $employee]) }}"
                                    class="btn btn-sm btn-warning"
                                    title="{{ trans('common.edit') }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-danger"
                                    href="#destroyModal" data-toggle="modal"
                                    title="{{ trans('common.delete') }}"
                                    data-url="{{ route('admin.employees.destroy',
                                    ['employee' => $employee]) }}"
                                    data-text="{{ trans('common.destroy',
                                    ['id' => $employee->id]) }}">
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