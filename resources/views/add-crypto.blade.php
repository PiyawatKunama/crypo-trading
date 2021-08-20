<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-4 rounded-xl">
            <h1 class="text-center font-bold text-xl"> AddCrypto </h1>

            <form method="POST" action action="/register" class="mt-10 ">

                @csrf

                type
                <select name="crypto" id="crypto" class="">
                    @foreach ($crypto_types as $crypto)
                        <option value="{{ $crypto->name }}">{{ $crypto->name }}
                        </option>
                    @endforeach

                </select>
                <br>
                <br>
                <label class="" for="username">Amount</label>
                <input class="border border-gray-400 p-2 w-full"  step="any" type="number" name="amount" id="amount" required>

                @if (is_null(auth()->user()))

                    <div>
                        <button type="submit" disabled class="bg-blue-100 text-whit mt-3 rounded py-2 px-4 ">
                            please login
                        </button>
                    </div>
                @else
                    <div>
                        <button type="submit" class="bg-green-400 mt-3 text-whit rounded py-2 px-4 hover:bg-blue-500">
                            Confirm
                        </button>
                    </div>
                @endif


            </form>
        </main>

    </section>
</x-layout>
