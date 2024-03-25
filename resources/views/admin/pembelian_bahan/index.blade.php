@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">Pembelian Bahan Baku</h3>
										<h6 class="font-weight-normal mb-0">
												Kamu bisa melakukan transaksi pembelian bahan baku disini
												{{-- <span class="text-primary">3 unread alerts!</span> --}}
										</h6>
								</div>
						</div>

						<div class="row mt-5">
								<div class="col-12">
										<div class="card">
												<div class="card-body">
														<h5 class="fw-bold mb-3">Tambah transaksi pembelian bahan baku</h5>
														<form action="{{ route('admin.stok.store') }}" method="POST">
																@csrf
																<div class="row py-3">

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
																						<label for="saldo" class="form-label">Sumber Dana</label>
																						<select class="form-control @error('saldo') is-invalid @enderror" id="saldo" name="saldo"
																								required>
																								<option selected>-- pilih sumber dana --</option>
																								@foreach ($danas as $dana)
																										<option value="{{ $dana->id }}">{{ $dana->nama }}</option>
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
																						<label for="jumlah" class="form-label">Jumlah Penambahan</label>
																						<input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
																								id="jumlah" placeholder="masukan dalam hitungan pcs" required>
																						@error('jumlah')
																								<div id="jumlah" class="invalid-feedback">
																										{{ $message }}
																								</div>
																						@enderror
																				</div>
																		</div>
																		{{-- opsi harga berbeda --}}
																		<div class="col-6">
																				<label for="harga_opsi" class="form-label">Harga Berbeda</label>
																				<div class="input-group mb-3">
																						<div class="input-group-prepend">
																								<div class="input-group-text">
																										<input id="harga_opsi" type="checkbox" aria-label="Checkbox for following text input"
																												onchange="toggleInput()">
																								</div>
																						</div>
																						<input id="harga_input" placeholder="(opsional) jika harga berbeda" type="number"
																								class="form-control" name="harga_input" aria-label="Text input with checkbox">
																				</div>
																		</div>
																</div>

																{{--  tadi sampe sini ya lur --}}
																{{-- noted ! 
																		rencananya : 
																		1 . get id bahanya , kemudian get jumlah penambahan , pertimbangakan menggunakan saldo . atau hanya read only
																		2. atau bikin aja pembelian bahan baku , yang mana akan menambah stok bahan baku ini ,
																		3. stok bahan baku oke banget kalo di munculin di dashboard.
																		4. dan jangan lupa pikirin untuk sifat es sama teh

																		SEMANGATT LURRRR !!!!!!!!!
																		 --}}


																<div class="col-12">
																		<button type="submit" class="btn btn-primary">Simpan</button>
																</div>
												</div>
												</form>
										</div>
								</div>
						</div>
				</div>
		</div>
		<div class="row mt-5">
				<div class="col-12">
						<div class="card">
								<div class="card-body">
										<h5>Histori transaksi pembelian bahan baku.</h5>
										<table class="table">
												<thead>
														<tr>
																<th scope="col">#</th>
																<th scope="col">Nama bahan</th>
																<th scope="col">Jumlah Beli</th>
																<th scope="col">Harga Satuan</th>
																<th scope="col">Total</th>
																<th scope="col">Tanggal</th>
														</tr>
												</thead>
												<tbody>
														@foreach ($pembelians as $pembelian)
																<tr>
																		<th scope="row">{{ $loop->iteration }}</th>
																		<td>{{ $pembelian->bahan->nama }}</td>
																		<td>{{ $pembelian->jumlah }}</td>
																		<td>{{ Str::rupiah($pembelian->harga_satuan) }}</td>
																		<td>{{ Str::rupiah($pembelian->total) }}</td>
																		<td>{{ Str::tanggalWaktu($pembelian->created_at) }}</td>
																</tr>
														@endforeach

												</tbody>
										</table>
								</div>
						</div>
				</div>
		</div>
@endsection

@push('script')
		<script>
				$(document).ready(function() {

						toggleInput();

						function toggleInput() {
								var checkbox = document.getElementById("harga_opsi");
								var inputNumber = document.getElementById("harga_input");
								if (!checkbox.checked) {
										inputNumber.disabled = true;
								} else {
										inputNumber.disabled = false;
								}
						}
						document.getElementById("harga_opsi").addEventListener("change", toggleInput);


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
