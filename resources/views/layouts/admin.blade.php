<!DOCTYPE html>
<html>
<head>
    <title>CourtYK Admin</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex">

    <aside class="w-64 bg-white border-r">

        <div class="p-6 font-bold text-xl">
            CourtYK
        </div>

        <nav class="px-4 space-y-2">

            <a
                href="{{ route('admin.dashboard') }}"
                class="block p-2 rounded hover:bg-gray-100"
            >
                Dashboard
            </a>

            <a
                href="{{ route('admin.venues.index') }}"
                class="block p-2 rounded hover:bg-gray-100"
            >
                Venues
            </a>

            <a
                href="{{ route('admin.courts.index') }}"
                class="block p-2 rounded hover:bg-gray-100"
            >
                Courts
            </a>

            <a
                href="{{ route('admin.bookings.index') }}"
                class="block p-2 rounded hover:bg-gray-100"
            >
                Bookings
            </a>

            <a
                href="{{ route('admin.payments.index') }}"
                class="block p-2 rounded hover:bg-gray-100"
            >
                Payments
            </a>

            <a
                href="{{ route('admin.reports.index') }}"
                class="block p-2 rounded hover:bg-gray-100"
            >
                Reports
            </a>

        </nav>

    </aside>

    <main class="flex-1 p-8">
        @yield('content')
    </main>

</div>

</body>
</html>