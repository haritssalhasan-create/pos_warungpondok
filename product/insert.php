<?php include './product_action.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Warung Averroes</title>
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
            display: flex; align-items: center; gap: 8px;
        }

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
        }
        .prefix-wrap .field-input { padding-left: 40px; }

        /* Image drop area */
        .img-drop {
            border: 2px dashed rgba(110,231,183,0.25);
            border-radius: 12px;
            padding: 24px;
            text-align: center;
            transition: all .2s;
            position: relative;
        }
        .img-drop:hover { border-color: rgba(110,231,183,0.5); background: rgba(110,231,183,0.04); }
        .img-drop input[type="file"] {
            position: absolute; inset: 0;
            opacity: 0; cursor: pointer; width: 100%; height: 100%;
        }
        .img-drop-preview {
            width: 90px; height: 90px;
            border-radius: 10px;
            object-fit: cover;
            margin: 0 auto 10px;
            border: 1px solid rgba(255,255,255,0.1);
            display: none;
        }

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

        .divider { height: 1px; background: linear-gradient(to right, transparent, rgba(110,231,183,0.2), transparent); margin: 4px 0; }

        .bottom-nav { background: rgba(10,10,25,0.97); border-top: 1px solid rgba(255,255,255,0.07); backdrop-filter: blur(20px); }
        .bottom-nav a { color: #475569; transition: color .15s; }
        .bottom-nav a:hover { color: #6ee7b7; }
        .pb-safe { padding-bottom: env(safe-area-inset-bottom); }
    </style>
</head>

<body class="flex min-h-screen">
    <?php require_once '../layout/sidebar.php'; ?>

    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <?php
        $page_name = "Tambah Produk";
        require_once '../layout/top_navbar.php';
        ?>

        <div class="flex-1 overflow-y-auto p-6"
             style="background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0d1f12 100%);">

            <div class="w-full max-w-2xl mx-auto space-y-5 pb-10">

                <!-- Page title -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white"
                         style="background: linear-gradient(135deg,#10b981,#059669); box-shadow: 0 4px 15px rgba(16,185,129,.35);">
                        <i class="ti ti-package" style="font-size:18px;"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-slate-100">Tambah <span style="color:#34d399;">Produk</span></h1>
                        <p class="text-xs text-slate-500">Daftarkan produk baru ke inventaris toko</p>
                    </div>
                </div>

                <div class="divider"></div>

                <!-- Form -->
                <div class="form-card">
                    <div class="card-header">
                        <i class="ti ti-package" style="font-size:16px; color:#6ee7b7;"></i>
                        <span style="font-weight:600; font-size:13px; color:#f1f5f9;">Informasi Produk Baru</span>
                    </div>

                    <form action="product_action.php?aksi=insert" method="post" enctype="multipart/form-data">
                        <div style="padding:20px; display:flex; flex-direction:column; gap:18px;">

                            <!-- Kategori -->
                            <div>
                                <label class="field-label">Kategori</label>
                                <select name="category_id" class="field-select" required>
                                    <option value="" disabled selected>Pilih kategori...</option>
                                    <?php
                                    $kat = isset($con) ? mysqli_query($con, "SELECT * FROM category ORDER BY nama ASC") : null;
                                    if ($kat && mysqli_num_rows($kat) > 0):
                                        while ($k = mysqli_fetch_array($kat)):
                                    ?>
                                        <option value="<?= $k['id'] ?>"><?= htmlspecialchars($k['nama']) ?></option>
                                    <?php endwhile; endif; ?>
                                </select>
                            </div>

                            <!-- Nama -->
                            <div>
                                <label class="field-label">Nama Produk</label>
                                <input class="field-input" type="text" name="nama" placeholder="cth. Indomie Goreng" required />
                            </div>

                            <!-- Stok & Harga -->
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
                                <div>
                                    <label class="field-label">Stok</label>
                                    <input class="field-input" type="number" name="stock" placeholder="0" min="0" required />
                                    <p class="field-hint">Stok ≤ 5 ditandai hampir habis</p>
                                </div>
                                <div>
                                    <label class="field-label">Harga</label>
                                    <div class="prefix-wrap">
                                        <span class="prefix-text">Rp</span>
                                        <input class="field-input" type="number" name="harga" placeholder="0" min="0" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Gambar dengan drag area -->
                            <div>
                                <label class="field-label">Gambar Produk</label>
                                <div class="img-drop" id="dropArea">
                                    <input type="file" name="image" accept="image/*" id="imgInput" required />
                                    <img id="imgPreview" class="img-drop-preview" alt="Preview" />
                                    <div id="dropText">
                                        <i class="ti ti-cloud-upload" style="font-size:28px; color:#334155; display:block; margin-bottom:8px;"></i>
                                        <p style="font-size:13px; color:#6ee7b7; font-weight:600;">Klik atau seret gambar ke sini</p>
                                        <p style="font-size:11px; color:#334155; margin-top:4px;">JPG, PNG, WebP — maks. 2MB</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label class="field-label">Deskripsi</label>
                                <input class="field-input" type="text" name="deskripsi" placeholder="Deskripsi singkat produk..." required />
                            </div>

                            <div style="display:flex; gap:12px; padding-top:4px;">
                                <button type="submit" class="btn-save">
                                    <i class="ti ti-plus" style="font-size:18px;"></i>
                                    Simpan Produk
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
    const imgInput   = document.getElementById('imgInput');
    const imgPreview = document.getElementById('imgPreview');
    const dropText   = document.getElementById('dropText');
    const dropArea   = document.getElementById('dropArea');

    imgInput.addEventListener('change', (e) => {
        if (e.target.files && e.target.files[0]) {
            const url = URL.createObjectURL(e.target.files[0]);
            imgPreview.src = url;
            imgPreview.style.display = 'block';
            dropText.style.display = 'none';
            dropArea.style.borderColor = 'rgba(110,231,183,0.6)';
            dropArea.style.background = 'rgba(110,231,183,0.05)';
        }
    });
</script>
</html>