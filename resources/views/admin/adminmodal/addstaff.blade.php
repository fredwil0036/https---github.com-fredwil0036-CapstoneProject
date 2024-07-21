<div id="addStaffModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow-lg max-w-full max-h-full">
        <h2 class="text-xl text-center mb-4">Add Staff</h2>
        <form action="{{ route('admin.addstaff') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="profile_image" class="block text-gray-700">Profile Image</label>
                <input type="file" name="profile_image" id="profile_image" class="w-full px-4 py-2 border rounded" accept="image/*" onchange="previewImage(event)">
            </div>

            <div class="mb-4">
                <img id="profileImagePreview" class="w-32 h-32 rounded-full mx-auto" src="#" alt="Profile Image Preview" style="display: none;">
            </div>

            <div class="mb-4 flex">
                <div class="mr-4">
                    <label for="first_name" class="block text-gray-700">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="w-52 px-4 py-2 border rounded" required>
                </div>
                <div class="mr-4">
                    <label for="middle_name" class="block text-gray-700">Middle Name</label>
                    <input type="text" name="middle_name" id="middle_name" class="w-52 px-4 py-2 border rounded" required>
                </div>
                <div>
                    <label for="last_name" class="block text-gray-700">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="w-52 px-4 py-2 border rounded" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="birthdate" class="block text-gray-700">Birthdate</label>
                <input type="date" name="birthdate" id="birthdate" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700">Phone Number</label>
                <input type="tel" name="phone_number" id="phone_number" class="w-full px-4 py-2 border rounded" placeholder="09XXXXXXXXX" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700">Address</label>
                <input type="text" name="address" id="address" class="w-full px-4 py-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="flex justify-end">
                <button type="button" id="cancelButton" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
            </div>
        </form>
    </div>
</div>
