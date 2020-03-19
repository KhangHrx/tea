@extends('master-layout')
@section('title','Chỉnh sửa đơn')
@section('content')
<section id="paid-order-admin" class="order home-page">
	<main class="right-content">
		<div class="container pt-4">
			<!-- change order top -->
			<h4 class="py-3">Chỉnh sửa đơn hàng</h4>
			<!-- order header -->
			<div class="order-header d-flex justify-content-between">
				<div class="order-header-left">
					<p class="btn btn-danger">
						Mã đơn số : <span class="order-code">#{{ $order->id }}</span>
					</p>
					<div class="order-date pb-1">
						Ngày : <span class="date-order">{{date('d/m/Y',strtotime($order->created_at)) }}</span>
					</div>
					<div class="add-new-tea mt-2">
						<button
							class="btn btn-primary"
							data-toggle="modal"
							data-target="#add-tea"
							type="button"
						>
							Thêm <i class="fas fa-plus"></i>
						</button>
						<div class="modal text-dark" id="add-tea">
							<div class="modal-dialoge">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Tạo mới giao dịch</h4>
										<button type="button" data-dismiss="modal">
											&times;
										</button>
									</div>
									<div class="modal-body">
										<form action="{{route('listorder.save_add',[$order->id])}}" method="post">
										@csrf
										<div class="dev-hoa">
											<!-- <input type="text" value="{{$products[0]->id}}" id="productId" style="display: none;" name="id"> -->
											<div class="form-group">
												<label for="item_id">Tên loại chè</label>
												<select class="form-control" id="item_id" name="item_id" onchange="changeProduct()">
													@foreach($sp as $s)
													<option <?php echo ($cate['product_id']==$s['id'])?"selected":''; ?> 
													value="{{$s['id']}}">{{$s['name']}}</option>
													@endforeach
												</select>
											</div>

											<div class="form-group">
											<label for="weight">Khối lượng</label>
												<input
													type="text"
													class="form-control"
													value="" name="weight"
													id="weight"
												/>
												<div class="text-danger mt-2"></div>
													<div class="text-danger"></div>
											</div>

											<div class="form-group">
											<label for="weight">Khấu trừ (%) - Tối đa: <span id="defaultDeduction">{{$products[0]->deduction}}</span>%</label>
												<input
													type="text"
													class="form-control"									
													id="tea-mass-rate-deduction"
													value="" name="deduction_per"
												/>
												<div class="text-danger mt-2"></div>
													<div class="text-danger"></div>
											</div>

											<div class="form-group">
											<label for="weight">Khấu trừ khối lượng</label>
												<input
													type="text"
													class="form-control"
													value="" name="deduction_kg"
												/>
												<div class="text-danger mt-2"></div>
													<div class="text-danger"></div>
											</div>

											<div class="form-group">
											<label for="unit_price">Đơn giá - Mặc định: <span id="defaultPrice">{{ number_format($products[0]->price) }}</span>đ/kg)</label>
												<input
													type="text"
													class="form-control"
													value="{{ number_format($products[0]->price) }}"
													id="tea-mass-rate-price"
													name="unit_price"
												/>
												<div class="text-danger mt-2"></div>
													<div class="text-danger"></div>
											</div>

											<div class="form-group">
											<label for="note">Ghi chú</label>
												<input
													type="text"
													class="form-control"
													value="" name="note"
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
					</div>
				</div>
				<!-- info customer -->
				<div class="order-header-right customer-info">
					<div>
						Tên nông hộ :
						<span class="customer-name">
						{{  $order->orderCustomer->name }}

						</span>
					</div>
					<div class="py-2">
						Số điện thoại:
						<span class="customer-phone-number">
						{{ $order->orderCustomer->phone }}
						</span>
					</div>
					<div>
						Địa chỉ : <span class="user-address">{{ $order->orderCustomer->address }}</span>
					</div>
				</div>
			</div>
			<!-- order body -->
			<div class="create-order-body mt-3 bg-light">
				<table class="table text-center">
					<thead>
						<tr>
							<th>#</th>
							<th>
								Tên loại chè
							</th>
							<th>
								Khối lượng(kg)
							</th>
							<th>
								Khấu trừ(%)
							</th>
							<th>
								Khấu trừ(kg)
							</th>
							<th>
								Khối lượng sau khấu trừ(kg)
							</th>
							<th>
								Đơn giá (Đ)
							</th>
							<th>
								Ghi chú
							</th>
							<th>
								Thành tiền
							</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@foreach($toproduct as $product)
						<tr>
							<td>{{ $product->id}}</td>
							<td>
								{{ $product->orderDetail->name }}
							</td>
							<td>{{ $product->weight }}</td>
							<td>{{ $product->deduction_per }}</td>
							<td>{{ $product->deduction_kg }}</td>
							<td>{{ $product->weight - ($product->weight * $product->deduction_per / 100) - $product->deduction_kg }}</td>
							<td>{{ number_format($product->orderDetail->price).' '.'Đ' }}</td>
							<td>{{ $product->note }}</td>
							<td>{{ number_format($product->price).' '.'Đ' }}</td>
							<td>						
									<a
										class="text-danger delete"
										data-toggle="modal"
										data-target="#delete-row"
									>
										Xóa
									</a>
									<!-- Modal -->
									<div
										class="modal fade text-left"
										id="delete-row"
										role="dialog"
									>
										<div class="modal-dialog">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">
														Xóa phần này
													</h4>
												</div>
												<div class="modal-body">
													<form action="{{ route('listorder.delete_item',[$product->id]) }}" method="POST">
													@csrf
													@method('DELETE')

														<input
															type="submit"
															class="btn btn-danger"
															value="Xóa"
														/>
													</form>
												</div>
												<div class="modal-footer">
													<button
														type="button"
														class="btn btn-default"
														data-dismiss="modal"
													>
														Hủy
													</button>
												</div>
											</div>
										</div>
									</div>

								
							</td>
							<td>
								<a href="{{route('listorder.edit_item',[$product->id])}}">	Sửa</a>
							</td>
						</tr>
					@endforeach
					</tbody>
					<tfoot class="tfoot-light">
						<tr>
							<td></td>
							<td class="font-weight-bold">Tổng</td>
							<td>
								{{ $weightfirst }}
							</td>
							<td>-</td>
							<td>-</td>
							<td>
								{{ $weightlast }}
							</td>
							<td>-</td>
							<td>-</td>
							<td>
								{{ number_format($total).' '.'Đ' }}
							</td>
							<td>-</td>
						
						</tr>
						<tr>Dòng mới</tr>
					</tfoot>
				</table>
			</div>
			<!-- order footer -->
			<div class="order-footer">
				<td>
					<div class="container d-inline">
						<a
							class="btn btn-success text-white change-info"
							data-toggle="modal"
							data-target="#change-order-info"
						>
							Gửi cho kế toán
						</a>
						<!-- Modal -->
						<div
							class="modal fade text-left"
							id="change-order-info"
							role="dialog"
						>
							<div class="modal-dialog">
								<!-- Modal content-->

								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">
											Gửi cho kế toán
										</h4>
									</div>
									<div class="modal-body">
										<form action="{{ route('listorder.send_to_accountant', ['id'=>$order->id]) }}" method="POST">
											@csrf
											<input
												type="submit"
												class="btn btn-primary"
												value="Gửi cho kế toán"
											/>
										</form>
									</div>
									<div class="modal-footer">
										<button
											type="button"
											class="btn btn-default"
											data-dismiss="modal"
										>
											Hủy
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</td>
				<a class="btn btn-danger cancel-btn" href="save_list_order.html">
					Hủy
				</a>
			</div>
		</div>
	</main>
</section>
@endsection
@section('script')

<script>
	var products = @json($products->toArray());
	function changeProduct(){
		let select = document.getElementById('item_id');
		let product = products.find(product=>product.id == (select.selectedIndex+1));
		document.getElementById('tea-mass-rate-deduction').value = product.deduction;
		$('#defaultDeduction').text(product.deduction);
		document.getElementById('tea-mass-rate-price').value = product.price;
		$('#defaultPrice').text(product.price);
		document.getElementById('productId').value = product.id;
	}
</script>
@endsection