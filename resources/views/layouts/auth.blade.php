<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - LargoCorp</title>
    
    <!-- Aimeos Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/aimeos/ai-admin-jqadm/themes/default/bootstrap.min.css') }}">
    
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, var(--bs-primary) 0%, #0d5aa7 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }
        
        .auth-container {
            width: 100%;
            max-width: 420px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            padding: 48px;
            border-top: 4px solid var(--bs-primary);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .auth-header h1 {
            color: #1a1a1a;
            font-size: 28px;
            margin-bottom: 8px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .auth-header p {
            color: #999;
            font-size: 14px;
            margin: 0;
        }

        .form-control {
            border: 1.5px solid #e0e0e0;
            border-radius: 6px;
            padding: 14px 16px;
            font-size: 15px;
            transition: all 0.2s ease;
            height: auto;
            width: 100%;
            display: block;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: var(--bs-primary, #0d6efd);
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
            outline: none;
        }

        .form-label {
            color: #2c3e50;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            display: block;
            text-align: left;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .btn-primary {
            background: var(--bs-primary, #0d6efd);
            color: #ffffff;
            border: none;
            border-radius: 6px;
            padding: 14px 16px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            letter-spacing: 0.3px;
            width: 100%;
            display: block;
            text-align: center;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: #0d5aa7;
            transform: translateY(-1px);
            box-shadow: 0 8px 16px rgba(13, 110, 253, 0.3);
        }

        .alert {
            border: none;
            border-radius: 6px;
            background: #fff3cd;
            color: #856404;
            padding: 12px 14px;
            font-size: 14px;
            border-left: 4px solid #ffc107;
        }

        .auth-divider {
            text-align: center;
            padding: 24px 0;
            border-top: 1px solid #e9ecef;
            border-bottom: 1px solid #e9ecef;
            margin: 24px 0;
        }

        .auth-divider-title {
            color: #999;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .auth-divider-content p {
            color: #666;
            font-size: 13px;
            margin: 8px 0;
        }

        .auth-divider-content code {
            background: #f8f9fa;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 12px;
            color: #0d5aa7;
            font-family: 'Monaco', 'Menlo', monospace;
            font-weight: 500;
        }

        .auth-footer {
            text-align: center;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }

        .auth-footer a {
            color: var(--bs-primary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .auth-footer a:hover {
            color: #0d5aa7;
            text-decoration: underline;
        }

        .invalid-feedback {
            color: #dc3545 !important;
            font-size: 12px;
            margin-top: 6px;
        }
    </style>
</head>
<body>
    @yield('content')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
