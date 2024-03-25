<nav class="sidebar sidebar-offcanvas" id="sidebar">
		<ul class="nav">
				<li class="nav-item {{ \Route::is('admin.dashboard.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('admin.dashboard.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Dashboard</span>
						</a>
				</li>
				<li class="nav-item {{ \Route::is('admin.produk.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('admin.produk.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Produk</span>
						</a>
				</li>
				<li class="nav-item {{ \Route::is('admin.bahan.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('admin.bahan.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Bahan Baku</span>
						</a>
				</li>
				<li class="nav-item {{ \Route::is('admin.stok.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('admin.stok.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Stok Bahan Baku</span>
						</a>
				</li>
				<li class="nav-item {{ \Route::is('admin.pembelian-bahan.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('admin.pembelian-bahan.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Pembelian Bahan Baku</span>
						</a>
				</li>
				<li class="nav-item {{ \Route::is('admin.komposisi.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('admin.komposisi.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Komposisi</span>
						</a>
				</li>
				<li class="nav-item {{ \Route::is('admin.pengeluaran.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('admin.pengeluaran.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Pengeluaran</span>
						</a>
				</li>

				<li class="nav-item {{ \Route::is('admin.transaksi.*') ? 'active' : '' }}">
						<a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false" aria-controls="transaksi">
								<i class="icon-layout menu-icon"></i>
								<span class="menu-title">Transaksi</span>
								<i class="menu-arrow"></i>
						</a>
						<div class="collapse" id="transaksi">
								<ul class="nav flex-column sub-menu">
										<li class="nav-item">
												<a class="nav-link" href="{{ route('admin.transaksi.penjualan.index') }}">Penjualan</a>
										</li>
										<li class="nav-item">
												<a class="nav-link" href="{{ route('admin.transaksi.transaksi.index') }}">History Transaksi</a>
										</li>

								</ul>
						</div>
				</li>


				<li class="nav-item">
						<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
								<i class="icon-layout menu-icon"></i>
								<span class="menu-title">Master Produk</span>
								<i class="menu-arrow"></i>
						</a>
						<div class="collapse" id="ui-basic">
								<ul class="nav flex-column sub-menu">
										<li class="nav-item">
												<a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
										</li>
										<li class="nav-item">
												<a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
										</li>
										<li class="nav-item">
												<a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
										</li>
								</ul>
						</div>
				</li>

				<li class="nav-item">
						<a class="nav-link" href="pages/documentation/documentation.html">
								<i class="icon-paper menu-icon"></i>
								<span class="menu-title">Documentation</span>
						</a>
				</li>
		</ul>
</nav>
