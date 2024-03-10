<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Get started with a free and open-source admin dashboard layout built with Tailwind CSS and Flowbite featuring charts, widgets, CRUD layouts, authentication pages, and more">
    <meta name="author" content="Themesberg">
    <meta name="generator" content="Hugo 0.123.8">

    <title>@isset($title) {{ $title . " |" }} @endisset {{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://flowbite-admin-dashboard.vercel.app//app.css">
    <link rel="apple-touch-icon" sizes="180x180" href="https://flowbite-admin-dashboard.vercel.app/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://flowbite-admin-dashboard.vercel.app/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://flowbite-admin-dashboard.vercel.app/favicon-16x16.png">
    <link rel="icon" type="image/png" href="https://flowbite-admin-dashboard.vercel.app/favicon.ico">
    <link rel="manifest" href="https://flowbite-admin-dashboard.vercel.app/site.webmanifest">
    <link rel="mask-icon" href="https://flowbite-admin-dashboard.vercel.app/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    @include('admin.layouts.social-meta')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css','resources/js/app.js'])

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="bg-gray-50 dark:bg-gray-800">

    @include('admin.layouts.header')
    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">

        @include('admin.layouts.sidenav')

        <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>

        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main>
                <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
                    <div class="w-full mb-1">
                        <div class="mb-4">
                            @include('admin.layouts.breadcrumb')
                            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All products
                            </h1>
                        </div>
                    </div>
                </div>


                @yield('content')





            </main>

        </div>

    </div>



    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://flowbite-admin-dashboard.vercel.app//app.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
</body>

</html>