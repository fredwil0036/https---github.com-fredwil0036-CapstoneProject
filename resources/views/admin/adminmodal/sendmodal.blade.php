<div class="fixed z-10 inset-0 overflow-y-auto hidden" id="smsModal" aria-labelledby="smsModalLabel" aria-hidden="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Centering trick -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="smsModalLabel">
                            Send SMS
                        </h3>
                        <div class="mt-2">
                            <form action="{{ route('send-sms') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message</label>
                                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" name="message" rows="3" required></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="barangays" class="block text-gray-700 text-sm font-bold mb-2">Select Barangays</label>
                                    @foreach($contacts->groupBy('barangay') as $barangay => $contactGroup)
                                        <div class="flex items-center">
                                            <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" type="checkbox" id="barangay-{{ $barangay }}" name="barangays[]" value="{{ $barangay }}">
                                            <label for="barangay-{{ $barangay }}" class="ml-2 block text-sm leading-5 text-gray-900">
                                                {{ $barangay }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                        Send SMS
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>