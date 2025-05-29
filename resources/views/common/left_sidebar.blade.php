<!-- Left Side Of Navbar -->
<ul class="navbar-nav me-auto">
    <li class="nav-item">
        @role(config('constant.ADMIN_ROLE_NAME'))
        <a class="nav-link" href="{{ route('users.index') }}">{{ __('Users') }}</a>
        @endrole
    </li>
</ul>