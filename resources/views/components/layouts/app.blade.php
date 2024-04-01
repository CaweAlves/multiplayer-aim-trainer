<!DOCTYPE html>
<html class="h-screen" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .circle-exit {
                animation: fadeOut 0.3s forwards;
            }

            @keyframes fadeOut {
                from { opacity: 1; }
                to { opacity: 0; }
            }
        </style>

    </head>
    <body  x-data="{ mouseX: 0, mouseY: 0 }" @mousemove="mouseX = $event.clientX  + 'px'; mouseY = $event.clientY + 'px'" class="h-screen bg-slate-950 text-white">
        {{ $slot }}

        @livewire('mousetracker')
    </body>

    <script>
    function removeCircle(index) {
        setTimeout(() => {
            this.circles.splice(index, 1);
        }, 300); // Ajuste o tempo de acordo com a duração da sua animação de saída
    }
</script>
</html>
