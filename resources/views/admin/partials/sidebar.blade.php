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
                    <a href="{{ route('admin.cities.index') }}"
                       @if (request()->segment(2) === 'cities') class="active" @endif >
                        <i class="fa fa-dashboard"></i>
                        {{ trans('common.cities') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
