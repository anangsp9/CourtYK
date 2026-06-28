<!DOCTYPE html>
<html>

<head>
    <title>CourtYK Admin</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap">
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex">

        <aside class="w-64 bg-white border-r">

            <div class="p-6 font-bold text-xl">
                CourtYK
            </div>

            <nav class="px-4 space-y-2">

                <a href="{{ route('admin.dashboard') }}" class="block p-2 rounded hover:bg-gray-100">
                    Dashboard
                </a>

                <a href="{{ route('admin.venues.index') }}" class="block p-2 rounded hover:bg-gray-100">
                    Venues
                </a>

                <a href="{{ route('admin.courts.index') }}" class="block p-2 rounded hover:bg-gray-100">
                    Courts
                </a>

                <a href="{{ route('admin.bookings.index') }}" class="block p-2 rounded hover:bg-gray-100">
                    Bookings
                </a>

                <a href="{{ route('admin.payments.index') }}" class="block p-2 rounded hover:bg-gray-100">
                    Payments
                </a>

                <a href="{{ route('admin.reports.index') }}" class="block p-2 rounded hover:bg-gray-100">
                    Reports
                </a>

                <a href="{{ route('admin.users.index') }}" class="block p-2 rounded hover:bg-gray-100">
                    Users
                </a>

            </nav>

        </aside>

        <main class="flex-1 p-8">
            @if (session('success'))
                <div class="mb-4 rounded bg-green-100 border border-green-300 text-green-800 p-3">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 rounded bg-red-100 border border-red-300 text-red-800 p-3">
                    {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>

    </div>

</body>

</html>
