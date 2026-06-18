<?php include './product_action.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Produk - toko</title>
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

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: rgba(255,255,255,0.03); }
        ::-webkit-scrollbar-thumb { background: rgba(110,231,183,0.3); border-radius: 99px; }

        /* ── Stats cards ── */
        .stat-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: border-color .2s, transform .2s;
            backdrop-filter: blur(10px);
        }
        .stat-card:hover { border-color: rgba(110,231,183,0.25); transform: translateY(-2px); }

        .stat-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            font-size: 20px;
        }
        .si-green { background: rgba(16,185,129,0.15); border: 1px solid rgba(16,185,129,0.3); color: #34d399; }
        .si-amber { background: rgba(251,191,36,0.12); border: 1px solid rgba(251,191,36,0.3); color: #fbbf24; }
        .si-red   { background: rgba(251,113,133,0.12); border: 1px solid rgba(251,113,133,0.3); color: #fb7185; }
        .si-blue  { background: rgba(96,165,250,0.12); border: 1px solid rgba(96,165,250,0.3); color: #60a5fa; }

        .stat-label { font-size: 11px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: #475569; margin-bottom: 2px; }
        .stat-value { font-size: 22px; font-weight: 800; color: #f1f5f9; line-height: 1; }

        /* ── Control bar ── */
        .ctrl-bar {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 16px;
            padding: 14px 18px;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .search-input {
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(110,231,183,0.3);
            border-radius: 10px;
            padding: 9px 14px 9px 38px;
            color: #e2e8f0;
            font-size: 13px;
            outline: none;
            transition: all .2s;
            width: 220px;
        }
        .search-input:focus {
            border-color: #6ee7b7;
            background: rgba(110,231,183,0.08);
            box-shadow: 0 0 0 3px rgba(110,231,183,0.12);
            width: 260px;
        }
        .search-input::placeholder { color: #334155; }

        .filter-select {
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 10px;
            padding: 9px 14px;
            color: #94a3b8;
            font-size: 13px;
            outline: none;
            cursor: pointer;
            transition: border-color .2s;
        }
        .filter-select:focus { border-color: rgba(110,231,183,0.4); color: #e2e8f0; }
        .filter-select option { background: #1a1a3e; color: #e2e8f0; }

        .add-btn {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 4px 20px rgba(16,185,129,0.4);
            transition: all .2s;
            color: #fff;
            font-weight: 700;
            font-size: 13px;
            padding: 10px 18px;
            border-radius: 10px;
            border: none;
            display: flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            white-space: nowrap;
        }
        .add-btn:hover { transform: translateY(-1px); box-shadow: 0 6px 24px rgba(16,185,129,0.55); }

        /* ── Table ── */
        .table-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        table { width: 100%; border-collapse: collapse; }

        thead tr {
            background: linear-gradient(90deg, rgba(16,185,129,0.15), rgba(5,150,105,0.06));
            border-bottom: 1px solid rgba(110,231,183,0.2);
        }
        th {
            padding: 13px 16px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #6ee7b7;
            text-align: left;
        }

        tbody tr {
            border-bottom: 1px solid rgba(255,255,255,0.05);
            transition: background .15s;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: rgba(110,231,183,0.05); }
        td { padding: 13px 16px; font-size: 13px; color: #cbd5e1; }

        /* ── Product thumb ── */
        .prod-thumb {
            width: 38px; height: 38px;
            border-radius: 9px;
            border: 1px solid rgba(255,255,255,0.1);
            overflow: hidden;
            flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
            background: rgba(255,255,255,0.05);
        }
        .prod-thumb img { width: 100%; height: 100%; object-fit: cover; }

        /* ── No badge ── */
        .no-badge {
            display: inline-flex; align-items: center; justify-content: center;
            width: 28px; height: 28px;
            background: rgba(110,231,183,0.12);
            border: 1px solid rgba(110,231,183,0.25);
            border-radius: 6px;
            color: #6ee7b7; font-weight: 700; font-size: 11px;
            font-variant-numeric: tabular-nums;
        }

        /* ── Category pill ── */
        .cat-pill {
            font-size: 11px; font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            background: rgba(96,165,250,0.12);
            border: 1px solid rgba(96,165,250,0.25);
            color: #93c5fd;
            white-space: nowrap;
        }

        /* ── Price ── */
        .price-text {
            font-weight: 700; font-size: 13px;
            color: #fbbf24;
            font-variant-numeric: tabular-nums;
            letter-spacing: -.01em;
        }

        /* ── Stock bar ── */
        .stok-bar-track {
            height: 5px;
            border-radius: 3px;
            background: rgba(255,255,255,0.07);
            overflow: hidden;
            min-width: 60px;
            flex: 1;
        }
        .stok-bar-fill { height: 100%; border-radius: 3px; transition: width .4s ease; }
        .fill-high { background: linear-gradient(90deg, #10b981, #34d399); }
        .fill-med  { background: linear-gradient(90deg, #f59e0b, #fbbf24); }
        .fill-low  { background: linear-gradient(90deg, #ef4444, #fb7185); }

        /* ── Stock badges ── */
        .badge-ok  { background: rgba(16,185,129,0.12); border: 1px solid rgba(16,185,129,0.25); color: #34d399; }
        .badge-low { background: rgba(251,191,36,0.12); border: 1px solid rgba(251,191,36,0.3); color: #fbbf24; }
        .badge-out { background: rgba(251,113,133,0.15); border: 1px solid rgba(251,113,133,0.35); color: #fb7185; }
        .stok-badge {
            display: inline-flex; align-items: center; gap: 4px;
            font-size: 10px; font-weight: 700;
            padding: 2px 8px; border-radius: 20px;
            letter-spacing: .04em;
        }

        /* ── Action buttons ── */
        .btn-edit {
            display: inline-flex; align-items: center; justify-content: center;
            width: 32px; height: 32px;
            background: rgba(96,165,250,0.12);
            border: 1px solid rgba(96,165,250,0.3);
            border-radius: 8px; color: #60a5fa;
            transition: all .15s; text-decoration: none;
        }
        .btn-edit:hover { background: rgba(96,165,250,0.22); box-shadow: 0 0 12px rgba(96,165,250,0.3); transform: translateY(-1px); }

        .btn-del {
            display: inline-flex; align-items: center; justify-content: center;
            width: 32px; height: 32px;
            background: rgba(251,113,133,0.1);
            border: 1px solid rgba(251,113,133,0.3);
            border-radius: 8px; color: #fb7185;
            transition: all .15s; text-decoration: none;
        }
        .btn-del:hover { background: rgba(251,113,133,0.2); box-shadow: 0 0 12px rgba(251,113,133,0.3); transform: translateY(-1px); }

        /* ── Footer ── */
        .table-footer {
            display: flex; align-items: center; justify-content: space-between;
            padding: 12px 16px;
            border-top: 1px solid rgba(255,255,255,0.06);
            background: rgba(0,0,0,0.1);
        }
        .page-btn {
            width: 30px; height: 30px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 8px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: #64748b;
            cursor: pointer;
            transition: all .15s;
            font-size: 12px; font-weight: 700;
        }
        .page-btn:hover { border-color: rgba(110,231,183,0.3); color: #6ee7b7; }
        .page-btn.active { background: linear-gradient(135deg, #10b981, #059669); border-color: transparent; color: #fff; box-shadow: 0 2px 10px rgba(16,185,129,0.4); }

        /* ── Empty state ── */
        .empty-state { text-align: center; padding: 64px 20px; }
        .empty-state i { font-size: 48px; color: #1e293b; display: block; margin-bottom: 12px; }

        /* ── Bottom nav ── */
        .bottom-nav {
            background: rgba(10,10,25,0.97);
            border-top: 1px solid rgba(255,255,255,0.07);
            backdrop-filter: blur(20px);
        }
        .bottom-nav a { color: #475569; transition: color .15s; }
        .bottom-nav a:hover { color: #6ee7b7; }
        .pb-safe { padding-bottom: env(safe-area-inset-bottom); }

        /* ── Gold divider ── */
        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(110,231,183,0.2), transparent);
            margin: 4px 0;
        }
    </style>
</head>

<body class="flex min-h-screen">
    <?php require_once '../layout/sidebar.php'; ?>

    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <?php
        $page_name = "Produk";
        require_once '../layout/top_navbar.php';
        ?>

        <div class="flex-1 overflow-y-auto p-6 space-y-5"
             style="background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0d1f12 100%);">

            <?php
            $res_all  = readProduct($con);
            $all_rows = [];
            while ($r = mysqli_fetch_assoc($res_all)) $all_rows[] = $r;
            $total     = count($all_rows);
            $low_stock = count(array_filter($all_rows, fn($r) => (int)$r['stock'] <= 5 && (int)$r['stock'] > 0));
            $out_stock = count(array_filter($all_rows, fn($r) => (int)$r['stock'] === 0));
            $total_val = array_sum(array_map(fn($r) => (float)$r['harga'] * (int)$r['stock'], $all_rows));
            $max_stok  = max(1, max(array_column($all_rows, 'stock') ?: [1]));
            ?>

            <!-- Page title -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white"
                     style="background: linear-gradient(135deg,#10b981,#059669); box-shadow: 0 4px 15px rgba(16,185,129,.35);">
                    <i class="ti ti-package" style="font-size:20px;"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-slate-100">Manajemen <span style="color:#34d399;">Produk</span></h1>
                    <p class="text-xs text-slate-500">Warung Averroes · Kelola stok & data produk</p>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Stats Grid -->
            <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(180px,1fr)); gap:12px;">
                <div class="stat-card">
                    <div class="stat-icon si-green"><i class="ti ti-packages"></i></div>
                    <div>
                        <div class="stat-label">Total Produk</div>
                        <div class="stat-value"><?= number_format($total) ?></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-amber"><i class="ti ti-alert-triangle"></i></div>
                    <div>
                        <div class="stat-label">Stok Rendah</div>
                        <div class="stat-value" style="color:#fbbf24;"><?= $low_stock ?></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-red"><i class="ti ti-shopping-cart-off"></i></div>
                    <div>
                        <div class="stat-label">Habis</div>
                        <div class="stat-value" style="color:#fb7185;"><?= $out_stock ?></div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-blue"><i class="ti ti-currency-dollar"></i></div>
                    <div>
                        <div class="stat-label">Total Nilai</div>
                        <div class="stat-value" style="font-size:16px; color:#60a5fa;">
                            Rp <?= $total_val >= 1_000_000
                                ? number_format($total_val / 1_000_000, 1) . 'M'
                                : number_format($total_val, 0, ',', '.') ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <div class="ctrl-bar">
                <div style="display:flex; align-items:center; gap:10px; flex-wrap:wrap; flex:1;">
                    <!-- Search -->
                    <div style="position:relative;">
                        <span class="material-symbols-outlined"
                              style="position:absolute; left:10px; top:50%; transform:translateY(-50%); font-size:16px; color:#34d399; pointer-events:none;">search</span>
                        <input type="text" id="srch" placeholder="Cari nama produk…" class="search-input" />
                    </div>

                    <!-- Category filter -->
                    <div style="position:relative;">
                        <select id="catFilter" class="filter-select">
                            <option value="">Semua Kategori</option>
                            <?php
                            $cats = array_unique(array_column($all_rows, 'category'));
                            foreach ($cats as $c):
                            ?>
                                <option><?= htmlspecialchars($c) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Stock filter -->
                    <div style="position:relative;">
                        <select id="stokFilter" class="filter-select">
                            <option value="">Semua Stok</option>
                            <option value="low">Stok Rendah (≤5)</option>
                            <option value="ok">Stok Aman</option>
                            <option value="out">Habis</option>
                        </select>
                    </div>
                </div>

                <a href="insert.php" class="add-btn">
                    <i class="ti ti-plus" style="font-size:18px;"></i>
                    Tambah Produk
                </a>
            </div>

            <!-- Table -->
            <div class="table-card">
                <div style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th style="width:50px; text-align:center;">#</th>
                                <th>Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Level Stok</th>
                                <th style="text-align:center; width:100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php if (empty($all_rows)): ?>
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="ti ti-package-off"></i>
                                        <p style="color:#475569; font-size:14px;">Belum ada produk.</p>
                                        <a href="insert.php" style="color:#34d399; font-size:13px; font-weight:600;">+ Tambah sekarang</a>
                                    </div>
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($all_rows as $idx => $row):
                                $stok    = (int)$row['stock'];
                                $harga   = (float)$row['harga'];
                                $pct     = min(100, round($stok / $max_stok * 100));
                                $fillCls = $stok === 0 ? 'fill-low' : ($stok <= 5 ? 'fill-low' : ($stok <= 20 ? 'fill-med' : 'fill-high'));
                                $gambar  = !empty($row['image']) ? './image/' . htmlspecialchars($row['image']) : null;
                                $nama_esc = htmlspecialchars($row['nama']);
                            ?>
                            <tr data-name="<?= strtolower($nama_esc) ?>"
                                data-kat="<?= strtolower(htmlspecialchars($row['category'])) ?>"
                                data-stok="<?= $stok ?>">

                                <td style="text-align:center;">
                                    <span class="no-badge"><?= str_pad($idx + 1, 2, '0', STR_PAD_LEFT) ?></span>
                                </td>

                                <td>
                                    <div style="display:flex; align-items:center; gap:10px;">
                                        <div class="prod-thumb">
                                            <?php if ($gambar): ?>
                                                <img src="<?= $gambar ?>" alt="<?= $nama_esc ?>">
                                            <?php else: ?>
                                                <i class="ti ti-package" style="font-size:16px; color:#334155;"></i>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <div style="font-weight:600; font-size:13px; color:#f1f5f9; line-height:1.3;">
                                                <?= $nama_esc ?>
                                            </div>
                                            <div style="font-size:11px; color:#334155; margin-top:2px; font-family:monospace;">
                                                ID #<?= htmlspecialchars($row['id']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td><span class="cat-pill"><?= htmlspecialchars($row['category']) ?></span></td>

                                <td><span class="price-text">Rp <?= number_format($harga, 0, ',', '.') ?></span></td>

                                <td>
                                    <div style="display:flex; align-items:center; gap:10px;">
                                        <div class="stok-bar-track">
                                            <div class="stok-bar-fill <?= $fillCls ?>" style="width:<?= $pct ?>%"></div>
                                        </div>
                                        <div style="flex-shrink:0;">
                                            <div style="font-size:13px; font-weight:700; color:#f1f5f9; font-variant-numeric:tabular-nums;">
                                                <?= $stok ?> unit
                                            </div>
                                            <?php if ($stok === 0): ?>
                                                <span class="stok-badge badge-out" style="margin-top:3px; display:inline-flex;">
                                                    <i class="ti ti-x" style="font-size:10px;"></i> OUT OF STOCK
                                                </span>
                                            <?php elseif ($stok <= 5): ?>
                                                <span class="stok-badge badge-low" style="margin-top:3px; display:inline-flex;">
                                                    <i class="ti ti-alert-triangle" style="font-size:10px;"></i> RENDAH
                                                </span>
                                            <?php else: ?>
                                                <span class="stok-badge badge-ok" style="margin-top:3px; display:inline-flex;">
                                                    <i class="ti ti-check" style="font-size:10px;"></i> AMAN
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>

                                <td style="text-align:center;">
                                    <div style="display:flex; align-items:center; justify-content:center; gap:6px;">
                                        <a class="btn-edit" href="./product_action.php?aksi=edit&id=<?= $row['id'] ?>" title="Edit">
                                            <i class="ti ti-pencil" style="font-size:15px;"></i>
                                        </a>
                                        <a class="btn-del"
                                           href="./product_action.php?aksi=delete&id=<?= $row['id'] ?>"
                                           onclick="return confirm('Hapus produk «<?= htmlspecialchars(addslashes($row['nama'])) ?>»?')"
                                           title="Hapus">
                                            <i class="ti ti-trash" style="font-size:15px;"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Footer -->
                <div class="table-footer">
                    <span style="font-size:12px; color:#475569;">
                        Menampilkan <span id="visibleCount" style="color:#6ee7b7; font-weight:700;"><?= $total ?></span>
                        dari <?= $total ?> produk
                    </span>
                    <div style="display:flex; align-items:center; gap:4px;">
                        <button class="page-btn"><i class="ti ti-chevron-left" style="font-size:14px;"></i></button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn"><i class="ti ti-chevron-right" style="font-size:14px;"></i></button>
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
(function () {
    const srch       = document.getElementById('srch');
    const catFilter  = document.getElementById('catFilter');
    const stokFilter = document.getElementById('stokFilter');
    const rows       = [...document.querySelectorAll('#tbody tr[data-name]')];
    const counter    = document.getElementById('visibleCount');

    function filter() {
        const q   = srch.value.trim().toLowerCase();
        const cat = catFilter.value.toLowerCase();
        const stk = stokFilter.value;
        let vis   = 0;

        rows.forEach(tr => {
            const name = tr.dataset.name;
            const kat  = tr.dataset.kat;
            const stok = parseInt(tr.dataset.stok, 10);

            const mQ   = !q   || name.includes(q);
            const mCat = !cat || kat === cat;
            const mStk = !stk
                || (stk === 'out' && stok === 0)
                || (stk === 'low' && stok <= 5 && stok > 0)
                || (stk === 'ok'  && stok > 5);

            const show = mQ && mCat && mStk;
            tr.style.display = show ? '' : 'none';
            if (show) vis++;
        });

        counter.textContent = vis;
    }

    srch.addEventListener('input', filter);
    catFilter.addEventListener('change', filter);
    stokFilter.addEventListener('change', filter);
})();
</script>
</html>