<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KidneyMate REST API</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" href="kidneys.png" />
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>

<body class="bg-slate-950 text-white font-[Inter]">
    <div class="min-h-screen">
        {{-- Hero --}}
        <section class="border-b border-slate-800">
            <div class="max-w-7xl mx-auto px-6 py-24">
                <span
                    class="inline-flex items-center rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-4 py-1 text-sm">
                    ● API Online
                </span>
                <h1 class="mt-8 text-6xl font-black tracking-tight">
                    KidneyMate
                    <span class="text-sky-400">
                        REST API
                    </span>
                </h1>
                <p class="mt-6 max-w-3xl text-slate-400 text-lg leading-8">
                    RESTful Backend API built with Laravel for managing
                    kidney health records including authentication,
                    fluid intake, blood pressure, weight monitoring,
                    medications, schedules, and health reports.
                </p>
                <div class="mt-10 flex gap-4">
                    <a
                        href="https://github.com/yourFEdev/backend-kidneyMate"
                        target="_blank"
                        class="rounded-lg bg-sky-500 px-6 py-3 font-semibold text-white transition hover:bg-sky-600">
                        View Source Code
                    </a>
                    <span
                        class="rounded-lg  border border-slate-700 px-5 py-3 text-slate-300">
                        Version 1.0
                    </span>
                    <span
                        class="rounded-lg border border-slate-700 px-5 py-3 text-slate-300">
                        Laravel 13
                    </span>
                    <span
                        class="rounded-lg border border-slate-700 px-5 py-3 text-slate-300">
                        PHP 8.3
                    </span>
                </div>
            </div>
        </section>
        {{-- Features --}}
        <section class="py-24">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center">
                    <span class="text-sky-400 font-semibold uppercase tracking-widest">
                        Features
                    </span>
                    <h2 class="mt-4 text-4xl font-bold">
                        Everything you need to manage kidney health
                    </h2>
                    <p class="mt-4 text-slate-400 max-w-2xl mx-auto">
                        KidneyMate provides a complete REST API for authentication,
                        health monitoring, scheduling, reporting, and patient management.
                    </p>
                </div>
                <div class="mt-16 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    {{-- Card --}}
                    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-8">
                        <div class="text-4xl">🔐</div>
                        <h3 class="mt-5 text-xl font-semibold">
                            Authentication
                        </h3>
                        <p class="mt-3 text-slate-400">
                            Secure authentication using JWT Token with login,
                            register, logout, and profile management.
                        </p>
                    </div>
                    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-8">
                        <div class="text-4xl">💧</div>
                        <h3 class="mt-5 text-xl font-semibold">
                            Fluid Tracking
                        </h3>
                        <p class="mt-3 text-slate-400">
                            Record daily fluid intake, monitor progress,
                            and help patients stay within their recommended limit.
                        </p>
                    </div>
                    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-8">
                        <div class="text-4xl">🩺</div>
                        <h3 class="mt-5 text-xl font-semibold">
                            Blood Pressure
                        </h3>
                        <p class="mt-3 text-slate-400">
                            Store systolic, diastolic, pulse, and measurement history
                            for better health monitoring.
                        </p>
                    </div>
                    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-8">
                        <div class="text-4xl">⚖️</div>
                        <h3 class="mt-5 text-xl font-semibold">
                            Weight Monitoring
                        </h3>
                        <p class="mt-3 text-slate-400">
                            Keep track of body weight records before and after
                            dialysis sessions.
                        </p>
                    </div>
                    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-8">
                        <div class="text-4xl">📅</div>
                        <h3 class="mt-5 text-xl font-semibold">
                            Schedule Management
                        </h3>
                        <p class="mt-3 text-slate-400">
                            Manage dialysis schedules and upcoming treatment sessions
                            with reminders.
                        </p>
                    </div>
                    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-8">
                        <div class="text-4xl">📊</div>
                        <h3 class="mt-5 text-xl font-semibold">
                            Reports & Analytics
                        </h3>
                        <p class="mt-3 text-slate-400">
                            Generate summaries, statistics, and health reports
                            from recorded patient data.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        {{-- API Endpoints --}}
        <section class="py-24 border-t border-slate-800">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center">
                    <span class="text-sky-400 uppercase tracking-widest font-semibold">
                        API Reference
                    </span>
                    <h2 class="mt-4 text-4xl font-bold">
                        Available Endpoints
                    </h2>
                    <p class="mt-4 text-slate-400">
                        Below are the primary REST API endpoints available in
                        KidneyMate.
                    </p>
                </div>
                <div class="mt-14 overflow-hidden rounded-2xl border border-slate-800">
                    <table class="w-full">
                        <thead class="bg-slate-900">
                            <tr class="text-left">
                                <th class="px-6 py-4 text-slate-300">
                                    Method
                                </th>
                                <th class="px-6 py-4 text-slate-300">
                                    Endpoint
                                </th>
                                <th class="px-6 py-4 text-slate-300">
                                    Description
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800">
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="px-6 py-4">
                                    <span class="rounded bg-green-500/20 text-green-400 px-3 py-1 text-sm font-semibold">
                                        POST
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-sky-400">
                                    /api/register
                                </td>
                                <td class="px-6 py-4 text-slate-400">
                                    Register a new account
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="px-6 py-4">
                                    <span class="rounded bg-green-500/20 text-green-400 px-3 py-1 text-sm font-semibold">
                                        POST
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-sky-400">
                                    /api/login
                                </td>
                                <td class="px-6 py-4 text-slate-400">
                                    Authenticate user
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="px-6 py-4">
                                    <span class="rounded bg-red-500/20 text-red-400 px-3 py-1 text-sm font-semibold">
                                        POST
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-sky-400">
                                    /api/logout
                                </td>
                                <td class="px-6 py-4 text-slate-400">
                                    Logout current user
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="px-6 py-4">
                                    <span class="rounded bg-blue-500/20 text-blue-400 px-3 py-1 text-sm font-semibold">
                                        GET
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-sky-400">
                                    /api/me
                                </td>
                                <td class="px-6 py-4 text-slate-400">
                                    Authenticated user information
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="px-6 py-4">
                                    <span class="rounded bg-yellow-500/20 text-yellow-400 px-3 py-1 text-sm font-semibold">
                                        PUT
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-sky-400">
                                    /api/profile
                                </td>
                                <td class="px-6 py-4 text-slate-400">
                                    Update profile
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="px-6 py-4">
                                    <span class="rounded bg-blue-500/20 text-blue-400 px-3 py-1 text-sm font-semibold">
                                        GET
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-sky-400">
                                    /api/dashboard
                                </td>
                                <td class="px-6 py-4 text-slate-400">
                                    Dashboard summary
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="px-6 py-4">
                                    <span class="rounded bg-blue-500/20 text-blue-400 px-3 py-1 text-sm font-semibold">
                                        GET
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-sky-400">
                                    /api/fluid
                                </td>
                                <td class="px-6 py-4 text-slate-400">
                                    Fluid intake records
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="px-6 py-4">
                                    <span class="rounded bg-blue-500/20 text-blue-400 px-3 py-1 text-sm font-semibold">
                                        GET
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-sky-400">
                                    /api/weight
                                </td>
                                <td class="px-6 py-4 text-slate-400">
                                    Weight records
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="px-6 py-4">
                                    <span class="rounded bg-blue-500/20 text-blue-400 px-3 py-1 text-sm font-semibold">
                                        GET
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-sky-400">
                                    /api/blood-pressure
                                </td>
                                <td class="px-6 py-4 text-slate-400">
                                    Blood pressure records
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-900/50 transition">
                                <td class="px-6 py-4">
                                    <span class="rounded bg-blue-500/20 text-blue-400 px-3 py-1 text-sm font-semibold">
                                        GET
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-sky-400">
                                    /api/reports
                                </td>
                                <td class="px-6 py-4 text-slate-400">
                                    Monthly & health reports
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        {{-- Example Response --}}
        <section class="py-24 border-t border-slate-800">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center">
                    <span class="uppercase tracking-widest text-sky-400 font-semibold">
                        Response Example
                    </span>
                    <h2 class="mt-4 text-4xl font-bold">
                        Standard JSON Response
                    </h2>
                    <p class="mt-4 text-slate-400">
                        Every endpoint returns a consistent JSON structure,
                        making it easy to integrate with any frontend application.
                    </p>
                </div>
                <div class="mt-16 grid gap-8 lg:grid-cols-2">
                    {{-- Request --}}
                    <div class="overflow-hidden rounded-2xl border border-slate-800">
                        <div
                            class="flex items-center justify-between border-b border-slate-800 bg-slate-900 px-6 py-4">
                            <span class="font-semibold text-white">
                                Request
                            </span>
                            <span
                                class="rounded bg-blue-500/20 px-3 py-1 text-sm text-blue-400">
                                GET /api/dashboard
                            </span>
                        </div>
                        <pre class="overflow-x-auto bg-slate-950 p-6 text-sm leading-7 text-slate-300"><code>Authorization: Bearer your_access_token
