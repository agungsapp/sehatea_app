@extends('admin.layouts.main')
@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">Transaksi Penjualan</h3>
										<h6 class="font-weight-normal mb-0">
												Ini sama seperti kasir ya, jadi lakukan transaksi di sini 😊
										</h6>
								</div>
						</div>

						<div class="row mt-5">
								<div class="col-12">
										<div class="card">
												<div class="card-body">
														<h5 class="fw-bold mb-3">Tambah transaksi baru</h5>
														<form action="{{ route('admin.transaksi.penjualan.store') }}" method="POST">
																@csrf
																<div class="row py-3">
																		@foreach ($produks as $index => $produk)
																				<div class="col-6">
																						<div class="d-flex justify-content-between align-items-baseline mb-3">
																								<label class="form-label">{{ $produk->nama }}</label>
																								<div class="qty mt-5">
																										<span class="minus bg-dark" data-id="count{{ $produk->id }}">-</span>
																										<input type="number" class="count" id="count{{ $produk->id }}"
																												name="qty[{{ $produk->id }}]" value="0">
																										<span class="plus bg-dark" data-id="count{{ $produk->id }}">+</span>
																								</div>
																						</div>
																				</div>
																		@endforeach
																</div>

																<div class="col-12">
																		<button type="submit" class="btn btn-primary">Simpan</button>
																</div>
														</form>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection

@push('css')
		<style>
				.qty .count {
						color: #000;
						display: inline-block;
						vertical-align: top;
						font-size: 25px;
						font-weight: 700;
						line-height: 30px;
						padding: 0 2px;
						min-width: 35px;
						text-align: center;
				}

				.qty .plus {
						cursor: pointer;
						display: inline-block;
						vertical-align: top;
						color: white;
						width: 30px;
						height: 30px;
						font: 30px/1 Arial, sans-serif;
						text-align: center;
						border-radius: 50%;
				}

				.qty .minus {
						cursor: pointer;
						display: inline-block;
						vertical-align: top;
						color: white;
						width: 30px;
						height: 30px;
						font: 30px/1 Arial, sans-serif;
						text-align: center;
						border-radius: 50%;
						background-clip: padding-box;
				}

				div {
						text-align: center;
				}

				.minus:hover {
						background-color: #717fe0 !important;
				}

				.plus:hover {
						background-color: #717fe0 !important;
				}

				/*Prevent text selection*/
				span {
						-webkit-user-select: none;
						-moz-user-select: none;
						-ms-user-select: none;
				}

				input {
						border: 0;
						width: 2%;
				}

				nput::-webkit-outer-spin-button,
				input::-webkit-inner-spin-button {
						-webkit-appearance: none;
						margin: 0;
				}

				input:disabled {
						background-color: white;
				}
		</style>
@endpush


@push('script')
		<script>
				$(document).ready(function() {
						// Handler when the plus button is clicked
						$('.plus').off('click').on('click', function() {
								var id = $(this).attr('data-id'); // Get the unique identifier for the related input
								var input = $('#' + id);
								var currentValue = parseInt(input.val());
								console.log(id, input, currentValue);
								input.val(currentValue + 1); // Increment the value
						});

						// Handler when the minus button is clicked
						$('.minus').off('click').on('click', function() {
								var id = $(this).attr('data-id'); // Get the unique identifier for the related input
								var input = $('#' + id);
								var currentValue = parseInt(input.val());
								console.log(id, input, currentValue - 1);
								if (currentValue > 0) {
										input.val(currentValue - 1); // Decrement the value but not below 1
								}
						});
				});
		</script>
@endpush
