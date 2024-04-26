<x-layouts.client>

    <x-partials.header/>
    <x-partials.gap/>
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                <div class="col-span-4 sm:col-span-3">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex flex-col items-center">
                            <img src="https://img.freepik.com/premium-vector/business-global-economy_24877-41082.jpg?w=826" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">
                            <h1 class="text-xl font-bold">{{$user_info['name']}}</h1>
                            <p class="text-gray-700">{{$user_info['email']}}</p>
                            <div class="mt-6 flex flex-col gap-4 justify-center">
                                <a class="block px-2 py-2 mt-2 text-sm text-white md:mt-0 focus:outline-none focus:shadow-outline" href="profile">
                                    <div class="flex gap-2 rounded-xl px-9 bg-blue-600 py-2 rounded-xl px-4 bg-blue-500 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                        <span>Edit</span>
                                    </div>
                                </a>

                                <a class="block px-2 py-2 mt-2 text-sm text-white md:mt-0 focus:outline-none focus:shadow-outline" href="cart">
                                    <div class="flex gap-2 rounded-xl px-9 bg-blue-600 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                        </svg>
                                        <span>Cart</span>
                                    </div>

                                </a>

                                <a class="block px-2 py-2 mt-2 text-sm text-white md:mt-0 focus:outline-none focus:shadow-outline" href="order_history">
                                    <div class="flex gap-2 rounded-xl px-4 bg-blue-600 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <span>Order history</span>
                                    </div>

                                </a>
                                <hr class="border-gray-200">
                                <a class="block px-2 py-2 mt-2 text-sm text-white md:mt-0 focus:outline-none focus:shadow-outline" href="logout">
                                    <div class="flex gap-2 rounded-xl px-4 bg-red-600 py-2 hover:scale-105 duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                        </svg>
                                        <span>Logout</span>
                                    </div>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 sm:col-span-9">
                    <div class="bg-white shadow rounded-lg p-6 ">
                        <span>User Infomation</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.client>
