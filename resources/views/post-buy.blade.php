<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl"> POST BUY </h1>

            <form method="POST" action action="/buy" class="mt-10">

                @csrf

                Crypto type
                <select name="crypto" id="crypto" class="">
                    @foreach ($crypto_types as $crypto)
                        <option value="{{ $crypto->name }}">{{ $crypto->name }}
                        </option>
                    @endforeach

                </select>

                <div class="mb-6 mt-3">
                    <label class="block mb-2 uppercase font-blod text-xs text-gray-700" for="price">BUY AT
                        PRICE (USD)</label>
                    <input class="border border-gray-400 p-2 w-full" step="any" type="number" name="price" id="price"
                        required>

                    <label class="block mb-2 mt-2 uppercase font-blod text-xs text-gray-700" for="price_per_coin">USD
                        to
                        Crypto</label>
                    <input class="border border-gray-400 p-2 w-full" step="any" type="number" name="price_per_coin"
                        id="price_per_coin" required>
                </div>
                <h3 class="mb-3 block mb-2 uppercase font-blod  text-gray-700">
                    You have fiat : {{ $fiat->usd_available }} usd
                </h3>

                @if (is_null(auth()->user()))
                    <div class="mb-6">
                        <button type="submit" disabled class="bg-blue-100 text-whit rounded py-2 px-4 ">
                            please login
                        </button>
                    </div>

                @else
                    <div class="mb-6">
                        <button type="submit" class="bg-blue-400 text-whit rounded py-2 px-4 hover:bg-blue-500">
                            confirm
                        </button>
                    </div>
                @endif


            </form>
        </main>

    </section>
</x-layout>
