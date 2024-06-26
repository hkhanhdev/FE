<div class="font-[sans-serif] bg-white">
    <div class="p-6 lg:max-w-7xl max-w-4xl mx-auto">
        <div class="grid items-start grid-cols-1 lg:grid-cols-5 gap-12 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
            <div class="lg:col-span-3 w-full lg:sticky top-0 text-center">
                <div class="px-4 py-10 rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative flex justify-center">
                    <img src="{{$product["image"]}}" alt="Product" class="w-4/5 rounded object-cover" />
                </div>
                <div class="mt-6 flex flex-wrap flex-col justify-center mx-auto" x-data="{ count: 1,price:{{$product['selling_price']}}}" >
                    <h2 class="text-3xl font-extrabold text-[#333]">{{$product['name']}}</h2>
                    <div class="flex gap-4 mt-2 justify-center">
                        <p class="text-[#333] text-2xl font-bold" x-text="'$' + (count * price).toFixed(2)"></p>
                    </div>
                    <div class="my-2">
                        <button x-on:click="count = count > 1 ? count-1 : count" class="w-10 bg-red-400 rounded-md">-</button>
                        <input type="text" class="mx-4 w-5 focus:outline-none" x-model="count"  >
                        <button x-on:click="count++" class="w-10 bg-blue-400 rounded-md" >+</button>
                    </div>
                    <div class="flex space-x-2 mb-2 justify-center items-center">

                    </div>
                    {{--                        <div class="mt-10">--}}
                    {{--                            <h3 class="text-lg font-bold text-gray-800">Choose a Color</h3>--}}
                    {{--                            <div class="flex flex-wrap gap-4 mt-4">--}}
                    {{--                                <button type="button" class="w-12 h-12 bg-black border-2 border-white hover:border-gray-800 rounded-full shrink-0"></button>--}}
                    {{--                                <button type="button" class="w-12 h-12 bg-gray-300 border-2 border-white hover:border-gray-800 rounded-full shrink-0"></button>--}}
                    {{--                                <button type="button" class="w-12 h-12 bg-gray-100 border-2 border-white hover:border-gray-800 rounded-full shrink-0"></button>--}}
                    {{--                                <button type="button" class="w-12 h-12 bg-blue-400 border-2 border-white hover:border-gray-800 rounded-full shrink-0"></button>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    <div class="flex justify-center mt-2">
                        <form action="{{ url('/cart') }}" method="POST">
                            @csrf
                            @method('PUT')
{{--                            <input type="hidden" name="">--}}
                            <input type="hidden" name="prd_id" value="{{$product['id']}}">
                            <input type="hidden" name="quantity" x-model="count">
                            <button type="submit" class="min-w-[200px] px-4 py-3 bg-blue-600 hover:bg-blue-800 hover:scale-105 duration-200 text-white text-sm font-bold rounded">Add to cart</button>
                        </form>
                         </div>
                </div>
            </div>
            <div class="lg:col-span-2">
                <div class="shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
                    <h3 class="text-lg font-bold text-[#333]">Product information</h3>
                    <ul class="mt-6 space-y-6 text-[#333]">
                        <li class="text-sm">TYPE <span class="ml-4 float-right">LAPTOP</span></li>
                        <li class="text-sm">RAM <span class="ml-4 float-right">{{$product["ram"]}}</span></li>
                        <li class="text-sm">STORAGE <span class="ml-4 float-right">{{$product["storage"]}}</span></li>
                        <li class="text-sm">PROCESSOR TYPE <span class="ml-4 float-right">{{$product["processor"]}}</span></li>
                        <li class="text-sm">PROCESSOR SPEED <span class="ml-4 float-right">2.3 - 4.7 GHz</span></li>
                        <li class="text-sm">DISPLAY SIZE INCH <span class="ml-4 float-right">{{$product["display"]}}</span></li>
                        <li class="text-sm">DISPLAY SIZE SM <span class="ml-4 float-right">{{$product["display"]*2.54}}</span></li>
                        <li class="text-sm">DISPLAY TYPE <span class="ml-4 float-right">OLED,100 Hz</span></li>
                        <li class="text-sm">DISPLAY RESOLUTION <span class="ml-4 float-right">1920x1080</span></li>
                        <li class="text-sm">RATE <span class="ml-4 float-right flex"><svg class="w-5 fill-[#333]" viewBox="0 0 14 13" fill="none"
                                                                                          xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>
                            <svg class="w-5 fill-[#333]" viewBox="0 0 14 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>
                            <svg class="w-5 fill-[#333]" viewBox="0 0 14 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>
                            <svg class="w-5 fill-[#333]" viewBox="0 0 14 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>
                            <svg class="w-5 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mt-16 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-6">
            <h3 class="text-lg font-bold text-[#333]">Reviews(10)</h3>
            <div class="grid md:grid-cols-2 gap-12 mt-6">
                <div>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <p class="text-sm text-[#333] font-bold">5.0</p>
                            <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>
                            <div class="bg-gray-400 rounded w-full h-2 ml-3">
                                <div class="w-2/3 h-full rounded bg-[#333]"></div>
                            </div>
                            <p class="text-sm text-[#333] font-bold ml-3">66%</p>
                        </div>
                        <div class="flex items-center">
                            <p class="text-sm text-[#333] font-bold">4.0</p>
                            <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>
                            <div class="bg-gray-400 rounded w-full h-2 ml-3">
                                <div class="w-1/3 h-full rounded bg-[#333]"></div>
                            </div>
                            <p class="text-sm text-[#333] font-bold ml-3">33%</p>
                        </div>
                        <div class="flex items-center">
                            <p class="text-sm text-[#333] font-bold">3.0</p>
                            <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>
                            <div class="bg-gray-400 rounded w-full h-2 ml-3">
                                <div class="w-1/6 h-full rounded bg-[#333]"></div>
                            </div>
                            <p class="text-sm text-[#333] font-bold ml-3">16%</p>
                        </div>
                        <div class="flex items-center">
                            <p class="text-sm text-[#333] font-bold">2.0</p>
                            <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>
                            <div class="bg-gray-400 rounded w-full h-2 ml-3">
                                <div class="w-1/12 h-full rounded bg-[#333]"></div>
                            </div>
                            <p class="text-sm text-[#333] font-bold ml-3">8%</p>
                        </div>
                        <div class="flex items-center">
                            <p class="text-sm text-[#333] font-bold">1.0</p>
                            <svg class="w-5 fill-[#333] ml-1" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                            </svg>
                            <div class="bg-gray-400 rounded w-full h-2 ml-3">
                                <div class="w-[6%] h-full rounded bg-[#333]"></div>
                            </div>
                            <p class="text-sm text-[#333] font-bold ml-3">6%</p>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="flex items-start">
                        <img src="https://readymadeui.com/team-2.webp" class="w-12 h-12 rounded-full border-2 border-white" />
                        <div class="ml-3">
                            <h4 class="text-sm font-bold text-[#333]">John Doe</h4>
                            <div class="flex space-x-1 mt-1">
                                <svg class="w-4 fill-[#333]" viewBox="0 0 14 13" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <svg class="w-4 fill-[#333]" viewBox="0 0 14 13" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <svg class="w-4 fill-[#333]" viewBox="0 0 14 13" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                </svg>
                                <p class="text-xs !ml-2 font-semibold text-[#333]">2 mins ago</p>
                            </div>
                            <p class="text-sm mt-4 text-[#333]">Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <button type="button" class="w-full mt-10 px-4 py-2.5 bg-transparent hover:bg-gray-50 border border-[#333] text-[#333] font-bold rounded">Read all reviews</button>
                </div>
            </div>
        </div>
    </div>
</div>
