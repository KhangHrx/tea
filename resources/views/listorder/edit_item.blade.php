@extends('master-layout')
@section('title','Chỉnh sửa đơn hàng')
@section('content')
<section id="paid-order-admin" class="order home-page">	
    <main class="right-content pt-3">
    <div class="container d-inline">
								<button
									class="change-btn"
									type="button"
									data-toggle="modal"
									data-target="#change-tea-type"
								>
									<i class="fas fa-edit text-primary"></i>
								</button>
								<!-- Modal -->
								<div
									class="modal fade text-left"
									id="change-tea-type"
									role="dialog"
								>
									<div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">
													Thay đổi thông tin đơn hàng
												</h4>
											</div>
											<form action="" method="post">
												@csrf
												<div class="modal-body">
													<input type="text" value="" style="display: none;" name="id">
													<div class="form-group">
														<label for="item_id">Tên loại chè</label>
														<select class="form-control" id="item_id" name="item_id" >
														@foreach($sp as $item)
															<option {{ $toproduct['id']==$item['id']?'selected':''}}
															value="{{$item['id']}}">{{$item['name']}}</option>
														@endforeach
														</select>
													</div>

													<div class="form-group">
													<label for="weight">Khối lượng</label>
														<input
															type="text"
															class="form-control"
															value="{{$toproduct->weight}}" name="weight"
															id="weight"
														/>
														<div class="text-danger mt-2"></div>
															<div class="text-danger"></div>
													</div>

													<div class="form-group">
													<label for="weight">Khấu trừ %</label>
														<input
															type="text"
															class="form-control"
															value="{{$toproduct->deduction_per}}" name="deduction_per"
														/>
														<div class="text-danger mt-2"></div>
															<div class="text-danger"></div>
													</div>

													<div class="form-group">
													<label for="weight">Khấu trừ kg</label>
														<input
															type="text"
															class="form-control"
															value="{{$toproduct->deduction_kg}}" name="deduction_kg"
														/>
														<div class="text-danger mt-2"></div>
															<div class="text-danger"></div>
													</div>

													<div class="form-group">
													<label for="unit_price">Đơn giá</label>
														<input
															type="text"
															class="form-control"
															value="{{number_format($toproduct->orderDetail->price).' '.'Đ' }}" name="unit_price"
														/>
														<div class="text-danger mt-2"></div>
															<div class="text-danger"></div>
													</div>

													<div class="form-group">
													<label for="note">Ghi chú</label>
														<input
															type="text"
															class="form-control"
															value="{{$toproduct->note}}" name="note"
														/>
														<div class="text-danger mt-2"></div>
															<div class="text-danger"></div>
													</div>

													<div class="modal-footer">
														<button type="submit" class="btn btn-success">Lưu thay đổi</button>
														<button
															type="button"
															class="btn btn-secondary"
															data-dismiss="modal"
														>
															Đóng
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
    </main>
</section>
@endsection