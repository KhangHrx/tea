@extends('master-layout')
@section('title','Trang chủ')
@section('content')
		
		<!-- show case -->
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
						<a href="customer_order_new.html" class="btn btn-primary">
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
										Chi tiết
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
									<td>4000 <span class="mass-digit">kg</span></td>
									<td>20.000.000đ</td>
									<td><a href="customer_order_detail.html">View</a></td>
									<td><a href="order_add_by_customer.html" class="btn btn-success">Giao dịch mới
										 <i class="fas fa-plus"></i></a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- add new customer section -->			
				</div>
			</main>
		</section>
@endsection
