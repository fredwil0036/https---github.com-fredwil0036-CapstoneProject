<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Delete User</h3>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="userId" name="userId">
                <p class="mb-4 text-gray-700">Are you sure you want to delete this user?</p>
                <div class="items-center px-4 py-3">
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                    <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-300 text-black text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 mt-2">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>