<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - LargoCorp</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --bs-primary: #0d6efd;
            --bs-line-light: #e9ecef;
            --bs-dark: #212529;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f5f7fa;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
        
        .admin-container {
            display: flex;
            flex: 1;
        }
        
        .admin-sidebar {
            width: 250px;
            background: white;
            border-right: 1px solid var(--bs-line-light);
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
            flex-shrink: 0;
        }
        
        .admin-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }
        
        /* Sidebar active link logic fallback if inline styles override */
        .admin-sidebar a:hover {
            background-color: #f8f9fa;
        }
        
        @media (max-width: 768px) {
            .admin-container {
                flex-direction: column;
            }
            
            .admin-sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid var(--bs-line-light);
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    @include('admin.components.navbar')
    
    <div class="admin-container">
        @include('admin.components.sidebar')
        
        <div class="admin-content">
            @yield('content')
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
