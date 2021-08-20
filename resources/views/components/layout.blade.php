<!doctype html>

<title>Crypto.com</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div class="flex items-center">
                <a href="/">
                    <img src="/images/logo.png" alt="crypto.com Logo" width="165" height="16">
                </a>
                <a href="/add-fiat" class="text-xs font-bold uppercase ml-10 ">add fiat</a>
                <a href="/add-crypto" class="text-xs font-bold uppercase ml-10 ">add crypto</a>


            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth

                    <span class="text-xs font-bold uppercase">Welcome ,{{ auth()->user()->email }} </span>
                    <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6  ">
                        @csrf
                        <button type="submit">
                            log Out
                        </button>
                    </form>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login"
                        class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-2 px-4">login</a>
                @endauth


            </div>
        </nav>

        {{ $slot ?? '' }}


    </section>
</body>
