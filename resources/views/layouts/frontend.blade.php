<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'MebelKita') - {{ config('app.name') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Page Transition - Simple Fade */
        .page-transition {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .fade-out {
            opacity: 0;
            transform: translateY(-10px);
        }
        .fade-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Scroll Reveal Animations */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }
        
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Card Hover Effect */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        /* Image Zoom Effect */
        .image-zoom {
            overflow: hidden;
        }
        
        .image-zoom img {
            transition: transform 0.6s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }
        
        .image-zoom:hover img {
            transform: scale(1.05);
        }
        
        /* Counter Animation */
        .counter {
            transition: all 0.5s ease;
        }
    </style>
    
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50 min-h-screen flex flex-col">
    <!-- Header Component -->
    <x-custom.header />
    
    <!-- Main Content -->
    <main class="flex-1" id="mainContent">
        @yield('content')
    </main>
    
    <!-- Footer Component -->
    <x-custom.footer />
    
    <script>
        // Simple page transition with fade animation
        document.addEventListener('click', function(e) {
            const link = e.target.closest('a');
            if (link && link.href && link.href.startsWith(window.location.origin)) {
                // Skip admin links
                if (link.href.includes('/admin')) return;
                if (link.target === '_blank') return;
                if (link.hasAttribute('download')) return;
                
                e.preventDefault();
                const url = link.href;
                
                // Fade out main content
                const mainContent = document.getElementById('mainContent');
                mainContent.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                mainContent.style.opacity = '0';
                mainContent.style.transform = 'translateY(-10px)';
                
                // Navigate after animation
                setTimeout(() => {
                    window.location.href = url;
                }, 300);
            }
        });
        
        // Fade in when page loads
        window.addEventListener('pageshow', function() {
            const mainContent = document.getElementById('mainContent');
            mainContent.style.opacity = '1';
            mainContent.style.transform = 'translateY(0)';
        });
        
        // Initial fade in
        document.addEventListener('DOMContentLoaded', function() {
            const mainContent = document.getElementById('mainContent');
            mainContent.style.opacity = '0';
            mainContent.style.transform = 'translateY(-10px)';
            
            setTimeout(() => {
                mainContent.style.opacity = '1';
                mainContent.style.transform = 'translateY(0)';
            }, 50);
        });
        
        // Scroll Reveal - Muncul saat di-scroll
        document.addEventListener('DOMContentLoaded', function() {
            const revealElements = document.querySelectorAll('.reveal');
            
            const revealOnScroll = () => {
                const windowHeight = window.innerHeight;
                const revealPoint = 150;
                
                revealElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    
                    if (elementTop < windowHeight - revealPoint) {
                        element.classList.add('active');
                    }
                });
            };
            
            // Run on load
            revealOnScroll();
            
            // Run on scroll
            window.addEventListener('scroll', revealOnScroll);
            
            // Counter Animation (angka naik)
            const counters = document.querySelectorAll('.counter');
            
            const runCounter = (counter) => {
                const target = parseInt(counter.getAttribute('data-target'));
                let current = 0;
                const increment = target / 50;
                
                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        counter.innerText = Math.ceil(current);
                        setTimeout(updateCounter, 30);
                    } else {
                        counter.innerText = target;
                    }
                };
                
                updateCounter();
            };
            
            // Run counter when element is visible
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        runCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            counters.forEach(counter => observer.observe(counter));
        });
    </script>
    
    @stack('scripts')
</body>
</html>