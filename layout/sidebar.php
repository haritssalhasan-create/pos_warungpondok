<?php
$current_page = basename($_SERVER['PHP_SELF']);

function nav_class(string $target_page): string {
    $current = basename(dirname($_SERVER['PHP_SELF']));
    $active   = 'flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold text-sm transition-all';
    $inactive = 'flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-sm transition-all';
    return ($current === $target_page) ? $active : $inactive;
}

function icon_style(string $target_page): string {
    $current = basename(dirname($_SERVER['PHP_SELF']));
    return ($current === $target_page) ? "font-variation-settings: 'FILL' 1;" : '';
}

function is_active(string $target_page): bool {
    return basename(dirname($_SERVER['PHP_SELF'])) === $target_page;
}
?>

<style>
.sidebar {
    background: rgba(10,10,25,0.97);
    border-right: 1px solid rgba(255,255,255,0.07);
    backdrop-filter: blur(20px);
}
.brand-icon {
    background: linear-gradient(135deg, #10b981, #059669);
    box-shadow: 0 4px 15px rgba(16,185,129,0.4);
}
.nav-active {
    background: linear-gradient(135deg, rgba(16,185,129,0.25), rgba(5,150,105,0.12));
    border: 1px solid rgba(16,185,129,0.35);
    color: #34d399;
    box-shadow: 0 2px 12px rgba(16,185,129,0.15);
}
.nav-inactive {
    color: #64748b;
    border: 1px solid transparent;
}
.nav-inactive:hover {
    background: rgba(255,255,255,0.05);
    border-color: rgba(255,255,255,0.08);
    color: #94a3b8;
}
.nav-icon-active { color: #34d399; }
.nav-icon-inactive { color: #475569; }
.sidebar-divider { border-color: rgba(255,255,255,0.07); }
.nav-support { color: #475569; border: 1px solid transparent; }
.nav-support:hover { background: rgba(255,255,255,0.05); color: #94a3b8; border-color: rgba(255,255,255,0.08); }
.nav-logout { color: #fb7185; border: 1px solid transparent; }
.nav-logout:hover { background: rgba(251,113,133,0.1); border-color: rgba(251,113,133,0.2); }
.section-label { font-size: 10px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: #334155; padding: 0 12px; margin: 8px 0 4px; }
</style>

<aside class="sidebar hidden md:flex flex-col p-4 space-y-1 h-screen w-64 flex-shrink-0">
    <!-- Brand -->
    <div class="flex items-center gap-3 px-2 mb-6">
        <div class="brand-icon w-10 h-10 rounded-xl flex items-center justify-center text-white flex-shrink-0">
            <span class="material-symbols-outlined" style="font-size:20px;"></span>
        </div>
        <div>
            <h1 class="text-base font-black text-slate-100 leading-tight">toko</h1>
            <p class="text-[9px] uppercase tracking-widest text-emerald-600 font-bold">Admin Terminal</p>
        </div>
    </div>

    <!-- Nav -->
    <nav class="flex-1 space-y-1 overflow-y-auto">
        <p class="section-label">Main</p>

        <a class="<?= nav_class('dashboard') ?> <?= is_active('dashboard') ? 'nav-active' : 'nav-inactive' ?>"
           href="#">
            <span class="material-symbols-outlined text-base <?= is_active('dashboard') ? 'nav-icon-active' : 'nav-icon-inactive' ?>"
                  style="font-size:18px; <?= icon_style('dashboard') ?>">dashboard</span>
            <span>Dashboard</span>
        </a>

        <a class="<?= nav_class('user') ?> <?= is_active('user') ? 'nav-active' : 'nav-inactive' ?>"
           href="../user/index.php">
            <span class="material-symbols-outlined <?= is_active('user') ? 'nav-icon-active' : 'nav-icon-inactive' ?>"
                  style="font-size:18px; <?= icon_style('user') ?>">people</span>
            <span>User</span>
        </a>

        <a class="<?= nav_class('role') ?> <?= is_active('role') ? 'nav-active' : 'nav-inactive' ?>"
           href="../role/index.php">
            <span class="material-symbols-outlined <?= is_active('role') ? 'nav-icon-active' : 'nav-icon-inactive' ?>"
                  style="font-size:18px; <?= icon_style('role') ?>">person_2</span>
            <span>Role</span>
        </a>

        <p class="section-label" style="margin-top:16px;">Inventory</p>

        <a class="<?= nav_class('category') ?> <?= is_active('category') ? 'nav-active' : 'nav-inactive' ?>"
           href="../category/index.php">
            <span class="material-symbols-outlined <?= is_active('category') ? 'nav-icon-active' : 'nav-icon-inactive' ?>"
                  style="font-size:18px; <?= icon_style('category') ?>">analytics</span>
            <span>Category</span>
        </a>

        <a class="<?= nav_class('product') ?> <?= is_active('product') ? 'nav-active' : 'nav-inactive' ?>"
           href="../product/index.php">
            <span class="material-symbols-outlined <?= is_active('product') ? 'nav-icon-active' : 'nav-icon-inactive' ?>"
                  style="font-size:18px; <?= icon_style('product') ?>">inventory_2</span>
            <span>Product</span>
        </a>

        <p class="section-label" style="margin-top:16px;">Transaksi</p>

        <a class="<?= nav_class('transaction') ?> <?= is_active('transaction') ? 'nav-active' : 'nav-inactive' ?>"
           href="../transaksi/index.php">
            <span class="material-symbols-outlined <?= is_active('transaction') ? 'nav-icon-active' : 'nav-icon-inactive' ?>"
                  style="font-size:18px; <?= icon_style('transaction') ?>">point_of_sale</span>
            <span>Transaction</span>
        </a>

        <a class="<?= nav_class('detail_transaksi') ?> <?= is_active('detail_transaksi') ? 'nav-active' : 'nav-inactive' ?>"
           href="../detail_transaksi/index.php">
            <span class="material-symbols-outlined <?= is_active('detail_transaksi') ? 'nav-icon-active' : 'nav-icon-inactive' ?>"
                  style="font-size:18px; <?= icon_style('detail_transaksi') ?>">receipt_long</span>
            <span>Detail Transaksi</span>
        </a>
    </nav>

    <!-- Bottom -->
    <div class="pt-3 border-t sidebar-divider space-y-1">
        <button class="nav-support w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-sm transition-all">
            <span class="material-symbols-outlined" style="font-size:18px; color:#475569;">help</span>
            <span>Support</span>
        </button>
        <button class="nav-logout w-full text-left flex items-center gap-3 px-3 py-2.5 rounded-xl font-medium text-sm transition-all">
            <a href="../authentication/action.php?aksi=logout" class="w-full text-left flex items-center space-x-3 px-3 py-2.5 text-error hover:bg-red-50 dark:hover:bg-red-900/10 rounded-lg transition-transform active:scale-95 font-medium text-sm">
            <span class="material-symbols-outlined">logout</span>
            <span>Logout</span>
</a>
</aside>