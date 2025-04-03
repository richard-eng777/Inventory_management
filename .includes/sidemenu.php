<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="./dashboard.php" class="app-brand-link">
      <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">Inventory</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item">
      <a href="dashboard.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>
    <!-- Forms & Tables -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Fitur</span></li>
    <!-- Forms -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-detail"></i>
        <div data-i18n="Posts">Tambah</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="barang.php" class="menu-link">
            <div data-i18n="Basic Inputs">Barang</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="penyedia.php" class="menu-link">
            <div data-i18n="Input groups">Penyedia</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Proses Pengiriman</span></li>
    <!-- Forms -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-detail"></i>
        <div data-i18n="Posts">Pengiriman</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="pengiriman.php" class="menu-link">
            <div data-i18n="Basic Inputs">Tambah Pengiriman</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="table.php" class="menu-link">
            <div data-i18n="Input groups">Table</div>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</aside>
<!-- / Menu -->