<section class="container mx-auto p-4 border-b">
    <h1 class="text-4xl font-bold text-strat text-purple-700 mb-6">Exclusive Product Offers</h1>

    <div class="product-wrapper bg-gradient-to-br from-gray-50 to-gray-200 rounded-xl shadow-lg p-6">
        <div class="product-flex flex flex-wrap gap-6 justify-start">

            @foreach ($products as $product)
                @foreach ($product->offers as $offer)
                    <div
                        class="w-64 bg-white border border-gray-300 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:scale-105">

                        {{-- Product Image --}}
                        <div class="w-full h-48 bg-gray-100 rounded-t-lg overflow-hidden border-b relative">
                            <a href="{{ url('product/view/' . $product->id) }}">
                                @if ($product->images->isNotEmpty())
                                    <img src="{{ asset($product->images->last()->img_url) }}" alt="{{ $product->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('default-image.jpg') }}" alt="No Image Available"
                                        class="w-full h-full object-cover">
                                @endif
                            </a>
                            <div
                                class="absolute top-2 left-2 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                {{ $offer->offer_name }}
                            </div>
                        </div>

                        {{-- Product Details --}}
                        <div class="p-5 text-center">
                            <a href="{{ url('product/view/' . $product->id) }}"
                                class="text-lg font-semibold text-gray-900 hover:text-purple-600 hover:underline">
                                {{ $product->name }}
                            </a>
                            <p
                                class="text-sm {{ $product->stock == 'instock' ? 'text-green-500' : 'text-red-500' }} font-medium mt-1">
                                {{ $product->stock == 'instock' ? 'In Stock' : 'Out of Stock' }}
                            </p>

                            {{-- Pricing --}}
                            <div class="flex justify-center items-center mt-2 space-x-2">
                                <span class="text-xl font-bold text-gray-500 line-through">
                                    BDT: {{ number_format($product->price, 2) }}
                                </span>
                                <span class="text-xl font-bold text-green-600">
                                    BDT: {{ number_format($product->price - $offer->discount, 2) }}
                                </span>
                            </div>

                            {{-- Offer Validity Countdown --}}
                            {{-- Offer Validity Countdown --}}
                            @php
                                $now = now();
                                $endDate = \Carbon\Carbon::parse($offer->end_date);
                                $diffInSeconds = $endDate->diffInSeconds($now);
                            @endphp

<p id="countdown-{{ $offer->id }}" class="text-sm text-gray-600 mt-1"
    data-end-date="{{ $offer->end_date }}">
     Offer expires in
     <span class="font-bold text-red-600 days"></span>d
     <span class="font-bold text-blue-600 hours"></span>h
     <span class="font-bold text-green-600 minutes"></span>m
     <span class="font-bold text-purple-600 seconds"></span>s
 </p>




                            {{-- Add to Cart Form --}}
                            @if ($product->stock == 'instock')
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-3">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="qty" value="1" min="1"
                                        class="w-16 text-center border border-gray-300 rounded-lg">
                                    <button type="submit"
                                        class="mt-2 px-3 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-all duration-300">
                                        Add to Cart
                                    </button>
                                </form>
                            @else
                                <p class="mt-2 text-sm text-red-500 font-semibold">Out of Stock</p>
                            @endif
                        </div>

                    </div>
                @endforeach
            @endforeach

        </div>
    </div>
</section>
<script>
document.addEventListener("DOMContentLoaded", function () {
    function startCountdown(endTime, element) {
        function updateCountdown() {
            let now = new Date().getTime();
            let timeLeft = endTime - now;

            if (timeLeft <= 0) {
                element.innerHTML = "<span class='text-red-500 font-bold'>Offer Expired!</span>";
                clearInterval(timer);
                return;
            }

            let days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            let hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            element.querySelector('.days').textContent = days;
            element.querySelector('.hours').textContent = hours;
            element.querySelector('.minutes').textContent = minutes;
            element.querySelector('.seconds').textContent = seconds;
        }

        updateCountdown();
        let timer = setInterval(updateCountdown, 1000);
    }

    document.querySelectorAll("[id^='countdown-']").forEach((element) => {
        let endTime = new Date(element.getAttribute('data-end-date')).getTime();
        if (!isNaN(endTime)) {
            startCountdown(endTime, element);
        }
    });
});

</script>
