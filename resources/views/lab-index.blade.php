<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F3F4F6] min-h-screen flex items-center justify-center text-slate-800 relative overflow-hidden">
    <!-- Decorative Futuristic Glowing Orbs -->
    <div class="absolute -top-40 -left-40 w-[500px] h-[500px] bg-indigo-400/10 rounded-full filter blur-[120px] pointer-events-none"></div>
    <div class="absolute -bottom-40 -right-40 w-[500px] h-[500px] bg-cyan-400/10 rounded-full filter blur-[120px] pointer-events-none"></div>

    <div class="relative z-10 text-center max-w-xl px-6">
        <!-- Brand Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-500/10 text-indigo-600 border border-indigo-500/20 text-xs font-semibold uppercase tracking-wider mb-6">
            <span class="w-2 h-2 rounded-full bg-indigo-600 animate-pulse"></span>
            Cyber Academy Lab
        </div>
        
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 bg-clip-text text-transparent">
            SQL Injection Security Portal
        </h1>
        <p class="text-slate-500 text-sm md:text-base mb-12 max-w-md mx-auto">
            Simulasi interaktif untuk menganalisis dan membandingkan kerentanan injeksi SQL pada mekanisme autentikasi.
        </p>

        <!-- Glassmorphic Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 w-full">
            <!-- Insecure Card -->
            <a href="/login-insecure" class="group block p-8 bg-white/60 hover:bg-white backdrop-blur-md rounded-[2.5rem] border border-red-500/10 hover:border-red-500/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_50px_rgba(239,68,68,0.1)] transition-all duration-300 transform hover:-translate-y-1 text-left">
                <div class="w-12 h-12 rounded-2xl bg-red-500/10 border border-red-500/20 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Zona Rentan</h3>
                <p class="text-slate-500 text-xs leading-relaxed mb-6">Mekanisme login yang rentan terhadap bypass query SQL Injection.</p>
                <div class="inline-flex items-center gap-2 text-xs font-bold text-red-600 group-hover:translate-x-2 transition-transform">
                    Masuk Zona Rentan <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </a>

            <!-- Secure Card -->
            <a href="/login-secure" class="group block p-8 bg-white/60 hover:bg-white backdrop-blur-md rounded-[2.5rem] border border-emerald-500/10 hover:border-emerald-500/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_50px_rgba(16,185,129,0.1)] transition-all duration-300 transform hover:-translate-y-1 text-left">
                <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Zona Aman</h3>
                <p class="text-slate-500 text-xs leading-relaxed mb-6">Mekanisme login yang diproteksi menggunakan parameter binding.</p>
                <div class="inline-flex items-center gap-2 text-xs font-bold text-emerald-600 group-hover:translate-x-2 transition-transform">
                    Masuk Zona Aman <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
            </a>
        </div>
    </div>
</body>
</html>
