@extends('layouts.guest')

@section('content')
<div class="relative h-screen w-full overflow-hidden bg-gradient-to-br from-sky-500 to-indigo-500">
    <div id="particles-js" class="absolute inset-0 z-0 opacity-75"></div>

    <div class="relative z-10 h-full flex flex-col items-center justify-center text-center p-4">
        <div class="animate-fade-in-up transform-gpu transition-all duration-1000">
            <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-white mb-4"
                style="font-family: 'Poppins', sans-serif;">
                Kasir App
            </h1>
            <p class="text-lg md:text-xl font-light italic mb-8 text-gray-200 animate-fade-in"
               style="animation-delay: 0.5s;">
                Aplikasi kasir yang modern, efisien, dan tanpa batas.
            </p>

            @auth
                <a href="{{ route('sales.index') }}"
                   class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold rounded-full text-white border-2 border-white transition-all duration-300 transform hover:scale-105 hover:bg-white hover:text-sky-600 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 animate-fade-in"
                   style="animation-delay: 1s;">
                    Mulai Aplikasi
                </a>
            @else
                <div class="text-sm md:text-base font-medium text-white animate-fade-in" style="animation-delay: 1s;">
                    <p class="mb-4 text-gray-200">Silakan login atau daftar untuk melanjutkan.</p>
                    <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold rounded-full text-white border-2 border-white transition-all duration-300 transform hover:scale-105 hover:bg-white hover:text-sky-600 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold rounded-full text-white border-2 border-white transition-all duration-300 transform hover:scale-105 hover:bg-white hover:text-sky-600 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
                            Register
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        particlesJS('particles-js', {
            "particles": {
                "number": { "value": 80, "density": { "enable": true, "value_area": 800 } },
                "color": { "value": "#ffffff" },
                "shape": { "type": "circle", "stroke": { "width": 0, "color": "#000000" }, "polygon": { "nb_sides": 5 } },
                "opacity": { "value": 0.8, "random": false, "anim": { "enable": false, "speed": 1, "opacity_min": 0.1, "sync": false } },
                "size": { "value": 4, "random": true, "anim": { "enable": false, "speed": 40, "size_min": 0.1, "sync": false } },
                "line_linked": { "enable": true, "distance": 150, "color": "#ffffff", "opacity": 0.6, "width": 1 },
                "move": { "enable": true, "speed": 6, "direction": "none", "random": false, "straight": false, "out_mode": "out", "bounce": false, "attract": { "enable": false, "rotateX": 600, "rotateY": 1200 } }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": { "enable": true, "mode": "grab" },
                    "onclick": { "enable": true, "mode": "push" },
                    "resize": true
                },
                "modes": {
                    "grab": { "distance": 140, "line_linked": { "opacity": 1 } },
                    "bubble": { "distance": 400, "size": 40, "duration": 2, "opacity": 8, "speed": 3 },
                    "repulse": { "distance": 200, "duration": 0.4 },
                    "push": { "particles_nb": 4 },
                    "remove": { "particles_nb": 2 }
                }
            },
            "retina_detect": true
        });
    });
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in-up {
        animation: fadeInUp 1s ease-out forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .animate-fade-in {
        animation: fadeIn 1s ease-out forwards;
    }
</style>
@endsection