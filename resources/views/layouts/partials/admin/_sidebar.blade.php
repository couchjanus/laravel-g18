<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ __('Dashboard') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-briefcase nav-icon">

                    </i>
                    {{ __('Categories') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.tags.index") }}" class="nav-link {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-file nav-icon">

                    </i>
                    {{ __('Tags') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.posts.index") }}" class="nav-link {{ request()->is('admin/posts') || request()->is('admin/posts/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-briefcase nav-icon">

                    </i>
                    {{ __('Posts') }}
                </a>
            </li>
            @can('user_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>
                    {{ __('Users') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                            <i class="fa-fw fas fa-unlock-alt nav-icon">

                            </i>
                            {{ __('Permissions') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.roles.index') }}" class="nav-link">
                            <i class="fa-fw fas fa-briefcase nav-icon">

                            </i>
                            {{ __('Roles') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user nav-icon">

                            </i>
                        {{ __('Users') }}
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            <li class="nav-item">
                
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>