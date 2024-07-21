<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historical data</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    @Vite('resources/css/app.css')
    <style>
         .hidden-nav {
      width: 4rem; /* Width for icons only */
      overflow: hidden;
      transition: width 0.3s;
        }
        .visible-nav {
        width: 16rem; /* 64 * 0.25rem (tailwind w-64) */
        transition: width 0.3s;
        }
        .main-expanded {
                margin-left: 16rem; /* Align with visible-nav width */
                transition: margin-left 0.3s;
        }
        .main-collapsed {
                margin-left: 4rem; /* Align with hidden-nav width */
                transition: margin-left 0.3s;
        }
    </style>
</head>
<body class="flex font-poppins bg-bgblue">
    @include('admin.adminmodal.leftnavigation')
    <main id="main-content" class="flex-grow p-4 main-expanded">
        <div class="content">

            <div class="header d-flex align-items-center mb-4">
              <!-- Left section with MDRRMO logo, text, App logo, and app name text -->
                <div class="flex align-items-center">
                    <img src="{{ asset('images/mdrrmo.svg') }}" alt="MDRRMO Logo" class="mr-2">
                    <span class="flex items-center mr-5 text-white">MDRRMO Sta. Barbara</span>
                    <img src="{{ asset('images/solace.svg') }}" alt="App Logo" class="mr-2">
                    <span class="flex items-center text-white">SolAce Flood Monitoring</span>
                </div>
            </div>
            <div class="text-3xl mt-10 ">
                <h1 class="text-white">Historical Data</h1>      
            </div>

            <div class="text-2xl mt-10 ml-10 text-white">
                <p>2023. Record of Sinucalan River Monitoring during typhoons</p>
            </div>
            <div class="overflow-x-auto">
         <table class="min-w-full bg-white">
            <thead class="bg-blue-500 text-white font-bold">
                <tr>
                    <th class="w-1/4 px-4 py-2">Typhoon (Local Name/International Name)</th>
                    <th class="w-1/4 px-4 py-2">Date </th>
                    <th class="w-1/4 px-4 py-2">Lowest Level (Meters Above Sea Level)</th>
                    <th class="w-1/4 px-4 py-2">Highest Level (Meters Above Sea Level)</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <tr>
                    <td class="border px-4 py-2">TD Amang</td>
                    <td class="border px-4 py-2 text-center">April 10-13</td>
                    <td class="border px-4 py-2 text-center">2.90</td>
                    <td class="border px-4 py-2 text-center">2.90</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2">TY Betty (Mawar) </td>
                    <td class="border px-4 py-2 text-center">May 19-June 2</td>
                    <td class="border px-4 py-2 text-center">2.90</td>
                    <td class="border px-4 py-2 text-center">5.00</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">TY Chedeng (Guchol)</td>
                    <td class="border px-4 py-2 text-center">June 6-12</td>
                    <td class="border px-4 py-2 text-center">3.20</td>
                    <td class="border px-4 py-2 text-center">7.10</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2">STS Dodong (Talim)</td>
                    <td class="border px-4 py-2 text-center">July 13-18</td>
                    <td class="border px-4 py-2 text-center">2.90</td>
                    <td class="border px-4 py-2 text-center">2.90</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">TY Egay (Doksuri)</td>
                    <td class="border px-4 py-2 text-center">July 23-30</td>
                    <td class="border px-4 py-2 text-center">3.30</td>
                    <td class="border px-4 py-2 text-center">7.90</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 ">TY Falcon (Khanun)</td>
                    <td class="border px-4 py-2 text-center">July 28-August 10</td>
                    <td class="border px-4 py-2 text-center">3.60</td>
                    <td class="border px-4 py-2 text-center">3.80</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 ">TY Goring (Saola)</td>
                    <td class="border px-4 py-2 text-center">August 22-September 3</td>
                    <td class="border px-4 py-2 text-center">5.70</td>
                    <td class="border px-4 py-2 text-center">6.40</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2">TY Hanna (Haikui)</td>
                    <td class="border px-4 py-2 text-center"> August 27-September 6</td>
                    <td class="border px-4 py-2 text-center">3.30</td>
                    <td class="border px-4 py-2 text-center">5.80</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">TS Ineng (Yun-Yeung)</td>
                    <td class="border px-4 py-2 text-center">September 4-9</td>
                    <td class="border px-4 py-2 text-center">2.90</td>
                    <td class="border px-4 py-2 text-center">4.10</td>
                </tr>
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2">TY Jenny (Koinu)</td>
                    <td class="border px-4 py-2 text-center">September 28-October 9</td>
                    <td class="border px-4 py-2 text-center">4.10</td>
                    <td class="border px-4 py-2 text-center">4.70</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">TS Kabayan (Jelawat) </td>
                    <td class="border px-4 py-2 text-center">December 15-19</td>
                    <td class="border px-4 py-2 text-center">2.90</td>
                    <td class="border px-4 py-2 text-center">3.00</td>
                </tr>
            </tbody>
        </table>
    </div>
        </div>
    </main>
    <script>
        const toggleButton = document.getElementById('toggle-nav');
    const navBar = document.getElementById('nav-bar');
    const mainContent = document.getElementById('main-content');

    toggleButton.addEventListener('click', () => {
    navBar.classList.toggle('visible-nav');
    navBar.classList.toggle('hidden-nav');
      
      mainContent.classList.toggle('main-collapsed');
      mainContent.classList.toggle('main-expanded');
      const spans = document.querySelectorAll('#nav-bar span:nth-child(2)');
      spans.forEach(span => span.classList.toggle('lg:hidden'));
  });
    </script>
</body>
</html>