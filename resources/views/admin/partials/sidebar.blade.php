<aside>
    <div id="sidebar" class="nav-collapse">
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       @if (request()->segment(2) === null) class="active" @endif >
                        <i class="fa fa-dashboard"></i>
                        {{ trans('common.index') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}"
                       @if (request()->segment(2) === 'users') class="active" @endif >
                        <i class="fa fa-dashboard"></i>
                        {{ trans('common.users') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.cities.index') }}"
                       @if (request()->segment(2) === 'cities') class="active" @endif >
                        <i class="fa fa-dashboard"></i>
                        {{ trans('common.cities') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.districts.index') }}"
                       @if (request()->segment(2) === 'districts') class="active" @endif >
                        <i class="fa fa-dashboard"></i>
                        {{ trans('common.districts') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}"
                       @if (request()->segment(2) === 'categories') class="active" @endif >
                        <i class="fa fa-dashboard"></i>
                        {{ trans('common.categories') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.restaurants.index') }}"
                       @if (request()->segment(2) === 'restaurants') class="active" @endif >
                        <i class="fa fa-beer"></i>
                        {{ trans('common.restaurants') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.productTypes.index') }}"
                       @if (request()->segment(2) === 'productTypes') class="active" @endif >
                        <i class="fa fa-beer"></i>
                        {{ trans('common.productTypes') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}"
                       @if (request()->segment(2) === 'products') class="active" @endif >
                        <i class="fa fa-beer"></i>
                        {{ trans('common.products') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.managers.index') }}"
                       @if (request()->segment(2) === 'managers') class="active" @endif >
                        <i class="fa fa-beer"></i>
                        {{ trans('common.managers') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
