
    // script pour le menu burger
    const menuBurger = document.querySelector('.menu img');
    const menuList = document.querySelector('.menu ul');

    menuBurger.addEventListener('click', function () {
        if (menuList.style.display === 'block') {
            menuList.style.display = 'none';
        } else {
            menuList.style.display = 'block';
        }
    });

