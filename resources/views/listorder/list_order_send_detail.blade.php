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
							<td>{{ $product->orderDetail->deduction }}</td>
							<td>{{ $product->deduction_kg }}</td>
							<td>{{ $product->weight - ($product->weight * $product->deduction_per / 100) - $product->deduction_kg }}</td>
							<td>{{ number_format($product->orderDetail->price).' '.'Đ' }}</td>
							<td>{{ $product->note }}</td>
							<td>{{ number_format($product->price).' '.'Đ' }}</td>
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
					</tfoot>
				</table>
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