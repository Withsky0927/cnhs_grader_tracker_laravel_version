function disableRightClick() {
    document.addEventListener("contextmenu", event => event.preventDefault());
}

function disableBackButton() {
    history.pushState(null, document.title, location.href);
    if (navigator.userAgent.search("Chrome") > -1) {
        history.back();
        history.forward();
    }
    window.onpopstate = () => history.go(1);
}

function toggleBurger() {
    document.addEventListener("DOMContentLoaded", () => {
        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(
            document.querySelectorAll(".navbar-burger"),
            0
        );

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {
            // Add a click event on each of them
            $navbarBurgers.forEach(el => {
                el.addEventListener("click", () => {
                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle("is-active");
                    $target.classList.toggle("is-active");
                });
            });
        }
    });
}

function setcsrfToken() {
    if (window.axios) {
        window.axios.defaults.headers.common = {
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    }
}

function getFileInputName() {
    const fileInput = document.querySelector(
        "#file-js-example input[type=file]"
    );
    fileInput.onchange = () => {
        if (fileInput.files.length > 0) {
            const fileName = document.querySelector(
                "#file-js-example .file-name"
            );
            fileName.textContent = fileInput.files[0].name;
        }
    };
}

toggleBurger();
setcsrfToken();
if (window.location.pathname === "/admin/reports") getFileInputName();
//disableRightClick();
disableBackButton();
