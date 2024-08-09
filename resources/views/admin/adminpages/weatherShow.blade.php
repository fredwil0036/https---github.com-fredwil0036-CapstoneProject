<!DOCTYPE html>
<html>
<head>
    <title>Weather</title>
    @Vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('/images/solace.svg') }}" type="image/svg">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body class="bg-bgblue flex font-poppins">
    <!-- Fixed Navbar -->
    @include('admin.adminmodal.leftnavigation')

    <!-- Main Content -->
    <main id="main-content" class="flex-grow p-4 main-expanded">
    <div class="w-full max-w-screen-full bg-white p-10 rounded-xl ring-8 ring-white ring-opacity-40">
        <div class="flex justify-between">
            <div class="flex flex-col">
                <span id="current-temp" class="text-6xl font-bold">{{ $currentWeather['main']['temp'] }} °C</span>
                <span id="current-location" class="font-semibold mt-1 text-gray-500">{{ $currentWeather['name']}}</span>
            </div>
            <div class="flex flex-col items-center justify-center h-full">
                <img id="current-icon" src="https://openweathermap.org/img/wn/{{$currentWeather['weather'][0]['icon']}}@2x.png" alt="">
                <span id="current-description" class="text-md font-bold flex items-center mt-2">{{ $currentWeather['weather'][0]['description'] }}</span>
            </div>
        </div>
        <div id="hourly-forecast" class="flex justify-between mt-12">
            @foreach ($Hourlyforecast as $futureweather)
            <div class="hourly-weather flex flex-col items-center border border-red-500 ml-3">
                <span class="font-semibold text-sm">{{ $futureweather['main']['temp_max'] }} °C</span>
                <img src="https://openweathermap.org/img/wn/{{$futureweather['weather'][0]['icon']}}@2x.png" alt="">
                <span class="font-semibold mt-1 text-sm">{{ \Carbon\Carbon::parse($futureweather['dt_txt'])->format('H:i') }}</span>
                <span class="text-xs font-semibold text-gray-400">{{ \Carbon\Carbon::parse($futureweather['dt_txt'])->format('A') }}</span>
                <span class="text-md font-bold">{{ $futureweather['weather'][0]['description'] }}</span>
                <span class="text-md font-bold">  
                     @if(isset($forecast['hourly'][0]['rain']))
                        <p>Rain in next hour: {{ $forecast['hourly'][0]['rain']['1h'] ?? 'N/A' }} mm</p>
                    @else
                        <p>0 MM</p>
                    @endif</span>
            </div>
            @endforeach
        </div>
    </div>

    <div id="daily-forecast" class="flex flex-col space-y-6 w-full max-w-screen-full bg-white p-10 mt-10 rounded-xl ring-8 ring-white ring-opacity-40">
        @foreach ($filteredForecast as $futureweather)
        <div class="daily-weather flex justify-between items-center">
            <span class="font-semibold text-sm w-1/4">{{ strtoupper(\Carbon\Carbon::createFromTimestamp($futureweather['dt'])->format('l, F j')) }}</span>
            <div class="flex items-center justify-end w-1/4 pr-10">
                <span class="font-semibold">

                    @if(isset($forecast['daily'][0]['rain']))
                        <p>Rain tomorrow: {{ $forecast['daily'][0]['rain'] ?? 'N/A' }} mm</p>
                    @else
                        <p>No rain forecast for tomorrow.</p>
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
            const profileInfo = document.querySelector('.profile-info');
            const profilepic = document.querySelector('.profile-picture');
            profileInfo.classList.toggle('text-hidden');
            profileInfo.classList.toggle('text-visible');
            profilepic.classList.toggle('hidden');
            profilepic.classList.toggle('vissible');
        
        });
        document.getElementById('reports-button').addEventListener('click', () => {
        const submenu = document.getElementById('reports-submenu');
        if (submenu.classList.contains('hidden')) {
            submenu.classList.remove('hidden');
            submenu.style.maxHeight = submenu.scrollHeight + 'px';
        } else {
            submenu.style.maxHeight = '0';
            submenu.addEventListener('transitionend', () => {
                if (submenu.style.maxHeight === '0px') {
                    submenu.classList.add('hidden');
                }
            }, { once: true });
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        function updateWeather() {
            fetch('{{ route("admin.weatherforecast") }}', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                    return;
                }

                // Update current weather
                document.getElementById('current-temp').textContent = data.currentWeather.main.temp + ' °C';
                document.getElementById('current-location').textContent = data.currentWeather.name;
                document.getElementById('current-icon').src = 'https://openweathermap.org/img/wn/' + data.currentWeather.weather[0].icon + '@2x.png';
                document.getElementById('current-description').textContent = data.currentWeather.weather[0].description;

                // Update hourly forecast
                const hourlyForecastContainer = document.getElementById('hourly-forecast');
                hourlyForecastContainer.innerHTML = '';
                data.Hourlyforecast.forEach(forecast => {
                    const forecastElement = document.createElement('div');
                    forecastElement.classList.add('hourly-weather', 'flex', 'flex-col', 'items-center', 'border', 'border-red-500', 'ml-3');
                    forecastElement.innerHTML = `
                        <span class="font-semibold text-sm">${forecast.main.temp_max} °C</span>
                        <img src="https://openweathermap.org/img/wn/${forecast.weather[0].icon}@2x.png" alt="">
                        <span class="font-semibold mt-1 text-sm">${new Date(forecast.dt_txt).getHours()}:00</span>
                        <span class="text-xs font-semibold text-gray-400">${new Date(forecast.dt_txt).getHours() < 12 ? 'AM' : 'PM'}</span>
                        <span class="text-md font-bold">${forecast.weather[0].description}</span>
                    `;
                    hourlyForecastContainer.appendChild(forecastElement);
                });

                // Update daily forecast
                const dailyForecastContainer = document.getElementById('daily-forecast');
                dailyForecastContainer.innerHTML = '';
                Object.keys(data.filteredForecast).forEach(date => {
                    const forecast = data.filteredForecast[date];
                    const forecastElement = document.createElement('div');
                    forecastElement.classList.add('daily-weather', 'flex', 'justify-between', 'items-center');
                    forecastElement.innerHTML = `
                        <span class="font-semibold text-sm w-1/4">${new Date(forecast.dt * 1000).toLocaleDateString('en-US', { weekday: 'long', month: 'long', day: 'numeric' }).toUpperCase()}</span>
                        <div class="flex items-center justify-end w-1/4 pr-10">
                            <span class="font-semibold">
                                ${forecast.rain ? `<p>Rain: ${forecast.rain['3h']} mm</p>` : '<p>No rain forecast.</p>'}
                            </span>
                        </div>
                        <img src="https://openweathermap.org/img/wn/${forecast.weather[0].icon}@2x.png" alt="">
                        <span class="text-md font-bold">${forecast.weather[0].description}</span>
                        <span class="font-semibold text-lg w-1/4 text-right">${forecast.main.temp_max}° / ${forecast.main.temp_min}°</span>
                    `;
                    dailyForecastContainer.appendChild(forecastElement);
                });
            })
            .catch(error => console.error('Error fetching weather data:', error));
        }

        // Fetch weather data every hour
        updateWeather();
        setInterval(updateWeather, 3600000); // 3600000 ms = 1 hour
    });
    </script>
</body>
</html>
