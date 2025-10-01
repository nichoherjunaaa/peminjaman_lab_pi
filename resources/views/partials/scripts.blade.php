<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        
        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', function () {
                alert('Menu mobile akan ditampilkan di sini');
            });
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function (event) {
            const dropdowns = document.querySelectorAll('.group');
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(event.target)) {
                    const menu = dropdown.querySelector('.absolute');
                    if (menu) {
                        menu.classList.add('opacity-0', 'invisible');
                    }
                }
            });
        });
    });
</script>