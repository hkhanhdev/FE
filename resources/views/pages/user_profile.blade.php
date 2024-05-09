<x-layouts.client>

    <x-partials.header/>
    <x-partials.gap/>
    <div class="bg-slate-100">
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
                                    <div class="flex gap-2 rounded-xl px-4 bg-red-600 py-2 hover:scale-105 duration-200 justify-center">
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
                        <span class="text-2xl font-semibold">User Infomation</span>
                        <hr class="border-slate-300 border-dashed">
                        <form action="profile" method="POST">
                            @csrf
                            <div class="grid grid-flow-col grid-cols-12 auto-cols-max gap-6 my-6 justify-between items-center">
                                <span class="col-span-2">Username : </span>
                                <input name="username" class="col-span-8 w-full text-gray-700 border border-gray-200 rounded py-2 px-4 focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" value="{{$user_info['name']}}">
                            </div>
                            @error('username')
                            <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                                 x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            >{{ $message }}</div>
                            @enderror

                            <div class="grid grid-flow-col grid-cols-12 auto-cols-max gap-6 my-6 justify-between items-center">
                                <span class="col-span-2">Email : </span>
                                <input name="email" class="col-span-8 w-full text-gray-700 border border-gray-200 rounded py-2 px-4 focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="" value="{{$user_info['email']}}">
                            </div>
                            @error('email')
                            <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                                 x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            >{{ $message }}</div>
                            @enderror
                            @if(session('email_taken'))
                                <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                                     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                >{{ session('email_taken') }}</div>
                            @endif
                            <div class="grid grid-flow-col grid-cols-12 auto-cols-max gap-6 my-6 justify-between items-center">
                                <span class="col-span-2">Address : </span>
                                <input name="address" class="col-span-8 w-full text-gray-700 border border-gray-200 rounded py-2 px-4 focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="" value="{{$user_info['address']}}">
                            </div>

                            <div class="grid grid-flow-col grid-cols-12 auto-cols-max gap-6 my-6 justify-between items-center">
                                <span class="col-span-2">Phone : </span>
                                <input disabled name="phone" class="col-span-8 w-full text-gray-700 border border-gray-200 rounded py-2 px-4 focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="" value="{{$user_info['phone_number']}}">
                            </div>
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your gender</label>
                            <select name='gender' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="0" selected>Choose your gender(default = female)</option>
                                <option value="0">Female</option>
                                <option value="1">Male</option>
                            </select>
                            @error('gender')
                            <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                                 x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            >{{ $message }}</div>
                            @enderror
                            @if(session('updateProfileSuccess'))
                                <div class="text-green-400 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                                     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                >{{ session('updateProfileSuccess') }}</div>
                            @endif
                            <button class="block px-2 py-2 mt-2 text-sm text-white md:mt-0 focus:outline-none focus:shadow-outline col-span-2" type="submit">
                                <div class="flex gap-2 rounded-xl px-9 bg-green-600 py-2 rounded-xl px-2 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                        <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Save</span>
                                </div>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.client>
<script>
    function focus(class_name) {
        document.getElementById("myText").focus();
    }
</script>
