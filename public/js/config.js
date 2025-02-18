function showLoader() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.classList.remove('d-none');
    }
}

function hideLoader() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.classList.add('d-none');
    }
}

window.addEventListener('load', function() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.style.display = 'none';
    }

    const content = document.getElementById('content');
    if (content) {
        content.classList.remove('opacity-0');
        content.classList.add('opacity-100', 'transition', 'duration-500');
    }
});
document.addEventListener('DOMContentLoaded', function() {
    // Your code here
    const loader = document.getElementById('loader');
    if (loader) {
        loader.style.display = 'none';
    }

    const content = document.getElementById('content');
    if (content) {
        content.classList.remove('opacity-0');
        content.classList.add('opacity-100', 'transition', 'duration-500');
    }
});
