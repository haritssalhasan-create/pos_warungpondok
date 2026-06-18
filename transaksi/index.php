<?php include 'transaksi_action.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Transaksi - toko</title>
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

        .filter-select {
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 10px;
            padding: 10px 14px;
            color: #e2e8f0;
            font-size: 13px;
            outline: none;
            cursor: pointer;
        }

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
            background: linear-gradient(90deg, rgba(16,185,129,0.15), rgba(5,150,105,0.06));
            border-bottom: 1px solid rgba(110,231,183,0.2);
        }
        th {
            padding: 14px 20px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #6ee7b7;
            text-align: left;
        }
        th:last-child { text-align: right; }

        tbody tr {
            border-bottom: 1px solid rgba(255,255,255,0.05);
            transition: background .15s;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: rgba(110,231,183,0.06); }
        td { padding: 14px 20px; font-size: 13px; color: #cbd5e1; }

        /* Badges */
        .no-badge {
            display: inline-flex; align-items: center; justify-content: center;
            width: 28px; height: 28px;
            background: rgba(110,231,183,0.15);
            border: 1px solid rgba(110,231,183,0.3);
            border-radius: 6px;
            color: #6ee7b7; font-weight: 700; font-size: 12px;
        }

        .user-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(167,139,250,0.12);
            border: 1px solid rgba(167,139,250,0.25);
            color: #c4b5fd;
            font-size: 12px; font-weight: 600;
            padding: 5px 12px; border-radius: 20px;
        }
        .user-avatar {
            width: 20px; height: 20px;
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 9px; font-weight: 800; color: #ede9fe;
        }

        .date-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(56,189,248,0.1);
            border: 1px solid rgba(56,189,248,0.25);
            color: #7dd3fc;
            font-size: 12px; font-weight: 600;
            padding: 5px 12px; border-radius: 20px;
        }

        .total-amount { font-weight: 700; font-size: 14px; color: #fbbf24; }
        .total-label  { font-size: 10px; color: #f59e0b; font-weight: 500; }

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

        /* Bottom nav mobile */
        .bottom-nav {
            background: rgba(10,10,25,0.97);
            border-top: 1px solid rgba(255,255,255,0.07);
            backdrop-filter: blur(20px);
        }
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
        $page_name = "Transaksi";
        require_once '../layout/top_navbar.php';
        ?>

        <!-- Canvas -->
        <div class="flex-1 overflow-y-auto p-6 space-y-5"
             style="background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0d1f12 100%);">

            <!-- Page title -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white"
                     style="background: linear-gradient(135deg,#10b981,#059669); box-shadow: 0 4px 15px rgba(16,185,129,.35);">
                    <span class="material-symbols-outlined" style="font-size:20px;">point_of_sale</span>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-slate-100">Transaksi</h1>
                    <p class="text-xs text-slate-500">toko · Riwayat Pembelian</p>
                </div>
            </div>

            <!-- Controls -->
            <div class="ctrl-bar flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex flex-1 items-center gap-3 flex-wrap">
                    <div class="relative flex-1 max-w-xs">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2"
                              style="font-size:16px; color:#34d399;">search</span>
                        <input class="search-input" placeholder="Cari transaksi, kasir..." type="text" />
                    </div>
                    <select class="filter-select">
                        <option>Semua Periode</option>
                        <option>Hari Ini</option>
                        <option>Minggu Ini</option>
                        <option>Bulan Ini</option>
                    </select>
                    <select class="filter-select">
                        <option>Semua Kasir</option>
                        <option>Admin</option>
                        <option>Kasir 1</option>
                        <option>Kasir 2</option>
                    </select>
                </div>
                <a href="insert.php" class="add-btn">
                    <i class="ti ti-plus" style="font-size:18px;"></i>
                    Tambah Transaksi
                </a>
            </div>

            <!-- Table -->
            <div class="table-card">
                <div class="overflow-x-auto">
                    <table>
                        <thead>
                            <tr>
                                <th style="width:56px; text-align:center;">No</th>
                                <th>Tanggal Transaksi</th>
                                <th>User / Kasir</th>
                                <th>Total Pembelian</th>
                                <th style="text-align:right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = readTransaksi($con);
                            $no = 1;
                            while ($row = $data->fetch_assoc()):
                                // Ambil inisial nama user untuk avatar
                                $nama = htmlspecialchars($row['nama_user']);
                                $inisial = strtoupper(substr($nama, 0, 1));
                            ?>
                            <tr>
                                <td style="text-align:center;">
                                    <span class="no-badge"><?= $no++ ?></span>
                                </td>

                                <td>
                                    <span class="date-badge">
                                        <span class="material-symbols-outlined" style="font-size:14px;">calendar_today</span>
                                        <?= htmlspecialchars($row['tgl_transaksi']) ?>
                                    </span>
                                </td>

                                <td>
                                    <span class="user-badge">
                                        <span class="user-avatar"><?= $inisial ?></span>
                                        <?= $nama ?>
                                    </span>
                                </td>

                                <td>
                                    <div class="total-amount">Rp <?= number_format($row['total_pembelian'], 0, ',', '.') ?></div>
                                </td>

                                <td style="text-align:right;">
                                    <div style="display:flex; align-items:center; justify-content:flex-end; gap:8px;">
                                        <a class="btn-edit" href="edit.php?aksi=edit&id=<?= $row['id'] ?>" title="Edit">
                                            <i class="ti ti-pencil" style="font-size:16px;"></i>
                                        </a>
                                        <a class="btn-del"
                                           href="transaksi_action.php?aksi=delete&id=<?= $row['id'] ?>"
                                           onclick="return confirm('Yakin mau hapus transaksi ini?')"
                                           title="Hapus">
                                            <i class="ti ti-trash" style="font-size:16px;"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
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