@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">
												Riwayat Transaksi
										</h3>
										<h6 class="font-weight-normal mb-0">
												Semua sejarah transaksimu ada disini bestea ☺
												{{-- <span class="text-primary">3 unread alerts!</span> --}}
										</h6>
								</div>
						</div>


						<div class="row mt-5">
								<div class="col-12">
										<div class="card">
												<div class="card-body">
														<h5>History transaksi.</h5>
														<table class="table">
																<thead>
																		<tr>
																				<th scope="col">#</th>
																				<th scope="col">Kode Transaksi</th>
																				<th scope="col">Total</th>
																		</tr>
																</thead>
																<tbody>
																		@foreach ($transaksis as $transaksi)
																				<tr>
																						<th scope="row">{{ $loop->iteration }}</th>
																						<td>
																								<a href="{{ route('admin.transaksi.transaksi.show', $transaksi->id) }}">{{ $transaksi->id }}</a>
																						</td>
																						<td>{{ Str::rupiah($transaksi->total) }}</td>
																				</tr>
																		@endforeach

																</tbody>
														</table>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection
