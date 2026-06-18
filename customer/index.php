<?php include './action.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>POS - Warung Averroes</title>
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
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }

        /* Category chips */
        .chip {
            padding: 10px 22px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            transition: all .2s;
            cursor: pointer;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.04);
            color: #94a3b8;
        }
        .chip:hover { background: rgba(255,255,255,0.08); color: #e2e8f0; }
        .chip.active {
            background: linear-gradient(135deg, #10b981, #059669);
            border-color: transparent;
            color: #fff;
            box-shadow: 0 4px 16px rgba(16,185,129,0.4);
        }

        /* Product card */
        .product-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            overflow: hidden;
            transition: all .25s;
            display: flex;
            flex-direction: column;
        }
        .product-card:hover {
            border-color: rgba(110,231,183,0.3);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .product-img-wrap {
            aspect-ratio: 1/1;
            background: rgba(255,255,255,0.03);
            overflow: hidden;
            position: relative;
        }
        .product-img-wrap img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform .3s;
        }
        .product-card:hover .product-img-wrap img { transform: scale(1.06); }

        .stock-pill {
            position: absolute; top: 8px; right: 8px;
            background: rgba(16,185,129,0.85);
            color: #fff; font-size: 10px; font-weight: 700;
            padding: 4px 10px; border-radius: 20px;
            backdrop-filter: blur(4px);
        }
        .stock-pill.low { background: rgba(245,158,11,0.85); }
        .stock-pill.out { background: rgba(239,68,68,0.85); }

        .product-cat {
            font-size: 11px; font-weight: 600;
            color: #6ee7b7;
            background: rgba(16,185,129,0.1);
            border: 1px solid rgba(16,185,129,0.2);
            display: inline-block;
            padding: 2px 8px;
            border-radius: 20px;
            margin-bottom: 6px;
        }

        .product-name {
            font-weight: 600; font-size: 14px; color: #f1f5f9; line-height: 1.3;
            margin-bottom: 8px;
            display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
            min-height: 36px;
        }

        .product-price {
            font-weight: 800; font-size: 15px; color: #fbbf24;
            font-variant-numeric: tabular-nums;
        }

        .btn-add {
            width: 38px; height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: #fff; display: flex; align-items: center; justify-content: center;
            transition: all .15s;
            box-shadow: 0 2px 10px rgba(16,185,129,0.35);
            text-decoration: none;
        }
        .btn-add:hover { transform: scale(1.08); box-shadow: 0 4px 16px rgba(16,185,129,0.5); }
        .btn-add:active { transform: scale(0.92); }
        .btn-add.disabled {
            background: rgba(255,255,255,0.05);
            color: #475569;
            box-shadow: none;
            cursor: not-allowed;
            pointer-events: none;
        }
    </style>
</head>

<body class="flex min-h-screen">
    <?php require_once '../layout/sidebar.php' ?>

    <main class="flex-1 flex flex-col h-screen overflow-hidden mr-0 lg:mr-[380px]">
        <?php
        $page_name = "POS";
        require_once '../layout/top_navbar.php'
        ?>

        <div class="flex-1 overflow-y-auto p-6 space-y-5"
             style="background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0d1f12 100%);">

            <!-- Page title -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white"
                     style="background: linear-gradient(135deg,#10b981,#059669); box-shadow: 0 4px 15px rgba(16,185,129,.35);">
                    <i class="ti ti-shopping-cart" style="font-size:20px;"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-slate-100">Point of <span style="color:#34d399;">Sale</span></h1>
                    <p class="text-xs text-slate-500">Warung Averroes · Pilih produk untuk ditambahkan ke order</p>
                </div>
            </div>

            <!-- Category chips -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-hide">
                <button class="chip active">Semua Item</button>
                <?php
                $dataCategory = showDataCategory($con);
                while ($row = $dataCategory->fetch_assoc()):
                ?>
                    <button class="chip"><?= htmlspecialchars($row['nama']) ?></button>
                <?php endwhile; ?>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                <?php
                $dataProduct = readProduk($con);
                while ($product = $dataProduct->fetch_assoc()):
                    $stok = (int)$product['stock'];
                    $pillClass = $stok === 0 ? 'out' : ($stok <= 5 ? 'low' : '');
                    $pillText  = $stok === 0 ? 'HABIS' : ($stok <= 5 ? "SISA $stok" : "STOK $stok");
                ?>
                    <div class="product-card">
                        <div class="product-img-wrap">
                            <img src="../product/image/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['nama']) ?>" />
                            <span class="stock-pill <?= $pillClass ?>"><?= $pillText ?></span>
                        </div>
                        <div class="p-3 flex flex-col flex-1">
                            <span class="product-cat"><?= htmlspecialchars($product['nama_category']) ?></span>
                            <div class="product-name"><?= htmlspecialchars($product['nama']) ?></div>
                            <div class="mt-auto flex justify-between items-center">
                                <span class="product-price">Rp <?= number_format($product['harga'], 0, ',', '.') ?></span>
                                <?php if ($stok > 0): ?>
                                    <a href="action.php?aksi=insertCart&id_user=1&id_product=<?= $product['id'] ?>" class="btn-add" title="Tambah ke order">
                                        <i class="ti ti-plus" style="font-size:18px;"></i>
                                    </a>
                                <?php else: ?>
                                    <span class="btn-add disabled" title="Stok habis">
                                        <i class="ti ti-ban" style="font-size:16px;"></i>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        </div>
    </main>

    <!-- Right Sidebar: Current Order -->
    <?php require_once './sidebar_right.php' ?>
</body>
</html>