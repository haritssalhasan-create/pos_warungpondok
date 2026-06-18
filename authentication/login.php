<?php include './action.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login | Warung Averroes</title>
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

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }

        .glow-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            pointer-events: none;
        }

        .brand-icon {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 4px 20px rgba(16,185,129,0.4);
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
        .input-wrap input:focus ~ i,
        .input-wrap:focus-within i { color: #6ee7b7; }

        .toggle-pass {
            position: absolute; right: 12px; top: 50%; transform: translateY(-50%);
            background: none; border: none; color: #475569; cursor: pointer;
            transition: color .2s;
        }
        .toggle-pass:hover { color: #6ee7b7; }

        .btn-login {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 4px 20px rgba(16,185,129,0.4);
            color: #fff; border: none; border-radius: 12px;
            font-weight: 700; font-size: 14px;
            transition: all .2s;
        }
        .btn-login:hover { transform: translateY(-1px); box-shadow: 0 6px 24px rgba(16,185,129,0.55); }
        .btn-login:active { transform: scale(0.98); }
        .btn-login.error { background: linear-gradient(135deg, #ef4444, #dc2626); box-shadow: 0 4px 20px rgba(239,68,68,0.4); }

        .status-pill {
            background: rgba(16,185,129,0.1);
            border: 1px solid rgba(16,185,129,0.25);
            color: #34d399;
        }

        .quote-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(20px);
        }

        .checkbox-custom {
            width: 18px; height: 18px;
            accent-color: #10b981;
            cursor: pointer;
        }
    </style>
</head>

<body class="min-h-screen flex relative overflow-hidden">
    <!-- Decorative glow orbs -->
    <div class="glow-orb" style="width:400px; height:400px; background:#10b981; opacity:0.15; top:-100px; left:-100px;"></div>
    <div class="glow-orb" style="width:500px; height:500px; background:#7c3aed; opacity:0.1; bottom:-150px; right:-100px;"></div>

    <main class="w-full flex flex-row min-h-screen relative z-10">
        <!-- Left: Login Form -->
        <section class="w-full lg:w-1/2 flex flex-col justify-center items-center px-6 sm:px-12 py-12">
            <div class="max-w-md w-full">

                <!-- Branding -->
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-11 h-11 brand-icon rounded-xl flex items-center justify-center text-white">
                        <i class="ti ti-building-store" style="font-size:22px;"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-extrabold text-slate-100 leading-tight">toko alhasan herbal </h1>
                        <p class="text-[10px] uppercase tracking-widest text-emerald-500 font-bold">Admin Terminal</p>
                    </div>
                </div>

                <!-- Form card -->
                <div class="form-card p-8">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-slate-100">Selamat datang kembali</h2>
                        <p class="text-sm text-slate-500 mt-1">Masuk untuk mengakses terminal POS.</p>
                    </div>

                    <form action="action.php?aksi=login" class="space-y-5" id="loginForm" method="post">
                        <!-- Username -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2" for="email">Username</label>
                            <div class="relative input-wrap">
                                <i class="ti ti-mail"></i>
                                <input id="email" name="username" placeholder="john_doe" type="text" />
                            </div>
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2" for="password">Password</label>
                            <div class="relative input-wrap">
                                <i class="ti ti-lock"></i>
                                <input id="password" name="password" placeholder="••••••••" type="password" style="padding-right:42px;" />
                                <button class="toggle-pass" onclick="togglePassword()" type="button">
                                    <i class="ti ti-eye" id="passwordIcon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Helpers -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 text-sm text-slate-400 cursor-pointer">
                                <input class="checkbox-custom" id="remember" name="remember" type="checkbox" />
                                Remember me
                            </label>
                            <a class="text-sm font-semibold text-emerald-400 hover:text-emerald-300 transition-colors" href="#">Forgot password?</a>
                        </div>

                        <!-- Submit -->
                        <button class="w-full h-12 btn-login flex items-center justify-center gap-2" type="submit">
                            <span>Sign In</span>
                            <i class="ti ti-login-2" style="font-size:18px;"></i>
                        </button>
                    </form>

                    <p class="text-center text-sm text-slate-500 mt-6">
                        Belum punya akun?
                        <a class="text-emerald-400 font-semibold hover:underline" href="./register.php">Daftar akun</a>
                    </p>
                </div>
            </div>
        </section>

        <!-- Right: Brand Imagery -->
        <section class="hidden lg:block lg:w-1/2 relative overflow-hidden">
            <img alt="Retail Environment" class="absolute inset-0 w-full h-full object-cover opacity-70"
                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuCADB-YN8lnvek1eHY70tKiJI-zkZnSd37G8N7dPxFumERSrQqQ0NaHuvOGjOt93VUbNNKW1nHP3AVCcTr0EJc0qiyOgXMXgRV5TLjRyZMNJjBMGh29OuPqJkSsTv4Y9coPM-lV1q-C_FgdnhXdYa1zfOvbX43AFE93y3CZnC6nJL0XXSaCYwXpB2RaSzrLUZLqlzADafgNSB5GUDKJbvOysyyKQYqmGIasZ2bPqbaDRWQJRnEvRMfypNCJ0sylU8D6WuL_Ip0nIuuE" />
            <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(15,15,35,0.85), rgba(13,31,18,0.9));"></div>

            <!-- Quote card -->
            <div class="absolute bottom-12 left-12 right-12 p-6 quote-card rounded-2xl text-white">
                <div class="w-11 h-11 rounded-full flex items-center justify-center mb-4"
                     style="background: rgba(16,185,129,0.15); border: 1px solid rgba(16,185,129,0.3);">
                    <i class="ti ti-quote" style="font-size:20px; color:#34d399;"></i>
                </div>
                <p class="text-lg leading-relaxed mb-4">
                    Terminal tercepat dan paling andal untuk usaha lingkungan. Warung Averroes melancarkan operasional saat jam ramai.
                </p>
                <div>
                    <p class="font-semibold text-sm">Aria Averroes</p>
                    <p class="text-xs opacity-60">Founder, Averroes Enterprises</p>
                </div>
            </div>

            <!-- Status pill -->
            <div class="absolute top-8 right-8">
                <div class="flex items-center gap-2 px-4 py-2 status-pill rounded-full backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span class="text-xs font-semibold text-emerald-300">Server Online</span>
                </div>
            </div>
        </section>
    </main>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.className = 'ti ti-eye-off';
            } else {
                passwordInput.type = 'password';
                passwordIcon.className = 'ti ti-eye';
            }
        }

        const loginBtn = document.querySelector('button[type="submit"]');
        loginBtn.addEventListener('click', function() {
            if (!document.getElementById('email').value || !document.getElementById('password').value) {
                this.classList.add('error');
                setTimeout(() => this.classList.remove('error'), 500);
            }
        });
    </script>
</body>
</html>