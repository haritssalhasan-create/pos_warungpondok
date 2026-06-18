<?php include 'transaksi_action.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tambah Transaksi - toko</title>
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
        ::-webkit-scrollbar-thumb { background: rgba(110,231,183,0.3); border-radius: 99px; }
 
        .form-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            backdrop-filter: blur(10px);
        }
 
        .field-input, .field-select {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(110,231,183,0.3);
            border-radius: 10px;
            color: #e2e8f0;
            font-size: 14px;
            outline: none;
            transition: all .2s;
            width: 100%;
            padding: 12px 14px;
        }
        .field-input:focus, .field-select:focus {
            border-color: #6ee7b7;
            background: rgba(110,231,183,0.08);
            box-shadow: 0 0 0 3px rgba(110,231,183,0.15);
        }
        .field-input::placeholder { color: #475569; }
        .field-select option { background: #1a1a3e; color: #e2e8f0; }
 
        .field-input[type="date"]::-webkit-calendar-picker-indicator { filter: invert(0.7); cursor: pointer; }
 
        .field-label {
            font-size: 11px; font-weight: 700; letter-spacing: .08em;
            text-transform: uppercase; color: #6ee7b7; margin-bottom: 8px; display: block;
        }
 
        .input-prefix-wrap { position: relative; }
        .input-prefix {
            position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
            font-size: 14px; font-weight: 600; color: #6ee7b7; pointer-events: none;
        }
        .input-prefix-wrap .field-input { padding-left: 40px; }
 
        .btn-save {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 4px 20px rgba(16,185,129,0.4);
            color: #fff; border: none; border-radius: 10px;
            font-weight: 700; font-size: 14px; padding: 12px 28px;
            display: inline-flex; align-items: center; gap: 8px;
            transition: all .2s; text-decoration: none; cursor: pointer;
        }
        .btn-save:hover { transform: translateY(-1px); box-shadow: 0 6px 24px rgba(16,185,129,0.55); }
 
        .btn-cancel {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.12);
            color: #94a3b8; border-radius: 10px;
            font-weight: 600; font-size: 14px; padding: 12px 28px;
            display: inline-flex; align-items: center; gap: 8px;
            transition: all .2s; text-decoration: none;
        }
        .btn-cancel:hover { background: rgba(255,255,255,0.08); color: #e2e8f0; }
 
        .divider { height: 1px; background: linear-gradient(to right, transparent, rgba(110,231,183,0.3), transparent); margin: 4px 0; }
 
        .bottom-nav { background: rgba(10,10,25,0.97); border-top: 1px solid rgba(255,255,255,0.07); backdrop-filter: blur(20px); }
        .bottom-nav a { color: #475569; transition: color .15s; }
        .bottom-nav a:hover { color: #6ee7b7; }
        .bottom-nav a.active-nav { color: #34d399; }
        .pb-safe { padding-bottom: env(safe-area-inset-bottom); }
    </style>
</head>
 
<body class="flex min-h-screen">
    <?php require_once '../layout/sidebar.php'; ?>
 
    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <?php
        $page_name = "Tambah Transaksi";
        require_once '../layout/top_navbar.php';
        ?>
 
        <div class="flex-1 overflow-y-auto p-6"
             style="background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0d1f12 100%);">
 
            <div class="w-full max-w-2xl mx-auto space-y-5">
 
                <!-- Page title -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white"
                         style="background: linear-gradient(135deg,#10b981,#059669); box-shadow: 0 4px 15px rgba(16,185,129,.35);">
                        <span class="material-symbols-outlined" style="font-size:20px;">point_of_sale</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-slate-100">Tambah <span style="color:#6ee7b7;">Transaksi</span></h1>
                        <p class="text-xs text-slate-500">toko · Buat entri transaksi baru</p>
                    </div>
                </div>
 
                <div class="divider"></div>
 
                <!-- Form -->
                <form action="transaksi_action.php?aksi=insert" method="post">
                    <div class="form-card p-6 space-y-5">
 
                        <div>
                            <label class="field-label">User / Kasir</label>
                            <select name="id_user" class="field-select">
                                <?php
                                $users = showDataUser($con);
                                while ($u = $users->fetch_assoc()):
                                ?>
                                    <option value="<?= $u['id'] ?>"><?= htmlspecialchars($u['nama']) ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
 
                        <div>
                            <label class="field-label">Total Pembelian</label>
                            <div class="input-prefix-wrap">
                                <span class="input-prefix">Rp</span>
                                <input class="field-input" placeholder="cth. 150000" type="number" name="total_pembelian" />
                            </div>
                        </div>
 
                        <div>
                            <label class="field-label">Tanggal Transaksi</label>
                            <input class="field-input" type="date" name="tgl_transaksi" />
                        </div>
 
                        <div class="flex gap-3 pt-2">
                            <button type="submit" class="btn-save">
                                <i class="ti ti-device-floppy" style="font-size:18px;"></i>
                                Simpan
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
            <a class="active-nav flex flex-col items-center gap-0.5" href="#">
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