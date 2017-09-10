@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">{{ trans('common.restaurants') }}</h4>
                <a href="{{ route('admin.restaurants.create') }}" class="pull-right btn btn-success">
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
                        <th>{{ trans('common.city') }}</th>
                        <th>{{ trans('common.category') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($restaurants as $restaurant)
                        <tr>
                            <td>{{ $restaurant->id }}</td>
                            <td>{{ $restaurant->title }}</td>
                            <td>{{ $restaurant->city->name }}</td>
                            <td>{{ $restaurant->category->name }}</td>
                            <td>
                                <a href="{{ route('admin.restaurants.edit',
                                    ['restaurant' => $restaurant]) }}"
                                    class="btn btn-sm btn-warning"
                                    title="{{ trans('common.edit') }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-sm btn-danger"
                                    href="#destroyModal" data-toggle="modal"
                                    title="{{ trans('common.delete') }}"
                                    data-url="{{ route('admin.restaurants.destroy',
                                    ['restaurant' => $restaurant]) }}"
                                    data-text="{{ trans('common.destroy',
                                    ['id' => $restaurant->id]) }}">
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