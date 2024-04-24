<div class="w-full flex flex-col justify-center items-center">
    <div class="flex items-center">
        <span class="text-2xl font-bold uppercase">Manufacturers</span>
        <div class="flex justify-center items-center rounded-full bg-red-400 w-12 h-12 ml-2">
            <span class="text-2xl font-bold text-white">{{$manus['total']}}</span>
        </div>
    </div>

    <div class="w-9/12">
        <script>
            window.carousel = function () {
                return {
                    container: null,
                    prev: null,
                    next: null,
                    init() {
                        this.container = this.$refs.container

                        this.update();

                        this.container.addEventListener('scroll', this.update.bind(this), {passive: true});
                    },
                    update() {
                        const rect = this.container.getBoundingClientRect();

                        const visibleElements = Array.from(this.container.children).filter((child) => {
                            const childRect = child.getBoundingClientRect()

                            return childRect.left >= rect.left && childRect.right <= rect.right;
                        });

                        if (visibleElements.length > 0) {
                            this.prev = this.getPrevElement(visibleElements);
                            this.next = this.getNextElement(visibleElements);
                        }
                    },
                    getPrevElement(list) {
                        const sibling = list[0].previousElementSibling;

                        if (sibling instanceof HTMLElement) {
                            return sibling;
                        }

                        return null;
                    },
                    getNextElement(list) {
                        const sibling = list[list.length - 1].nextElementSibling;

                        if (sibling instanceof HTMLElement) {
                            return sibling;
                        }

                        return null;
                    },
                    scrollTo(element) {
                        const current = this.container;

                        if (!current || !element) return;

                        const nextScrollPosition =
                            element.offsetLeft +
                            element.getBoundingClientRect().width / 2 -
                            current.getBoundingClientRect().width / 2;

                        current.scroll({
                            left: nextScrollPosition,
                            behavior: 'smooth',
                        });
                    }
                };
            }
        </script>
        <style>
            .scroll-snap-x {
                scroll-snap-type: x mandatory;
            }

            .snap-center {
                scroll-snap-align: center;
            }

            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .no-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>
        <div class="mt-12 flex mx-auto items-center">
            <div x-data="carousel()" x-init="init()" class="relative overflow-hidden group">
                <div x-ref="container"
                     class="md:-ml-4 md:flex md:overflow-x-scroll scroll-snap-x md:space-x-4 space-y-4 md:space-y-0 ">
                    @foreach($manus["pagination_data"] as $manu)
                        <div @click="viewProductByManu('{{$manu['id']}}','{{$manu['name']}}')"
                            class="ml-4 hover:bg-red-200 hover:cursor-pointer flex-auto flex-grow-0 flex-shrink-0 w-48 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                            <img src="https://picsum.photos/400/200">
                            <div class="px-2 py-3 flex justify-center">
                                <div class="text-lg font-semibold">{{$manu['name']}}</div>
                            </div>
                        </div>
                    @endforeach

{{--                    <div--}}
{{--                        class="ml-4 hover:bg-red-200 hover:cursor-pointer flex-auto flex-grow-0 flex-shrink-0 w-48 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">--}}
{{--                        <img src="https://picsum.photos/400/200">--}}
{{--                        <div class="px-2 py-3 flex justify-center">--}}
{{--                            <div class="text-lg font-semibold">Manu name</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div @click="scrollTo(prev)" x-show="prev !== null"
                     class="hidden md:block absolute top-1/2 left-0 bg-white p-2 rounded-full transition-transform ease-in-out transform -translate-x-full -translate-y-1/2 group-hover:translate-x-0 cursor-pointer">
                    <div>&lt;</div>
                </div>
                <div @click="scrollTo(next)" x-show="next !== null"
                     class="hidden md:block absolute top-1/2 right-0 bg-white p-2 rounded-full transition-transform ease-in-out transform translate-x-full -translate-y-1/2 group-hover:translate-x-0 cursor-pointer">
                    <div>&gt</div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function viewProductByManu(id,name) {
        // Construct the URL with the query parameter
        var url = '/products'+'?manu_id=' + encodeURIComponent(id)+"&"+"manu_name="+encodeURIComponent(name);

        // Redirect to the new URL
        window.location.href = url;
    }
</script>
