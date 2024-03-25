@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">Produk</h3>
										<h6 class="font-weight-normal mb-0">
												All systems are running smoothly! You have
												<span class="text-primary">3 unread alerts!</span>
										</h6>
								</div>
						</div>

						<div class="row mt-5">
								<div class="col-12">
										<div class="card">
												<div class="card-body">
														<h5 class="fw-bold mb-3">Tambah data produk baru</h5>
														<form action="{{ route('admin.produk.store') }}" method="POST">
																@csrf
																<div class="row py-3">


																		<div class="col-6">
																				<div class="mb-3">
																						<label for="nama" class="form-label">Nama Produk</label>
																						<input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
																								id="nama" aria-describedby="nama" required>
																						@error('nama')
																								<div id="nama" class="invalid-feedback">
																										{{ $message }}
																								</div>
																						@enderror
																				</div>
																		</div>
																		<div class="col-6">
																				<div class="mb-3">
																						<label for="harga" class="form-label">Harga Jual</label>
																						<div class="input-group">
																								<span class="input-group-text">Rp</span>
																								<input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga"
																										id="harga" required>
																						</div>
																						@error('harga')
																								<div id="harga" class="invalid-feedback">
																										{{ $message }}
																								</div>
																						@enderror
																				</div>
																		</div>

																		<div class="col-12">
																				<button type="submit" class="btn btn-primary">Simpan</button>
																		</div>
																</div>
														</form>
												</div>
										</div>
								</div>
						</div>


						<div class="row mt-5">
								<div class="col-12">
										<div class="card">
												<div class="card-body">
														<h5>Produk tersedia saat ini.</h5>
														<table class="table">
																<thead>
																		<tr>
																				<th scope="col">#</th>
																				<th scope="col">Nama</th>
																				<th scope="col">Hpp</th>
																				<th scope="col">Harga Jual</th>
																				<th scope="col">Profit</th>
																		</tr>
																</thead>
																<tbody>
																		@foreach ($produks as $produk)
																				<tr>
																						<th scope="row">{{ $loop->iteration }}</th>
																						<td>{{ $produk->nama }}</td>
																						<td>{{ Str::rupiah($produk->hpp) }}</td>
																						<td>{{ Str::rupiah($produk->harga_jual) }}</td>
																						<td class="text-success">{{ Str::rupiah($produk->harga_jual - $produk->hpp) }} +</td>
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
