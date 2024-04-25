<article x-data="slider" class="relative w-full flex flex-shrink-0 overflow-hidden">
    <template x-for="(image, index) in images">
        <figure class="h-96" x-show="currentIndex == index + 1" x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="-translate-x-5 opacity-0"
                x-transition:enter-end="translate-x-0 opacity-100"
                x-transition:leave="transition ease-in-out duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                >
            <img :src="image" alt="Image" class="absolute inset-0 z-10 h-full w-full object-cover " />
        </figure>
    </template>

    <button @click="back()"
            class="absolute left-14 top-1/2 -translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
        <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
            </path>
        </svg>
    </button>

    <button @click="next()"
            class="absolute right-14 top-1/2 -translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
        <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
</article>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('slider', () => ({
            currentIndex: 1,
            images: [
                'https://ik.imagekit.io/ui8hp7fk3h/z5382791584234_2fcc6f5c04331778db10a88a0e33deaf.jpg?updatedAt=1714040309398',
                'https://ik.imagekit.io/ui8hp7fk3h/z5382791584856_14d736a94a6f835b0e992110f38d2a61.jpg?updatedAt=1714040309083',
                'https://ik.imagekit.io/ui8hp7fk3h/z5382791573511_8647b4c8506472d185a604fc9f32c061.jpg?updatedAt=1714040308972',
                'https://ik.imagekit.io/ui8hp7fk3h/z5382791573458_8f715f4c6cde4549d2034b63a27c83ae.jpg?updatedAt=1714040308956',
                'https://ik.imagekit.io/ui8hp7fk3h/z5382791563216_e9a04bf196144560239538abbbcc1b0f.jpg?updatedAt=1714040308825'
            ],
            back() {
                if (this.currentIndex > 1) {
                    this.currentIndex = this.currentIndex - 1;
                }
            },
            next() {
                if (this.currentIndex < this.images.length) {
                    this.currentIndex = this.currentIndex + 1;
                } else if (this.currentIndex <= this.images.length){
                    this.currentIndex = this.images.length - this.currentIndex + 1
                }
            },
        }))
    })
</script>
