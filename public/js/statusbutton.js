
document.addEventListener('DOMContentLoaded', function() {
    const statusButtons = document.querySelectorAll('.status-button');

    statusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const currentStatus = button.dataset.status;
            const newStatus = currentStatus === 'active' ? 'inactive' : 'active';
            button.dataset.status = newStatus;
            button.classList.toggle('active', newStatus === 'active');
            button.classList.toggle('inactive', newStatus === 'inactive');
            button.textContent = newStatus === 'active' ? 'Active' : 'Inactive';
        });
    });
});
