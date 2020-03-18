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
										Thành tiền
									</th>
									<th>
										Chi tiết
									</th>
									
								</tr>
							</thead>
							<tbody>
									@foreach($order_list as $row)
									<tr>
										<td>#{{ $row->id }}</td>
										<td>{{ date('H:i | d/m/Y', strtotime($row->created_at)) }}</td>
										<td>{{ $row->total_weight }} kg</td>
										<td>{{ number_format($row->total_money) }} đ</td>
										<td><a href="{{route('liabilities.detail_paid',['id'=>$row->id])}}">View</a></td>
									</tr>
									@endforeach
								<input type="hidden" id="array_order" value="" name="">
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">Tổng</td>
									<td>-</td>
									<td class="font-weight-bold">{{ $sum_weight }} kg</td>
									<td class="font-weight-bold">{{ number_format($sum_money) }} đ</td>
									<td>-</td>
								</tr>
							</tfoot>
						</table>
					
				</div>
			</form>
		</div>
	</main>
</section>
<script type="text/javascript">
	
</script>
@endsection
