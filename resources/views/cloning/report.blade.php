<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nested Table Example</title>
    @Vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8">
<div class="mb-4">
        <input type="text" id="search" placeholder="Search by name..." class="p-2 border border-gray-300 rounded">
        <input type="date" id="startDate" class="p-2 border border-gray-300 rounded">
        <input type="date" id="endDate" class="p-2 border border-gray-300 rounded">
        <button onclick="filterTable()" class="p-2 bg-blue-500 text-white rounded">Filter</button>
    </div>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-r bg-gray-100 text-left text-gray-600">Hazards Events</th>
                <th class="py-2 px-4 border-b border-r bg-gray-100 text-left text-gray-600">Date</th>
                <th class="py-2 px-4 border-b border-r bg-gray-100 text-center text-gray-600">Affected Barangagay</th>
                <th class="py-2 px-4 border-b border-r bg-gray-100 text-center text-gray-600">Number of Damages Houses
                <table class="min-w-full bg-white ">
                        <thead>
                            <tr>
                                <th class="py-2 px-4  text-center text-gray- bg-gray-100">Totally</th>
                                <th class="py-2 px-4  text-center text-gray-600 bg-gray-100">Partially</th>
                            </tr>
                                
                        </thead>
                      
                    </table>
                </th>
                <th class="py-2 px-4 border-b bg-gray-100 text-center text-gray-600">Damage to Properties
                <table class="min-w-full bg-white ">
                        <thead>
                            <tr>
                                <th class="py-2 px-4  text-center text-gray- bg-gray-100">Infrastrature</th>
                                <th class="py-2 px-4  text-center text-gray-600 bg-gray-100">Agriculture</th>
                                <th class="py-2 px-4  text-center text-gray- bg-gray-100">Industries</th>
                                <th class="py-2 px-4  text-center text-gray-600 bg-gray-100">Private Comercials</th>
                            </tr>
                                
                        </thead>
                      
                    </table>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4 border-b border-r">John Doe</td>
                <td class="py-2 px-4 border-b border-r">John Doe</td>
                <td class="py-2 px-4 border-b border-r">John Doe</td>
                <td class="py-2 px-4 border-b border-r">
                    <table class="min-w-full bg-white ">
                        <thead>
                            <tr>
                                <th class="py-2 px-4  text-center text-gray-600">PC</th>
                                <th class="py-2 px-4  text-center text-gray-600">CP</th>
                            </tr>
                                
                        </thead>
                    
                    </table>                 
                </td>
                <td class="py-2 px-4 border-b">
                    <table class="min-w-full bg-white ">
                        <thead>
                            <tr>
                                <th class="py-2 px-4  text-center text-gray-600">PC</th>
                                <th class="py-2 px-4  text-center text-gray-600">CP</th>
                                <th class="py-2 px-4  text-center text-gray-600">PC</th>
                                <th class="py-2 px-4  text-center text-gray-600">CP</th>
                                
                        </thead>
                    
                    </table>
                    
                </td>
            </tr>
    
        </tbody>
    </table>
</body>
</html>