Accept: application/json</code></pre>
                    </div>
                    {{-- Response --}}
                    <div class="overflow-hidden rounded-2xl border border-slate-800">
                        <div
                            class="flex items-center justify-between border-b border-slate-800 bg-slate-900 px-6 py-4">
                            <span class="font-semibold text-white">
                                Response
                            </span>
                            <span
                                class="rounded bg-emerald-500/20 px-3 py-1 text-sm text-emerald-400">
                                200 OK
                            </span>
                        </div>
                        <pre class="overflow-x-auto bg-slate-950 p-6 text-sm leading-7 text-slate-300"><code>{
    "status": true,
    "message": "Dashboard fetched successfully.",
    "data": {
        "health_score": 87,
        "summary": {
            "average_bp": "123 / 81",
            "weight": 67.8,
            "fluid_goal": 60,
            "medication": 95
        }
    }
}</code></pre>
                    </div>
                </div>
            </div>
        </section>
        {{-- Statistics --}}
        <section class="border-t border-slate-800 py-24">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                    <div class="rounded-2xl border border-slate-800 bg-slate-900 p-8">
                        <div class="text-5xl font-black text-sky-400">
                            20+
                        </div>
                        <div class="mt-2 text-slate-400">
                            REST Endpoints
                        </div>
                    </div>
                    <div class="rounded-2xl border border-slate-800 bg-slate-900 p-8">
                        <div class="text-5xl font-black text-emerald-400">
                            JSON
                        </div>
                        <div class="mt-2 text-slate-400">
                            Response Format
                        </div>
                    </div>
                    <div class="rounded-2xl border border-slate-800 bg-slate-900 p-8">
                        <div class="text-5xl font-black text-purple-400">
                            CRUD
                        </div>
                        <div class="mt-2 text-slate-400">
                            Complete Resources
                        </div>
                    </div>
                    <div class="rounded-2xl border border-slate-800 bg-slate-900 p-8">
                        <div class="text-5xl font-black text-orange-400">
                            v1.0
                        </div>
                        <div class="mt-2 text-slate-400">
                            Current Version
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="border-t border-slate-800">
            <div class="max-w-7xl mx-auto px-6 py-12">
                <div class="flex flex-col gap-6 md:flex-row md:justify-between md:items-center">
                    <div>
                        <h3 class="text-xl font-bold">
                            KidneyMate REST API
                        </h3>
                        <p class="mt-2 text-slate-500">
                            RESTful backend built with Laravel for kidney health management.
                        </p>
                    </div>
                    <div class="text-slate-500 text-sm">
                        Laravel 13 • PHP 8.3 • REST API • © {{ date('Y') }}
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>