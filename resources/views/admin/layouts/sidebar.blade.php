<nav class="{{ $cssNs }} sidebar">

            <div class="sidebar-header">

                <a href="{{ url('/') }}" target="_blank" class="sidebar-brand">
                  <figure>
                      <img src="{{ URL::asset('img/admin/logo-main.png') }}" alt="Logo {{ env('APP_NAME') }}"/>
                  </figure>
                </a>

                <div class="sidebar-toggler not-active">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>

            </div>

            <div class="sidebar-body">

                <ul class="nav">

                    <li class="nav-item nav-category">{{ __('sidebar.website') }}</li>
                    @can('modules.dashboard.index')

                    <li class="nav-item {{ active(['*/dashboard']) }}">
                        <a href="{{ url('/admin/modules/dashboard') }}" class="nav-link">
                            <i class="link-icon fa-regular fa-gauge"></i><span class="link-title">{{ __('sidebar.dashboard') }}</span>
                        </a>
                    </li>
                    @endcan

                    @can('modules.category.index')

                    <li class="nav-item {{ active(['*/categories/', '*/categories/create', '*/categories/*/edit']) }}">
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="link-icon fa-regular fa-list-ul"></i><span class="link-title">{{ __('sidebar.category') }}</span>
                        </a>
                    </li>
                    @endcan

                    <li class="nav-item nav-category">{{ __('sidebar.users') }}</li>

                    @can('modules.administrator.index')

                    <li class="nav-item {{ active(['*/administrators', '*/administrators/create', '*/administrators/*/edit']) }}">
                        <a href="{{ route('administrator.index') }}" class="nav-link">
                            <i class="link-icon fa-regular fa-users"></i><span class="link-title">{{ __('sidebar.users') }}</span>
                        </a>
                    </li>
                    @endcan

                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <i class="link-icon fa-regular fa-right-from-bracket"></i><span class="link-title">{{ __('sidebar.logout') }}</span>
                        </a>
                    </li>

                </ul>

            </div>

        </nav>
