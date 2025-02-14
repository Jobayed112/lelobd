@if (session('success') ||  session('status') ||  session('error') || session('failed'))
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "linear-gradient(to right, #28a745, #218838)",
                }).showToast();
            @endif
            @if (session('status'))
                Toastify({
                    text: "{{ session('status') }}",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "linear-gradient(to right, #28a745, #218838)",
                }).showToast();
            @endif

            @if (session('error'))
                Toastify({
                    text: "{{ session('error') }}",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "linear-gradient(to right, #dc3545, #c82333)",
                }).showToast();
            @endif

            @if (session('failed'))
                Toastify({
                    text: "{{ session('failed') }}",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "linear-gradient(to right, #ff8c00, #ff6f00)",
                }).showToast();
            @endif
        });
    </script>
@endif
