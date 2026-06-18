<?php include 'role_action.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Role - toko</title>
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

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }

        /* Control bar */
        .ctrl-bar {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 16px;
            padding: 16px 20px;
            backdrop-filter: blur(10px);
        }

        .search-input {
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(110,231,183,0.3);
            border-radius: 10px;
            padding: 10px 14px 10px 40px;
            color: #e2e8f0;
            font-size: 13px;
            outline: none;
            transition: all .2s;
            width: 100%;
        }
        .search-input:focus {
            border-color: #6ee7b7;
            background: rgba(110,231,183,0.08);
            box-shadow: 0 0 0 3px rgba(110,231,183,0.15);
        }
        .search-input::placeholder { color: #64748b; }

        /* Add button */
        .add-btn {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 4px 20px rgba(16,185,129,0.4);
            transition: all .2s;
            color: #fff;
            font-weight: 600;
            font-size: 13px;
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            display: flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            white-space: nowrap;
        }
        .add-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 24px rgba(16,185,129,0.55);
        }

        /* Table */
        .table-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        table { width: 100%; border-collapse: collapse; }

        thead tr {
            background: linear-gradient(90deg, rgba(167,139,250,0.15), rgba(109,40,217,0.06));
            border-bottom: 1px solid rgba(167,139,250,0.25);
        }
        th {
            padding: 14px 20px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #c4b5fd;
            text-align: left;
        }
        th:last-child { text-align: right; }

        tbody tr {
            border-bottom: 1px solid rgba(255,255,255,0.05);
            transition: background .15s;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: rgba(167,139,250,0.05); }
        td { padding: 14px 20px; font-size: 13px; color: #cbd5e1; }

        /* No badge */
        .no-badge {
            display: inline-flex; align-items: center; justify-content: center;
            width: 28px; height: 28px;
            background: rgba(167,139,250,0.15);
            border: 1px solid rgba(167,139,250,0.3);
            border-radius: 6px;
            color: #c4b5fd; font-weight: 700; font-size: 12px;
        }

        /* Role badge — warna berputar berdasarkan index */
        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 10px;
            letter-spacing: .02em;
        }
        .role-icon {
            width: 26px; height: 26px;
            border-radius: 6px;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px;
        }

        /* Warna role berdasarkan index mod 5 */
        .role-0 { background: rgba(167,139,250,0.15); border: 1px solid rgba(167,139,250,0.3); color: #c4b5fd; }
        .role-0 .role-icon { background: rgba(167,139,250,0.2); color: #c4b5fd; }

        .role-1 { background: rgba(16,185,129,0.12); border: 1px solid rgba(16,185,129,0.3); color: #34d399; }
        .role-1 .role-icon { background: rgba(16,185,129,0.2); color: #34d399; }

        .role-2 { background: rgba(251,191,36,0.12); border: 1px solid rgba(251,191,36,0.3); color: #fbbf24; }
        .role-2 .role-icon { background: rgba(251,191,36,0.2); color: #fbbf24; }

        .role-3 { background: rgba(56,189,248,0.12); border: 1px solid rgba(56,189,248,0.3); color: #7dd3fc; }
        .role-3 .role-icon { background: rgba(56,189,248,0.2); color: #7dd3fc; }

        .role-4 { background: rgba(251,113,133,0.12); border: 1px solid rgba(251,113,133,0.3); color: #fb7185; }
        .role-4 .role-icon { background: rgba(251,113,133,0.2); color: #fb7185; }

        /* Action buttons */
        .btn-edit {
            display: inline-flex; align-items: center; justify-content: center;
            width: 34px; height: 34px;
            background: rgba(96,165,250,0.15);
            border: 1px solid rgba(96,165,250,0.3);
            border-radius: 8px; color: #60a5fa;
            transition: all .15s; text-decoration: none;
        }
        .btn-edit:hover { background: rgba(96,165,250,0.25); box-shadow: 0 0 14px rgba(96,165,250,0.35); }

        .btn-del {
            display: inline-flex; align-items: center; justify-content: center;
            width: 34px; height: 34px;
            background: rgba(251,113,133,0.12);
            border: 1px solid rgba(251,113,133,0.3);
            border-radius: 8px; color: #fb7185;
            transition: all .15s; text-decoration: none;
        }
        .btn-del:hover { background: rgba(251,113,133,0.22); box-shadow: 0 0 14px rgba(251,113,133,0.35); }

        /* Stats strip */
        .stat-strip {
            background: rgba(167,139,250,0.08);
            border: 1px solid rgba(167,139,250,0.15);
            border-radius: 12px;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #94a3b8;
        }
        .stat-strip strong { color: #c4b5fd; font-size: 22px; font-weight: 800; margin-right: 4px; }

        /* Bottom nav */
        .bottom-nav {
            background: rgba(10,10,25,0.97);
            border-top: 1px solid rgba(255,255,255,0.07);
            backdrop-filter: blur(20px);
        }
        .bottom-nav a { color: #475569; transition: color .15s; }
        .bottom-nav a:hover { color: #c4b5fd; }

        .pb-safe { padding-bottom: env(safe-area-inset-bottom); }
    </style>
</head>

<body class="flex min-h-screen">
    <?php require_once '../layout/sidebar.php'; ?>

    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <?php
        $page_name = "Role";
        require_once '../layout/top_navbar.php';
        ?>

        <!-- Canvas -->
        <div class="flex-1 overflow-y-auto p-6 space-y-5"
             style="background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0d1f12 100%);">

            <!-- Page title -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white"
                     style="background: linear-gradient(135deg,#7c3aed,#6d28d9); box-shadow: 0 4px 15px rgba(124,58,237,.4);">
                    <span class="material-symbols-outlined" style="font-size:20px;">person_2</span>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-slate-100">Manajemen Role</h1>
                    <p class="text-xs text-slate-500">Warung Averroes · Hak Akses Pengguna</p>
                </div>
            </div>

            <!-- Controls -->
            <div class="ctrl-bar flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex flex-1 items-center gap-3 flex-wrap">
                    <div class="relative flex-1 max-w-xs">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2"
                              style="font-size:16px; color:#c4b5fd;">search</span>
                        <input class="search-input" placeholder="Cari nama role..." type="text"
                               style="border-color: rgba(167,139,250,0.3);"
                               onfocus="this.style.borderColor='#c4b5fd'; this.style.boxShadow='0 0 0 3px rgba(167,139,250,0.15)'"
                               onblur="this.style.borderColor='rgba(167,139,250,0.3)'; this.style.boxShadow='none'" />
                    </div>
                </div>
                <a href="insert.php" class="add-btn"
                   style="background: linear-gradient(135deg, #7c3aed, #6d28d9); box-shadow: 0 4px 20px rgba(124,58,237,0.4);">
                    <i class="ti ti-plus" style="font-size:18px;"></i>
                    Tambah Role
                </a>
            </div>

            <!-- Stat strip -->
            <?php
            $data     = readRole($con);
            $all_rows = [];
            while ($r = $data->fetch_assoc()) $all_rows[] = $r;
            $total = count($all_rows);
            ?>
            <div class="stat-strip">
                <i class="ti ti-shield-check" style="font-size:20px; color:#c4b5fd;"></i>
                <span>Total role terdaftar:</span>
                <strong><?= $total ?></strong>
                <span>role aktif di sistem</span>
            </div>

            <!-- Table -->
            <div class="table-card">
                <div class="overflow-x-auto">
                    <table>
                        <thead>
                            <tr>
                                <th style="width:56px; text-align:center;">No</th>
                                <th>Nama Role</th>
                                <th>Akses Level</th>
                                <th style="text-align:right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Icon dan label level akses per warna index
                            $access_labels = ['Super Admin', 'Administrator', 'Manager', 'Kasir', 'Viewer'];
                            $access_icons  = ['ti-crown', 'ti-shield', 'ti-briefcase', 'ti-cash-register', 'ti-eye'];

                            foreach ($all_rows as $i => $row):
                                $color_idx = $i % 5;
                                $nama      = htmlspecialchars($row['nama']);
                            ?>
                            <tr>
                                <td style="text-align:center;">
                                    <span class="no-badge"><?= $i + 1 ?></span>
                                </td>

                                <td>
                                    <span class="role-badge role-<?= $color_idx ?>">
                                        <span class="role-icon">
                                            <i class="<?= $access_icons[$color_idx] ?>" style="font-size:14px;"></i>
                                        </span>
                                        <?= $nama ?>
                                    </span>
                                </td>

                                <td>
                                    <div style="display:flex; align-items:center; gap:6px;">
                                        <?php for ($s = 0; $s <= $color_idx; $s++): ?>
                                            <div style="width:8px; height:8px; border-radius:50%; background:
                                                <?= ['#c4b5fd','#34d399','#fbbf24','#7dd3fc','#fb7185'][$color_idx] ?>;
                                                opacity: <?= 1 - ($color_idx - $s) * 0.15 ?>;">
                                            </div>
                                        <?php endfor; ?>
                                        <span style="font-size:11px; color:#64748b; margin-left:4px;">
                                            <?= $access_labels[$color_idx] ?>
                                        </span>
                                    </div>
                                </td>

                                <td style="text-align:right;">
                                    <div style="display:flex; align-items:center; justify-content:flex-end; gap:8px;">
                                        <a class="btn-edit" href="edit.php?aksi=edit&id=<?= $row['id'] ?>" title="Edit">
                                            <i class="ti ti-pencil" style="font-size:16px;"></i>
                                        </a>
                                        <a class="btn-del"
                                           href="role_action.php?aksi=delete&id=<?= $row['id'] ?>"
                                           onclick="return confirm('Yakin mau hapus role ini?')"
                                           title="Hapus">
                                            <i class="ti ti-trash" style="font-size:16px;"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
</html>