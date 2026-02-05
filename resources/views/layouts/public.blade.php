<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nikitos') }} - Snacks</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --nikitos-orange: #EE9336;
            --nikitos-purple: #A084BC;
            --nikitos-coral: #D65A5A;
            --nikitos-brown: #8D4A3E;
        }

        body {
            font-family: 'Nunito', sans-serif;
        }

        .bg-nikitos-orange {
            background-color: var(--nikitos-orange);
        }

        .text-nikitos-orange {
            color: var(--nikitos-orange);
        }

        .border-nikitos-orange {
            border-color: var(--nikitos-orange);
        }

        .hover\:bg-nikitos-orange:hover {
            background-color: var(--nikitos-orange);
        }

        /* Wavy top border for footer */
        .wavy-top {
            position: relative;
        }

        .wavy-top::before {
            content: '';
            position: absolute;
            top: -50px;
            left: 0;
            right: 0;
            height: 50px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z' fill='%23EE9336'/%3E%3C/svg%3E") no-repeat;
            background-size: cover;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="absolute top-0 left-0 w-full z-50">
            <div class="fixed top-0 sm:top-[21px] left-0 right-0 z-50 flex justify-center px-4">
                <nav class="bg-white shadow-md w-full max-w-[1224px] rounded-none sm:rounded-lg">
                    <div class="container mx-auto px-14 py-2 flex flex-wrap items-center justify-between h-[99px]">
                        <!-- Logo -->
                        <div class="flex items-center">
                            <a href="{{ route('home') }}" class="flex items-center">
                                <img src="{{ asset('img/logo-nikitos.png') }}" alt="Nikitos Snacks" class="h-[67px] w-[138px]">
                            </a>
                        </div>

                        <!-- Mobile menu button -->
                        <button type="button" class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-nikitos-orange focus:outline-none" id="mobile-menu-button">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            </svg>
                        </button>

                        <!-- Desktop Navigation -->
                        <div class="hidden lg:flex items-center space-x-6 text-[16px]">
                            <a href="{{ route('home') }}" class="font-semibold {{ request()->routeIs('home') ? 'text-nikitos-orange' : 'text-gray-700 hover:text-nikitos-orange' }}">Home</a>
                            <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.index') ? 'text-nikitos-orange font-semibold' : 'text-gray-700 hover:text-nikitos-orange' }}">Productos</a>
                            <a href="{{ route('where-to-buy') }}" class="{{ request()->routeIs('where-to-buy') ? 'text-nikitos-orange font-semibold' : 'text-gray-700 hover:text-nikitos-orange' }}">Donde comprar</a>
                            <a href="{{ route('recipes') }}" class="{{ request()->routeIs('recipes') ? 'text-nikitos-orange font-semibold' : 'text-gray-700 hover:text-nikitos-orange' }}">Recetas</a>
                            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-nikitos-orange font-semibold' : 'text-gray-700 hover:text-nikitos-orange' }}">Nosotros</a>
                            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-nikitos-orange font-semibold' : 'text-gray-700 hover:text-nikitos-orange' }}">Contacto</a>
                        </div>

                        <!-- Login Button -->
                        <div class="relative" x-data="{ open: {{ (request()->has('login') || $errors->any()) ? 'true' : 'false' }} }">
                            @auth
                            <a href="{{ url('/dashboard') }}" class="bg-nikitos-orange border hover:shadow-lg hover:bg-orange-500 duration-300 text-white px-6 py-2 rounded-full hidden lg:flex gap-2 cursor-pointer items-center">
                                <span>Dashboard</span>
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.3333 9.16667H4.66667C3.74619 9.16667 3 9.91286 3 10.8333V16.6667C3 17.5871 3.74619 18.3333 4.66667 18.3333H16.3333C17.2538 18.3333 18 17.5871 18 16.6667V10.8333C18 9.91286 17.2538 9.16667 16.3333 9.16667Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.33333 9.16667V5.83333C6.33333 4.72826 6.77232 3.66846 7.55372 2.88706C8.33512 2.10565 9.39493 1.66667 10.5 1.66667C11.6051 1.66667 12.6649 2.10565 13.4463 2.88706C14.2277 3.66846 14.6667 4.72826 14.6667 5.83333V9.16667" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            @else
                            <button @click="open = !open" class="bg-nikitos-orange border hover:shadow-lg hover:bg-orange-500 duration-300 text-white px-6 py-2 rounded-full hidden lg:flex gap-2 cursor-pointer items-center">
                                <span>Ingresar</span>
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.3333 9.16667H4.66667C3.74619 9.16667 3 9.91286 3 10.8333V16.6667C3 17.5871 3.74619 18.3333 4.66667 18.3333H16.3333C17.2538 18.3333 18 17.5871 18 16.6667V10.8333C18 9.91286 17.2538 9.16667 16.3333 9.16667Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.33333 9.16667V5.83333C6.33333 4.72826 6.77232 3.66846 7.55372 2.88706C8.33512 2.10565 9.39493 1.66667 10.5 1.66667C11.6051 1.66667 12.6649 2.10565 13.4463 2.88706C14.2277 3.66846 14.6667 4.72826 14.6667 5.83333V9.16667" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>

                            <!-- Login Dropdown Modal -->
                            <div x-show="open" @click.away="open = false" x-cloak
                                class="absolute top-13 bg-white w-70 sm:w-96 mt-2 -right-25 sm:right-0 z-20 p-8 rounded-lg shadow-lg">
                                <div class="mb-4">
                                    <div class="mb-4"></div>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="border border-neutral-100 w-full mb-4">
                                        <input type="email" name="email" placeholder="Email" required
                                            class="w-full px-4 py-3 border-0 focus:ring-0 focus:outline-none text-gray-700">
                                    </div>
                                    <div class="border border-neutral-100 w-full mb-4">
                                        <input type="password" name="password" placeholder="Contraseña" required
                                            class="w-full px-4 py-3 border-0 focus:ring-0 focus:outline-none text-gray-700">
                                    </div>
                                    <button type="submit" class="w-full bg-nikitos-orange text-white py-2 rounded-3xl cursor-pointer hover:bg-orange-500 transition-colors">
                                        Ingresar
                                    </button>
                                </form>
                                <div class="text-center mt-2">
                                    <a href="{{ route('password.request') }}" class="text-sm text-gray-500 hover:text-nikitos-orange">¿Olvidaste tu contraseña?</a>
                                </div>
                            </div>
                            @endauth
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="relative text-white mt-10 sm:mt-64">
            <!-- Wave Background Image -->
            <div class="absolute -bottom-0 w-full h-[520px] sm:h-[418px]">
                <img src="{{ asset('img/footer/img-footer.png') }}" alt="Fondo del footer" class="w-full h-full object-center">
            </div>

            <!-- Footer Content -->
            <div class="max-w-[1224px] mx-auto py-8 relative z-10 bottom-0 lg:bottom-10">
                <div class="flex flex-col sm:flex-row items-center justify-between">

                    <!-- Logo & Social -->
                    <div class="flex flex-col justify-center sm:items-start mb-4 sm:mb-0">
                        <img src="{{ asset('img/logo-nikitos.png') }}" alt="Nikitos" class="h-[67px] w-[138px]">
                        <div class="w-full flex justify-center sm:justify-start sm:ml-12 gap-4">
                            <a href="#" class="text-white hover:opacity-80"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-white hover:opacity-80"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>

                    <!-- Secciones (hidden on mobile) -->
                    <div class="hidden sm:flex flex-col items-center md:items-start">
                        <h3 class="text-lg font-semibold mb-5">Secciones</h3>
                        <div class="flex gap-20">
                            <ul class="space-y-2 text-sm">
                                <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                                <li><a href="{{ route('products.index') }}" class="hover:underline">Productos</a></li>
                                <li><a href="{{ route('where-to-buy') }}" class="hover:underline">Donde comprar</a></li>
                                <li><a href="#" class="hover:underline">RSE</a></li>
                            </ul>
                            <ul class="space-y-2 text-sm">
                                <li><a href="{{ route('recipes') }}" class="hover:underline">Recetas</a></li>
                                <li><a href="{{ route('about') }}" class="hover:underline">Nosotros</a></li>
                                <li><a href="{{ route('contact') }}" class="hover:underline">Contacto</a></li>
                                <li><a href="#" class="hover:underline">Políticas de calidad</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="flex flex-col items-center md:items-start mb-4 sm:mb-0">
                        <h3 class="text-lg font-semibold mb-0 sm:mb-5">Suscribite al Newsletter</h3>
                        <div class="flex w-full max-w-xs bg-white rounded-md">
                            <input type="email" placeholder="Email" class="px-4 py-2 rounded-l-md text-gray-800 w-full focus:outline-none border-0">
                            <button type="submit" class="bg-white px-4 py-2 rounded-r-md text-nikitos-orange hover:bg-gray-100">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Contacto -->
                    <div class="flex flex-col items-center md:items-start mb-4 sm:mb-0 w-full sm:w-1/4">
                        <h3 class="text-lg font-semibold mb-0 sm:mb-4">Contacto</h3>
                        <ul class="space-y-4 text-sm">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt mr-2 mt-1"></i>
                                <span>Av. Otero 4550, Pontevedra, Provincia de Buenos Aires</span>
                            </li>
                            <li><i class="fas fa-phone mr-2"></i> +54 220 492-4752</li>
                            <li><i class="fas fa-envelope mr-2"></i> ventas@nikitos.com.ar</li>
                            <li><i class="fas fa-clock mr-2"></i> Lunes a Viernes 9.00 a 17:30hs</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Copyright Bar -->
            <div class="w-full bg-[#E58325] py-4 relative z-50">
                <div class="max-w-[1224px] mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-sm">
                    <p>&copy; Copyright {{ date('Y') }} Nikitos Snacks. Todos los derechos reservados.</p>
                    <a href="https://osole.com.ar/" target="_blank" class="hover:underline">by Osole</a>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>