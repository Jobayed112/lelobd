<div id="cart-menu" class="absolute right-0 mt-4 bg-gray-100 shadow-lg m-2 rounded-md hidden w-64 p-4">
    <p class="font-bold text-gray-800">
        Your Cart
    </p>
    <ul>
        <li class="flex justify-between items-center border-b py-2">
            <span>Item 1</span>
            <span>$10</span>
        </li>
        <li class="flex justify-between items-center border-b py-2">
            <span>Item 2</span>
            <span>$20</span>
        </li>
        <li class="flex justify-between items-center py-2">
            <span>Total</span>
            <span>$30</span>
        </li>
        <li class="flex justify-between items-center py-2">
            <span>Total</span>
            <span>$30</span>
        </li>
    </ul>
    <a href="{{ url('ProductCartView') }}">
        <button class="bg-green-500 text-white w-full py-2 rounded-md mt-4 hover:bg-green-600">Checkout</button>
    </a>
</div>
