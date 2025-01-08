<footer class="bg-white w-full">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="flex justify-between flex-col md:flex-row">
            <div class="mb-6 md:mb-0">
                <a href="" class="flex items-center">
                    <img src="{{ asset('image/sumekar.png') }}" class="h-12 me-3" alt="FlowBite Logo" />
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 md:w-3/4">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Email</h2>
                    <ul class="text-gray-500 font-medium">
                        <li>
                            <a href="" class="hover:underline">{{ $home->email }}</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Dinas Kominfo</h2>
                    <ul class="text-gray-500 font-medium">
                        <li class="mb-4">
                            <a href="" class="hover:underline">
                                {{ $home->alamat }} </a>
                        </li>

                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Telepon</h2>
                    <ul class="text-gray-500 font-medium">
                        <li class="mb-4">
                            <a href="" class="hover:underline">{{ $home->telepon }}</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-500 sm:text-center">© 2025 <a href="https://flowbite.com/"
                    class="hover:underline">UTM</a>. All Rights Reserved.
            </span>
        </div>
    </div>
</footer>
