<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm py-2">
    <div class="container-fluid px-4">
        <!-- Sidebar Toggle (Mobile) -->
        <button class="navbar-toggler border-0 shadow-none me-2 d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminSidebar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand d-none d-md-flex align-items-center" href="{{ route('admin.dashboard') }}">
            <span class="fs-4 fw-bold text-primary me-2">LargoCorp</span>
            <span class="fs-6 text-muted fw-medium border-start ps-2 border-2">Admin</span>
        </a>
        
        <!-- Right Icons -->
        <div class="ms-auto d-flex align-items-center">
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 px-3 py-2 rounded-pill hover-bg-light" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="transition: all 0.2s;">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; font-weight: 600; font-size: 14px;">
                        {{ strtoupper(substr(Auth::user()?->email ?? 'U', 0, 1)) }}
                    </div>
                    <span class="d-none d-md-block fw-medium text-dark">{{ Auth::user()?->email ?? 'User' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 rounded-3" aria-labelledby="userDropdown">
                    <li><h6 class="dropdown-header">Account</h6></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center gap-2 text-danger py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg>
                                Log out
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
