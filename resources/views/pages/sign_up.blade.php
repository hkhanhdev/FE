<x-layouts.client>
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">
            <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Register your account</h1>

            <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati sunt dolores deleniti
                inventore quaerat mollitia?
            </p>

            <form method="POST" action="/sign_up" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
                @csrf
                <p class="text-center text-lg font-medium">Sign up</p>

                <div>
                    <label for="username" class="sr-only">Username</label>
                    <div class="relative">
                        <input
                            type="text"
                            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                            placeholder="Enter your username"
                            name="username"
                            value="{{old("username")}}"
                        />

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-gray-400">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
</svg>
                      </span>
                    </div>
                    @error('username')
                    <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    >{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="email" class="sr-only">Email</label>
                    <div class="relative">
                        <input
                            type="email"
                            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                            placeholder="Enter your email"
                            name="email"
                            value="{{old("email")}}"
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
                    @if(session('email_taken'))
                        <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                             x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        >{{ session('email_taken') }}</div>
                    @endif
                </div>


                <div>
                    <label for="phone" class="sr-only">Phone</label>
                    <div class="relative">
                        <input
                            type="phone"
                            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                            placeholder="Enter your phone number" name="phone"
                            value="{{old("phone")}}"
                        />
                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-gray-400">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
</svg>
          </span>
                    </div>
                    @error('phone')
                    <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    >{{ $message }}</div>
                    @enderror
                    @if(session('phone_taken'))
                        <div class="text-red-600 font-semibold" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                             x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        >{{ session("phone_taken") }}</div>
                    @endif
                </div>

                <div>
                    <label for="password" class="sr-only">Password</label>
                    <div class="relative">
                        <input
                            type="password"
                            class="w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm"
                            placeholder="Enter password"
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

                <div>
                    <label for="password" class="sr-only">Password</label>
                    <div class="relative">
                        <input
                            type="password"
                            class="w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm"
                            placeholder="Confirm your password"
                            name="password_confirmation"
                        />
                    </div>
                </div>
                @if(session('register'))
                <div x-data="{ countdown: 2 }" x-init="setTimeout(() => window.location.href = '{{ route('sign_in') }}', countdown * 1000)">
                        <div class="text-green-600 font-semibold">{{ session('register') }}</div>
                    <div>
                        <p>Redirecting to login page in <span x-text="countdown"></span> seconds...</p>
                    </div>
                </div>
                @endif

                <button
                    type="submit"
                    class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white hover:bg-white duration-500 hover:text-indigo-600"
                >
                    Register
                </button>

                <p class="text-center text-sm text-gray-500">
                    Already have an account?
                    <a class="underline hover:text-indigo-600" href="/sign_in">Sign in</a>
                </p>
            </form>
        </div>
    </div>
</x-layouts.client>
