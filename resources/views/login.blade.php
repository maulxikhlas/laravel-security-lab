<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .shake { animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both; }
        @keyframes shake {
            10%, 90% { transform: translate3d(-1px, 0, 0); }
            20%, 80% { transform: translate3d(2px, 0, 0); }
            30%, 50%, 70% { transform: translate3d(-4px, 0, 0); }
            40%, 60% { transform: translate3d(4px, 0, 0); }
        }
    </style>
</head>
<body class="bg-[#0B0F1A] min-h-screen flex items-center justify-center p-6 text-white">

    <div class="w-full max-w-md {{ session('error') ? 'shake' : '' }}">
        <div class="mb-10 text-center">
            <div class="inline-block p-3 rounded-2xl bg-indigo-500/10 mb-4 border border-indigo-500/20">
                <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <h2 class="text-3xl font-bold">Cyber Academy</h2>
            <p class="text-slate-400 text-sm mt-2">Authorized Personnel Only</p>
        </div>

        <div class="bg-[#161C2D] p-8 rounded-[2.5rem] shadow-2xl border border-slate-800">
            @if (session('error'))
                <div class="mb-6 p-4 bg-red-500/10 text-red-400 rounded-2xl text-xs font-semibold border border-red-500/20 flex items-center gap-3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/></svg>
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.secure') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="text-xs font-semibold text-slate-500 ml-1 mb-2 block">EMAIL ADDRESS</label>
                    <input type="email" name="email" placeholder="budi@siswa.com" 
                        class="w-full px-5 py-4 bg-[#0B0F1A] rounded-2xl border border-slate-800 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all text-sm" required>
                </div>
                <div>
                    <label class="text-xs font-semibold text-slate-500 ml-1 mb-2 block">PASSWORD</label>
                    <input type="password" name="password" placeholder="••••••••" 
                        class="w-full px-5 py-4 bg-[#0B0F1A] rounded-2xl border border-slate-800 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all text-sm" required>
                </div>
                <button type="submit" 
                    class="w-full bg-indigo-600 text-white py-4 rounded-2xl font-bold hover:bg-indigo-500 shadow-lg shadow-indigo-500/20 transition-all active:scale-95">
                    INITIALIZE LOGIN
                </button>
            </form>
        </div>
    </div>
</body>
</html>