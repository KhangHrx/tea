@extends('master-layout')
@section('title','Kiểm soát công nợ')
@section('content')
		<!-- nav-sidebar -->
<section id="loan-control-main" class="home-page">
	<aside class="left-content">
		<nav class="navbar bg-navbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="index.html">Danh sách khách hàng</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="list_type_tea.html"
						>Danh sách loại chè</a
					>
				</li>
				<li class="dropdown nav-link">
					<a
						class="dropdown-toggle current"
						data-toggle="dropdown"
						href="loan_control_main.html"
						>Kiểm soát công nợ</a
					>
					<div class="dropdown-menu bg-navbar">
						<a class="dropdown-item" href="loan_control_main_ad.html">Chưa thanh toán</a>
						<a class="dropdown-item" href="#">Đã thanh toán</a>
					</div>
				</li>
				<li class="dropdown nav-link ">
					<a class="dropdown-toggle text-white" data-toggle="dropdown">
						Báo cáo
					</a>
					<div class="dropdown-menu bg-navbar">
						<a class="dropdown-item" href="report_day.html">Báo cáo ngày</a>
						<a class="dropdown-item" href="report_week.html"
							>Báo cáo tuần</a
						>
						<a class="dropdown-item" href="report_month.html"
							>Báo cáo tháng</a
						>
						<a class="dropdown-item" href="report_year.html">Báo cáo năm</a>
					</div>
				</li>
			</ul>
		</nav>
	</aside>
	<main class="right-content list-customer-content">
		<!-- user info section -->
		<div class="user-wrap">
			<div class="user-info">
				<a type="button" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fas fa-user"></i> Admin</a
				>
				<div class="dropdown-menu">
					<div>
						<i class="fas fa-phone-alt"></i>
						<span class="accountant-phone-number"> 0946284647</span>
					</div>
					<div class="py-1">
						Quản trị viên
					</div>
					<a href="signin.html">Đăng xuất</a>
				</div>
			</div>
		</div>
		<div class="container mt-5">
			<div class="list-customer-loan-header mt-4 d-flex justify-content-between">
				<h3>Công nợ chung</h3>
				<input
					type="text"
					class="search-box search-box-list-customer"
					id=""
					placeholder="Tìm kiếm..."
				/>
			</div>
			<!-- table info section -->
			<div class="customer-table pt-3">
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
								Tổng khối lượng
							</th>
							<th>
								Thành tiền
							</th>
							<th>
								Dư nợ
							</th>
							<th>
								Chi tiết
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							
							<td>Hoàng Ngọc Huyền</td>
							<td>Thôn X</td>
							<td>4000 kg</span></td>
							<td>20.000.000 đ</td>
							<td>11.500.000 đ</td>
							<td><a href="loan_control_customer_ad.html">View</a></td>
						</tr>
						<tr>
							
							<td>Trần Văn Tú</td>
							<td>Thôn B</td>
							<td>4000 kg</span></td>
							<td>20.000.000 đ</td>
							<td>11.500.000 đ</td>
							<td><a href="loan_control_customer_ad.html">View</a></td>
						</tr>
						<tr>
							
							<td>Nguyễn Văn Trường</td>
							<td>Thôn F</td>
							<td>4000 kg</span></td>
							<td>20.000.000 đ</td>
							<td>11.500.000 đ</td>
							<td><a href="loan_control_customer_ad.html">View</a></td>
						</tr>
						<tr>
							
							<td>Nguyễn Mạnh Hùng</td>
							<td>Thôn A</td>
							<td>4000 kg</span></td>
							<td>20.000.000 đ</td>
							<td>11.500.000 đ</td>
							<td><a href="loan_control_customer_ad.html">View</a></td>
						</tr>
					</tbody>
					<tfoot class="tfoot-light">
						<tr>
							<td class="font-weight-bold">Tổng</td>
							<td>-</td>
							<td>12.000kg</td>
							<td>50.000.000 đ</td>
							<td>120kg</td>
							<td>-</td>
						
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- add new customer section -->
		</div>
	</main>
</section>
		<!-- JS  Bootsrap -->
		@endsection
