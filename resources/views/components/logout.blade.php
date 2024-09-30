<a href="{{ route('dashboard.auth.logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
    <span>Logout</span>
</a>

<form id="logout-form" action="{{ route('dashboard.auth.logout') }}" method="POST" style="display: none;">
    @csrf
</form>