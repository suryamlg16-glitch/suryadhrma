<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - 541 Furniture</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: #f4f6f9;
        }
        
        /* Sidebar Styles */
        .sidebar {
            background-color: #1e293b;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            transition: all 0.3s;
            z-index: 1000;
        }
        
        .sidebar .logo {
            padding: 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar .logo h4 {
            color: white;
            margin: 0;
            font-weight: 600;
        }
        
        .sidebar .logo p {
            color: #94a3b8;
            font-size: 0.75rem;
            margin: 0;
        }
        
        .sidebar .nav-link {
            color: #cbd5e1;
            padding: 0.75rem 1.5rem;
            margin: 0.25rem 0;
            transition: all 0.3s;
            border-radius: 0;
        }
        
        .sidebar .nav-link:hover {
            background-color: #334155;
            color: white;
        }
        
        .sidebar .nav-link.active {
            background-color: #B08968;
            color: white;
        }
        
        .sidebar .nav-link i {
            width: 24px;
            margin-right: 10px;
        }
        
        /* Main Content Styles */
        .main-content {
            margin-left: 280px;
            padding: 0;
            min-height: 100vh;
        }
        
        /* Header Styles */
        .top-header {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .user-details {
            text-align: right;
        }
        
        .user-name {
            font-weight: 600;
            margin: 0;
            font-size: 0.9rem;
        }
        
        .user-email {
            font-size: 0.75rem;
            color: #6c757d;
            margin: 0;
        }
        
        .avatar {
            width: 40px;
            height: 40px;
            background-color: #B08968;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        
        .btn-logout {
            background-color: #dc2626;
            color: white;
            border: none;
            padding: 0.4rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
            transition: all 0.3s;
        }
        
        .btn-logout:hover {
            background-color: #b91c1c;
        }
        
        /* Content Wrapper */
        .content-wrapper {
            padding: 2rem;
        }
        
        /* Footer Styles */
        .footer {
            background: white;
            padding: 1rem 2rem;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            margin-top: 2rem;
        }
        
        .footer p {
            margin: 0;
            font-size: 0.8rem;
            color: #64748b;
        }
        
        .footer .tagline {
            font-weight: 500;
            color: #B08968;
            margin-bottom: 0.25rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }
            .sidebar .logo h4, .sidebar .logo p, .sidebar .nav-link span {
                display: none;
            }
            .sidebar .nav-link i {
                margin-right: 0;
            }
            .main-content {
                margin-left: 70px;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="logo">
        <h4><i class="fas fa-couch me-2"></i> 541</h4>
        <p>Admin Panel</p>
    </div>
    
    <ul class="nav flex-column mt-3">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
               href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}" 
               href="{{ route('admin.produk.index') }}">
                <i class="fas fa-box"></i>
                <span>Kelola Produk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}" 
               href="{{ route('admin.kategori.index') }}">
                <i class="fas fa-tags"></i>
                <span>Kelola Kategori</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.pesanan.*') ? 'active' : '' }}" 
               href="{{ route('admin.pesanan.index') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Kelola Pesanan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.transaksi.*') ? 'active' : '' }}" 
               href="{{ route('admin.transaksi.index') }}">
                <i class="fas fa-credit-card"></i>
                <span>Kelola Transaksi</span>
            </a>
        </li>
    </ul>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">
    <!-- HEADER -->
    <div class="top-header">
        <div>
            <h5 class="mb-0">Selamat Datang, Administrator</h5>
            <small class="text-muted">Kelola toko furniture Anda dengan mudah</small>
        </div>
        <div class="user-info">
            <div class="user-details">
                <p class="user-name">Administrator</p>
                <p class="user-email">541furniture@gmail.com</p>
            </div>
            <div class="avatar">
                <i class="fas fa-user"></i>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </button>
            </form>
        </div>
    </div>
    
    <!-- CONTENT WRAPPER -->
    <div class="content-wrapper">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>
    
    <!-- FOOTER -->
    <div class="footer">
        <p class="tagline">Desain • Kualitas • Kenyamanan</p>
        <p>&copy; {{ date('Y') }} 541 FURNITURE - All Rights Reserved</p>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@stack('scripts')

<script>
    // Auto close alert after 3 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 3000);
</script>
</body>
</html>