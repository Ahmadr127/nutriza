<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['site_name'] ?? 'Nutriza' }} | Katering Diet Sehat Terpercaya</title>
    
    <!-- Meta SEO -->
    <meta name="description" content="{{ $settings['footer_description'] ?? 'Nutriza adalah katering diet sehat terpercaya.' }}">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ isset($settings['app_favicon']) ? Storage::url($settings['app_favicon']) : '' }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;1,600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (CDN for Rapid Prototype) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            900: '#14532d',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        [x-cloak] { display: none !important; }
        html { scroll-behavior: smooth; }
        .clip-path-bottom {
            clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
        }
    </style>
</head>
<body class="antialiased text-gray-800 bg-white selection:bg-brand-500 selection:text-white">

    <x-public.navbar :settings="$settings" />

    <main class="min-h-screen">
        @yield('content')
    </main>

    <x-public.footer :settings="$settings" />

    <x-public.floating-whatsapp :settings="$settings" />

</body>
</html>
