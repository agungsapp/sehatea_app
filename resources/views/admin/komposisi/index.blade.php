@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">Data Komposisi Produk</h3>
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
														<h5 class="fw-bold mb-3">Tambah data komposisi produk</h5>
														<form action="{{ route('admin.komposisi.store') }}" method="POST">
																@csrf
																<div class="row py-3">





																		<div class="col-6">
																				<div class="mb-3">
																						<label for="produk" class="form-label">Produk</label>
																						<select class="form-control @error('produk') is-invalid @enderror" id="produk" name="produk"
																								required>
																								<option selected>-- pilih produk --</option>
																								@foreach ($produks as $produk)
																										<option value="{{ $produk->id }}">{{ $produk->nama }}</option>
																								@endforeach

																						</select>
																						@error('produk')
																								<div id="produk" class="invalid-feedback">
																										{{ $message }}
																								</div>
																						@enderror
																				</div>
																		</div>

																		<div class="col-6">
																				<div class="mb-3">
																						<label for="bahan" class="form-label">Bahan Baku</label>
																						<select class="form-control @error('bahan') is-invalid @enderror" id="bahan" name="bahan"
																								required>
																								<option selected>-- pilih bahan baku --</option>
																								@foreach ($bahans as $bahan)
																										<option value="{{ $bahan->id }}">{{ $bahan->nama }}</option>
																								@endforeach

																						</select>
																						@error('bahan')
																								<div id="bahan" class="invalid-feedback">
																										{{ $message }}
																								</div>
																						@enderror
																				</div>
																		</div>

																		<div class="col-6">
																				<div class="mb-3">
																						<label for="takaran" class="form-label">Takaran</label>
																						<div class="input-group">
																								<span class="input-group-text">ml/gr/kg</span>
																								<input type="text" class="form-control @error('takaran') is-invalid @enderror" name="takaran"
																										id="takaran" required>
																						</div>
																						@error('takaran')
																								<div id="takaran" class="invalid-feedback">
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
																				<th scope="col">Produk</th>
																				<th scope="col">Bahan</th>
																				<th scope="col">Takaran</th>
																				<th scope="col">Total Harga</th>
																		</tr>
																</thead>
																<tbody>
																		@foreach ($produks as $produk)
																				@php
																						$hpp = $produk->komposisi->sum('total_harga');
																				@endphp
																				@foreach ($produk->komposisi as $index => $kompos)
																						<tr>
																								@if ($index === 0)
																										<th scope="row" rowspan="{{ $produk->komposisi->count() }}">{{ $loop->parent->iteration }}
																										</th>
																										<td rowspan="{{ $produk->komposisi->count() }}">
																												<strong> {{ $produk->nama }}</strong>
																												<br>
																												<p class="fw-bold">Total HPP: {{ Str::rupiah($hpp) }}</p>
																										</td>
																								@endif
																								<td>{{ $kompos->bahan->nama }}</td>
																								<td>{{ $kompos->takaran }}</td>
																								<td>{{ Str::rupiah($kompos->total_harga) }}</td>
																						</tr>
																				@endforeach
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

@push('script')
		<script>
				$(document).ready(function() {


						// initial select2
						$('#bahan').select2({

						});


						const harga = $('#harga');
						const bobot = $('#bobot');
						const satuan = $('#satuan');
						const hargaSatuan = $('#harga_satuan');

						// Fungsi untuk memformat harga
						function formatHarga(value) {
								return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						}

						// Fungsi untuk memperbarui harga_satuan berdasarkan rumus
						function updateHargaSatuan() {
								const hargaValue = parseFloat(harga.val()) || 0;
								const bobotValue = parseFloat(bobot.val()) || 1; // default ke 1 jika bobot 0
								const hargaSatuanValue = hargaValue / bobotValue;

								// Memformat hargaSatuanValue dan menampilkan pada input harga_satuan
								hargaSatuan.val(formatHarga(hargaSatuanValue.toFixed(2)));
						}

						// Tempelkan pendengar acara input ke field harga, bobot, dan satuan
						harga.on('input', function() {
								updateHargaSatuan();
						});

						bobot.on('input', function() {
								updateHargaSatuan();
						});

						satuan.on('change', function() {
								updateHargaSatuan();
						});
				});
		</script>
@endpush
