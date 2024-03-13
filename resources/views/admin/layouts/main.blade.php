<!DOCTYPE html>
<html lang="en">

<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<title>Skydash Admin</title>
		<!-- plugins:css -->
		<link rel="stylesheet" href="{{ asset('assets') }}/vendors/feather/feather.css" />
		<link rel="stylesheet" href="{{ asset('assets') }}/vendors/ti-icons/css/themify-icons.css" />
		<link rel="stylesheet" href="{{ asset('assets') }}/vendors/css/vendor.bundle.base.css" />
		<!-- endinject -->
		<!-- Plugin css for this page -->
		<link rel="stylesheet" href="{{ asset('assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
		<link rel="stylesheet" href="{{ asset('assets') }}/vendors/ti-icons/css/themify-icons.css" />
		{{-- <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css" /> --}}
		<!-- End plugin css for this page -->
		<!-- inject:css -->
		<link rel="stylesheet" href="{{ asset('assets') }}/css/vertical-layout-light/style.css" />
		<!-- endinject -->
		<link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.png" />
</head>

<body>

		@include('sweetalert::alert')


		<div class="container-scroller">
				<!-- partial:partials/_navbar.html -->
				@include('admin.layouts.partials.navbar')
				<!-- partial -->
				<div class="container-fluid page-body-wrapper">
						<!-- partial:partials/_settings-panel.html -->
						<div class="theme-setting-wrapper">
								<div id="settings-trigger"><i class="ti-settings"></i></div>
								<div id="theme-settings" class="settings-panel">
										<i class="settings-close ti-close"></i>
										<p class="settings-heading">SIDEBAR SKINS</p>
										<div class="sidebar-bg-options selected" id="sidebar-light-theme">
												<div class="img-ss rounded-circle bg-light mr-3 border"></div>
												Light
										</div>
										<div class="sidebar-bg-options" id="sidebar-dark-theme">
												<div class="img-ss rounded-circle bg-dark mr-3 border"></div>
												Dark
										</div>
										<p class="settings-heading mt-2">HEADER SKINS</p>
										<div class="color-tiles mx-0 px-4">
												<div class="tiles success"></div>
												<div class="tiles warning"></div>
												<div class="tiles danger"></div>
												<div class="tiles info"></div>
												<div class="tiles dark"></div>
												<div class="tiles default"></div>
										</div>
								</div>
						</div>
						<div id="right-sidebar" class="settings-panel">
								<i class="settings-close ti-close"></i>
								<ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
										<li class="nav-item">
												<a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
														aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
										</li>
										<li class="nav-item">
												<a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
														aria-controls="chats-section">CHATS</a>
										</li>
								</ul>
								<div class="tab-content" id="setting-content">
										<div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
												aria-labelledby="todo-section">
												<div class="add-items d-flex mb-0 px-3">
														<form class="form w-100">
																<div class="form-group d-flex">
																		<input type="text" class="form-control todo-list-input" placeholder="Add To-do" />
																		<button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">
																				Add
																		</button>
																</div>
														</form>
												</div>
												<div class="list-wrapper px-3">
														<ul class="d-flex flex-column-reverse todo-list">
																<li>
																		<div class="form-check">
																				<label class="form-check-label">
																						<input class="checkbox" type="checkbox" />
																						Team review meeting at 3.00 PM
																				</label>
																		</div>
																		<i class="remove ti-close"></i>
																</li>
																<li>
																		<div class="form-check">
																				<label class="form-check-label">
																						<input class="checkbox" type="checkbox" />
																						Prepare for presentation
																				</label>
																		</div>
																		<i class="remove ti-close"></i>
																</li>
																<li>
																		<div class="form-check">
																				<label class="form-check-label">
																						<input class="checkbox" type="checkbox" />
																						Resolve all the low priority tickets due today
																				</label>
																		</div>
																		<i class="remove ti-close"></i>
																</li>
																<li class="completed">
																		<div class="form-check">
																				<label class="form-check-label">
																						<input class="checkbox" type="checkbox" checked />
																						Schedule meeting for next week
																				</label>
																		</div>
																		<i class="remove ti-close"></i>
																</li>
																<li class="completed">
																		<div class="form-check">
																				<label class="form-check-label">
																						<input class="checkbox" type="checkbox" checked />
																						Project review
																				</label>
																		</div>
																		<i class="remove ti-close"></i>
																</li>
														</ul>
												</div>
												<h4 class="text-muted font-weight-light mb-0 mt-5 px-3">
														Events
												</h4>
												<div class="events px-3 pt-4">
														<div class="wrapper d-flex mb-2">
																<i class="ti-control-record text-primary mr-2"></i>
																<span>Feb 11 2018</span>
														</div>
														<p class="font-weight-thin text-gray mb-0">
																Creating component page build a js
														</p>
														<p class="text-gray mb-0">The total number of sessions</p>
												</div>
												<div class="events px-3 pt-4">
														<div class="wrapper d-flex mb-2">
																<i class="ti-control-record text-primary mr-2"></i>
																<span>Feb 7 2018</span>
														</div>
														<p class="font-weight-thin text-gray mb-0">
																Meeting with Alisa
														</p>
														<p class="text-gray mb-0">Call Sarah Graves</p>
												</div>
										</div>
										<!-- To do section tab ends -->
										<div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
												<div class="d-flex align-items-center justify-content-between border-bottom">
														<p class="settings-heading border-top-0 border-bottom-0 mb-3 pb-0 pl-3 pt-0">
																Friends
														</p>
														<small class="settings-heading border-top-0 border-bottom-0 font-weight-normal mb-3 pb-0 pr-3 pt-0">See
																All</small>
												</div>
												<ul class="chat-list">
														<li class="list active">
																<div class="profile">
																		<img src="{{ asset('assets') }}/images/faces/face1.jpg" alt="image" /><span
																				class="online"></span>
																</div>
																<div class="info">
																		<p>Thomas Douglas</p>
																		<p>Available</p>
																</div>
																<small class="text-muted my-auto">19 min</small>
														</li>
														<li class="list">
																<div class="profile">
																		<img src="{{ asset('assets') }}/images/faces/face2.jpg" alt="image" /><span
																				class="offline"></span>
																</div>
																<div class="info">
																		<div class="wrapper d-flex">
																				<p>Catherine</p>
																		</div>
																		<p>Away</p>
																</div>
																<div class="badge badge-success badge-pill mx-2 my-auto">
																		4
																</div>
																<small class="text-muted my-auto">23 min</small>
														</li>
														<li class="list">
																<div class="profile">
																		<img src="{{ asset('assets') }}/images/faces/face3.jpg" alt="image" /><span
																				class="online"></span>
																</div>
																<div class="info">
																		<p>Daniel Russell</p>
																		<p>Available</p>
																</div>
																<small class="text-muted my-auto">14 min</small>
														</li>
														<li class="list">
																<div class="profile">
																		<img src="{{ asset('assets') }}/images/faces/face4.jpg" alt="image" /><span
																				class="offline"></span>
																</div>
																<div class="info">
																		<p>James Richardson</p>
																		<p>Away</p>
																</div>
																<small class="text-muted my-auto">2 min</small>
														</li>
														<li class="list">
																<div class="profile">
																		<img src="{{ asset('assets') }}/images/faces/face5.jpg" alt="image" /><span
																				class="online"></span>
																</div>
																<div class="info">
																		<p>Madeline Kennedy</p>
																		<p>Available</p>
																</div>
																<small class="text-muted my-auto">5 min</small>
														</li>
														<li class="list">
																<div class="profile">
																		<img src="{{ asset('assets') }}/images/faces/face6.jpg" alt="image" /><span
																				class="online"></span>
																</div>
																<div class="info">
																		<p>Sarah Graves</p>
																		<p>Available</p>
																</div>
																<small class="text-muted my-auto">47 min</small>
														</li>
												</ul>
										</div>
										<!-- chat tab ends -->
								</div>
						</div>
						<!-- partial -->
						<!-- partial:partials/_sidebar.html -->
						@include('admin.layouts.partials.sidebar')
						<!-- partial -->
						<div class="main-panel">
								<div class="content-wrapper">
										@yield('content')
								</div>
								<!-- content-wrapper ends -->
								<!-- partial:partials/_footer.html -->
								<footer class="footer">
										<div class="d-sm-flex justify-content-center justify-content-sm-between">
												<span class="text-muted text-sm-left d-block d-sm-inline-block text-center">Copyright © 2024. Sehatea
														<a href="https://www.bootstrapdash.com/" target="_blank">Iced Tea</a>
														. Developed By Agung Saputra.</span>
												<span class="float-sm-right d-block mt-sm-0 float-none mt-1 text-center">Hand-crafted & made with
														<i class="ti-heart text-danger ml-1"></i></span>
										</div>
										<div class="d-sm-flex justify-content-center justify-content-sm-between">
												<span class="text-muted text-sm-left d-block d-sm-inline-block text-center">Distributed by
														<a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
										</div>
								</footer>
								<!-- partial -->
						</div>
						<!-- main-panel ends -->
				</div>
				<!-- page-body-wrapper ends -->
		</div>
		<!-- container-scroller -->

		<!-- plugins:js -->
		<script src="{{ asset('assets') }}/vendors/js/vendor.bundle.base.js"></script>
		<!-- endinject -->
		<!-- Plugin js for this page -->
		<script src="{{ asset('assets') }}/vendors/chart.js/Chart.min.js"></script>
		<script src="{{ asset('assets') }}/vendors/datatables.net/jquery.dataTables.js"></script>
		<script src="{{ asset('assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
		<script src="{{ asset('assets') }}/js/dataTables.select.min.js"></script>

		<!-- End plugin js for this page -->
		<!-- inject:js -->
		<script src="{{ asset('assets') }}/js/off-canvas.js"></script>
		<script src="{{ asset('assets') }}/js/hoverable-collapse.js"></script>
		<script src="{{ asset('assets') }}/js/template.js"></script>
		<script src="{{ asset('assets') }}/js/settings.js"></script>
		<script src="{{ asset('assets') }}/js/todolist.js"></script>
		<!-- endinject -->
		<!-- Custom js for this page-->
		<script src="{{ asset('assets') }}/js/dashboard.js"></script>
		<script src="{{ asset('assets') }}/js/Chart.roundedBarCharts.js"></script>
		<!-- End custom js for this page-->

		{{-- sweetalert --}}
		@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

		@stack('script')
</body>

</html>
