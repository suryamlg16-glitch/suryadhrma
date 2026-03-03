<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-amber-50 text-gray-900">
    <header class="bg-amber-800 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold">Mebel Admin</h1>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="hover:bg-amber-700 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                    <a href="#" class="hover:bg-amber-700 px-3 py-2 rounded-md text-sm font-medium">Kelola Produk</a>
                    <a href="#" class="hover:bg-amber-700 px-3 py-2 rounded-md text-sm font-medium">Kelola User</a>
                    <a href="#" class="hover:bg-amber-700 px-3 py-2 rounded-md text-sm font-medium">Kelola Pemesanan</a>
                    <a href="#" class="hover:bg-amber-700 px-3 py-2 rounded-md text-sm font-medium">Logout</a>
                </nav>
                <div class="md:hidden">
                    <button class="text-white hover:text-gray-300 focus:outline-none focus:text-gray-300">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="min-h-screen">
        @yield('content')
    </main>

    <footer class="bg-amber-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Tentang Kami</h3>
                    <p>Kami menyediakan furniture berkualitas untuk rumah Anda.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <p>Email: info@mebel.com</p>
                    <p>Tel: 08123456789</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Menu</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-300">Dashboard</a></li>
                        <li><a href="#" class="hover:text-gray-300">Produk</a></li>
                        <li><a href="#" class="hover:text-gray-300">User</a></li>
                        <li><a href="#" class="hover:text-gray-300">Pemesanan</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-amber-700 mt-8 pt-8 text-center">
                <p>&copy; 2023 Mebel Admin. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
