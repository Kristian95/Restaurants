@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">{{ trans('common.cities') }}</h4>
                <a href="{{ route('admin.productTypes.create') }}" class="pull-right btn btn-success">
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productTypes as $productType)
                        <tr>
                            <td>{{ $productType->id }}</td>
                            <td>{{ $productType->name }}</td>
                            <td>
                                <a href="{{ route('admin.productTypes.edit',
                                    ['productType' => $productType]) }}"
                                    class="btn btn-sm btn-warning"
                                    title="{{ trans('common.edit') }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-sm btn-danger"
                                    href="#destroyModal" data-toggle="modal"
                                    title="{{ trans('common.delete') }}"
                                    data-url="{{ route('admin.productTypes.destroy',
                                    ['productType' => $productType]) }}"
                                    data-text="{{ trans('common.destroy',
                                    ['id' => $productType->id]) }}">
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