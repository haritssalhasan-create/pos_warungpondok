<?php include 'detail_transaksi_action.php'; ?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Detail Transaksi - toko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <style>
        * { font-family: 'Inter', sans-serif; }

        body {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0d1f12 100%);
            min-height: 100vh;
            color: #e2e8f0;
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: rgba(255,255,255,0.03); }
        ::-webkit-scrollbar-thumb { background: rgba(110,231,183,0.3); border-radius: 99px; }

        /* Control bar */
        .ctrl-bar {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 16px;
            padding: 16px 20px;
            backdrop-filter: blur(10px);
        }

        /* Search input */
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

        /* Add button */
        .add-btn {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 4px 20px rgba(16,185,129,0.4);
            transition: all .2s;
        }
        .add-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 24px rgba(16,185,129,0.55);
        }

        /* Table card */
        .table-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        /* Table head */
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
        }

        /* Table rows */
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
        .id-badge {
            background: rgba(167,139,250,0.15);
            border: 1px solid rgba(167,139,250,0.3);
            color: #a78bfa; font-size: 12px; font-weight: 600;
            padding: 4px 10px; border-radius: 20px; font-family: monospace;
        }
        .prod-badge {
            background: linear-gradient(135deg, rgba(16,185,129,0.2), rgba(5,150,105,0.1));
            border: 1px solid rgba(16,185,129,0.35);
            color: #34d399; font-size: 12px; font-weight: 600;
            padding: 4px 12px; border-radius: 20px;
        }

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

        /* Total display */
        .total-amount { font-weight: 700; font-size: 14px; color: #fbbf24; }
        .total-sub { font-size: 10px; color: #f59e0b; font-weight: 500; }
    </style>
</head>

<body class="flex min-h-screen">
    <!-- SideNavBar -->
    <?php require_once '../layout/sidebar.php'; ?>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <?php
        $page_name = "Detail Transaksi";
        require_once '../layout/top_navbar.php';
        ?>

        <!-- Canvas -->
        <div class="flex-1 overflow-y-auto p-6 space-y-5">

            <!-- Page title -->
            <div class="flex items-center gap-3 mb-1">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white text-xl"
                     style="background: linear-gradient(135deg,#10b981,#059669); box-shadow: 0 4px 15px rgba(16,185,129,.35);">
                    <i class="ti ti-receipt"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-slate-100">Detail Transaksi</h1>
                    <p class="text-xs text-slate-500">Warung Averroes · Inventory Management</p>
                </div>
            </div>

            <!-- Controls -->
            <div class="ctrl-bar flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex flex-1 items-center gap-3 flex-wrap">
                    <!-- Search -->
                    <div class="relative flex-1 max-w-xs">
                        <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-emerald-400" style="font-size:16px;"></i>
                        <input class="search-input" placeholder="Cari nama produk, SKU..." type="text" />
                    </div>
                    <select class="filter-select">
                        <option>Semua Kategori</option>
                        <option>Makanan</option>
                        <option>Minuman</option>
                        <option>Pokok</option>
                        <option>Dairy</option>
                    </select>
                    <select class="filter-select">
                        <option>Semua Stok</option>
                        <option>In Stock</option>
                        <option>Low Stock</option>
                        <option>Habis</option>
                    </select>
                </div>
                <a href="insert.php"
                   class="add-btn text-white font-semibold text-sm px-5 py-2.5 rounded-xl flex items-center gap-2 no-underline">
                    <i class="ti ti-plus" style="font-size:18px;"></i>
                    Tambah Detail Transaksi
                </a>
            </div>

            <!-- Table -->
            <div class="table-card">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-center w-14">No</th>
                                <th>ID Transaksi</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Total Jumlah</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = readDetailTransaksi($con);
                            $no = 1;
                            while ($row = $data->fetch_assoc()):
                            ?>
                            <tr>
                                <td class="text-center">
                                    <span class="no-badge"><?= $no++ ?></span>
                                </td>
                                <td>
                                    <span class="id-badge">#<?= htmlspecialchars($row['id_transaksi']) ?></span>
                                </td>
                                <td>
                                    <span class="prod-badge"><?= htmlspecialchars($row['nama_product']) ?></span>
                                </td>
                                <td>
                                    <span style="font-weight:700; font-size:16px; color:#f8fafc;">
                                        <?= htmlspecialchars($row['jumlah']) ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="total-amount">Rp <?= number_format($row['total_jumlah'], 0, ',', '.') ?></div>
                                </td>
                                <td>
                                    <div class="flex items-center justify-end gap-2">
                                        <a class="btn-edit" href="edit.php?aksi=edit&id=<?= $row['id'] ?>" title="Edit">
                                            <i class="ti ti-pencil" style="font-size:16px;"></i>
                                        </a>
                                        <a class="btn-del"
                                           href="detail_transaksi_action.php?aksi=delete&id=<?= $row['id'] ?>"
                                           onclick="return confirm('Yakin mau hapus data ini?')"
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
        <nav class="md:hidden fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-2 h-16"
             style="background: rgba(15,15,35,0.95); border-top: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
            <a class="flex flex-col items-center text-slate-500 hover:text-emerald-400 gap-0.5" href="#">
                <i class="ti ti-shopping-cart" style="font-size:22px;"></i>
                <span style="font-size:10px;font-weight:600;">POS</span>
            </a>
            <a class="flex flex-col items-center text-emerald-400 gap-0.5" href="#">
                <i class="ti ti-package" style="font-size:22px;"></i>
                <span style="font-size:10px;font-weight:600;">Stok</span>
            </a>
            <a class="flex flex-col items-center text-slate-500 hover:text-emerald-400 gap-0.5" href="#">
                <i class="ti ti-receipt" style="font-size:22px;"></i>
                <span style="font-size:10px;font-weight:600;">Transaksi</span>
            </a>
            <a class="flex flex-col items-center text-slate-500 hover:text-emerald-400 gap-0.5" href="#">
                <i class="ti ti-menu-2" style="font-size:22px;"></i>
                <span style="font-size:10px;font-weight:600;">Menu</span>
            </a>
        </nav>
    </main>
</body>
</html>