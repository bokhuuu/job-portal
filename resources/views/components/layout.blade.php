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
        <ul class="text-indigo-500 font-bold hover:underline">
            <li>
                <a href="{{ route('jobOffer.index') }}">Home</a>
            </li>
        </ul>

        <ul class="text-right">
            @auth
                <li>
                    <span class="block font-extrabold">
                        {{ auth()->user()->name ?? Anonymous }}
                    </span>
                    <a href="{{ route('my-job-applications.index') }}" class="font-bold text-indigo-500 hover:underline">
                        Applications
                    </a>
                </li>

                <li>
                    <a href="{{ route('my_jobs.index') }}" class="font-bold text-indigo-500 hover:underline">My Jobs</a>
                </li>

                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="font-bold text-indigo-500 hover:underline">Logout</button>
                    </form>
                </li>
            @else
                <div class="flex space-x-2">
                    <li>
                        <a href="{{ route('auth.create') }}" class="font-bold text-indigo-500 hover:underline">
                            Sign in
                        </a>
                    </li>
                    <span>|</span>
                    <li>
                        <a href="{{ route('register') }}" class="font-bold text-indigo-500 hover:underline">
                            Register
                        </a>
                    </li>
                </div>

            @endauth
        </ul>
    </nav>

    @if (session('success'))
        <div role="alert"
            class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
            <p class="font-bold">Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-green-100 p-4 text-red-700 opacity-75">
            <p class="font-bold">Error!</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    {{ $slot }}
</body>

</html>
