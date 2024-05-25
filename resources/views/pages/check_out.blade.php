<x-layouts.client>

    <x-partials.header/>

    <div class="font-[sans-serif] bg-gray-50 p-6 min-h-screen mt-32">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-extrabold text-[#333] text-center">Checkout</h2>
            <div class="grid lg:grid-cols-3 gap-8 mt-12">
                <div class="lg:col-span-2">
                    <h3 class="text-xl font-bold text-[#333]">Your shipping information</h3>
                    <div class="grid gap-4 sm:grid-cols-2 mt-6">
                        <div class="flex items-center">
                            <input type="radio" class="w-5 h-5 cursor-pointer" id="card" checked />
                            <label for="card" class="ml-4 flex gap-2 cursor-pointer">
                                <img src="https://cdn-icons-png.flaticon.com/128/7630/7630510.png" class="w-12" alt="card1" />
                            </label>
                        </div>
                    </div>
                    <div class="mt-8">
                        <form action="/check_out" method="POST">
                            @csrf
                        <div class="grid gap-6">
                            <input type="text" name="name" placeholder="Your name" class="px-4 py-3.5 bg-white text-[#333] w-full text-sm border rounded-md focus:border-[#007bff] outline-none" />
                            @if(session('err_fullname'))
                                <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                                     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                >{{ session('err_fullname') }}</div>
                            @endif
                            <input type="text" name="phone" placeholder="Your phone number" class="px-4 py-3.5 bg-white text-[#333] w-full text-sm border rounded-md focus:border-[#007bff] outline-none" />
                            @if(session('err_phone'))
                                <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                                     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                >{{ session('err_phone') }}</div>
                            @endif
                            <input type="text" name="address" placeholder="Your address" class="px-4 py-3.5 bg-white text-[#333] w-full text-sm border rounded-md focus:border-[#007bff] outline-none" />
                            @if(session('err_address'))
                                <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                                     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                >{{ session('err_address') }}</div>
                            @endif
                            <button type="submit" class="px-6 py-3.5 text-sm bg-blue-600 text-white rounded-md hover:bg-blue-700">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="lg:border-l lg:pl-8">
                    <h3 class="text-xl font-bold text-[#333]">Summary</h3>
                    <ul class="text-[#333] mt-6 space-y-4">
                        <li class="flex flex-wrap gap-4 text-sm">Subtotal <span class="ml-auto font-bold">${{session()->get('total')}}</span></li>
                        <li class="flex flex-wrap gap-4 text-sm">Discount (1%) <span class="ml-auto font-bold line-through">${{session()->get('total')*0.01}}</span></li>
                        <li class="flex flex-wrap gap-4 text-sm">Tax <span class="ml-auto font-bold line-through">$4.00</span></li>
                        <li class="flex flex-wrap gap-4 text-base font-bold border-t pt-4">Total <span class="ml-auto">${{session()->get('total')}}</span></li>
                    </ul>
                    @if(session('checkout_suc'))
                        <div x-data="{ countdown: 2 }" x-init="setTimeout(() => window.location.href = '{{ route('home') }}', 2500)" class="mt-10">
                            <div class="text-green-600 font-semibold">{{ session('checkout_suc') }}</div>
                            <div>
                                <p>Redirecting to home page in <span x-text="countdown"></span> seconds...</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap gap-4 mt-10">
                    <button type="button" class="px-6 py-3.5 text-sm bg-transparent border text-[#333] rounded-md hover:bg-gray-100">Pay later</button>
            </div>
        </div>
    </div>
</x-layouts.client>
