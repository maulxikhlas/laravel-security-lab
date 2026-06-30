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
<body class="bg-[#F8FAFC] text-slate-800 p-8 relative min-h-screen overflow-hidden">
    <!-- Decorative Glowing Orbs -->
    <div class="absolute -top-40 -left-40 w-[500px] h-[500px] bg-indigo-400/5 rounded-full filter blur-[120px] pointer-events-none"></div>
    <div class="absolute -bottom-40 -right-40 w-[500px] h-[500px] bg-cyan-400/10 rounded-full filter blur-[120px] pointer-events-none"></div>

    <div class="max-w-6xl mx-auto relative z-10">
        <header class="flex flex-col sm:flex-row justify-between sm:items-center gap-6 mb-12 pb-6 border-b border-slate-200/60">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Welcome back, {{ Auth::user()->name }}!</h1>
                <p class="text-slate-500 text-sm mt-1 flex items-center gap-2">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    Operator Status: <span class="text-emerald-600 font-semibold">Online</span>
                </p>
            </div>
            <div class="flex items-center gap-4">
                <div class="bg-white/70 backdrop-blur-md px-6 py-3 rounded-2xl border border-slate-200 text-xs font-bold uppercase tracking-wider text-indigo-600 shadow-[0_4px_20px_rgba(0,0,0,0.02)]">
                    Rank: <span class="text-indigo-950 font-extrabold">Junior Pentester</span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 border border-red-200/50 px-5 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider transition-all active:scale-95 shadow-[0_4px_20px_rgba(239,68,68,0.05)]">
                        LOGOUT
                    </button>
                </form>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white/60 backdrop-blur-md p-8 rounded-[2.5rem] border border-slate-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)]">
                <p class="text-slate-400 text-[10px] font-bold mb-2 uppercase tracking-widest">Machines Powned</p>
                <h3 class="text-4xl font-extrabold text-slate-900">12</h3>
            </div>
            <div class="bg-white/60 backdrop-blur-md p-8 rounded-[2.5rem] border border-slate-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)]">
                <p class="text-slate-400 text-[10px] font-bold mb-2 uppercase tracking-widest">Current Score</p>
                <h3 class="text-4xl font-extrabold text-indigo-600">2,450</h3>
            </div>
            <div class="bg-white/60 backdrop-blur-md p-8 rounded-[2.5rem] border border-slate-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.02)] text-center flex flex-col justify-center">
                 <button class="bg-indigo-600 hover:bg-indigo-550 text-white px-4 py-4 rounded-2xl font-bold transition-all shadow-lg shadow-indigo-600/10 active:scale-95">
                     START NEW LAB
                 </button>
            </div>
        </div>
    </div>

    @if (session('sqli_detected'))
        <!-- SQL Injection Alert Modal -->
        <div id="sqliAlertModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4 z-50">
            <div class="bg-white border border-red-150 max-w-md w-full p-8 rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.08)] relative text-center">
                <div class="inline-block p-4 rounded-full bg-red-50 text-red-500 mb-5 border border-red-100 animate-pulse">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <h3 class="text-xl font-extrabold text-red-650 mb-3">Akun Terdeteksi SQL Injection</h3>
                <p class="text-slate-500 text-sm mb-6 leading-relaxed">Sistem mendeteksi bypass autentikasi menggunakan eksploitasi kueri SQL. Kredensial tidak divalidasi dengan aman melalui password asli!</p>
                <button onclick="document.getElementById('sqliAlertModal').classList.add('hidden')" class="w-full bg-red-600 hover:bg-red-550 text-white font-bold py-3.5 rounded-xl text-sm transition-all shadow-lg shadow-red-600/10">
                    LIHAT PORTAL CTF
                </button>
            </div>
        </div>
    @endif
</body>
</html>
