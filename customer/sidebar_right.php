<aside class="fixed right-0 top-0 h-screen w-full lg:w-[380px] z-30 flex flex-col"
       style="background: rgba(10,10,25,0.97); border-left: 1px solid rgba(255,255,255,0.07); backdrop-filter: blur(20px); color:#e2e8f0; font-family:'Inter',sans-serif;">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">

    <style>
        .cart-header { border-bottom: 1px solid rgba(255,255,255,0.07); }
        .cart-item-img {
            width: 56px; height: 56px; border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.08);
            overflow: hidden; flex-shrink: 0;
            background: rgba(255,255,255,0.04);
        }
        .cart-item-img img { width: 100%; height: 100%; object-fit: cover; }

        .qty-control {
            display: flex; align-items: center; gap: 4px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 10px;
            padding: 4px;
        }
        .qty-btn {
            width: 26px; height: 26px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 6px;
            color: #94a3b8;
            transition: all .15s;
            text-decoration: none;
        }
        .qty-btn:hover { background: rgba(110,231,183,0.12); color: #6ee7b7; }
        .qty-val { font-weight: 700; font-size: 13px; min-width: 22px; text-align: center; color: #f1f5f9; }

        .empty-cart { text-align: center; padding: 48px 20px; }
        .empty-cart i { font-size: 48px; color: #1e293b; display: block; margin-bottom: 12px; }

        .total-row { background: rgba(255,255,255,0.02); border-top: 1px solid rgba(255,255,255,0.07); }

        .btn-void {
            background: rgba(251,113,133,0.1);
            border: 1px solid rgba(251,113,133,0.25);
            color: #fb7185;
            border-radius: 12px;
            font-weight: 700; font-size: 13px;
            padding: 14px;
            text-align: center;
            transition: all .15s;
            text-decoration: none;
            display: flex; align-items: center; justify-content: center; gap: 6px;
        }
        .btn-void:hover { background: rgba(251,113,133,0.18); }

        .btn-checkout {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 4px 20px rgba(16,185,129,0.4);
            color: #fff;
            border-radius: 12px;
            font-weight: 700; font-size: 13px;
            padding: 14px;
            text-align: center;
            transition: all .2s;
            text-decoration: none;
            display: flex; align-items: center; justify-content: center; gap: 6px;
        }
        .btn-checkout:hover { transform: translateY(-1px); box-shadow: 0 6px 24px rgba(16,185,129,0.55); }

        .clear-btn {
            width: 34px; height: 34px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 8px;
            background: rgba(251,113,133,0.1);
            border: 1px solid rgba(251,113,133,0.25);
            color: #fb7185;
            transition: all .15s;
            cursor: pointer;
        }
        .clear-btn:hover { background: rgba(251,113,133,0.18); }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: rgba(110,231,183,0.25); border-radius: 99px; }
    </style>

    <!-- Header -->
    <div class="cart-header p-5 flex justify-between items-center">
        <div>
            <h2 class="text-lg font-bold text-slate-100">Order Saat Ini</h2>
            <p class="text-xs text-slate-500 mt-0.5">Kelola item pesanan pelanggan</p>
        </div>
        <a href="action.php?aksi=deleteAllCart&id_user=1" class="clear-btn" title="Hapus semua"
           onclick="return confirm('Hapus semua data cart?')">
            <i class="ti ti-trash" style="font-size:16px;"></i>
        </a>
    </div>

    <!-- Cart Items -->
    <div class="flex-1 overflow-y-auto p-5 space-y-3">
        <?php
        $dataCart = showDataCart($con, 1);
        $has_item = false;
        while ($row = $dataCart->fetch_assoc()):
            $has_item = true;
        ?>
            <div class="flex items-center gap-3">
                <div class="cart-item-img">
                    <img src="../product/image/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['nama_product']) ?>" />
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-slate-100 truncate"><?= htmlspecialchars($row['nama_product']) ?></p>
                    <p class="text-xs font-bold mt-0.5" style="color:#fbbf24;">Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
                </div>
                <div class="qty-control">
                    <a href="action.php?aksi=deleteCart&id_user=1&id_product=<?= $row['id_product'] ?>" class="qty-btn">
                        <i class="ti ti-minus" style="font-size:14px;"></i>
                    </a>
                    <span class="qty-val"><?= $row['qty'] ?></span>
                    <a href="action.php?aksi=insertCart&id_user=1&id_product=<?= $row['id_product'] ?>" class="qty-btn">
                        <i class="ti ti-plus" style="font-size:14px;"></i>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>

        <?php if (!$has_item): ?>
            <div class="empty-cart">
                <i class="ti ti-shopping-cart-off"></i>
                <p class="text-sm font-semibold text-slate-400">Keranjang masih kosong</p>
                <p class="text-xs text-slate-600 mt-1">Pilih produk untuk mulai memesan</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Payment Summary -->
    <div class="total-row p-5 space-y-4">
        <div class="flex justify-between items-baseline">
            <span class="text-sm font-semibold text-slate-400">Total</span>
            <?php
            $total = showTotalCart($con, 1);
            $totalVal = $total['total'] ?? 0;
            ?>
            <span class="text-2xl font-extrabold" style="color:#34d399;">
                Rp <?= number_format($totalVal, 0, ',', '.') ?>
            </span>
        </div>

        <div class="grid grid-cols-2 gap-3">
            <a href="action.php?aksi=deleteAllCart&id_user=1" class="btn-void"
               onclick="return confirm('Apakah Anda yakin ingin menghapus semua data cart?')">
                <i class="ti ti-x" style="font-size:16px;"></i>
                Void
            </a>
            <a href="action.php?aksi=checkout&id_user=1" class="btn-checkout"
               onclick="return confirm('Apakah Anda yakin ingin men-checkout semua data cart?')">
                <i class="ti ti-check" style="font-size:16px;"></i>
                Checkout
            </a>
        </div>
    </div>
</aside>