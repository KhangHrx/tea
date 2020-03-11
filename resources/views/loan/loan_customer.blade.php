<!-- @format -->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
			integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
			crossorigin="anonymous"
		/>
		<link
			rel="stylesheet"
			href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"
			integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="./css/style.css" />
		<link rel="stylesheet" href="./css/mobile.css" />
		<link rel="stylesheet" href="./css/tablets.css" />
		<title>Kiểm soát công nợ | Quản trị viên</title>
	</head>
	<body>
		<!-- nav-sidebar -->
		<section id="loan-control-customer-admin" class="home-page">
			<aside class="left-content">
				<nav class="navbar bg-navbar">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="#">Danh sách khách hàng</a>
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
								<a class="dropdown-item" href="#">Chưa thanh toán</a>
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
								<span class="admin-phone-number"> 0946284647</span>
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
						<h3>Công nợ của nông hộ X - thôn X</h3>
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
										Mã đơn
									</th>
									<th>
										Ngày
									</th>
									<th>
										Tổng khối lượng
									</th>
									<th>
										Thành tiền
									</th>
									<th>
										Còn nợ
									</th>
									<th>
										Chi tiết
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									
									<td>#f487583</td>
									<td>13/8/2020</td>
									<td>4000 kg</span></td>
									<td>20.000.000 đ</td>
									<td>11.500.000 đ</td>
									<td><a href="loan_order_payment.html">View</a></td>
								</tr>
								<tr>
									
									<td>#f487583</td>
									<td>13/8/2020</td>
									<td>4000 kg</span></td>
									<td>20.000.000 đ</td>
									<td>11.500.000 đ</td>
									<td><a href="loan_order_payment.html">View</a></td>
								</tr>
								<tr>						
									<td>#f487583</td>
									<td>13/8/2020</td>
									<td>4000 kg</span></td>
									<td>20.000.000 đ</td>
									<td>11.500.000 đ</td>
									<td><a href="loan_order_payment.html">View</a></td>
								</tr>
								<tr>
									
									<td>#f487583</td>
									<td>13/8/2020</td>
									<td>4000 kg</span></td>
									<td>20.000.000 đ</td>
									<td>11.500.000 đ</td>
									<td><a href="loan_order_payment.html">View</a></td>
								</tr>
								
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">Tổng</td>
									<td>-</td>
									<td>12.000kg</td>
									<td>50.000.000 đ</td>
									<td>30.000.000 đ</td>
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
		<script
			src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
			integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
			crossorigin="anonymous"
		></script>
		<script
			src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
			integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
			crossorigin="anonymous"
		></script>
		<script
			src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
			integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
			crossorigin="anonymous"
		></script>
	</body>
</html>
