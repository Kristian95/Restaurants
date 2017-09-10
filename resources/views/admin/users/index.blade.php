@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">{{ trans('common.users') }}</h4>
                <div class="clearfix"></div>
            </header>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('common.id') }}</th>
                        <th>{{ trans('common.name') }}</th>
                        <th>{{ trans('common.email') }}</th>
                        <th>{{ trans('common.created_at') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a class="btn btn-sm btn-danger"
                                    href="#destroyModal" data-toggle="modal"
                                    title="{{ trans('common.delete') }}"
                                    data-url="{{ route('admin.users.destroy',
                                    ['user' => $user]) }}"
                                    data-text="{{ trans('common.destroy',
                                    ['id' => $user->id]) }}">
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