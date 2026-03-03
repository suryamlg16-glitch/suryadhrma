@props([
    'title' => 'Ciptakan Ruang yang Nyaman',
    'description' => 'Furniture berkualitas dengan desain modern, detail yang elegan, dan sentuhan hangat untuk membantu Anda membangun suasana rumah yang indah, fungsional, dan membuat setiap momen terasa lebih nyaman.'
])

<div class="bg-gradient-to-br from-indigo-50 via-white to-purple-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">{{ $title }}</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-10">{{ $description }}</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('katalog') }}" class="bg-indigo-600 text-white px-8 py-3 rounded-lg hover:bg-indigo-700 transition">
                    Lihat Katalog
                </a>
                <a href="#" class="border-2 border-indigo-600 text-indigo-600 px-8 py-3 rounded-lg hover:bg-indigo-50 transition">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>