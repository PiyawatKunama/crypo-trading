<x-layout>
    @include('_post-header')

    <main class="max-w-6xl mx-auto  mt-5 space-y-6">
        <a href="/post-buy"
            class="text-xs font-semibold uppercase rounded-full py-2 px-8 bg-gray-200 text-green-500 ">make a purchase
            post</a>
        <a href="/post-sell"
            class="text-xs font-semibold  uppercase rounded-full py-2 px-8 bg-gray-200 text-red-500 ">make a sale
            post</a>

        <article class="bg-gray-100 rounded-xl">
            <div class="py-6 px-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Advertisers</th>
                            <th scope="col">type trade</th>
                            <th scope="col">Price </th>
                            <th scope="col">Maximum coin</th>
                            <th scope="col">available</th>
                            <th scope="col">Trade</th>
                        </tr>
                    </thead>
                    @foreach ($posts as $post)
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        {{ $post->user->email }}
                                        <span class=" block text-gray-400 text-xs">
                                            Published <time>{{ $post->created_at->diffForHumans() }}</time>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    {{ $post->trade_type }}
                                </td>
                                <td>
                                    {{ $post->usd_selling_price }} {{ $post->fiat_type }}
                                </td>
                                <td>
                                    {{ $post->num_max_coin }}
                                </td>
                                <td>
                                    <div>
                                        {{ $post->crypto->available }} {{ $post->crypto->crypto_type->name }}

                                    </div>
                                    <div>
                                        or
                                        {{ number_format($post->crypto->available / $post->crypto->crypto_type->usd_exchange_rate, 3) }}
                                        USD

                                    </div>
                                </td>
                                <td>
                                    <div class="hidden lg:block">
                                        <a data-toggle="collapse" data-target="#buy-{{ $post->id }}" href=""
                                            class="  text-xs font-semibold bg-gray-200 rounded-full py-2 px-8">
                                            Buy {{ $post->crypto_type }}</a>
                                    </div>

                                </td>
                            <tr id="buy-{{ $post->id }}" class="collapse mb-10">
                                <td>
                                    <h2>
                                        You have fiat :

                                    </h2>
                                    <h2>

                                        {{ $fiat->usd_available }} usd

                                    </h2>
                                </td>
                                <td colspan="2">
                                    <div class=" mb-10">

                                        <form method="POST"  action="">

                                            @csrf

                                            <div class="mb-6">
                                                <label class="block mb-2 uppercase font-blod text-xs text-gray-700"
                                                    for="username">Buy at price</label>
                                                <input class="border border-gray-400 p-2 w-full" type="number"
                                                    step="any" name="trade" id="trade" required>
                                            </div>

                                            @if (is_null(auth()->user()))
                                                <button type="submit" disabled
                                                    class="  text-xs font-semibold bg-blue-100 rounded-full py-2 px-8">
                                                    please login </button>

                                            @else
                                                <button type="submit"
                                                    class="  text-xs font-semibold bg-gray-200 rounded-full py-2 px-8">
                                                    Buy </button>
                                            @endif

                                            <a href=""
                                                class="  text-xs font-semibold bg-gray-200 rounded-full py-2 px-8">
                                                Cancel</a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </article>

    </main>

</x-layout>
