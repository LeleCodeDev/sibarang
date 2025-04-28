<x-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-blue-700">
        <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl text-center font-extrabold text-gray-800 mb-6">Login</h1>

            <form action="" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200
                        @error('email') ring-2 ring-red-600 @enderror"
                        placeholder="Enter your email">
                    @error('email')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200
                        @error('password') ring-2 ring-red-600 @enderror"
                        placeholder="Enter your password">
                    @error('password')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mt-1">
                    @error('failed')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
