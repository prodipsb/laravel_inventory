<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            padding: 20px;
            background: #f8f9fa;
        }
        .content {
            padding: 20px;
        }
        .active {
            font-weight: bold;
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h4>Menu</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('home', ['page' => 'products']) }}" class="nav-link {{ request('page') == 'products' ? 'active' : '' }}">
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('home', ['page' => 'categories']) }}" class="nav-link {{ request('page') == 'categories' ? 'active' : '' }}">
                            Categories
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main content -->
            <div class="col-md-10 content">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
