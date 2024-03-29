<nav class="navbar col-lg-12 col-12 fixed-top d-flex flex-row p-0">
		<div class="navbar-brand-wrapper d-flex align-items-center justify-content-center text-center">
				<a class="navbar-brand brand-logo mr-5" href="{{ route('admin.dashboard.index') }}"><img
								src="{{ asset('img') }}/logo.png" class="mr-2" alt="logo" /> <span class="text-success">Sehatea</span></a>
				<a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard.index') }}"><img
								src="{{ asset('img') }}/logo.png" alt="logo" /></a>
		</div>
		<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
				<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
						<span class="icon-menu"></span>
				</button>
				<ul class="navbar-nav mr-lg-2">
						<li class="nav-item nav-search d-none d-lg-block">
								<div class="input-group">
										<div class="input-group-prepend hover-cursor" id="navbar-search-icon">
												<span class="input-group-text" id="search">
														<i class="icon-search"></i>
												</span>
										</div>
										<input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
												aria-label="search" aria-describedby="search" />
								</div>
						</li>
				</ul>

				<ul class="navbar-nav navbar-nav-right">
						<li class="nav-item nav-profile dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="coba">
										<h5>Saldo : {{ Str::rupiah(Auth::user()->saldo->saldo) }}</h5>
								</a>
								<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="coba">
										<a class="dropdown-item">
												<i class="ti-export text-primary"></i>
												Penarikan
										</a>
										<a class="dropdown-item">
												<i class="ti-import text-primary"></i>
												Penambahan
										</a>
								</div>
						</li>
						<li class="nav-item dropdown">


						</li>
						<li class="nav-item dropdown">
								<a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
										data-toggle="dropdown">
										<i class="icon-bell mx-0"></i>
										<span class="count"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
										aria-labelledby="notificationDropdown">
										<p class="font-weight-normal dropdown-header float-left mb-0">
												Notifications
										</p>
										<a class="dropdown-item preview-item">
												<div class="preview-thumbnail">
														<div class="preview-icon bg-success">
																<i class="ti-info-alt mx-0"></i>
														</div>
												</div>
												<div class="preview-item-content">
														<h6 class="preview-subject font-weight-normal">
																Application Error
														</h6>
														<p class="font-weight-light small-text text-muted mb-0">
																Just now
														</p>
												</div>
										</a>
										<a class="dropdown-item preview-item">
												<div class="preview-thumbnail">
														<div class="preview-icon bg-warning">
																<i class="ti-settings mx-0"></i>
														</div>
												</div>
												<div class="preview-item-content">
														<h6 class="preview-subject font-weight-normal">Settings</h6>
														<p class="font-weight-light small-text text-muted mb-0">
																Private message
														</p>
												</div>
										</a>
										<a class="dropdown-item preview-item">
												<div class="preview-thumbnail">
														<div class="preview-icon bg-info">
																<i class="ti-user mx-0"></i>
														</div>
												</div>
												<div class="preview-item-content">
														<h6 class="preview-subject font-weight-normal">
																New user registration
														</h6>
														<p class="font-weight-light small-text text-muted mb-0">
																2 days ago
														</p>
												</div>
										</a>
								</div>
						</li>
						<li class="nav-item nav-profile dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
										<img src="{{ asset('assets') }}/images/faces/face28.jpg" alt="profile" />
								</a>
								<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
										<a class="dropdown-item">
												<i class="ti-settings text-primary"></i>
												Settings
										</a>
										<a class="dropdown-item">
												<i class="ti-power-off text-primary"></i>
												Logout
										</a>
								</div>
						</li>

						<li class="nav-item nav-settings d-none d-lg-flex">
								<a class="nav-link" href="#">
										<i class="icon-ellipsis"></i>
								</a>
						</li>
				</ul>
				<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
						data-toggle="offcanvas">
						<span class="icon-menu"></span>
				</button>
		</div>
</nav>
