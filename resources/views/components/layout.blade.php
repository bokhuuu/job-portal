<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Job Portal</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="w-[95%] from-10% via-30% to-90% mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-200 via-sky-200 to-emerald-200 text-slate-700">
    <nav class="mb-8 flex justify-between text-lg font-medium">
        <ul class="flex space-x-2">
            <li>
                <a href="{{ route('jobOffers.index') }}">Home</a>
            </li>
        </ul>

        <ul class="flex space-x-2">
            @auth
                <li>
                    {{ auth()->user()->name ?? Anonymous }}
                </li>

                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="font-bold text-blue-400">Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('auth.create') }}" class="font-bold text-blue-400">
                        Sign in
                    </a>
                </li>
            @endauth
        </ul>
    </nav>
    {{ $slot }}
</body>

</html>
