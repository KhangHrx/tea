@extends('master-layout')
@section('title','Trang chủ')
@section('content')
		<section id="home-page-admin" class="home-page">
			
			<main class="right-content list-customer-content">
				
				<!-- table info section -->
				<div class="container mt-5">
					<div class="list-customer-header mt-4 d-flex">
						<h3>Danh sách nông hộ</h3>
						<form action="{{route('customer.search')}}" method="get">
						
							<input
								type="text"
								class="search-box search-box-list-customer"
								id="search"
								placeholder="Nhập tên nông hộ ..." name="key" value="{{$key}}"
							/>	
							<button class="btn btn-primary" type="submit">Tìm</button>	
						</form>			
					</div>
					@if($model->count()==0)
						<div class="container">
							<div class="alert alert-danger mt-4">Không có kết quả tìm kiếm phù hợp</div>
						</div>
					@else
					<div class="new-customer mt-2">
						<a href="{{route('order.add.new_customer')}}" class="btn btn-danger">
							Tạo đơn cho nông hộ mới <i class="fas fa-plus"></i></a>
					</div>
					<div class="customer-table mt-3">
						<table class="table text-center">
							<thead class="thead-light">
								<tr>
									<th>
										Nông hộ
									</th>
									<th>
										Địa chỉ
									</th>
									<th>
										Số điện thoại
									</th>
									<th>
										Tổng khối lượng
									</th>
									<th>
										Thành tiền
									</th>
									<th>
										
									</th>
									<th>
										
									</th>
									<th>

									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($model as $m)
								<tr>
									<td>
										{{$m->name}}
									</td>
									<td>{{$m->address}}</td>
									<td>{{$m->phone}}</td>
									<td>
									<?php
									$total_weight = 0;
									$total_money = 0;
									foreach($m->customerOrders as $item)
									{
										$total_weight += $item->total_weight;
										$total_money += $item->total_money;
									}
									?> <span class="mass-digit">{{$total_weight}}kg</span></td>
									<td>{{number_format($total_money)}}đ</td>
									<td>
										<button class="btn btn-primary" data-toggle="modal" data-target="#edit-customer-{{$m->id}}">Sửa</button>
										<div class="modal fade" id="edit-customer-{{$m->id}}" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<form action="{{route('customer.edit')}}" class="form-group-add-customer" method="post" onsubmit="return submitEdit({{$m->id}})">
													@csrf
														<div class="modal-header">
															<h4 class="modal-title">Tên: {{$m->name}}</h4>
															<button type="button" data-dismiss="modal">&times;</button>
														</div>
														<div class="modal-body text-left">
															<input type="text" name="id" value="{{$m->id}}" style="display: none;">
															<div class="form-group">
																<label for="">Địa chỉ:</label>
																<input
																	type="text"
																	class="form-control"
																	value="{{$m->address}}" name="address" id="editAddress{{$m->id}}"
																/>
																@if($errors->has('address'))
																	<div class="text-danger">{{$errors->first('address')}}</div>
																@endif
																<div class="text-danger mt-2" id="editAddressMessage{{$m->id}}"></div>
															</div>
															<div class="form-group">
																<label for="">Số điện thoại</label>
																<input
																	type="text"
																	class="form-control"
																	value="{{$m->phone}}" name="phone" id="editPhone{{$m->id}}"
																/>
																@if($errors->has('phone'))
																	<div class="text-danger">{{$errors->first('phone')}}</div>
																@endif
																<div class="text-danger mt-2" id="editPhoneMessage{{$m->id}}"></div>
															</div>
														</div>
														<div class="modal-footer d-flex justify-content-center">
															<button class="btn btn-success">Lưu thay đổi</button>
															<button
																type="button"
																class="btn btn-secondary"
																data-dismiss="modal"
															>
																Đóng
															</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</td>
									<td><a href="{{route('order.list_by_customer',['id'=>($m->id)])}}" class="btn btn-warning">Danh sách đơn</a></td>
									<td><a href="{{route('order.add.old_customer',['id'=>($m->id)])}}" class="btn btn-success">Giao dịch mới
										 <i class="fas fa-plus"></i></a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- add new customer section -->
					<div class="add-new-customer">
						<button
							class="btn btn-primary"
							data-toggle="modal"
							data-target="#add-customer"
							type="button"
						>
							Thêm nông hộ
						</button>
						<!-- modal -->
						<div class="modal fade" id="add-customer" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Thêm mới nông hộ</h4>
										<button type="button" data-dismiss="modal">&times;</button>
									</div>
									<form action="{{route('customer.add')}}" class="form-group-add-customer" method="post" onsubmit="return addCustomer()">
										@csrf
										<div class="modal-body">
											<div class="form-group">
												<label for="">Tên nông hộ</label>
												<input
													type="text"
													class="form-control"
													name="name" id="addCustomerName"
												/>
												<div class="text-danger mt-2" id="addCustomerNameMessage"></div>
												@if($errors->has('name'))
													<div class="text-danger">{{$errors->first('name')}}</div>
												@endif
											</div>
											<div class="form-group">
												<label for="">Địa chỉ</label>
												<input
													type="text"
													class="form-control"
													name="address" id="addCustomerAddress"
												/>
												<div class="text-danger" id="addCustomerAddressMessage"></div>
												@if($errors->has('address'))
													<div class="text-danger mt-2">{{$errors->first('address')}}</div>
												@endif
											</div>
											<div class="form-group">
												<label for="">Số điện thoại</label>
												<input
													type="text"
													class="form-control"
													name="phone" id="addCustomerPhone"
												/>
												<div class="text-danger mt-2" id="addCustomerPhoneMessage"></div>
												@if($errors->has('phone'))
													<div class="text-danger">{{$errors->first('phone')}}</div>
												@endif
											</div>
										</div>
										<div class="modal-footer d-flex justify-content-center">
											<button class="btn btn-success">Thêm mới</button>
											<button
												type="button"
												class="btn btn-secondary"
												data-dismiss="modal"
											>
												Đóng
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					@endif
					</div>
				</div>
			</main>
		</section>
@endsection
@section('script')
<script>
	$('#search').focus();
	var regPhone = /^0[0-9]+$/;
	function addCustomer(){
		$('#addCustomerNameMessage').text("");
		$('#addCustomerAddressMessage').text("");
		$('#addCustomerPhoneMessage').text("");
		if($('#addCustomerName').val().replace(/\s/g,'')==""){
			$('#addCustomerNameMessage').text("Tên nông hộ không được để trống");
			return false;
		}else if($('#addCustomerAddress').val().replace(/\s/g,'')==""){
			$('#addCustomerAddressMessage').text("Địa chỉ không được để trống");
			return false;
		}else if($('#addCustomerPhone').val().replace(/\s/g,'')!='' && !regPhone.test($('#addCustomerPhone').val().replace(/\s/g,''))){
			$('#addCustomerPhoneMessage').text("Số điện thoại không hợp lệ");
			return false;
		}
		
	}
	function submitEdit(e){
		$('#editAddressMessage'+e).text("");
		$('#editPhoneMessage'+e).text("");
		if($('#editAddress'+e).val().replace(/\s/g,'')==""){
			$('#editAddressMessage'+e).text("Địa chỉ không được để trống");
			return false;
		}else if($('#editPhone'+e).val().replace(/\s/g,'')!='' && !regPhone.test($('#editPhone'+e).val().replace(/\s/g,''))){
			$('#editPhoneMessage'+e).text("Số điện thoại không hợp lệ");
			return false;
		}
	}
</script>
@endsection
