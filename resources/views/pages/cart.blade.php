<x-layouts.client>

    <x-partials.header/>

    <x-partials.gap/>
    @php
        $subtotal = 0;
        $total = 0;
    @endphp
    <div class="container mx-auto mt-10">
        <div class="flex shadow-md my-10 px-5">
            <div class="w-full bg-white px-10 py-10">
                <div class="flex justify-between border-b pb-8">
                    <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                    <h2 class="font-semibold w-8 text-xl bg-red-500 rounded-full text-white flex justify-center">{{$cart_info ? count($cart_info):'0'}}</h2>
                </div>
                <div class="flex mt-10 mb-5">
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
                </div>
                @forelse($cart_info?$cart_info: [] as $item)
                    <?php $subtotal+= $item['quantity']*$item['price']?>
                    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                        <div class="flex w-2/5"> <!-- product -->
                            <div class="w-30">
                                <img class="h-24" src="{{$item['image']}}" alt="">
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-sm">{{$item['name']}}</span>
                                <span class="text-red-500 text-xs">{{$item['manufacturer']}}</span>
                                <form action="/cart" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <input type="hidden" name="prd_id" value="{{$item['id']}}">
                                    <button type="submit" class="w-1/5 font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</button>
                                </form>
                            </div>
                        </div>
                        <span class="text-center w-1/5 font-semibold text-sm">{{$item['quantity']}}</span>
                        {{--                Original Price--}}
                        <span class="text-center w-1/5 font-semibold text-sm">{{$item['price']}}</span>
                        {{--                Total--}}
                        <span class="text-center w-1/5 font-semibold text-sm">{{$item['quantity']*$item['price']}}</span>
                    </div>
                @empty
                    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                        <span>No items found!</span>
                    </div>
                @endforelse
                <a href="/" class="flex font-semibold text-indigo-600 text-sm mt-10 w-fit">

                    <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                    Continue Shopping
                </a>
            </div>

            <div id="summary" class="w-1/4 px-8 py-10 bg-gray-100 h-fit rounded-2xl">
                <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">Subtotal</span>
                    <span class="font-semibold text-sm">${{$subtotal}}</span>
                </div>
                <div>
                    <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
                    <select class="block p-2 text-gray-600 w-full text-sm">
                        <option class="text-base line-through bg-red-300">Standard shipping - $5.00</option>
                    </select>
                </div>
                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total</span>
                        <span>${{$total = $subtotal+5}}</span>
                    </div>
                    <form action="/cart" method="POST">
                        @csrf
                        <input type="hidden" name="total" value="{{$total}}">
                        @if (empty($cart_info))
                            <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full rounded-xl disabled:bg-gray-400 disabled:cursor-not-allowed" disabled>Checkout</button>
                        @else
                            <button type="submit" class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full rounded-xl" >Checkout</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.client>
