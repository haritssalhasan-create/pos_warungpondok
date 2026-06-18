<?php include 'category_action.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Category - toko</title>
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

        /* ── Divider ── */
        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(251,191,36,0.3), transparent);
            margin: 4px 0;
        }

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
            border: 1px solid rgba(251,191,36,0.3);
            border-radius: 10px;
            padding: 9px 14px 9px 38px;
            color: #e2e8f0;
            font-size: 13px;
            outline: none;
            transition: all .2s;
            width: 220px;
        }
        .search-input:focus {
            border-color: #fbbf24;
            background: rgba(251,191,36,0.07);
            box-shadow: 0 0 0 3px rgba(251,191,36,0.12);
            width: 260px;
        }
        .search-input::placeholder { color: #334155; }

        /* ── View toggle ── */
        .view-btn {
            width: 34px; height: 34px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 8px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: #475569;
            cursor: pointer;
            transition: all .15s;
            font-size: 16px;
        }
        .view-btn.active {
            background: rgba(251,191,36,0.15);
            border-color: rgba(251,191,36,0.35);
            color: #fbbf24;
        }

        /* ── Add button ── */
        .add-btn {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            box-shadow: 0 4px 20px rgba(245,158,11,0.4);
            transition: all .2s;
            color: #1a1a00;
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
        .add-btn:hover { transform: translateY(-1px); box-shadow: 0 6px 24px rgba(245,158,11,0.55); }

        /* ── TABLE VIEW ── */
        .table-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        table { width: 100%; border-collapse: collapse; }

        thead tr {
            background: linear-gradient(90deg, rgba(251,191,36,0.15), rgba(217,119,6,0.06));
            border-bottom: 1px solid rgba(251,191,36,0.2);
        }
        th {
            padding: 13px 20px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #fbbf24;
            text-align: left;
        }
        th:last-child { text-align: right; }

        tbody tr {
            border-bottom: 1px solid rgba(255,255,255,0.05);
            transition: background .15s;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: rgba(251,191,36,0.05); }
        td { padding: 14px 20px; font-size: 13px; color: #cbd5e1; }

        /* ── No badge ── */
        .no-badge {
            display: inline-flex; align-items: center; justify-content: center;
            width: 28px; height: 28px;
            background: rgba(251,191,36,0.12);
            border: 1px solid rgba(251,191,36,0.25);
            border-radius: 6px;
            color: #fbbf24; font-weight: 700; font-size: 11px;
        }

        /* ── Category badge per warna ── */
        .cat-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 700;
            padding: 6px 14px 6px 8px;
            border-radius: 10px;
        }
        .cat-icon {
            width: 28px; height: 28px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px;
        }
        .c-0 { background: rgba(251,191,36,0.12); border: 1px solid rgba(251,191,36,0.3); color: #fbbf24; }
        .c-0 .cat-icon { background: rgba(251,191,36,0.2); }
        .c-1 { background: rgba(16,185,129,0.12); border: 1px solid rgba(16,185,129,0.3); color: #34d399; }
        .c-1 .cat-icon { background: rgba(16,185,129,0.2); }
        .c-2 { background: rgba(167,139,250,0.12); border: 1px solid rgba(167,139,250,0.3); color: #c4b5fd; }
        .c-2 .cat-icon { background: rgba(167,139,250,0.2); }
        .c-3 { background: rgba(56,189,248,0.12); border: 1px solid rgba(56,189,248,0.3); color: #7dd3fc; }
        .c-3 .cat-icon { background: rgba(56,189,248,0.2); }
        .c-4 { background: rgba(251,113,133,0.12); border: 1px solid rgba(251,113,133,0.3); color: #fb7185; }
        .c-4 .cat-icon { background: rgba(251,113,133,0.2); }
        .c-5 { background: rgba(52,211,153,0.12); border: 1px solid rgba(52,211,153,0.3); color: #6ee7b7; }
        .c-5 .cat-icon { background: rgba(52,211,153,0.2); }
        .c-6 { background: rgba(251,146,60,0.12); border: 1px solid rgba(251,146,60,0.3); color: #fb923c; }
        .c-6 .cat-icon { background: rgba(251,146,60,0.2); }

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

        /* ── GRID VIEW ── */
        .grid-view {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 14px;
        }

        .cat-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            padding: 20px 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            text-align: center;
            transition: all .2s;
            position: relative;
            overflow: hidden;
            cursor: default;
        }
        .cat-card:hover {
            transform: translateY(-3px);
            border-color: rgba(251,191,36,0.3);
            box-shadow: 0 8px 24px rgba(0,0,0,0.3);
        }
        .cat-card-icon {
            width: 56px; height: 56px;
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 26px;
        }
        .cat-card-name {
            font-weight: 700;
            font-size: 14px;
            line-height: 1.3;
        }
        .cat-card-actions {
            display: flex;
            gap: 8px;
            margin-top: 4px;
        }
        .cat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
        }
        .cc-0::before { background: linear-gradient(90deg, #f59e0b, #fbbf24); }
        .cc-1::before { background: linear-gradient(90deg, #10b981, #34d399); }
        .cc-2::before { background: linear-gradient(90deg, #7c3aed, #c4b5fd); }
        .cc-3::before { background: linear-gradient(90deg, #0ea5e9, #7dd3fc); }
        .cc-4::before { background: linear-gradient(90deg, #e11d48, #fb7185); }
        .cc-5::before { background: linear-gradient(90deg, #059669, #6ee7b7); }
        .cc-6::before { background: linear-gradient(90deg, #ea580c, #fb923c); }

        /* ── hidden ── */
        .hidden-view { display: none !important; }

        /* ── Bottom nav ── */
        .bottom-nav {
            background: rgba(10,10,25,0.97);
            border-top: 1px solid rgba(255,255,255,0.07);
            backdrop-filter: blur(20px);
        }
        .bottom-nav a { color: #475569; transition: color .15s; }
        .bottom-nav a:hover { color: #fbbf24; }
        .pb-safe { padding-bottom: env(safe-area-inset-bottom); }
    </style>
</head>

<body class="flex min-h-screen">
    <?php require_once '../layout/sidebar.php'; ?>

    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <?php
        $page_name = "Category";
        require_once '../layout/top_navbar.php';
        ?>

        <div class="flex-1 overflow-y-auto p-6 space-y-5"
             style="background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0d1f12 100%);">

            <?php
            $data     = readCategory($con);
            $all_rows = [];
            while ($r = $data->fetch_assoc()) $all_rows[] = $r;
            $total = count($all_rows);

            // Icon mapping berdasarkan nama kategori (keyword matching)
            function getCatIcon(string $nama): string {
                $n = strtolower($nama);
                if (str_contains($n, 'makan') || str_contains($n, 'food') || str_contains($n, 'snack'))   return 'ti-bowl';
                if (str_contains($n, 'minum') || str_contains($n, 'drink') || str_contains($n, 'air'))     return 'ti-bottle';
                if (str_contains($n, 'pokok') || str_contains($n, 'staple') || str_contains($n, 'beras'))  return 'ti-wheat';
                if (str_contains($n, 'susu') || str_contains($n, 'dairy') || str_contains($n, 'milk'))     return 'ti-droplet';
                if (str_contains($n, 'buah') || str_contains($n, 'fruit') || str_contains($n, 'sayur'))    return 'ti-apple';
                if (str_contains($n, 'daging') || str_contains($n, 'meat') || str_contains($n, 'ayam'))    return 'ti-meat';
                if (str_contains($n, 'bumbu') || str_contains($n, 'spice') || str_contains($n, 'rempah'))  return 'ti-herb';
                if (str_contains($n, 'kebersihan') || str_contains($n, 'sabun') || str_contains($n, 'clean')) return 'ti-sparkles';
                if (str_contains($n, 'rokok') || str_contains($n, 'tembakau'))                             return 'ti-smoking';
                if (str_contains($n, 'alat') || str_contains($n, 'tools'))                                 return 'ti-tools';
                return 'ti-tag'; // default
            }
            ?>

            <!-- Page title -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center"
                     style="background: linear-gradient(135deg,#f59e0b,#d97706); box-shadow: 0 4px 15px rgba(245,158,11,.4);">
                    <i class="ti ti-tag" style="font-size:20px; color:#fff;"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-slate-100">
                        Manajemen <span style="color:#fbbf24;">Kategori</span>
                    </h1>
                    <p class="text-xs text-slate-500">Warung Averroes · <?= $total ?> kategori produk terdaftar</p>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Controls -->
            <div class="ctrl-bar">
                <div style="display:flex; align-items:center; gap:10px; flex-wrap:wrap; flex:1;">
                    <!-- Search -->
                    <div style="position:relative;">
                        <i class="ti ti-search"
                           style="position:absolute; left:11px; top:50%; transform:translateY(-50%); font-size:15px; color:#fbbf24; pointer-events:none;"></i>
                        <input type="text" id="srch" placeholder="Cari nama kategori…" class="search-input" />
                    </div>

                    <!-- View toggle -->
                    <div style="display:flex; gap:4px;">
                        <button class="view-btn active" id="btnTable" onclick="setView('table')" title="Table view">
                            <i class="ti ti-layout-list"></i>
                        </button>
                        <button class="view-btn" id="btnGrid" onclick="setView('grid')" title="Grid view">
                            <i class="ti ti-layout-grid"></i>
                        </button>
                    </div>
                </div>

                <a href="insert.php" class="add-btn">
                    <i class="ti ti-plus" style="font-size:18px;"></i>
                    Tambah Kategori
                </a>
            </div>

            <!-- ── TABLE VIEW ── -->
            <div id="tableView" class="table-card">
                <div style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th style="width:56px; text-align:center;">#</th>
                                <th>Nama Kategori</th>
                                <th>Icon</th>
                                <th style="text-align:right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php foreach ($all_rows as $i => $row):
                                $ci   = $i % 7;
                                $icon = getCatIcon($row['nama']);
                                $nama = htmlspecialchars($row['nama']);
                            ?>
                            <tr data-name="<?= strtolower($nama) ?>">
                                <td style="text-align:center;">
                                    <span class="no-badge"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>
                                </td>
                                <td>
                                    <span class="cat-badge c-<?= $ci ?>">
                                        <span class="cat-icon">
                                            <i class="<?= $icon ?>"></i>
                                        </span>
                                        <?= $nama ?>
                                    </span>
                                </td>
                                <td>
                                    <span style="font-size:11px; color:#334155; font-family:monospace;"><?= $icon ?></span>
                                </td>
                                <td style="text-align:right;">
                                    <div style="display:flex; align-items:center; justify-content:flex-end; gap:6px;">
                                        <a class="btn-edit" href="edit.php?aksi=edit&id=<?= $row['id'] ?>" title="Edit">
                                            <i class="ti ti-pencil" style="font-size:15px;"></i>
                                        </a>
                                        <a class="btn-del"
                                           href="category_action.php?aksi=delete&id=<?= $row['id'] ?>"
                                           onclick="return confirm('Yakin mau hapus kategori «<?= htmlspecialchars(addslashes($row['nama'])) ?>»?')"
                                           title="Hapus">
                                            <i class="ti ti-trash" style="font-size:15px;"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Footer -->
                <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 20px; border-top:1px solid rgba(255,255,255,0.06); background:rgba(0,0,0,0.1);">
                    <span style="font-size:12px; color:#475569;">
                        Total: <span id="visibleCount" style="color:#fbbf24; font-weight:700;"><?= $total ?></span> kategori
                    </span>
                </div>
            </div>

            <!-- ── GRID VIEW ── -->
            <div id="gridView" class="hidden-view">
                <div class="grid-view" id="gridContainer">
                    <?php foreach ($all_rows as $i => $row):
                        $ci   = $i % 7;
                        $icon = getCatIcon($row['nama']);
                        $nama = htmlspecialchars($row['nama']);
                        $colors = ['#fbbf24','#34d399','#c4b5fd','#7dd3fc','#fb7185','#6ee7b7','#fb923c'];
                        $bgColors = [
                            'rgba(251,191,36,0.15)',
                            'rgba(16,185,129,0.15)',
                            'rgba(167,139,250,0.15)',
                            'rgba(56,189,248,0.15)',
                            'rgba(251,113,133,0.15)',
                            'rgba(52,211,153,0.15)',
                            'rgba(251,146,60,0.15)',
                        ];
                        $borderColors = [
                            'rgba(251,191,36,0.3)',
                            'rgba(16,185,129,0.3)',
                            'rgba(167,139,250,0.3)',
                            'rgba(56,189,248,0.3)',
                            'rgba(251,113,133,0.3)',
                            'rgba(52,211,153,0.3)',
                            'rgba(251,146,60,0.3)',
                        ];
                    ?>
                    <div class="cat-card cc-<?= $ci ?>" data-name="<?= strtolower($nama) ?>">
                        <div class="cat-card-icon" style="background:<?= $bgColors[$ci] ?>; border:1px solid <?= $borderColors[$ci] ?>;">
                            <i class="<?= $icon ?>" style="font-size:26px; color:<?= $colors[$ci] ?>;"></i>
                        </div>
                        <div class="cat-card-name" style="color:<?= $colors[$ci] ?>;"><?= $nama ?></div>
                        <div class="cat-card-actions">
                            <a class="btn-edit" href="edit.php?aksi=edit&id=<?= $row['id'] ?>" title="Edit">
                                <i class="ti ti-pencil" style="font-size:14px;"></i>
                            </a>
                            <a class="btn-del"
                               href="category_action.php?aksi=delete&id=<?= $row['id'] ?>"
                               onclick="return confirm('Yakin mau hapus kategori «<?= htmlspecialchars(addslashes($row['nama'])) ?>»?')"
                               title="Hapus">
                                <i class="ti ti-trash" style="font-size:14px;"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
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

<script>
// ── View toggle ──
function setView(v) {
    const tbl  = document.getElementById('tableView');
    const grd  = document.getElementById('gridView');
    const btnT = document.getElementById('btnTable');
    const btnG = document.getElementById('btnGrid');

    if (v === 'table') {
        tbl.classList.remove('hidden-view');
        grd.classList.add('hidden-view');
        btnT.classList.add('active');
        btnG.classList.remove('active');
    } else {
        tbl.classList.add('hidden-view');
        grd.classList.remove('hidden-view');
        btnT.classList.remove('active');
        btnG.classList.add('active');
    }
    localStorage.setItem('cat_view', v);
}

// Restore view preference
(function() {
    const saved = localStorage.getItem('cat_view');
    if (saved === 'grid') setView('grid');
})();

// ── Search filter ──
document.getElementById('srch').addEventListener('input', function () {
    const q = this.value.trim().toLowerCase();

    // Table rows
    document.querySelectorAll('#tbody tr[data-name]').forEach(tr => {
        tr.style.display = (!q || tr.dataset.name.includes(q)) ? '' : 'none';
    });

    // Grid cards
    let vis = 0;
    document.querySelectorAll('#gridContainer .cat-card[data-name]').forEach(card => {
        const show = !q || card.dataset.name.includes(q);
        card.style.display = show ? '' : 'none';
        if (show) vis++;
    });

    // Update counter
    const counter = document.getElementById('visibleCount');
    if (counter) {
        const tableVis = [...document.querySelectorAll('#tbody tr[data-name]')]
            .filter(r => r.style.display !== 'none').length;
        counter.textContent = tableVis;
    }
});
</script>
</html>