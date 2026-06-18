<?php include './product_action.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Warung Averroes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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

        /* ── Cards ── */
        .form-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(90deg, rgba(16,185,129,0.15), rgba(5,150,105,0.06));
            border-bottom: 1px solid rgba(110,231,183,0.2);
            padding: 14px 20px;
            display: flex; align-items: center; justify-content: space-between;
        }

        /* ── Info grid (data saat ini) ── */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
            gap: 10px;
            padding: 16px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }

        .info-item {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 10px;
            padding: 10px 12px;
        }

        .info-label {
            font-size: 10px; font-weight: 700;
            text-transform: uppercase; letter-spacing: .06em;
            color: #475569; margin-bottom: 4px;
        }

        .info-value {
            font-size: 13px; font-weight: 600;
            color: #f1f5f9;
        }

        /* ── Form fields ── */
        .field-input, .field-select {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(110,231,183,0.25);
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
            background: rgba(110,231,183,0.06);
            box-shadow: 0 0 0 3px rgba(110,231,183,0.12);
        }
        .field-input::placeholder { color: #475569; }
        .field-select option { background: #1a1a3e; color: #e2e8f0; }

        .field-input[type="file"] { cursor: pointer; }
        .field-input[type="file"]::-webkit-file-upload-button {
            background: rgba(110,231,183,0.12);
            border: 1px solid rgba(110,231,183,0.3);
            border-radius: 6px;
            color: #6ee7b7;
            padding: 4px 12px;
            font-size: 12px; font-weight: 600;
            cursor: pointer;
            margin-right: 10px;
            transition: background .15s;
        }
        .field-input[type="file"]::-webkit-file-upload-button:hover {
            background: rgba(110,231,183,0.2);
        }

        .field-label {
            font-size: 11px; font-weight: 700; letter-spacing: .08em;
            text-transform: uppercase; color: #6ee7b7; margin-bottom: 8px; display: block;
        }

        .field-hint { font-size: 11px; color: #334155; margin-top: 5px; }

        .prefix-wrap { position: relative; }
        .prefix-text {
            position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
            font-size: 13px; font-weight: 600; color: #6ee7b7; pointer-events: none;
            font-variant-numeric: tabular-nums;
        }
        .prefix-wrap .field-input { padding-left: 40px; }

        /* ── Image preview ── */
        .img-preview-wrap {
            position: relative;
            width: 100px; height: 100px;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.04);
            flex-shrink: 0;
        }
        .img-preview-wrap img {
            width: 100%; height: 100%; object-fit: cover;
        }
        .img-preview-placeholder {
            width: 100%; height: 100%;
            display: flex; align-items: center; justify-content: center;
            color: #334155;
        }

        /* ── Buttons ── */
        .btn-save {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 4px 20px rgba(16,185,129,0.4);
            color: #fff; border: none; border-radius: 10px;
            font-weight: 700; font-size: 14px; padding: 12px 28px;
            display: inline-flex; align-items: center; gap: 8px;
            transition: all .2s; cursor: pointer;
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

        /* ── Danger zone ── */
        .danger-card {
            background: rgba(251,113,133,0.04);
            border: 1px solid rgba(251,113,133,0.15);
            border-radius: 16px;
            overflow: hidden;
        }

        .danger-header {
            background: rgba(251,113,133,0.08);
            border-bottom: 1px solid rgba(251,113,133,0.15);
            padding: 12px 20px;
            display: flex; align-items: center; gap: 8px;
            font-size: 13px; font-weight: 700;
            color: #fb7185;
        }

        .btn-danger {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(251,113,133,0.15);
            border: 1px solid rgba(251,113,133,0.35);
            color: #fb7185;
            border-radius: 8px;
            font-size: 13px; font-weight: 600;
            padding: 10px 18px;
            text-decoration: none;
            transition: all .15s;
        }
        .btn-danger:hover { background: rgba(251,113,133,0.25); box-shadow: 0 0 14px rgba(251,113,133,0.3); }

        /* ── Edit badge ── */
        .edit-badge {
            display: inline-flex; align-items: center; gap: 4px;
            background: rgba(251,191,36,0.12);
            border: 1px solid rgba(251,191,36,0.3);
            color: #fbbf24;
            font-size: 11px; font-weight: 700;
            padding: 4px 10px; border-radius: 20px;
        }

        /* ── Divider ── */
        .divider { height: 1px; background: linear-gradient(to right, transparent, rgba(110,231,183,0.2), transparent); margin: 4px 0; }

        /* ── Bottom nav ── */
        .bottom-nav { background: rgba(10,10,25,0.97); border-top: 1px solid rgba(255,255,255,0.07); backdrop-filter: blur(20px); }
        .bottom-nav a { color: #475569; transition: color .15s; }
        .bottom-nav a:hover { color: #6ee7b7; }
        .pb-safe { padding-bottom: env(safe-area-inset-bottom); }
    </style>
</head>

<body class="flex min-h-screen">
    <?php
    require_once '../layout/sidebar.php';
    $data = showDataEditProduct($con, $_GET['id']);
    ?>

    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <?php
        $page_name = "Edit Produk";
        require_once '../layout/top_navbar.php';
        ?>

        <div class="flex-1 overflow-y-auto p-6"
             style="background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0d1f12 100%);">

            <div class="w-full max-w-2xl mx-auto space-y-5 pb-10">

                <!-- Page title -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white"
                         style="background: linear-gradient(135deg,#10b981,#059669); box-shadow: 0 4px 15px rgba(16,185,129,.35);">
                        <i class="ti ti-pencil" style="font-size:18px;"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-slate-100">Edit <span style="color:#34d399;">Produk</span></h1>
                        <p class="text-xs text-slate-500">Perbarui informasi dan stok produk</p>
                    </div>
                </div>

                <div class="divider"></div>

                <!-- Current Data Card -->
                <div class="form-card">
                    <div class="card-header">
                        <div style="display:flex; align-items:center; gap:8px;">
                            <i class="ti ti-info-circle" style="font-size:16px; color:#6ee7b7;"></i>
                            <span style="font-weight:600; font-size:13px; color:#f1f5f9;">Data Saat Ini</span>
                        </div>
                        <span class="edit-badge">
                            <i class="ti ti-pencil" style="font-size:10px;"></i>
                            Sedang diedit
                        </span>
                    </div>

                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Nama</div>
                            <div class="info-value"><?= htmlspecialchars($data['nama']) ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Stok</div>
                            <div class="info-value" style="color:<?= (int)$data['stock'] <= 5 ? '#fbbf24' : '#34d399'; ?>">
                                <?= $data['stock'] ?> unit
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Harga</div>
                            <div class="info-value" style="color:#fbbf24;">
                                Rp <?= number_format($data['harga'], 0, ',', '.') ?>
                            </div>
                        </div>
                        <div class="info-item" style="grid-column: 1 / -1;">
                            <div class="info-label">Deskripsi</div>
                            <div class="info-value"><?= htmlspecialchars($data['deskripsi']) ?></div>
                        </div>
                    </div>
                </div>

                <!-- Form Edit -->
                <div class="form-card">
                    <div class="card-header">
                        <div style="display:flex; align-items:center; gap:8px;">
                            <i class="ti ti-forms" style="font-size:16px; color:#6ee7b7;"></i>
                            <span style="font-weight:600; font-size:13px; color:#f1f5f9;">Form Perubahan</span>
                        </div>
                    </div>

                    <form action="index.php?aksi=update&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">

                        <div style="padding:20px; display:flex; flex-direction:column; gap:18px;">

                            <!-- Nama -->
                            <div>
                                <label class="field-label">Nama Produk</label>
                                <input class="field-input" type="text" name="edit_nama"
                                       value="<?= htmlspecialchars($data['nama']) ?>" placeholder="Nama produk" required />
                            </div>

                            <!-- Stok & Harga -->
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
                                <div>
                                    <label class="field-label">Stok</label>
                                    <input class="field-input" type="number" name="edit_stok"
                                           value="<?= $data['stock'] ?>" min="0" required />
                                    <p class="field-hint">Stok ≤ 5 ditandai hampir habis</p>
                                </div>
                                <div>
                                    <label class="field-label">Harga</label>
                                    <div class="prefix-wrap">
                                        <span class="prefix-text">Rp</span>
                                        <input class="field-input" type="number" name="edit_harga"
                                               value="<?= $data['harga'] ?>" min="0" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Gambar -->
                            <div>
                                <label class="field-label">Gambar Produk</label>
                                <div style="display:flex; gap:14px; align-items:flex-start;">
                                    <div class="img-preview-wrap">
                                        <img id="gambar" src="./image/<?= htmlspecialchars($data['image']) ?>" alt="Preview"
                                             onerror="this.style.display='none'; document.getElementById('img-placeholder').style.display='flex';">
                                        <div id="img-placeholder" class="img-preview-placeholder" style="display:none;">
                                            <i class="ti ti-photo" style="font-size:28px;"></i>
                                        </div>
                                    </div>
                                    <div style="flex:1;">
                                        <input class="field-input" type="file" name="edit_gambar" id="input_gambar"
                                               accept="image/*" />
                                        <p class="field-hint">Biarkan kosong jika tidak ingin mengganti gambar. Format: JPG, PNG, WebP.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label class="field-label">Deskripsi</label>
                                <input class="field-input" type="text" name="edit_deskripsi"
                                       value="<?= htmlspecialchars($data['deskripsi']) ?>" placeholder="Deskripsi singkat produk" required />
                            </div>

                            <div style="display:flex; gap:12px; padding-top:4px;">
                                <button type="submit" class="btn-save">
                                    <i class="ti ti-device-floppy" style="font-size:18px;"></i>
                                    Simpan Perubahan
                                </button>
                                <a href="index.php" class="btn-cancel">
                                    <i class="ti ti-x" style="font-size:18px;"></i>
                                    Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Danger Zone -->
                <div class="danger-card">
                    <div class="danger-header">
                        <i class="ti ti-alert-triangle" style="font-size:16px;"></i>
                        Zona Berbahaya
                    </div>
                    <div style="padding:16px 20px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px;">
                        <div>
                            <p style="font-size:13px; font-weight:600; color:#f1f5f9; margin-bottom:4px;">Hapus produk ini</p>
                            <p style="font-size:12px; color:#64748b;">Tindakan ini bersifat permanen dan tidak dapat dikembalikan.</p>
                        </div>
                        <a href="./produk_aksi.php?aksi=delete&id=<?= $_GET['id'] ?>"
                           class="btn-danger"
                           onclick="return confirm('Yakin ingin menghapus produk «<?= htmlspecialchars(addslashes($data['nama'])) ?>»? Tindakan ini tidak dapat dibatalkan.')">
                            <i class="ti ti-trash" style="font-size:16px;"></i>
                            Hapus Produk
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Nav Mobile -->
        <nav class="bottom-nav md:hidden fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-2 pb-safe h-16">
            <a class="flex flex-col items-center gap-0.5" href="#">
                <i class="ti ti-shopping-cart" style="font-size:22px;"></i>
                <span style="font-size:10px; font-weight:600;">POS</span>
            </a>
            <a class="flex flex-col items-center gap-0.5" style="color:#34d399;" href="#">
                <i class="ti ti-package" style="font-size:22px;"></i>
                <span style="font-size:10px; font-weight:600;">Produk</span>
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

<script>
    const imageEl = document.getElementById('gambar');
    const inputEl = document.getElementById('input_gambar');
    const placeholder = document.getElementById('img-placeholder');

    inputEl.addEventListener('change', (e) => {
        if (e.target.files && e.target.files[0]) {
            const url = URL.createObjectURL(e.target.files[0]);
            imageEl.src = url;
            imageEl.style.display = 'block';
            placeholder.style.display = 'none';
        }
    });
</script>
</html>