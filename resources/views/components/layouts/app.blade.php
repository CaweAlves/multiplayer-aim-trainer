<!DOCTYPE html>
<html class="h-screen" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            html{
                cursor: none;
            }

            .target-enter {
                animation: fadeIn 3s;
            }

            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }

            .sight {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100px;
                height: 100px;
                background-color: transparent;
                pointer-events: none;
            }

            .sight::before,
            .sight::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                background-color: #2563eb;
            }

            .sight::before {
                transform: translate(-50%, -50%) rotate(90deg);
            }

            .sight::after {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            .sight::before,
            .sight::after {
                border-radius: 50%;
            }

            .sight::before {
                width: 30%;
                height: 3%;
            }

            .sight::after {
                width: 30%;
                height: 3%;
            }
        </style>

    </head>
    <body  x-data="{ mouseX: 0, mouseY: 0 }" @mousemove="mouseX = $event.clientX  + 'px'; mouseY = $event.clientY + 'px'" class="h-screen bg-slate-950 text-white">
        {{ $slot }}

        @livewire('mousetracker')
    </body>
</html>
