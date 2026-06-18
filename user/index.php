<?php include 'user_action.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>User - toko</title>
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
            white-space: nowrap;
        }
        th:last-child { text-align: right; }

        tbody tr {
            border-bottom: 1px solid rgba(255,255,255,0.05);
            transition: background .15s;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: rgba(110,231,183,0.05); }
        td { padding: 13px 16px; font-size: 13px; color: #cbd5e1; vertical-align: middle; }

        /* ── No badge ── */
        .no-badge {
            display: inline-flex; align-items: center; justify-content: center;
            width: 28px; height: 28px;
            background: rgba(110,231,183,0.12);
            border: 1px solid rgba(110,231,183,0.25);
            border-radius: 6px;
            color: #6ee7b7; font-weight: 700; font-size: 11px;
        }

        /* ── User avatar ── */
        .user-avatar {
            width: 36px; height: 36px;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 14px;
            flex-shrink: 0;
        }
        /* Warna avatar berputar */
        .av-0 { background: rgba(167,139,250,0.2); border: 1px solid rgba(167,139,250,0.35); color: #c4b5fd; }
        .av-1 { background: rgba(16,185,129,0.15); border: 1px solid rgba(16,185,129,0.3); color: #34d399; }
        .av-2 { background: rgba(251,191,36,0.15); border: 1px solid rgba(251,191,36,0.3); color: #fbbf24; }
        .av-3 { background: rgba(56,189,248,0.15); border: 1px solid rgba(56,189,248,0.3); color: #7dd3fc; }
        .av-4 { background: rgba(251,113,133,0.15); border: 1px solid rgba(251,113,133,0.3); color: #fb7185; }

        /* ── Info text ── */
        .info-primary { font-weight: 600; font-size: 13px; color: #f1f5f9; line-height: 1.3; }
        .info-sub { font-size: 11px; color: #475569; margin-top: 2px; display: flex; align-items: center; gap: 4px; }

        /* ── Contact badge ── */
        .contact-badge {
            display: inline-flex; align-items: center; gap: 5px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.09);
            border-radius: 8px;
            padding: 4px 10px;
            font-size: 12px; color: #94a3b8;
            font-variant-numeric: tabular-nums;
        }

        /* ── Username badge ── */
        .username-badge {
            display: inline-flex; align-items: center; gap: 5px;
            background: rgba(56,189,248,0.1);
            border: 1px solid rgba(56,189,248,0.2);
            border-radius: 8px;
            padding: 4px 10px;
            font-size: 12px; color: #7dd3fc;
            font-family: monospace;
        }

        /* ── Role badge — warna per nama ── */
        .role-badge {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 11px; font-weight: 700;
            padding: 4px 10px; border-radius: 20px;
            letter-spacing: .03em;
        }
        .rb-0 { background: rgba(167,139,250,0.12); border: 1px solid rgba(167,139,250,0.3); color: #c4b5fd; }
        .rb-1 { background: rgba(16,185,129,0.12); border: 1px solid rgba(16,185,129,0.3); color: #34d399; }
        .rb-2 { background: rgba(251,191,36,0.12); border: 1px solid rgba(251,191,36,0.3); color: #fbbf24; }
        .rb-3 { background: rgba(56,189,248,0.12); border: 1px solid rgba(56,189,248,0.3); color: #7dd3fc; }
        .rb-4 { background: rgba(251,113,133,0.12); border: 1px solid rgba(251,113,133,0.3); color: #fb7185; }

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

        /* ── Divider ── */
        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(110,231,183,0.2), transparent);
            margin: 4px 0;
        }

        /* ── Stats strip ── */
        .stat-strip {
            background: rgba(16,185,129,0.07);
            border: 1px solid rgba(16,185,129,0.15);
            border-radius: 12px;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .strip-item { display: flex; align-items: center; gap: 8px; }
        .strip-val { font-size: 20px; font-weight: 800; color: #34d399; }
        .strip-lbl { font-size: 12px; color: #475569; }

        /* ── Bottom nav ── */
        .bottom-nav {
            background: rgba(10,10,25,0.97);
            border-top: 1px solid rgba(255,255,255,0.07);
            backdrop-filter: blur(20px);
        }
        .bottom-nav a { color: #475569; transition: color .15s; }
        .bottom-nav a:hover { color: #6ee7b7; }
        .pb-safe { padding-bottom: env(safe-area-inset-bottom); }
    </style>
</head>

<body class="flex min-h-screen">
    <?php require_once '../layout/sidebar.php'; ?>

    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <?php
        $page_name = "User";
        require_once '../layout/top_navbar.php';
        ?>

        <div class="flex-1 overflow-y-auto p-6 space-y-5"
             style="background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0d1f12 100%);">

            <?php
            // Ambil semua data dulu untuk stat strip
            $data     = readUser($con);
            $all_rows = [];
            while ($r = $data->fetch_assoc()) $all_rows[] = $r;
            $total_user = count($all_rows);

            // Kumpulkan role unik untuk filter & warna
            $roles_unique = array_values(array_unique(array_column($all_rows, 'nama_role')));
            $role_color_map = [];
            foreach ($roles_unique as $i => $rn) {
                $role_color_map[$rn] = $i % 5;
            }
            ?>

            <!-- Page title -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white"
                     style="background: linear-gradient(135deg,#10b981,#059669); box-shadow: 0 4px 15px rgba(16,185,129,.35);">
                    <i class="ti ti-users" style="font-size:20px;"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-slate-100">Manajemen <span style="color:#34d399;">User</span></h1>
                    <p class="text-xs text-slate-500">Warung Averroes · Kelola akun & hak akses pengguna</p>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Stat strip -->
            <div class="stat-strip">
                <div class="strip-item">
                    <i class="ti ti-users" style="font-size:20px; color:#34d399;"></i>
                    <div>
                        <div class="strip-val"><?= $total_user ?></div>
                        <div class="strip-lbl">Total User</div>
                    </div>
                </div>
                <div style="width:1px; height:32px; background:rgba(255,255,255,0.08);"></div>
                <?php foreach ($roles_unique as $i => $rn):
                    $cnt = count(array_filter($all_rows, fn($r) => $r['nama_role'] === $rn));
                    $ci  = $i % 5;
                    $colors = ['#c4b5fd','#34d399','#fbbf24','#7dd3fc','#fb7185'];
                ?>
                <div class="strip-item">
                    <i class="ti ti-shield" style="font-size:16px; color:<?= $colors[$ci] ?>;"></i>
                    <div>
                        <div style="font-size:18px; font-weight:800; color:<?= $colors[$ci] ?>;"><?= $cnt ?></div>
                        <div class="strip-lbl"><?= htmlspecialchars($rn) ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Controls -->
            <div class="ctrl-bar">
                <div style="display:flex; align-items:center; gap:10px; flex-wrap:wrap; flex:1;">
                    <div style="position:relative;">
                        <span class="material-symbols-outlined"
                              style="position:absolute; left:10px; top:50%; transform:translateY(-50%); font-size:16px; color:#34d399; pointer-events:none;">search</span>
                        <input type="text" id="srch" placeholder="Cari nama, username…" class="search-input" />
                    </div>
                    <select id="roleFilter" class="filter-select">
                        <option value="">Semua Role</option>
                        <?php foreach ($roles_unique as $rn): ?>
                            <option value="<?= strtolower(htmlspecialchars($rn)) ?>"><?= htmlspecialchars($rn) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <a href="insert.php" class="add-btn">
                    <i class="ti ti-user-plus" style="font-size:18px;"></i>
                    Tambah User
                </a>
            </div>

            <!-- Table -->
            <div class="table-card">
                <div style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th style="width:50px; text-align:center;">#</th>
                                <th>User</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th style="text-align:right; width:90px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php foreach ($all_rows as $idx => $row):
                                $nama      = htmlspecialchars($row['nama']);
                                $inisial   = strtoupper(substr($nama, 0, 2));
                                $av_ci     = $idx % 5;
                                $role_name = htmlspecialchars($row['nama_role']);
                                $rb_ci     = $role_color_map[$row['nama_role']] ?? 0;
                            ?>
                            <tr data-name="<?= strtolower($nama) ?>"
                                data-username="<?= strtolower(htmlspecialchars($row['username'])) ?>"
                                data-role="<?= strtolower($role_name) ?>">

                                <td style="text-align:center;">
                                    <span class="no-badge"><?= str_pad($idx + 1, 2, '0', STR_PAD_LEFT) ?></span>
                                </td>

                                <!-- User: avatar + nama -->
                                <td>
                                    <div style="display:flex; align-items:center; gap:10px;">
                                        <div class="user-avatar av-<?= $av_ci ?>"><?= $inisial ?></div>
                                        <div>
                                            <div class="info-primary"><?= $nama ?></div>
                                            <div class="info-sub">
                                                <i class="ti ti-id-badge" style="font-size:11px;"></i>
                                                ID #<?= htmlspecialchars($row['id']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Alamat -->
                                <td>
                                    <div style="display:flex; align-items:flex-start; gap:5px; max-width:160px;">
                                        <i class="ti ti-map-pin" style="font-size:13px; color:#475569; margin-top:1px; flex-shrink:0;"></i>
                                        <span style="font-size:12px; color:#94a3b8; line-height:1.4;">
                                            <?= htmlspecialchars($row['alamat']) ?>
                                        </span>
                                    </div>
                                </td>

                                <!-- No HP -->
                                <td>
                                    <span class="contact-badge">
                                        <i class="ti ti-phone" style="font-size:12px;"></i>
                                        <?= htmlspecialchars($row['no_hp']) ?>
                                    </span>
                                </td>

                                <!-- Username -->
                                <td>
                                    <span class="username-badge">
                                        <i class="ti ti-at" style="font-size:12px;"></i>
                                        <?= htmlspecialchars($row['username']) ?>
                                    </span>
                                </td>

                                <!-- Role -->
                                <td>
                                    <span class="role-badge rb-<?= $rb_ci ?>">
                                        <i class="ti ti-shield-check" style="font-size:11px;"></i>
                                        <?= $role_name ?>
                                    </span>
                                </td>

                                <!-- Aksi -->
                                <td style="text-align:right;">
                                    <div style="display:flex; align-items:center; justify-content:flex-end; gap:6px;">
                                        <a class="btn-edit" href="edit.php?aksi=edit&id=<?= $row['id'] ?>" title="Edit">
                                            <i class="ti ti-pencil" style="font-size:15px;"></i>
                                        </a>
                                        <a class="btn-del"
                                           href="user_action.php?aksi=delete&id=<?= $row['id'] ?>"
                                           onclick="return confirm('Yakin mau hapus user «<?= htmlspecialchars(addslashes($row['nama'])) ?>»?')"
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
                <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 16px; border-top:1px solid rgba(255,255,255,0.06); background:rgba(0,0,0,0.1);">
                    <span style="font-size:12px; color:#475569;">
                        Menampilkan <span id="visibleCount" style="color:#6ee7b7; font-weight:700;"><?= $total_user ?></span>
                        dari <?= $total_user ?> user
                    </span>
                    <div style="display:flex; align-items:center; gap:4px;">
                        <button style="width:30px; height:30px; display:flex; align-items:center; justify-content:center; border-radius:8px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); color:#64748b; cursor:pointer;">
                            <i class="ti ti-chevron-left" style="font-size:14px;"></i>
                        </button>
                        <button style="width:30px; height:30px; display:flex; align-items:center; justify-content:center; border-radius:8px; background:linear-gradient(135deg,#10b981,#059669); border:none; color:#fff; font-size:12px; font-weight:700; cursor:pointer; box-shadow:0 2px 10px rgba(16,185,129,0.4);">1</button>
                        <button style="width:30px; height:30px; display:flex; align-items:center; justify-content:center; border-radius:8px; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); color:#64748b; cursor:pointer;">
                            <i class="ti ti-chevron-right" style="font-size:14px;"></i>
                        </button>
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
(function () {
    const srch       = document.getElementById('srch');
    const roleFilter = document.getElementById('roleFilter');
    const rows       = [...document.querySelectorAll('#tbody tr[data-name]')];
    const counter    = document.getElementById('visibleCount');

    function filter() {
        const q    = srch.value.trim().toLowerCase();
        const role = roleFilter.value.toLowerCase();
        let vis    = 0;

        rows.forEach(tr => {
            const mQ    = !q    || tr.dataset.name.includes(q) || tr.dataset.username.includes(q);
            const mRole = !role || tr.dataset.role === role;
            const show  = mQ && mRole;
            tr.style.display = show ? '' : 'none';
            if (show) vis++;
        });

        counter.textContent = vis;
    }

    srch.addEventListener('input', filter);
    roleFilter.addEventListener('change', filter);
})();
</script>
</html>