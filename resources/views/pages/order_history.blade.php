<x-layouts.client>

    <x-partials.header/>

    <x-partials.gap/>
    <div class="">
        <div class="bg-gray-100 shadow rounded-lg p-6 flex flex-col items-center">
                <div class="mb-5">
                    <span class="text-3xl font-semibold">Order History</span>
                </div>
                <div class="overflow-x-auto w-10/12">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Order ID
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                ProductID
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Image
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Product Name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Manufacturer Name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Price
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Quantity
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Total cost
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Customer Name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Customer Phone
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Customer Address
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($orders['pagination_data'] as $order)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order['id']}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"></td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"></td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"></td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"></td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"></td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"></td>

                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$order['user_name']}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order['phone_number']}}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$order['address']}}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$order['status_order']}}</td>
                            </tr>
                            @foreach(json_decode($order['products_cart'],true) as $prd)
                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"></td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$prd['id']}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <img src="{{$prd['image']}}" alt="Image">
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$prd['name']}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$prd['manufacturer']}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$prd['price']}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$prd['quantity']}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$prd['price']*$prd['quantity']}}</td>
                                </tr>
                            @endforeach
                        @empty
                              <span>Empty!</span>
                        @endforelse
                        </tbody>
                    </table>


                    <div class="w-full pt-5 px-4 mb-8 mx-auto ">
                        <div class="text-sm text-gray-700 py-1 text-center">
                            <span>Pagi</span>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</x-layouts.client>


{{--<table class="min-w-full bg-white shadow-md rounded-xl">--}}
{{--    <thead>--}}
{{--    <tr class="bg-blue-gray-100 text-gray-700">--}}
{{--        <th class="py-3 px-4 text-left">Stock Name</th>--}}
{{--        <th class="py-3 px-4 text-left">Price</th>--}}
{{--        <th class="py-3 px-4 text-left">Quantity</th>--}}
{{--        <th class="py-3 px-4 text-left">Total</th>--}}
{{--        <th class="py-3 px-4 text-left">Action</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody class="text-blue-gray-900">--}}
{{--    <tr class="border-b border-blue-gray-200">--}}
{{--        <td class="py-3 px-4">Company A</td>--}}
{{--        <td class="py-3 px-4">$50.25</td>--}}
{{--        <td class="py-3 px-4">100</td>--}}
{{--        <td class="py-3 px-4">$5025.00</td>--}}
{{--        <td class="py-3 px-4">--}}
{{--            <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Edit</a>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--    <tr class="border-b border-blue-gray-200">--}}
{{--        <td class="py-3 px-4">Company B</td>--}}
{{--        <td class="py-3 px-4">$75.60</td>--}}
{{--        <td class="py-3 px-4">150</td>--}}
{{--        <td class="py-3 px-4">$11340.00</td>--}}
{{--        <td class="py-3 px-4">--}}
{{--            <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Edit</a>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--    <tr class="border-b border-blue-gray-200">--}}
{{--        <td class="py-3 px-4">Company C</td>--}}
{{--        <td class="py-3 px-4">$30.80</td>--}}
{{--        <td class="py-3 px-4">200</td>--}}
{{--        <td class="py-3 px-4">$6160.00</td>--}}
{{--        <td class="py-3 px-4">--}}
{{--            <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Edit</a>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--    <!-- Add more rows as needed -->--}}
{{--    <tr class="border-b border-blue-gray-200">--}}
{{--        <td class="py-3 px-4 font-medium">Total Wallet Value</td>--}}
{{--        <td class="py-3 px-4"></td>--}}
{{--        <td class="py-3 px-4"></td>--}}
{{--        <td class="py-3 px-4 font-medium">$22525.00</td>--}}
{{--        <td class="py-3 px-4"></td>--}}
{{--    </tr>--}}
{{--    </tbody>--}}
{{--</table>--}}
