@extends('auth.app')

@section('title', 'Register')

@section('content')
    <div class="bg-white md:bg-transparent md:max-w-screen-lg md:mx-auto ">
        <form class="relative max-w-lg mx-auto p-5 md:bg-white md:my-12 md:rounded-lg md:shadow-md" method="POST"
            action="{{ route('register.submit') }}">
            @csrf
            <div class="logo">
                <img src="{{ url('/image/sumekar.png') }}" alt="logo" class="w-20 mx-auto" />
            </div>
            <h1 class="font-semibold text-lg mt-2 mb-2 w-fit mx-auto">Pembuatan Akun</h1>
            <h1 class="font-semibold text-lg mt-2 mb-5 w-fit mx-auto">Rekrutmen Komisi <span
                    class="text-blue-700">Informasi</span></h1>
            <hr class="border-t-1 mb-4 border-gray-300 hidden md:block">
            <div class="relative z-0 w-full my-5 group">
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name
                </label>
            </div>
            @error('name')
                <span class="text-red-600 text-sm my-2 block">{{ $message }}</span>
            @enderror
            <div class="relative z-0 w-full my-5 group">
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                    address</label>
            </div>
            @error('email')
                <span class="text-red-600 text-sm my-2 block">{{ $message }}</span>
            @enderror
            <div class="relative z-0 w-full my-5 group">
                <input type="tel" name="nomor_tlp" id="nomor_tlp" value="{{ old('nomor_tlp') }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required oninput="formatPhoneNumber(this)" />
                <label for="nomor_tlp"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone
                    number (+62 083-456-7890)</label>
            </div>
            @error('nomor_tlp')
                <span class="text-red-600 text-sm my-2 block">{{ $message }}</span>
            @enderror
            <div class="relative z-0 w-full my-5 group">
                <input type="password" name="password" id="floating_password" value="{{ old('password') }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_password"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
            </div>
            <div class="relative z-0 w-full my-5 group">
                <input type="password" name="password_confirmation" id="floating_repeat_password"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_repeat_password"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm
                    password</label>
            </div>
            @error('password')
                <span class="text-red-600 text-sm my-2 block">{{ $message }}</span>
            @enderror
            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="terms" type="checkbox" name="terms"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                        required />
                </div>
                <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a
                        href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                        conditions</a></label>
            </div>
            @error('terms')
                <span class="text-red-600 text-sm mb-2 block">{{ $message }}</span>
            @enderror
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full md:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function formatPhoneNumber(input) {
            // Store cursor position
            let cursorPosition = input.selectionStart;
            let previousLength = input.value.length;

            // Remove non-digit characters except '+'
            let value = input.value.replace(/[^\d+]/g, '');

            // Ensure number starts with +62
            if (!value.startsWith('+62')) {
                value = '+62' + value.replace(/^[+62]*/, '');
                cursorPosition += 3;
            }

            // Remove additional + symbols
            value = value.replace(/(?!^)\+/g, '');

            // Format number
            let formattedNumber = '';
            if (value.length > 0) {
                formattedNumber = value.substring(0, 3);
                let remainingNumbers = value.substring(3);

                if (remainingNumbers.length > 0) {
                    formattedNumber += ' ';
                    formattedNumber += remainingNumbers.substring(0, 3);

                    if (remainingNumbers.length > 3) {
                        formattedNumber += '-';
                        formattedNumber += remainingNumbers.substring(3, 7);

                        if (remainingNumbers.length > 7) {
                            formattedNumber += '-';
                            formattedNumber += remainingNumbers.substring(7, 11);
                        }
                    }
                }
            }

            // Limit length
            if (formattedNumber.length > 18) {
                formattedNumber = formattedNumber.substring(0, 18);
            }

            // Update input value
            input.value = formattedNumber;

            // Adjust cursor position
            let lengthDiff = formattedNumber.length - previousLength;
            cursorPosition = Math.max(3, cursorPosition + lengthDiff);
            input.setSelectionRange(cursorPosition, cursorPosition);
        }

        // Add these event listeners after the DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInput = document.getElementById('nomor_tlp');

            // Set initial +62 if empty
            if (!phoneInput.value) {
                phoneInput.value = '+62 ';
            }

            // Prevent cursor from going before +62
            phoneInput.addEventListener('click', function(e) {
                if (this.selectionStart < 3) {
                    this.setSelectionRange(3, 3);
                }
            });

            // Prevent backspace from deleting +62
            phoneInput.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && this.selectionStart <= 4) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endpush