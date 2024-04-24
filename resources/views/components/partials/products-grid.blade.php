<div class="w-full flex flex-col items-center">
    <div class="flex items-center">
        <span class="text-2xl font-bold items-start">ALL PRODUCTS</span>
        <div class="flex justify-center items-center rounded-full bg-red-400 w-12 h-12 ml-2">
            <span class="text-xl font-bold text-white">{{$products['total']}}</span>
        </div>
    </div>

    <section class="w-full grid grid-rows-2 grid-flow-col auto-cols-auto justify-items-center justify-center gap-x-4 mb-5 p-4">
        @forelse($products["pagination_data"] as $product)
            <div class="mx-auto mt-11 w-80 transform overflow-hidden rounded-lg bg-gray-100 duration-300 hover:scale-105 hover:shadow-lg hover:cursor-pointer"
                 @click="viewProduct('{{$product['id']}}')">
                <img  class="h-48 w-full object-cover object-center" src="https://images.unsplash.com/photo-1674296115670-8f0e92b1fddb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="Product Image" />
                <div class="p-4" >
                    <h2 class="mb-2 text-lg font-bold text-gray-900">{{$product["name"]}}</h2>
                    <p
                        class="mb-2 text-base text-gray-700">{{$product['manufacturer']['name']}}</p>
                    <div class="flex items-center">
                        <p class="mr-2 text-lg font-semibold text-gray-900 ">${{$product["price"]}}</p>
                        <p class="text-base  font-medium text-gray-500 line-through ">$250.0</p>
                        <p class="ml-auto text-base font-medium text-green-500">20% off</p>
                    </div>
                </div>
            </div>

        @empty
            <p class="text-4xl text-red-400 font-bold">No products found.</p>
        @endforelse


{{--        <div class="mx-auto mt-11 w-80 transform overflow-hidden rounded-lg bg-gray-100 duration-300 hover:scale-105 hover:shadow-lg">--}}
{{--            <img class="h-48 w-full object-cover object-center" src="https://images.unsplash.com/photo-1674296115670-8f0e92b1fddb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="Product Image" />--}}
{{--            <div class="p-4">--}}
{{--                <h2 class="mb-2 text-lg font-bold text-gray-900">Product Name</h2>--}}
{{--                <p class="mb-2 text-base text-gray-700">Product description goes here.</p>--}}
{{--                <div class="flex items-center">--}}
{{--                    <p class="mr-2 text-lg font-semibold text-gray-900 ">$20.00</p>--}}
{{--                    <p class="text-base  font-medium text-gray-500 line-through ">$25.00</p>--}}
{{--                    <p class="ml-auto text-base font-medium text-green-500">20% off</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </section>

    <div class="w-1/3 h-14">
{{--        <x-pagination :data="$products"/>--}}
    </div>
</div>


<script>
    function viewProduct(value) {
        // Construct the URL with the query parameter
        var url = '/product'+'?product_id=' + encodeURIComponent(value);
        // console.log(url);
        // Redirect to the new URL
        window.location.href = url;

    }
</script>
