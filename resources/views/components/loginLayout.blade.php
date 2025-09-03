<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Halaman Home</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    @livewireStyles
</head>

<body>
    <div class="min-h-full">
        <main class="bg-gray-100">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{-- <p>Ini halaman Home</p> --}}
                <!-- Your content -->
                {{ $slot }}
                {{-- @livewire('edit-article-modal') --}}
            </div>
        </main>
    </div>

     @livewireScripts
</body>

</html>