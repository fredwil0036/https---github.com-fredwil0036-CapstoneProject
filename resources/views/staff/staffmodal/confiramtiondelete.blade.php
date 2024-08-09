<div id="deleteConfirmationModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50 hidden">
  <div class="bg-white p-4 rounded shadow-lg w-1/3">
    <h3 class="text-lg font-semibold mb-4">Confirm Deletion</h3>
    <p class="mb-4">Are you sure you want to delete the selected entries?</p>
    <div class="flex justify-end">
    <form id="deleteForm" method="POST" action="{{ route('multiple.delete') }}">
                @csrf
                <button id="confirmDelete" type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">Delete</button>
                <button id="cancelDelete" type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
            </form>
    </div>
  </div>
</div>