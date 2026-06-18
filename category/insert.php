<?php include 'category_action.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tambah Kategori - Warung Averroes</title>
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

        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; vertical-align: middle; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: rgba(255,255,255,0.03); }
        ::-webkit-scrollbar-thumb { background: rgba(251,191,36,0.3); border-radius: 99px; }

        .form-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            backdrop-filter: blur(10px);
        }

        .field-input {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(251,191,36,0.25);
            border-radius: 10px;
            color: #e2e8f0;
            font-size: 14px;
            outline: none;
            transition: all .2s;
            width: 100%;
            padding: 12px 14px;
        }
        .field-input:focus {
            border-color: #fbbf24;
            background: rgba(251,191,36,0.06);
            box-shadow: 0 0 0 3px rgba(251,191,36,0.12);
        }
        .field-input::placeholder { color: #475569; }

        .field-label {
            font-size: 11px; font-weight: 700; letter-spacing: .08em;
            text-transform: uppercase; color: #fbbf24; margin-bottom: 8px; display: block;
        }

        .btn-save {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            box-shadow: 0 4px 20px rgba(245,158,11,0.4);
            color: #1a1a00; border: none; border-radius: 10px;
            font-weight: 700; font-size: 14px; padding: 12px 28px;
            display: inline-flex; align-items: center; gap: 8px;
            transition: all .2s; text-decoration: none; cursor: pointer;
        }
        .btn-save:hover { transform: translateY(-1px); box-shadow: 0 6px 24px rgba(245,158,11,0.55); }

        .btn-cancel {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.12);
            color: #94a3b8; border-radius: 10px;
            font-weight: 600; font-size: 14px; padding: 12px 28px;
            display: inline-flex; align-items: center; gap: 8px;
            transition: all .2s; text-decoration: none;
        }
        .btn-cancel:hover { background: rgba(255,255,255,0.08); color: #e2e8f0; }

        .divider { height: 1px; background: linear-gradient(to right, transparent, rgba(251,191,36,0.3), transparent); margin: 4px 0; }

        .info-box {
            background: rgba(251,191,36,0.06);
            border: 1px solid rgba(251,191,36,0.15);
            border-radius: 10px;
            padding: 12px 16px;
            display: flex; align-items: flex-start; gap: 10px;
        }

        .bottom-nav { background: rgba(10,10,25,0.97); border-top: 1px solid rgba(255,255,255,0.07); backdrop-filter: blur(20px); }
        .bottom-nav a { color: #475569; transition: color .15s; }
        .bottom-nav a:hover { color: #fbbf24; }
        .pb-safe { padding-bottom: env(safe-area-inset-bottom); }
    </style>
</head>

<body class="flex min-h-screen">
    <?php require_once '../layout/sidebar.php'; ?>

    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <?php
        $page_name = "Tambah Kategori";
        require_once '../layout/top_navbar.php';
        ?>

        <div class="flex-1 overflow-y-auto p-6"
             style="background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0d1f12 100%);">

            <div class="w-full max-w-2xl mx-auto space-y-5">

                <!-- Page title -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center"
                         style="background: linear-gradient(135deg,#f59e0b,#d97706); box-shadow: 0 4px 15px rgba(245,158,11,.4);">
                        <i class="ti ti-plus" style="font-size:18px; color:#fff;"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-slate-100">Tambah <span style="color:#fbbf24;">Kategori</span></h1>
                        <p class="text-xs text-slate-500">Buat entri kategori baru untuk produk tokomu</p>
                    </div>
                </div>

                <div class="divider"></div>

                <!-- Form -->
                <form action="category_action.php?aksi=insert" method="post">
                    <div class="form-card p-6 space-y-5">

                        <div>
                            <label class="field-label" for="nama_category">Nama Kategori</label>
                            <input class="field-input" id="nama_category" placeholder="cth. Minuman" type="text" name="nama_category" autofocus />
                        </div>

                        <div class="info-box">
                            <i class="ti ti-info-circle" style="font-size:18px; color:#fbbf24; flex-shrink:0; margin-top:2px;"></i>
                            <p style="font-size:12px; color:#94a3b8; line-height:1.5;">
                                Kategori akan digunakan untuk mengelompokkan produk dalam inventaris dan tampil sebagai filter di halaman produk & POS.
                            </p>
                        </div>

                        <div class="flex gap-3 pt-2">
                            <button type="submit" class="btn-save">
                                <i class="ti ti-device-floppy" style="font-size:18px;"></i>
                                Simpan Kategori
                            </button>
                            <a href="index.php" class="btn-cancel">
                                <i class="ti ti-x" style="font-size:18px;"></i>
                                Batal
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <!-- Bottom Nav Mobile -->
        <nav class="bottom-nav md:hidden fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-2 pb-safe h-16">
            <a class="flex flex-col items-center gap-0.5" href="#">
                <i class="ti ti-shopping-cart" style="font-size:22px;"></i>
                <span style="font-size:10px; font-weight:600;">POS</span>
            </a>
            <a class="flex flex-col items-center gap-0.5" href="#">
                <i class="ti ti-package" style="font-size:22px;"></i>
                <span style="font-size:10px; font-weight:600;">Stok</span>
            </a>
            <a class="flex flex-col items-center gap-0.5" href="#">
                <i class="ti ti-receipt" style="font-size:22px;"></i>
                <span style="font-size:10px; font-weight:600;">Transaksi</span>
            </a>
            <a class="flex flex-col items-center gap-0.5" href="#">
                <i class="ti ti-menu-2" style="font-size:22px;"></i>
                <span style="font-size:10px; font-weight:600;">Menu</span>
            </a>
        </nav>
    </main>
</body>
</html>