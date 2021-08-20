<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl"> Login </h1>
            <form method="POST" action action="/register" class="mt-10">

                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-blod text-xs text-gray-700" for="username">email</label>
                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" required>
                </div>

                <div class="mb-6">

                    <label class="block mb-2 uppercase font-blod text-xs text-gray-700" for="password">password</label>
                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password"
                        required>
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-whit rounded py-2 px-4 hover:bg-blue-500">
                        Log In
                    </button>
                </div>
            </form>
        </main>

    </section>
</x-layout>
