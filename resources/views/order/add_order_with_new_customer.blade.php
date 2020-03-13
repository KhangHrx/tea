@extends('master-layout')
@section('title','Tạo mới đơn với nông hộ không có trong danh sách')
@section('content')
      <!-- main table -->
		<section id="paid-order-admin" class="order home-page">
		<form action="{{route('order.add.new_customer')}}" method="post">	
			<main class="p-4 right-content container">
				<h3 class="py-3">Tạo mới đơn</h3>
				<!-- order header -->
				<div class="order-header d-flex">
					<div class="order-header-left mr-3">
						<p class="btn btn-danger">
							Mã đơn số : <span class="order-code">{{$last_id+1}}</span>
						</p>
						<div class="py-2">
							Ngày : <span>{{date('d/m/Y',$nowTimeStamp)}}</span>
						</div>
						<div class="add-new-tea">
							<button
								class="btn btn-primary"
								data-toggle="modal"
								data-target="#add-tea"
								type="button"
							>
								Thêm sản phẩm <i class="fas fa-plus"></i>
							</button>
						</div>
					</div>
					<div class="order-header-right customer-info ml-5">
						<div class="form-group">
							<input
								type="text"
								class="form-control"
								placeholder="Tên nông hộ"
							/>
						</div>

						<div class="form-group">
							<input
								type="text"
								class="form-control"
								placeholder="Số điện thoại"
							/>
						</div>

						<div class="form-group">
							<input type="text" class="form-control" placeholder="Địa chỉ" />
						</div>

					
					</div>
				</div>
				<!-- order body -->
				<div class="create-order-body mt-3 bg-light">
					<table class="table text-center">
						<thead class="thead-light">
							<tr>
								<th>
									Tên loại chè
								</th>
								<th>
									Khối lượng
								</th>
								<th>
									Khấu trừ(%)
								</th>
								<th>
									Khấu trừ(kg)
								</th>
								<th>
									Khối lượng sau khấu trừ
								</th>
								<th>
									Đơn giá
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
						@foreach($cart->items as $c) 
							<tr>
								<td>
									{{$c['name']}}
								</td>
								<td>{{$c['weight']}}</td>
								<td>{{$c['deduction_per']}}</td>
								<td>{{$c['deduction_kg']}}</td>
								<td>{{ $c['weight']*(100-$c['deduction_per'])/100-$c['deduction_kg'] }}</td>
								<td>{{number_format($c['price'])}}</td>
								<td>{{$c['note']}}</td>
								<td>{{number_format(($c['weight']*(100-$c['deduction_per'])/100-$c['deduction_kg'])*$c['price'])}}</td>
								<td>						
									<a class="text-danger delete" href="{{route('cart.remove',['id'=>$c['id']])}}" >
										Xóa
									</a>
								</td>
							</tr>
						@endforeach
						</tbody>
						<tfoot class="tfoot-light">
							<tr>
								<td class="font-weight-bold">Tổng</td>
								<td>{{$cart->get_total_weight()}}</td>
								<td>-</td>
								<td>{{$cart->get_total_deduction_kg()}}</td>
								<td>{{$cart->get_total_after_deduction()}}</td>
								<td>-</td>
								<td>-</td>
								<td>{{number_format($cart->get_total_price())}}</td>
								<td>-</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- order footer -->
				<div class="order-footer">
					<a class="btn btn-success submit-btn" href="#">
						Chuyển đơn cho kế toán
					</a>
					<a class="btn btn-success save-btn mx-2" type="submit" href="">
						Lưu đơn
					</a>
					<a class="btn btn-danger cancel-btn" href="{{route('cart.clear')}}">
						Hủy
					</a>
				</div>
			</main>
		</form>
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
						<form action="{{route('cart.add')}}" method="post">
						@csrf
							<div class="form-group">
								<label for="tea-type">Loại chè</label>
								<select class="form-control" id="tea-type" name="name" onchange="changeProduct()">
								@foreach($products as $p)
									<option>{{$p->name}}</option>
								@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="tea-type">Khối lượng (kg)</label>
								<input
									type="text"
									id="tea-mass"
									class="form-control"
									name="weight"
								/>
							</div>
							<div class="form-group">
								<label for="tea-type">Khấu trừ (%)</label>
								<input
									type="text"
									id="tea-mass-rate-deduction"
									class="form-control"
									name="deduction_per" value="{{$products[0]->deduction}}"
								/>
							</div>
							<div class="form-group">
								<label for="tea-type">Khấu trừ(kg)</label>
								<input
									type="text"
									id="tea-mass-rate"
									class="form-control"
									name="deduction_kg"
								/>
							</div>
							<div class="form-group">
								<label for="tea-price">Đơn giá</label>
								<input type="text" name="price" class="form-control" id="tea-mass-rate-price" value="{{$products[0]->price}}">
							</div>
							<div class="form-group">
								<label for="tea-message">Ghi chú</label>
								<textarea
									name="note"
									class="form-control"
									id="tea-message"
									cols="30"
									rows="2"
									placeholder="Ghi chú"
								></textarea>
							</div>
							<input type="text" id="productId" name="id" value="{{$products[0]->id}}" style="display:none;">
							<input
								type="submit"
								class="btn btn-success d-block m-auto"
								value="Xác nhận"
							/>
						</form>
					</div>
				</div>
			</div>
		</div>
		</section>
@endsection

<script>
	var products = @json($products->toArray());
	function changeProduct(){
		let select = document.getElementById('tea-type');
		let product = products.find(product=>product.id == (select.selectedIndex+1));
		document.getElementById('tea-mass-rate-deduction').value = product.deduction;
		document.getElementById('tea-mass-rate-price').value = product.price;
		document.getElementById('productId').value = product.id;
	}
</script>
