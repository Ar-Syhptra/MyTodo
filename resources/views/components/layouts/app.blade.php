<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="h-screen overflow-hidden">
    {{ $slot }}
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('alert', (data) => {
                Swal.fire({
                    icon: data[0].type,
                    text: data[0].message,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            });
        });
    </script>
</body>

</html>
