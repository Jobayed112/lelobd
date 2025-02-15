function showLoader() {
    document.getElementById('loader').classList.remove('d-none')
}
function hideLoader() {
    document.getElementById('loader').classList.add('d-none')
}

function successToast(msg) {
    Toastify({
        gravity: "bottom", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
            background: "green",
        }
    }).showToast();
}

function errorToast(msg) {
    Toastify({
        gravity: "bottom", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
            background: "red",
        }
    }).showToast();
}
// onr time loding
window.addEventListener('load', function() {
    // Hide loader
    const loader = document.getElementById('loader');
    loader.style.display = 'none';

    // Optionally, reveal your content with a fade-in effect
    const content = document.getElementById('content');
    content.classList.remove('opacity-0');
    content.classList.add('opacity-100', 'transition', 'duration-500');
  });
