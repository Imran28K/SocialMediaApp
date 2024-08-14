document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggle-btn');
    const mainContent = document.querySelector('.main-content');

    toggleBtn.addEventListener('click', function () {
        sidebar.classList.toggle('open');
        mainContent.classList.toggle('shifted');
    });

    function checkScreenSize() {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('open');
            mainContent.classList.remove('shifted');
        } else {
            sidebar.classList.remove('open');
            mainContent.classList.remove('shifted');
        }
    }

    window.addEventListener('resize', checkScreenSize);
    checkScreenSize();
});

