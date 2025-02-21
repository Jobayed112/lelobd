<section class="container mx-auto m-2 border-b-2 ring-1">
    <div class="product-slider-section m-2 p-2 bg-gray-50">
        <h2 class="text-3xl font-bold mb-6 text-center text-indigo-700">Featured Products</h2>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($products as $product)
                    <div class="swiper-slide bg-white shadow-lg rounded-lg relative">
                        <img src="{{ asset($product->images->last()->img_url ?? 'uploads/default.png') }}"
                             alt="{{ $product->name }}"
                             class="w-full h-auto sm:h-full object-cover rounded-lg responsive-height">

                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black via-transparent to-transparent p-4">
                            <h3 class="text-xl font-semibold text-white mb-2">{{ $product->name }}</h3>
                            <p class="text-green-600 font-bold text-lg">${{ number_format($product->price, 2) }}</p>
                            <a href="{{ url('product/view', $product->id) }}"
                               class="mt-3 inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="swiper-button-next text-indigo-700"></div>
            <div class="swiper-button-prev text-indigo-700"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
var swiper = new Swiper('.mySwiper', {
    slidesPerView: 4, // Default for larger screens
    spaceBetween: 30,
    loop: {{ count($products) > 4 ? 'true' : 'false' }},
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 20,
            height: 'auto',  // Set to 'auto' for mobile to maintain natural image height
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
            height: 'auto',
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 30,
            height: 'auto',
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 30,
            height: 'auto',  // Set to auto to maintain responsiveness
        },
    }
});
</script>

<style>
/* Custom CSS for responsive image height */
.responsive-height {
    height: auto; /* Default height, maintain original size */
}

@media (max-width: 640px) {
    .swiper-slide img {
        height: auto; /* Maintain natural height on small screens */
    }
}

@media (min-width: 641px) and (max-width: 768px) {
    .swiper-slide img {
        height: auto; /* Maintain natural height on medium screens */
    }
}

@media (min-width: 769px) {
    .swiper-slide img {
        height: 80%; /* Set the image height to 80% of the container width on larger screens */
    }
}
</style>
