<!DOCTYPE html>
<html>
<head>
    <title>Weather</title>
    @Vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body class="bg-bgblue flex font-poppins">
    <!-- Fixed Navbar -->
    @include('admin.adminmodal.leftnavigation')

    <!-- Main Content -->
    <main id="main-content" class="flex-grow p-4 main-collapsed">
        <div class="w-full max-w-screen-full bg-white p-10 rounded-xl ring-8 ring-white ring-opacity-40">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <span class="text-6xl font-bold">{{ $currentWeather['main']['temp_max'] }} °C</span>
                    <span class="font-semibold mt-1 text-gray-500">{{ $currentWeather['name']}}</span>
                </div>
                <div class="flex flex-col items-center justify-center h-full">
                    <img src="https://openweathermap.org/img/wn/{{$currentWeather['weather'][0]['icon']}}@2x.png" alt="">
                    <span class="text-md font-bold flex items-center mt-2">{{ $currentWeather['weather'][0]['description'] }}</span>
                </div>
               
            </div>
            <div class="flex justify-between mt-12">
                @foreach ($Hourlyforecast as $futureweather)
                <div class="flex flex-col items-center border border-red-500 ml-3">
                    <span class="font-semibold text-sm">{{ $futureweather['main']['temp_max'] }} °C</span>
                    <img src="https://openweathermap.org/img/wn/{{$futureweather['weather'][0]['icon']}}@2x.png" alt="">
                    <span class="font-semibold mt-1 text-sm">{{ \Carbon\Carbon::parse($futureweather['dt_txt'])->format('H:i') }}</span>
                    <span class="text-xs font-semibold text-gray-400">{{ \Carbon\Carbon::parse($futureweather['dt_txt'])->format('A') }}</span>
                    <span class="text-md font-bold">{{ $futureweather['weather'][0]['description'] }}</span>
                    
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col space-y-6 w-full max-w-screen-full bg-white p-10 mt-10 rounded-xl ring-8 ring-white ring-opacity-40">
            @foreach ($filteredForecast as $futureweather)
            <div class="flex justify-between items-center">
                <span class="font-semibold text-sm w-1/4">{{ strtoupper(\Carbon\Carbon::createFromTimestamp($futureweather['dt'])->format('l, F j')) }}</span>
                <div class="flex items-center justify-end w-1/4 pr-10">
                    <span class="font-semibold">
                    @if(isset($currentWeather['rain']))
            <p class="text-md text-red-700">Rain (last hour): {{ $weather['rain']['1h'] ?? 'N/A' }} mm</p>
            <p>Rain (last 3 hours): {{ $weather['rain']['3h'] ?? 'N/A' }} mm</p>
        @else
            <p>No rain data available.</p>
        @endif    
                </span>
                    <svg class="w-6 h-6 fill-current ml-1" viewBox="0 0 16 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <g transform="matrix(1,0,0,1,-4,-2)">
                            <path d="M17.66,8L12.71,3.06C12.32,2.67 11.69,2.67 11.3,3.06L6.34,8C4.78,9.56 4,11.64 4,13.64C4,15.64 4.78,17.75 6.34,19.31C7.9,20.87 9.95,21.66 12,21.66C14.05,21.66 16.1,20.87 17.66,19.31C19.22,17.75 20,15.64 20,13.64C20,11.64 19.22,9.56 17.66,8ZM6,14C6.01,12 6.62,10.73 7.76,9.6L12,5.27L16.24,9.65C17.38,10.77 17.99,12 18,14C18.016,17.296 14.96,19.809 12,19.74C9.069,19.672 5.982,17.655 6,14Z" style="fill-rule:nonzero;" />
                        </g>
                    </svg>
                </div>
                <img src="https://openweathermap.org/img/wn/{{$futureweather['weather'][0]['icon']}}@2x.png" alt="">
                <span class="text-md font-bold">{{ $futureweather['weather'][0]['description'] }}</span>
                <span class="font-semibold text-lg w-1/4 text-right">{{ $futureweather['main']['temp_max'] }}° / {{ $futureweather['main']['temp_min'] }}°</span>
            </div>
            @endforeach
        </div>
     
   
    </main>

    <script>
        const toggleButton = document.getElementById('toggle-nav');
        const navBar = document.getElementById('nav-bar');
        const mainContent = document.getElementById('main-content');

        toggleButton.addEventListener('click', () => {
            navBar.classList.toggle('nav-collapsed');
            navBar.classList.toggle('nav-expanded');
            mainContent.classList.toggle('main-collapsed');
            mainContent.classList.toggle('main-expanded');
            const textLabels = document.querySelectorAll('#nav-bar .ml-2');
            textLabels.forEach(label => label.classList.toggle('text-hidden'));
            textLabels.forEach(label => label.classList.toggle('text-visible'));
        });

        // Ensure nav bar is collapsed initially
        document.addEventListener('DOMContentLoaded', () => {
            navBar.classList.add('nav-collapsed');
        });
    </script>
</body>
</html>
