<?php include './action.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Register - Warung Averroes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <style>
        * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

        body {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0d1f12 100%);
            min-height: 100vh;
            color: #e2e8f0;
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: rgba(255,255,255,0.03); }
        ::-webkit-scrollbar-thumb { background: rgba(110,231,183,0.3); border-radius: 99px; }

        .glow-orb { position: absolute; border-radius: 50%; filter: blur(100px); pointer-events: none; }

        .brand-icon {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 4px 20px rgba(16,185,129,0.4);
        }

        .left-panel {
            background: rgba(255,255,255,0.03);
            border-right: 1px solid rgba(255,255,255,0.06);
        }

        .form-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 20px;
            backdrop-filter: blur(20px);
        }

        .input-wrap input {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            color: #e2e8f0;
            font-size: 14px;
            outline: none;
            transition: all .2s;
            width: 100%;
            padding: 12px 14px 12px 42px;
        }
        .input-wrap input:focus {
            border-color: #6ee7b7;
            background: rgba(110,231,183,0.06);
            box-shadow: 0 0 0 3px rgba(110,231,183,0.12);
        }
        .input-wrap input::placeholder { color: #475569; }
        .input-wrap i {
            position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
            color: #475569; font-size: 18px; transition: color .2s; pointer-events: none;
        }
        .input-wrap:focus-within i { color: #6ee7b7; }

        .toggle-pass {
            position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
            background: none; border: none; color: #475569; cursor: pointer; transition: color .2s;
        }
        .toggle-pass:hover { color: #6ee7b7; }

        .btn-register {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 4px 20px rgba(16,185,129,0.4);
            color: #fff; border: none; border-radius: 12px;
            font-weight: 700; font-size: 14px;
            transition: all .2s;
        }
        .btn-register:hover { transform: translateY(-1px); box-shadow: 0 6px 24px rgba(16,185,129,0.55); }
        .btn-register:active { transform: scale(0.98); }

        .checkbox-custom { width: 18px; height: 18px; accent-color: #10b981; cursor: pointer; }

        .testimonial-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(20px);
        }

        .stat-mini {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col md:flex-row relative overflow-x-hidden">
    <div class="glow-orb" style="width:400px; height:400px; background:#10b981; opacity:0.12; top:-80px; left:30%;"></div>
    <div class="glow-orb" style="width:450px; height:450px; background:#7c3aed; opacity:0.1; bottom:-100px; right:5%;"></div>

    <!-- Left: Narrative -->
    <section class="hidden md:flex md:w-1/2 left-panel relative flex-col justify-between p-12 overflow-hidden z-10">
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-11 h-11 brand-icon rounded-xl flex items-center justify-center text-white">
                    <i class="ti ti-building-store" style="font-size:22px;"></i>
                </div>
                <span class="text-lg font-extrabold text-slate-100">Warung Averroes</span>
            </div>
            <h1 class="text-4xl font-bold text-slate-100 max-w-md leading-tight mb-4">
                Memberdayakan bisnis lokal dengan efisiensi modern.
            </h1>
            <p class="text-slate-400 max-w-sm">
                Bergabung dengan ribuan pemilik toko yang mengelola inventaris, penjualan, dan staf dalam satu dashboard.
            </p>
        </div>

        <!-- Stats -->
        <div class="relative z-10 grid grid-cols-3 gap-3 mb-6">
            <div class="stat-mini p-3 text-center">
                <div class="text-xl font-extrabold text-emerald-400">2.4k+</div>
                <div class="text-[10px] text-slate-500 uppercase tracking-wider mt-1">Toko Aktif</div>
            </div>
            <div class="stat-mini p-3 text-center">
                <div class="text-xl font-extrabold text-emerald-400">98%</div>
                <div class="text-[10px] text-slate-500 uppercase tracking-wider mt-1">Kepuasan</div>
            </div>
            <div class="stat-mini p-3 text-center">
                <div class="text-xl font-extrabold text-emerald-400">24/7</div>
                <div class="text-[10px] text-slate-500 uppercase tracking-wider mt-1">Dukungan</div>
            </div>
        </div>

        <!-- Testimonial -->
        <div class="relative z-10">
            <div class="testimonial-card rounded-2xl p-6">
                <div class="flex gap-1 mb-3">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <i class="ti ti-star-filled" style="color:#fbbf24; font-size:16px;"></i>
                    <?php endfor; ?>
                </div>
               
                
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Right: Registration Form -->
    <section class="flex-1 flex items-center justify-center p-6 relative z-10">
        <div class="w-full max-w-[480px] py-10">
            <!-- Mobile branding -->
            <div class="md:hidden flex items-center gap-3 mb-8">
                <div class="w-10 h-10 brand-icon rounded-xl flex items-center justify-center text-white">
                    <i class="ti ti-building-store" style="font-size:18px;"></i>
                </div>
                <span class="text-base font-extrabold text-slate-100">toko alhasan herbal</span>
            </div>

            <div class="form-card p-8">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-slate-100">Mulai sekarang</h2>
                    <p class="text-sm text-slate-500 mt-1">Buat akun admin untuk mulai mengelola tokomu.</p>
                </div>

                <form class="space-y-4" action="action.php?aksi=register" method="post">
                    <!-- Full Name -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Nama Lengkap</label>
                        <div class="relative input-wrap">
                            <i class="ti ti-user"></i>
                            <input placeholder="John Doe" type="text" name="nama" />
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Alamat</label>
                        <div class="relative input-wrap">
                            <i class="ti ti-map-pin"></i>
                            <input placeholder="Alamat lengkap" type="text" name="alamat" />
                        </div>
                    </div>

                    <!-- No HP -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">No HP</label>
                        <div class="relative input-wrap">
                            <i class="ti ti-phone"></i>
                            <input placeholder="081234567890" type="text" name="no_hp" />
                        </div>
                    </div>

                    <!-- Username -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Username</label>
                        <div class="relative input-wrap">
                            <i class="ti ti-at"></i>
                            <input placeholder="JohnDoe" type="text" name="username" />
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Password</label>
                        <div class="relative input-wrap">
                            <i class="ti ti-lock"></i>
                            <input placeholder="••••••••" type="password" name="password" id="password" style="padding-right:42px;" />
                            <button class="toggle-pass" type="button" id="togglePassBtn">
                                <i class="ti ti-eye" id="passIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Terms -->
                    <label class="flex items-start gap-3 cursor-pointer pt-1">
                        <input class="checkbox-custom mt-0.5" id="terms" type="checkbox" />
                        <span class="text-xs text-slate-500 leading-relaxed">
                            Saya setuju dengan
                            <a class="text-emerald-400 font-semibold hover:underline" href="#">Syarat & Ketentuan</a>
                            dan
                            <a class="text-emerald-400 font-semibold hover:underline" href="#">Kebijakan Privasi</a>
                            toko alhasan herbal.
                        </span>
                    </label>

                    <!-- Submit -->
                    <button class="w-full h-12 btn-register flex items-center justify-center gap-2 mt-2" type="submit">
                        Create Account
                        <i class="ti ti-arrow-right" style="font-size:18px;"></i>
                    </button>
                </form>

                <div class="mt-6 pt-6 border-t border-white/[0.06] flex flex-col items-center gap-3">
                    <p class="text-sm text-slate-500">Sudah punya akun?</p>
                    <a class="inline-flex items-center gap-1.5 text-emerald-400 font-semibold hover:gap-2.5 transition-all text-sm" href="./login.php">
                        Login ke Terminal
                        <i class="ti ti-login-2" style="font-size:16px;"></i>
                    </a>
                </div>
            </div>

            <div class="mt-6 flex justify-center gap-6">
                <a class="text-slate-600 hover:text-slate-400 transition-colors text-[11px] uppercase tracking-widest font-bold" href="#">Support</a>
                <a class="text-slate-600 hover:text-slate-400 transition-colors text-[11px] uppercase tracking-widest font-bold" href="#">Manual</a>
                <a class="text-slate-600 hover:text-slate-400 transition-colors text-[11px] uppercase tracking-widest font-bold" href="#">Enterprise</a>
            </div>
        </div>
    </section>

    <script>
        const toggleBtn = document.getElementById('togglePassBtn');
        const passInput = document.getElementById('password');
        const passIcon  = document.getElementById('passIcon');

        toggleBtn.addEventListener('click', () => {
            const isPass = passInput.type === 'password';
            passInput.type = isPass ? 'text' : 'password';
            passIcon.className = isPass ? 'ti ti-eye-off' : 'ti ti-eye';
        });
    </script>
</body>
</html>