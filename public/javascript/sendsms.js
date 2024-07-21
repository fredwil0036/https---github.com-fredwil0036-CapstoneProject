
    document.addEventListener('DOMContentLoaded', function () {
        const sendSMSButton = document.getElementById('sendSMSButton');
        const confirmationModal = document.getElementById('confirmationModal');
        const confirmSendButton = document.getElementById('confirmSendButton');
        const cancelSendButton = document.getElementById('cancelSendButton');

        // Show modal when Send SMS button is clicked
        sendSMSButton.addEventListener('click', function () {
            confirmationModal.classList.remove('hidden');
        });

        // Hide modal when Cancel button is clicked
        cancelSendButton.addEventListener('click', function () {
            confirmationModal.classList.add('hidden');
        });

        // Send SMS when Confirm button is clicked
        confirmSendButton.addEventListener('click', function () {
            // Perform AJAX request to send SMS
            fetch("{{ route('send-sms') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    to: "+63 991 375 3476",  // Replace with dynamic phone number if needed
                    body: "you are winner"  // Replace with dynamic message if needed
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('SMS sent:', data);
                alert('SMS sent successfully!');
                // Optionally, hide the modal after sending SMS
                confirmationModal.classList.add('hidden');
            })
            .catch(error => {
                console.error('Error sending SMS:', error);
                alert('Failed to send SMS. Please try again.');
            });
        });
    });
