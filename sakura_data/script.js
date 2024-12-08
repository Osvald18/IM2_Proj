
function handleDropdownHover(dropdown) {
    dropdown.addEventListener('mouseenter', function() {
        this.querySelector('.dropdown-menu').classList.add('show');
    });

    dropdown.addEventListener('mouseleave', function() {
        this.querySelector('.dropdown-menu').classList.remove('show');
    });
}


document.addEventListener('DOMContentLoaded', function() {

    var dropdownShop = document.getElementById('dropdownShop');
    var dropdownServices = document.getElementById('dropdownServices');

    handleDropdownHover(dropdownShop);
    handleDropdownHover(dropdownServices);
});

document.addEventListener('DOMContentLoaded', function() {
    var openSignupButton = document.getElementById('openSignupModal');

    openSignupButton.addEventListener('click', function() {
        var loginModalElement = document.getElementById('loginModal');
        var signupModalElement = document.getElementById('signupModal');

        var loginModal = bootstrap.Modal.getInstance(loginModalElement);
        var signupModal = new bootstrap.Modal(signupModalElement);

        if (loginModal) {
            loginModal.hide();
        }
        signupModal.show();
    });
});

function togglePasswordVisibility(id) {
    const input = document.getElementById(id);
    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
    input.setAttribute('type', type);
    input.toggleAttribute('readonly');
    
    const icon = input.nextElementSibling.querySelector('i');
    icon.classList.toggle('fa-eye-slash');
    icon.classList.toggle('fa-eye');
}

document.addEventListener('DOMContentLoaded', function() {
    var myCarousel = document.querySelector('#myCarousel');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 2000,
        wrap: true
    });
});

function togglePasswordVisibility(id) {
    const passwordField = document.getElementById(id);
    const icon = passwordField.nextElementSibling.firstElementChild;
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    } else {
        passwordField.type = "password";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    }
}


document.addEventListener('DOMContentLoaded', function () {
    const breadcrumb = document.querySelector('.breadcrumb');
    const paths = window.location.pathname.split('/').filter(path => path);

    let breadcrumbHtml = `<li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>`;
    let pathUrl = '/';
    paths.forEach((path, index) => {
        pathUrl += path + '/';
        if (index === paths.length - 1) {
            breadcrumbHtml += `<li class="breadcrumb-item active" aria-current="page">${getIcon(path)} ${path}</li>`;
        } else {
            breadcrumbHtml += `<li class="breadcrumb-item"><a href="${pathUrl}">${getIcon(path)} ${path}</a></li>`;
        }
    });

    breadcrumb.innerHTML = breadcrumbHtml;
});

function getIcon(path) {
    const icons = {
        'home': '<i class="fas fa-home"></i>',
        'services': '<i class="fas fa-concierge-bell"></i>',
        // Add more mappings as needed
    };
    return icons[path.toLowerCase()] || '';
}

function updatePriceValue(value) {
    document.getElementById("priceOutput").textContent = "₱" + value;
}


