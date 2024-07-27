<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @Vite('resources/css/app.css')
</head>
<body>
<div class="bg-white shadow-md rounded my-6 overflow-x-auto">
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Title</th>
                        <th class="py-3 px-6 text-center">Status</th>
                        <th class="py-3 px-6 text-center">Role</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/91.jpg" alt=""/>
                                </div>
                                <span>Kenneth Malafo</span>
                            </div>
                            <div class="text-gray-500">kenneth@example.com</div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            Junior Programmer
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Active</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            Taga Luto ng Pancit Canton
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex justify-center item-center">
                                <button class="bg-blue-500 text-white px-2 py-1 rounded mr-2">Disable</button>
                                <button class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Edit</button>
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/women/6.jpg" alt=""/>
                                </div>
                                <span>Angela Cayabcayab</span>
                            </div>
                            <div class="text-gray-500">cayabcayab@example.com</div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            Leader
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">Inactive</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            Taga papirma
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex justify-center item-center">
                                <button class="bg-blue-500 text-white px-2 py-1 rounded mr-2">Disable</button>
                                <button class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Edit</button>
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/11.jpg" alt=""/>
                                </div>
                                <span>Fredwil Membrere</span>
                            </div>
                            <div class="text-gray-500">congtv@example.com</div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            Senior Programmer
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="bg-red-200 text-yellow-600 py-1 px-3 rounded-full text-xs">Offline</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            Vlogger
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex justify-center item-center">
                                <button class="bg-blue-500 text-white px-2 py-1 rounded mr-2">Disable</button>
                                <button class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Edit</button>
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/women/1.jpg" alt=""/>
                                </div>
                                <span>Claime Yangat</span>
                            </div>
                            <div class="text-gray-500">claime@example.com</div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            Technical Writer
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Active</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            Jowa ng Ml player
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex justify-center item-center">
                                <button class="bg-blue-500 text-white px-2 py-1 rounded mr-2">Disable</button>
                                <button class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Edit</button>
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/23.jpg" alt=""/>
                                </div>
                                <span>Kim Rosario</span>
                            </div>
                            <div class="text-gray-500">kim@example.com</div>
                        </td>
                        <td class="py-3 px-6 text-left">
                            Designer
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="bg-yellow-200 text-green-600 py-1 px-3 rounded-full text-xs">Inactive</span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            Ml Player
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex justify-center item-center">
                                <button class="bg-blue-500 text-white px-2 py-1 rounded mr-2">Disable</button>
                                <button class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">Edit</button>
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>   
</body>
</html>