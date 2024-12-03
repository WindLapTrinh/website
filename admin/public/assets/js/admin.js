document.addEventListener('DOMContentLoaded', () => {
    const currentPath = window.location.pathname;
    document.querySelectorAll('.side-menu__item').forEach(item => {
        const parentMenu = item.closest('.has-sub');
        if (item.href && currentPath.startsWith(item.getAttribute('href'))) {
            item.classList.add('active');
            if (parentMenu) {
                parentMenu.classList.add('open');
            }
        }
    });

    // Xử lý mở menu con khi nhấn
    document.querySelectorAll('.has-sub > .side-menu__item').forEach(parent => {
        parent.addEventListener('click', () => {
            const menu = parent.closest('.has-sub');
            menu.classList.toggle('open');
        });
    });
});
