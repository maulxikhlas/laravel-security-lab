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
<body class="bg-[#F8FAFC] min-h-screen flex items-center justify-center p-6 text-slate-800 relative overflow-hidden">
    <!-- Decorative Glowing Orbs -->
    <div class="absolute -top-40 -left-40 w-[450px] h-[450px] bg-red-400/5 rounded-full filter blur-[100px] pointer-events-none"></div>
    <div class="absolute -bottom-40 -right-40 w-[450px] h-[450px] bg-slate-400/10 rounded-full filter blur-[100px] pointer-events-none"></div>

    <!-- SQL Injection Hint Modal/Popup -->
    <div id="sqliModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4 z-50 transition-opacity duration-300">
        <div class="bg-white border border-red-150 max-w-sm w-full p-6 rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.08)] relative">
            <div class="text-center">
                <div class="inline-block p-3 rounded-full bg-red-50 text-red-500 mb-4 border border-red-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">SQL Injection Payload</h3>
                <p class="text-slate-500 text-xs mb-4">Anda berada di zona rentan. Gunakan payload di bawah pada kolom input email untuk menembus autentikasi tanpa password:</p>
                
                <div class="bg-slate-50 p-3 rounded-xl border border-slate-200 text-left font-mono text-xs text-red-600 select-all cursor-pointer relative group mb-6" 
                     onclick="navigator.clipboard.writeText(this.innerText.replace('Copy', '').trim()); alert('Payload berhasil disalin ke clipboard!');">
                    ' OR '1'='1
                    <span class="absolute right-2 top-2 text-[10px] text-slate-450 group-hover:text-slate-655 transition-all">Copy</span>
                </div>
                
                <button onclick="document.getElementById('sqliModal').classList.add('hidden')" class="w-full bg-red-600 hover:bg-red-550 text-white font-bold py-3 rounded-xl text-sm transition-all shadow-lg shadow-red-600/10">
                    COBA LAB
                </button>
            </div>
        </div>
    </div>

    <!-- Floating Help Button -->
    <button onclick="document.getElementById('sqliModal').classList.remove('hidden')" class="fixed bottom-6 right-6 px-4 py-3 rounded-full bg-red-600 hover:bg-red-550 text-white shadow-lg shadow-red-600/10 transition-all active:scale-95 z-40 font-bold flex items-center gap-2 text-xs">
        💡 Payload Helper
    </button>

    <div class="w-full max-w-md {{ session('error') ? 'shake' : '' }} relative z-10">
        <div class="mb-8 text-center">
            <!-- Badge VULNERABLE -->
            <div class="inline-block px-4 py-1.5 rounded-full bg-red-50 text-red-600 border border-red-200/50 text-xs font-bold tracking-widest uppercase mb-4">
                ⚠️ VULNERABLE ZONE
            </div>
            
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Cyber Academy</h2>
            <p class="text-slate-500 text-xs mt-1.5 uppercase font-semibold tracking-wider">Insecure Login Gateway</p>
        </div>

        <div class="bg-white/70 backdrop-blur-md p-8 rounded-[2.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.03)] border border-slate-200/60">
            @if (session('error'))
                <div class="mb-6 p-4 bg-red-50 text-red-600 rounded-2xl text-xs font-semibold border border-red-100 flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <form action="/login-insecure" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="text-[10px] font-bold text-slate-400 ml-1 mb-2 block uppercase tracking-widest">Email Address</label>
                    <input type="text" name="email" placeholder="budi@siswa.com" 
                        class="w-full px-5 py-4 bg-slate-50/50 hover:bg-slate-50 focus:bg-white rounded-2xl border border-slate-200 focus:border-red-500 focus:ring-4 focus:ring-red-500/10 outline-none transition-all text-sm text-slate-800" required>
                </div>
                <div>
                    <label class="text-[10px] font-bold text-slate-400 ml-1 mb-2 block uppercase tracking-widest">Password</label>
                    <input type="text" name="password" placeholder="••••••••" 
                        class="w-full px-5 py-4 bg-slate-50/50 hover:bg-slate-50 focus:bg-white rounded-2xl border border-slate-200 focus:border-red-500 focus:ring-4 focus:ring-red-500/10 outline-none transition-all text-sm text-slate-800" required>
                </div>
                <button type="submit" 
                    class="w-full bg-red-600 hover:bg-red-550 text-white py-4 rounded-2xl font-bold shadow-lg shadow-red-600/10 transition-all active:scale-95">
                    INITIALIZE INSECURE LOGIN
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-slate-100 text-center">
                <a href="/" class="inline-flex items-center gap-2 text-xs text-slate-400 hover:text-slate-650 font-semibold transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Portal Lab
                </a>
            </div>
        </div>
    </div>
</body>
</html>
