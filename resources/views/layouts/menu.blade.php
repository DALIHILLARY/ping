<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-clock"></i>
        <p>Logs</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('domains.index') }}" class="nav-link {{ Request::is('domains*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-globe"></i>
        <p>Domains</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('maintainers.index') }}" class="nav-link {{ Request::is('maintainers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Maintainers</p>
    </a>
</li>
