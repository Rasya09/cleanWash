/* ===================================== */
/* DROPDOWN */
/* ===================================== */

document.addEventListener('DOMContentLoaded', () => {

    const avatar =
        document.getElementById('desktopAvatar');

    const dropdown =
        document.getElementById('desktopDropdown');

    const navUser =
        document.getElementById('navUserDesktop');

    // =====================================
    // OPEN DROPDOWN
    // =====================================

    if(avatar){

        avatar.addEventListener('click', function(e){

            e.stopPropagation();

            dropdown.classList.toggle('open');

        });

    }

    // =====================================
    // CLOSE IF CLICK OUTSIDE
    // =====================================

    document.addEventListener('click', function(e){

        if(navUser && !navUser.contains(e.target)){

            dropdown.classList.remove('open');

        }

    });

});
