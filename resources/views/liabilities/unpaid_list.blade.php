@extends('master-layout')
@section('title','Danh sách công nợ')
@section('content')
<section id="loan-control-customer" class="home-page">
			
	<main class="right-content list-customer-content">
		
		<div class="container mt-5">
			<div class="list-customer-loan-header mt-4 d-flex justify-content-between">
				<h3>Công nợ của: {{ $order->orderCustomer->name }} - {{ $order->orderCustomer->address }}</h3>
				<input type="text" class="search-box search-box-list-customer" id="" placeholder="Tìm kiếm..."/>
			</div>
			<!-- table info section -->
			<form action="{{ route('liabilities.unpaid_list',['id'=>$order->id]) }} " method="post" enctype="multipart/form-data" >
			@csrf
				<div class="customer-table pt-3">
					
						<table class="table text-center">
							<thead class="thead-light">
								<tr>
									<th>
										Mã đơn
									</th>
									<th>
										Ngày
									</th>
									<th>
										Tổng khối lượng
									</th>
									<th>
										Tổng tiền
									</th>
									<th>
										Đã thanh toán
									</th>
									<th>
										Còn nợ
									</th>
									<th>
										Chi tiết
									</th>
									<th>
										Lựa chọn
									</th>
								</tr>
							</thead>
							<tbody>
								{{-- @if($order->customer_id) --}}
									@foreach($order_list as $row)
									<tr>
										<td>#{{ $row->id }}</td>
										<td>{{ date('H:i | d/m/Y', strtotime($row->created_at)) }}</td>
										<td>{{ $row->total_weight }} kg</td>
										<td>{{ number_format($row->total_money) }} đ</td>
										<td class="text-success">{{ number_format($row->total_money - $row->total_money_paid) }} đ</td>
										<td class="text-danger">{{ number_format($row->total_money_paid) }} đ</td>
										<td><a href="{{route('liabilities.detail_unpaid',['id'=>$row->id])}}">View</a></td>
										<td><input type="checkbox" class="select_id" name="id_order[]" value="{{$row->id}}" ></td>
									</tr>
									@endforeach
								{{-- @else
									<tr>
										<td>#{{ $order->id }}</td>
										<td>{{ date('H:i | d/m/Y', strtotime($order->created_at)) }}</td>
										<td>{{ $order->total_weight }} kg</td>
										<td>{{ number_format($order->total_money) }} đ</td>
										<td>{{ number_format($order->total_money_paid) }} đ</td>
										<td>{{ number_format($order->total_money - $order->total_money_paid) }} đ</td>
										<td><a href="{{route('liabilities.detail_unpaid',['id'=>$order->id])}}">View</a></td>
										<td><input type="checkbox" class="select_id" name="id_order[]" value="{{$order->id}}" ></td>
									</tr>
								@endif --}}
								<input type="hidden" id="array_order" value="" name="">
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">Tổng</td>
									<td>-</td>
									<td>{{ $sum_weight }} kg</td>
									<td>{{ number_format($sum_money) }} đ</td>
									<td class="text-success font-weight-bold">{{ number_format($sum_money - $sum_paid) }} đ</td>
									<td class="text-danger font-weight-bold">{{ number_format($sum_paid) }} đ</td>
									<td>-</td>
									<td>-</td>
								</tr>
							</tfoot>
						</table>
					
				</div>
				<!-- pay many order same time -->
				<!-- payment section -->
				<div class="pay-order mt-2 d-flex justify-content-end">
					<button class="btn btn-primary" data-toggle="modal" data-target="#order-loan-payment" type="button">
						Thanh toán đơn đã chọn
					</button>
					<div class="modal fade text-dark" id="order-loan-payment" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Thanh toán công nợ</h4>
									<button type="button" data-dismiss="modal">
										&times;
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										Bạn có chắc chắn thanh toán các đơn đã chọn !
									</div>
									<button type="submit" class="btn btn-success d-block m-auto" id="btn">Xác nhận thanh toán</button>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</main>
</section>
<script type="text/javascript">
	
</script>
@endsection
