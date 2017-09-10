@extends('admin.layout')

@section('content')
    <div class="row-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="pull-left">{{ trans('common.products') }}</h4>
                <a href="{{ route('admin.products.create') }}" class="pull-right btn btn-success">
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
                        <th>{{ trans('common.price') }}</th>
                        <th>{{ trans('common.sku') }}</th>
                        <th>{{ trans('common.productType') }}</th>
                        <th>{{ trans('common.image') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }} лв.</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->productType->name }}</td>
                            <td>{{ $product->small_image }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit',
                                    ['product' => $product]) }}"
                                    class="btn btn-sm btn-warning"
                                    title="{{ trans('common.edit') }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a class="btn btn-sm btn-danger"
                                    href="#destroyModal" data-toggle="modal"
                                    title="{{ trans('common.delete') }}"
                                    data-url="{{ route('admin.products.destroy',
                                    ['product' => $product]) }}"
                                    data-text="{{ trans('common.destroy',
                                    ['id' => $product->id]) }}">
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