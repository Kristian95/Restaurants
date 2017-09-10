@extends('admin.layout')

@section('content')

<div class="row">
    <div class="col-md-4">
        <a href="{{ route('admin.restaurants.index') }}">
            <div class="mini-stat clearfix">
                <span class="mini-stat-icon green">
                    <i class="fa fa-beer"></i>
                </span>
                <div class="mini-stat-info">
                    <span>{{ trans('common.restaurants') }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('admin.users.index') }}">
            <div class="mini-stat clearfix">
                <span class="mini-stat-icon green">
                    <i class="fa fa-beer"></i>
                </span>
                <div class="mini-stat-info">
                    <span>{{ trans('common.users') }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('admin.cities.index') }}">
            <div class="mini-stat clearfix">
                <span class="mini-stat-icon green">
                    <i class="fa fa-glass"></i>
                </span>
                <div class="mini-stat-info">
                    <span>{{ trans('common.cities') }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('admin.categories.index') }}">
            <div class="mini-stat clearfix">
                <span class="mini-stat-icon green">
                    <i class="fa fa-glass"></i>
                </span>
                <div class="mini-stat-info">
                    <span>{{ trans('common.categories') }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('admin.districts.index') }}">
            <div class="mini-stat clearfix">
                <span class="mini-stat-icon green">
                    <i class="fa fa-glass"></i>
                </span>
                <div class="mini-stat-info">
                    <span>{{ trans('common.districts') }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('admin.productTypes.index') }}">
            <div class="mini-stat clearfix">
                <span class="mini-stat-icon green">
                    <i class="fa fa-glass"></i>
                </span>
                <div class="mini-stat-info">
                    <span>{{ trans('common.productTypes') }}</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('admin.products.index') }}">
            <div class="mini-stat clearfix">
                <span class="mini-stat-icon green">
                    <i class="fa fa-glass"></i>
                </span>
                <div class="mini-stat-info">
                    <span>{{ trans('common.products') }}</span>
                </div>
            </div>
        </a>
    </div>
</div>

@endsection