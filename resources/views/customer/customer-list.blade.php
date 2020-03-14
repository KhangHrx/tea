@extends('master-layout')
@section('title','Trang chủ')
@section('content')
		<section id="home-page-admin" class="home-page">
			
			<main class="right-content list-customer-content">
				
				<!-- table info section -->
				<div class="container mt-5">
					<div class="list-customer-header mt-4 d-flex">
						<h3>Danh sách nông hộ</h3>
						<input
							type="text"
							class="search-box search-box-list-customer"
							id=""
							placeholder="Tìm kiếm..."
						/>					
					</div>
					<div class="new-customer">
						<a href="{{route('order.add.new_customer')}}" class="btn btn-primary">
							Tạo mới <i class="fas fa-plus"></i></a>
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
													<div class="modal-header">
														<h4 class="modal-title">Sửa thông tin</h4>
														<button type="button" data-dismiss="modal">&times;</button>
													</div>
													<div class="modal-body">
														<form action="{{route('customer.edit')}}" class="form-group-add-customer" method="post">
															@csrf
															<input type="text" name="id" value="{{$m->id}}" style="display: none;">
															<div class="form-group">
																Tên: {{$m->name}}
															</div>
															<div class="form-group">
																<input
																	type="text"
																	class="form-control"
																	value="{{$m->address}}" name="address"
																/>
																@if($errors->has('address'))
																	<div class="text-danger">{{$errors->first('address')}}</div>
																@endif
															</div>
															<div class="form-group">
																<input
																	type="text"
																	class="form-control"
																	value="{{$m->phone}}" name="phone"
																/>
																@if($errors->has('phone'))
																	<div class="text-danger">{{$errors->first('phone')}}</div>
																@endif
															</div>
															<input
																type="submit"
																class="btn btn-success d-block m-auto"
																value="Xác nhận"
															/>
														</form>
													</div>
													<div class="modal-footer">
														<button
															type="button"
															class="btn btn-secondary"
															data-dismiss="modal"
														>
															Đóng
														</button>
													</div>
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
									<div class="modal-body">
										<form action="{{route('customer.add')}}" class="form-group-add-customer" method="post" onsubmit="return addCustomer()">
											@csrf
											<div class="form-group">
												<input
													type="text"
													class="form-control"
													placeholder="Tên nông hộ" name="name" id="addCustomerName"
												/>
												<div class="text-danger" id="addCustomerNameMessage"></div>
												@if($errors->has('name'))
													<div class="text-danger">{{$errors->first('name')}}</div>
												@endif
											</div>
											<div class="form-group">
												<input
													type="text"
													class="form-control"
													placeholder="Địa chỉ" name="address" id="addCustomerAddress"
												/>
												<div class="text-danger" id="addCustomerAddressMessage"></div>
												@if($errors->has('address'))
													<div class="text-danger">{{$errors->first('address')}}</div>
												@endif
											</div>
											<div class="form-group">
												<input
													type="text"
													class="form-control"
													placeholder="Số điện thoại" name="phone" id="addCustomerPhone"
												/>
												<div class="text-danger" id="addCustomerPhoneMessage"></div>
												@if($errors->has('phone'))
													<div class="text-danger">{{$errors->first('phone')}}</div>
												@endif
											</div>
											<input
												type="submit"
												class="btn btn-success d-block m-auto"
												value="Xác nhận"
											/>
										</form>
									</div>
									<div class="modal-footer">
										<button
											type="button"
											class="btn btn-secondary"
											data-dismiss="modal"
										>
											Đóng
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</section>
@endsection

<script>
	function addCustomer(){
		var name = document.getElementById('addCustomerName');
		var nameMessage = document.getElementById('addCustomerNameMessage');
		var address = document.getElementById('addCustomerAddress');
		var addressMessage = document.getElementById('addCustomerAddressMessage');
		var phone = document.getElementById('addCustomerPhone');
		var phoneMessage = document.getElementById('addCustomerPhoneMessage');
		var regName = /^[a-zA-Záàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵ ]{1,3}$/;
		var regAddress = /^[0-9a-zA-Záàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵ \,\-]{1,3}$/;
		var regPhone = /^0[0-9]{8}$/;
		if(!regName.test(name.value.replace(/\s/g, ''))){
			nameMessage.innerText = "Tên nông hộ không hợp lệ";
			return false;
		}
		if(!regAddress.test(address.value.replace(/\s/g,''))){
			addressMessage.innerText = "Địa chỉ không hợp lệ";
			return false;
		}
		if(!phone.value.replace(/\s/g,'')=='' && !regPhone.test(phone.value.replace(/\s/g,''))){
			phoneMessage.innerText = "Số điện thoại không hợp lệ";
			return false;
		}
	}
</script>
