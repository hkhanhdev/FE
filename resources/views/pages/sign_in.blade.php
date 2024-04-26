<x-layouts.client>
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">
            <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Get started today</h1>

            <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati sunt dolores deleniti
                inventore quaerat mollitia?
            </p>

            <form method="POST" action="sign_in" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
                @csrf
                <p class="text-center text-lg font-medium">Sign in</p>

                <div>
                    <label for="email" class="sr-only">Email</label>

                    <div class="relative">
                        <input
                            type="email"
                            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                            placeholder="Enter your email"
                            name="email"
                            value="{{old('email')}}"
                        />

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-gray-400">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </span>
                    </div>
                    @error('email')
                    <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    >{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="password" class="sr-only">Password</label>
                    <div class="relative">
                        <input
                            type="password"
                            class="w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm"
                            placeholder="Enter your password"
                            name="password"
                        />
                    </div>
                    @error('password')
                    <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    >{{ $message }}</div>
                    @enderror
                </div>

                @if(session('auth_failed'))
                    <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    >{{ session('auth_failed') }}</div>
                @endif
                @if(session('auth_success'))
                    <div x-data="{ countdown: 2 }" x-init="setTimeout(() => window.location.href = '{{ route('home') }}', 1500)">
                        <div class="text-green-600 font-semibold">{{ session('auth_success') }}</div>
                        <div>
                            <p>Redirecting to home page in <span x-text="countdown"></span> seconds...</p>
                        </div>
                    </div>
                @endif

                <button
                    type="submit"
                    class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white hover:bg-white duration-500 hover:text-indigo-600"
                >
                    Sign in
                </button>

                <p class="text-center text-sm text-gray-500">
                    No account?
                    <a class="underline hover:text-indigo-600" href="/sign_up">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</x-layouts.client>
