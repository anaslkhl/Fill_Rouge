<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloudCall - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#0F172A] text-white">
<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#020617] border-r border-white/10 flex flex-col p-5">

        <!-- Logo -->
        <div class="flex items-center gap-3 mb-10">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-[#DE6E4B] to-[#C85A3C] flex items-center justify-center font-bold">
                CC
            </div>
            <div>
                <h1 class="font-bold text-lg">CloudCall</h1>
                <p class="text-xs text-white/60">Call Center</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="space-y-6 text-sm">

            <div>
                <div class="text-xs uppercase text-white/40 mb-2">Administration</div>

                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg bg-[#5E548E]/30 text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10"/>
                    </svg>
                    Tableau de Bord
                </a>

                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/5 text-white/70">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4.354a4 4 0 110 5.292"/>
                    </svg>
                    Utilisateurs
                </a>

                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/5 text-white/70">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 7v10"/>
                    </svg>
                    Base de Données
                </a>
            </div>

            <div>
                <div class="text-xs uppercase text-white/40 mb-2">Système</div>

                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/5 text-white/70">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12h6"/>
                    </svg>
                    Logs
                </a>

                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/5 text-white/70">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 15v2"/>
                    </svg>
                    Sécurité
                </a>

                <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/5 text-white/70">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10.325 4.317"/>
                    </svg>
                    Configuration
                </a>
            </div>
        </nav>

        <!-- Status -->
        <div class="mt-auto pt-6 border-t border-white/10">
            <div class="flex items-center gap-2 text-sm bg-[#4ECDC4]/10 px-3 py-2 rounded-lg">
                <s
