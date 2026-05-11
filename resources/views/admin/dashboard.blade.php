<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - LargoCorp Shop</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f5f7fa;
        }
        
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar h1 {
            font-size: 22px;
        }
        
        .navbar .user-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .navbar .user-name {
            font-size: 14px;
        }
        
        .logout-button {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s;
        }
        
        .logout-button:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        .container {
            display: flex;
            min-height: calc(100vh - 70px);
        }
        
        .sidebar {
            width: 250px;
            background: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
        }
        
        .sidebar-menu {
            list-style: none;
        }
        
        .sidebar-menu li {
            margin-bottom: 10px;
        }
        
        .sidebar-menu a {
            display: block;
            padding: 12px 15px;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .sidebar-menu a:hover {
            background: #f5f7fa;
            color: #667eea;
        }
        
        .main-content {
            flex: 1;
            padding: 40px;
        }
        
        .welcome-card {
            background: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }
        
        .welcome-card h2 {
            color: #333;
            margin-bottom: 10px;
        }
        
        .welcome-card p {
            color: #666;
            line-height: 1.6;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .dashboard-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-left: 4px solid #667eea;
        }
        
        .dashboard-card h3 {
            color: #333;
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #999;
        }
        
        .dashboard-card .value {
            font-size: 32px;
            font-weight: bold;
            color: #667eea;
        }
        
        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 30px;
        }
        
        .action-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .info-box {
            background: #e7f3ff;
            border-left: 4px solid #2196F3;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 14px;
            color: #1565c0;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>LargoCorp Admin Dashboard</h1>
        <div class="user-section">
            <div class="user-name">Welcome, {{ $user->email }}</div>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </div>
    
    <div class="container">
        <div class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="/admin/dashboard">Dashboard</a></li>
                <li><a href="/admin">Admin Panel</a></li>
                <li><a href="/shop">Shop Frontend</a></li>
            </ul>
        </div>
        
        <div class="main-content">
            <div class="welcome-card">
                <h2>Welcome to LargoCorp Admin</h2>
                <p>You are successfully logged in. This is your admin dashboard where you can manage your e-commerce store powered by Aimeos.</p>
            </div>
            
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <h3>Demo Products</h3>
                    <div class="value">17</div>
                </div>
                <div class="dashboard-card">
                    <h3>Demo Orders</h3>
                    <div class="value">36</div>
                </div>
                <div class="dashboard-card">
                    <h3>Demo Categories</h3>
                    <div class="value">14</div>
                </div>
            </div>
            
            <div class="action-buttons">
                <a href="/admin" class="action-button">Go to Aimeos Admin</a>
                <a href="/shop" class="action-button">View Shop</a>
            </div>
            
            <div class="info-box">
                <strong>Note:</strong> The full Aimeos admin panel is available at <code>/admin</code>. This dashboard serves as a simple home page for authenticated users.
            </div>
        </div>
    </div>
</body>
</html>
