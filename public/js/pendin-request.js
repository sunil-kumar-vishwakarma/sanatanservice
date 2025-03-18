document.addEventListener('DOMContentLoaded', function() {
    const statusButtons = document.querySelectorAll('.status-button');

    statusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const currentStatus = button.dataset.status;
            if (currentStatus === 'pending') {
                button.dataset.status = 'approved';
                button.classList.remove('pending');
                button.classList.add('approved');
                button.textContent = 'Approved';
            }
            // Prevent the button from toggling back to 'pending'
        });
    });
});
