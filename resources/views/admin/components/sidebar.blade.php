<nav class="admin-sidebar d-flex flex-column h-100">
    <div class="px-4 py-3 border-bottom d-flex align-items-center d-md-none">
        <span class="fs-5 fw-bold text-primary">LargoCorp</span>
    </div>
    
    <ul class="nav nav-pills flex-column mb-auto px-3 mt-4 gap-1">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" 
               class="nav-link d-flex align-items-center {{ Route::is('admin.dashboard') ? 'active bg-primary text-white shadow-sm' : 'text-dark' }}"
               style="border-radius: 8px; transition: all 0.2s;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="me-3" viewBox="0 0 16 16">
                    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 12.5A1.5 1.5 0 0 1 2.5 11h3A1.5 1.5 0 0 1 7 12.5v3A1.5 1.5 0 0 1 5.5 17h-3A1.5 1.5 0 0 1 1 15.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 11h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a1.5 1.5 0 0 1-1.5-1.5v-3z"/>
                </svg>
                <span class="fw-medium">Dashboard</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('users.index') }}" 
               class="nav-link d-flex align-items-center {{ Route::is('users.*') ? 'active bg-primary text-white shadow-sm' : 'text-dark' }}"
               style="border-radius: 8px; transition: all 0.2s;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="me-3" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.6c0-.113.086-.213.22-.271.074-.04.147-.034.221.006.02.02.242.062.242.102.095-.006.245.01.245.083 0 .122.112.215.22.215H11a.214.214 0 0 0 .215-.215 8 8 0 0 0-7.978-.999zM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-9-1a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm9 0a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                </svg>
                <span class="fw-medium">User Management</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('settings.show') }}" 
               class="nav-link d-flex align-items-center {{ Route::is('settings.*') ? 'active bg-primary text-white shadow-sm' : 'text-dark' }}"
               style="border-radius: 8px; transition: all 0.2s;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="me-3" viewBox="0 0 16 16">
                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.361 1.204a1.929 1.929 0 0 1-2.432 1.25l-1.158-.34c-1.311-.38-2.67.278-3.05 1.594l-.572 1.926c-.356 1.197.074 2.482 1.202 3.09l.898.604c.930.626.949 1.866.022 2.517l-.807.604c-1.076.713-1.502 1.927-.783 3.039l.572 1.926c.38 1.316 1.74 1.974 3.05 1.594l1.158-.34a1.929 1.929 0 0 1 2.432 1.25l.361 1.204c.413 1.4 2.397 1.4 2.81 0l.361-1.204a1.929 1.929 0 0 1 2.432-1.25l1.158.34c1.311.38 2.67-.278 3.05-1.594l.572-1.926c.356-1.197-.074-2.482-1.202-3.09l-.898-.604c-.930-.626-.949-1.866-.022-2.517l.807-.604c1.076-.713 1.502-1.927.783-3.039l-.572-1.926c-.38-1.316-1.74-1.974-3.05-1.594l-1.158.34a1.929 1.929 0 0 1-2.432-1.25l-.361-1.204zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                </svg>
                <span class="fw-medium">Store Settings</span>
            </a>
        </li>
    </ul>

    <hr class="mx-3 text-secondary">
    
    <div class="px-3 pb-4">
        <ul class="nav nav-pills flex-column gap-1">
            <li class="nav-item">
                <a href="{{ route('aimeos_shop_jqadm_search', ['site' => 'default', 'resource' => 'dashboard']) }}" target="_blank" rel="noopener noreferrer"
                   class="nav-link d-flex align-items-center text-dark"
                   style="border-radius: 8px; transition: all 0.2s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="me-3 text-secondary" viewBox="0 0 16 16">
                        <path d="M4.5 13a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V4h1.25a.75.75 0 0 0 0-1.5H13V2a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v.5H3.75a.75.75 0 0 0 0 1.5H5v9z"/>
                    </svg>
                    <span class="fw-medium">Aimeos Admin</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="ms-auto text-muted" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                    </svg>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('aimeos_shop_list') }}" target="_blank" rel="noopener noreferrer"
                   class="nav-link d-flex align-items-center text-dark"
                   style="border-radius: 8px; transition: all 0.2s;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="me-3 text-secondary" viewBox="0 0 16 16">
                        <path d="M1 1a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                    </svg>
                    <span class="fw-medium">Shop Frontend</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="ms-auto text-muted" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</nav>

<style>
    .nav-link:hover:not(.active) {
        background-color: #f8f9fa;
        color: var(--bs-primary) !important;
    }
    .nav-link:hover:not(.active) svg {
        color: var(--bs-primary) !important;
    }
</style>
