<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <?php if ($_SESSION['hak_akses'] == "admin") { ?>
            <!-- data master label -->
            <li class="sidebar-title badge badge-info">Data Master</li>
            <li> <a class="waves-effect waves-dark" href="admin.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Beranda</span></a>
            </li>
            <li> <a class="waves-effect waves-dark" href="data_user.php" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Data User</span></a>
            </li>
            <li> <a class="waves-effect waves-dark" href="data_supplier.php" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Data Supplier</span></a>
            </li>
            <li> <a class="waves-effect waves-dark" href="peramalan.php" aria-expanded="false"><i class="mdi mdi-chart-areaspline"></i><span class="hide-menu">Peramalan</span></a>
            </li>
            <li> <a class="waves-effect waves-dark" href="laporan.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Laporan</span></a>

                <!-- Data transaksi label -->
            <li class="sidebar-title badge badge-info">Data Transaksi</li>
            <li> <a class="waves-effect waves-dark" href="data_penjualan_barang.php" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Data Penjualan</span></a>
            </li>
            <li> <a class="waves-effect waves-dark" href="request_pembelian.php" aria-expanded="false"><i class="mdi mdi-cash-usd"></i><span class="hide-menu">Request Pembelian</span></a>
            </li>
            <li> <a class="waves-effect waves-dark" href="data_barang_produksi.php" aria-expanded="false"><i class="mdi mdi-bulletin-board"></i><span class="hide-menu">Data Barang Produksi</span></a>
            </li>
            <li> <a class="waves-effect waves-dark" href="data_barang_masuk.php" aria-expanded="false"><i class="mdi mdi-inbox-arrow-down"></i><span class="hide-menu">Data Barang Masuk</span></a>
            </li>
            <li> <a class="waves-effect waves-dark" href="data_barang.php" aria-expanded="false"><i class="mdi mdi-database"></i><span class="hide-menu">Data Stok Barang</span></a>
            </li>

            </li>
        <?php } else if ($_SESSION['hak_akses'] == "owner") { ?>
            <li> <a class="waves-effect waves-dark" href="owner.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Beranda</span></a>
            </li>
            <li> <a class="waves-effect waves-dark" href="laporan.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Laporan</span></a>
            </li>


        <?php } else if ($_SESSION['hak_akses'] == "supplier") { ?>
            <li> <a class="waves-effect waves-dark" href="supplier.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Beranda</span></a>
            </li>
            <li> <a class="waves-effect waves-dark" href="request_barang_supplier.php" aria-expanded="false"><i class="mdi mdi-bulletin-board"></i><span class="hide-menu">Request Barang</span></a>
            </li>

        <?php } else if ($_SESSION['hak_akses'] == "customer") { ?>
            <li> <a class="waves-effect waves-dark" href="customer.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Beranda</span></a>
            </li>
            <li> <a class="waves-effect waves-dark" href="data_pembelian_barang.php" aria-expanded="false"><i class="mdi mdi-bulletin-board"></i><span class="hide-menu">Request Barang</span></a>
            </li>
        <?php } ?>
    </ul>
</nav>