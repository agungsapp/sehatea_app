@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">
												Detail Transaksi
										</h3>
										<h6 class="font-weight-normal mb-0">
												untuk transaksi dengan id <strong class="text-success">{{ $id }}</strong>
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
																				<th scope="col">Produk</th>
																				<th scope="col">Jumlah</th>
																				<th scope="col">Harga Satuan</th>
																				<th scope="col">Sub Total</th>
																		</tr>
																</thead>
																<tbody>
																		@foreach ($details as $detail)
																				<tr>
																						<th scope="row">{{ $loop->iteration }}</th>
																						<td>{{ $detail->produk->nama }}</td>
																						<td>{{ $detail->jumlah }}</td>
																						<td>{{ Str::rupiah($detail->harga_satuan) }}</td>
																						<td>{{ Str::rupiah($detail->subtotal) }}</td>
																				</tr>
																		@endforeach

																</tbody>
																<tfoot>
																		<tr>
																				<td colspan="4"></td>
																				<td class="text-end">
																						<strong>Total : {{ Str::rupiah($details->sum('subtotal')) }}</strong>
																				</td>
																		</tr>
																</tfoot>
														</table>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection
