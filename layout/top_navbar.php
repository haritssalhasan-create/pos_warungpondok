<style>
.topbar {
    background: rgba(10,10,25,0.97);
    border-bottom: 1px solid rgba(255,255,255,0.07);
    backdrop-filter: blur(20px);
}
.topbar-search {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 10px;
    padding: 8px 14px 8px 38px;
    color: #e2e8f0;
    font-size: 13px;
    outline: none;
    width: 240px;
    transition: all .2s;
}
.topbar-search:focus {
    border-color: rgba(110,231,183,0.4);
    background: rgba(110,231,183,0.07);
    box-shadow: 0 0 0 3px rgba(110,231,183,0.12);
    width: 280px;
}
.topbar-search::placeholder { color: #334155; }
.topbar-icon-btn {
    width: 36px; height: 36px;
    display: flex; align-items: center; justify-content: center;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.08);
    color: #475569;
    background: rgba(255,255,255,0.04);
    cursor: pointer;
    transition: all .15s;
}
.topbar-icon-btn:hover {
    background: rgba(255,255,255,0.08);
    color: #94a3b8;
    border-color: rgba(255,255,255,0.15);
}
.page-pill {
    background: rgba(110,231,183,0.12);
    border: 1px solid rgba(110,231,183,0.25);
    color: #34d399;
    font-size: 12px;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: 20px;
}
.notif-dot {
    width: 7px; height: 7px;
    background: #f59e0b;
    border-radius: 50%;
    position: absolute;
    top: 6px; right: 6px;
    box-shadow: 0 0 6px rgba(245,158,11,0.7);
}
</style>

<header class="topbar flex justify-between items-center px-6 h-16 w-full sticky top-0 z-40 flex-shrink-0">
    <!-- Left: brand (mobile) + page name (desktop) -->
    <div class="flex items-center gap-3">
        <div class="flex items-center md:hidden">
            <span class="text-base font-black text-emerald-400">toko obat</span>
        </div>
        <div class="hidden md:flex items-center gap-3">
            <span class="text-slate-500 text-sm font-medium">toko obat</span>
            <span class="text-slate-700">/</span>
            <span class="page-pill"><?= htmlspecialchars($page_name ?? 'Dashboard') ?></span>
        </div>
    </div>

    <!-- Right: search + actions + avatar -->
    <div class="flex items-center gap-3">
        <!-- Search (desktop) -->
        <div class="relative hidden sm:block">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2"
                  style="font-size:16px; color:#334155;">search</span>
            <input class="topbar-search" placeholder="Global search..." type="text" />
        </div>

        <!-- Notification -->
        <div class="relative">
            <button class="topbar-icon-btn">
                <span class="material-symbols-outlined" style="font-size:18px;">notifications</span>
            </button>
            <span class="notif-dot"></span>
        </div>

        <!-- Settings -->
        <button class="topbar-icon-btn">
            <span class="material-symbols-outlined" style="font-size:18px;">settings</span>
        </button>

        <!-- Divider -->
        <div style="width:1px; height:24px; background:rgba(255,255,255,0.08);"></div>

        <!-- Avatar + name -->
        <div class="flex items-center gap-2 cursor-pointer group">
            <div class="w-8 h-8 rounded-full overflow-hidden"
                 style="border: 2px solid rgba(110,231,183,0.4); box-shadow: 0 0 10px rgba(16,185,129,0.25);">
                <img alt="User profile"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuBzYePIzuSktzNv62C7EawDhoYeE47t3_tCXTKJrk6jZ9DLNbdvxhByVeONLSZOVHxRrmBcdGDwe94gAAar9OlwsMF5cqaCHV8G5ppFWlhCCSNe897360CRntH0CgwcHqZOuqI2xAXJaArl9B0_HWA6CrxkXIWzhc9md8f5iw-prv4392CtAi3NnG5qG-9xMG7436LmTL-lAAjfMFi5c5t8AyjMe39qyvuOXT_T_NjZ-bu1USGW1GfFI6gkM2xlO6t75P1MbHdv5uqw"
                     class="w-full h-full object-cover" />
            </div>
            <span class="hidden lg:block text-sm font-semibold text-slate-400 group-hover:text-slate-200 transition-colors">Admin</span>
            <span class="material-symbols-outlined hidden lg:block"
                  style="font-size:14px; color:#475569;">expand_more</span>
        </div>
    </div>
</header>