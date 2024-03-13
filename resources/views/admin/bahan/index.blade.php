@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">Bahan Baku</h3>
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
														<h5 class="fw-bold mb-3">Tambah data bahan baku</h5>
														<form action="{{ route('admin.bahan.store') }}" method="POST">
																@csrf
																<div class="row py-3">


																		<div class="col-6">
																				<div class="mb-3">
																						<label for="nama" class="form-label">Nama Bahan</label>
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
																						<label for="harga" class="form-label">Harga Beli Bahan</label>
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
																		<div class="col-6">
																				<div class="mb-3">
																						<label for="bobot" class="form-label">Bobot Bahan</label>
																						<input type="number" class="form-control @error('bobot') is-invalid @enderror" name="bobot"
																								id="bobot" required>
																						@error('bobot')
																								<div id="bobot" class="invalid-feedback">
																										{{ $message }}
																								</div>
																						@enderror
																				</div>
																		</div>
																		<div class="col-6">
																				<div class="mb-3">
																						<label for="satuan" class="form-label">Satuan Bahan</label>
																						<select class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan"
																								required>
																								<option selected value="ml">ml</option>
																								<option value="gr">gr</option>
																								<option value="kg">kg</option>
																						</select>
																						@error('satuan')
																								<div id="satuan" class="invalid-feedback">
																										{{ $message }}
																								</div>
																						@enderror
																				</div>
																		</div>
																		<div class="col-6">
																				<div class="mb-3">
																						<label for="harga_satuan" class="form-label">Harga Satuan Bahan</label>
																						<div class="input-group">
																								<span class="input-group-text">Rp</span>
																								<input type="text" class="form-control @error('harga_satuan') is-invalid @enderror"
																										name="harga_satuan" id="harga_satuan" readonly required>
																						</div>
																						@error('harga_satuan')
																								<div id="harga_satuan" class="invalid-feedback">
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
														<h5>Bahan baku saat ini.</h5>
														<table class="table">
																<thead>
																		<tr>
																				<th scope="col">#</th>
																				<th scope="col">Nama</th>
																				<th scope="col">Harga Beli</th>
																				<th scope="col">Bobot</th>
																				<th scope="col">Satuan</th>
																				<th scope="col">Harga Satuan</th>
																		</tr>
																</thead>
																<tbody>
																		@foreach ($bahans as $bahan)
																				<tr>
																						<th scope="row">{{ $loop->iteration }}</th>
																						<td>{{ $bahan->nama }}</td>
																						<td>{{ Str::rupiah($bahan->harga) }}</td>
																						<td>{{ $bahan->bobot }}</td>
																						<td>{{ $bahan->satuan }}</td>
																						<td>{{ $bahan->harga_satuan }}</td>
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

@push('script')
		<script>
				$(document).ready(function() {
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
