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

                    <li class="nav-item nav-category">{{ __('Website') }}</li>
                    @can('modules.dashboard.index')

                    <li class="nav-item {{ active(['*/dashboard']) }}">
                        <a href="{{ url('/admin/modules/dashboard') }}" class="nav-link">
                            <i class="link-icon fa-regular fa-gauge"></i><span class="link-title">{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    @endcan

                    <li class="nav-item nav-category">{{ __('Admin') }}</li>
                    @can('modules.administrator.index')

                    <li class="nav-item {{ active(['*/administrators', '*/administrators/*']) }}">
                        <a href="{{ url('/admin/modules/administrators') }}" class="nav-link">
                            <i class="link-icon fa-regular fa-user-group"></i><span class="link-title">{{ __('Users') }}</span>
                        </a>
                    </li>
                    @endcan

                    <li class="nav-item">

                        <form method="post" action="{{ route('logout') }}" id="logoutForm">

                            @csrf

                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();" role="button">
                                <i class="link-icon fa-regular fa-right-from-bracket"></i><span class="link-title">{{ __('Logout') }}</span>
                            </a>

                        </form>

                    </li>

                </ul>

            </div>

        </nav>
