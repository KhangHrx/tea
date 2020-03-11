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
		<title>Thanh toán nợ | Admin</title>
	</head>
	<body>
		<section id="loan-order-payment" class="order home-page">
			<aside class="left-content">
				<nav class="navbar bg-navbar ">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link current" href="#">Danh sách khách hàng</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="list_type_tea.html"
								>Danh sách loại chè</a
							>
						</li>
						<li class="dropdown nav-link">
							<a type="button" class="dropdown-toggle" data-toggle="dropdown"
								>Kiểm soát công nợ</a
							>
							<div class="dropdown-menu bg-navbar">
								<a class="dropdown-item" href="loan_control_main_ad.html"
									>Chưa thanh toán</a
								>
								<a class="dropdown-item" href="loan_control_main.html"
									>Đã thanh toán</a
								>
							</div>
							
						</li>
						<li class="dropdown nav-link">
							<a type="button" class="dropdown-toggle" data-toggle="dropdown">
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
			<main class="right-content">
				<!-- user info section -->
				<div class="user-wrap">
					<div class="user-info">
						<a type="button" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fas fa-user-shield"></i> Admin</a
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
				<div class="container pt-4">
					<!-- order header -->
					<div class="order-header d-flex justify-content-between">
						<div class="order-header-left">
							<p class="btn btn-danger">
								Mã đơn số : <span class="order-code">#f847574</span>
							</p>
							<div class="order-date pb-1">
								Ngày : <span class="date-order">12/2/2020</span>
							</div>
						</div>
						<!-- info customer -->
						<div class="order-header-right customer-info">
							<div class="customer-name">Tên nông hộ : Trần Đại Nghĩa</div>
							<div class="customer-phone-number py-2">
								Số điện thoại: 0726828733
							</div>
							<div class="customer-address">Địa chỉ : Thôn A - Yên Bái</div>
						</div>
					</div>
					<!-- order body -->
					<div class="create-order-body mt-3 bg-light">
						<table class="table text-center">
							<thead>
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
										Đơn giá
									</th>
									<th>
										Ghi chú
									</th>
									<th>
										Thành tiền
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										Chè thái nguyên
									</td>
									<td>300kg</td>
									<td>5%</td>
									<td>10kg</td>
									<td>300.000đ</td>
									<td>Đất, nước, sỏi</td>
									<td>20.000.000đ</td>
								</tr>
								<tr>
									<td>
										Chè búp 1
									</td>
									<td>300kg</td>
									<td>5%</td>
									<td>10kg</td>
									<td>300.000đ</td>
									<td>Đất, nước, sỏi</td>
									<td>20.000.000đ</td>
								</tr>
								<tr>
									<td>
										Chè Lào Cai
									</td>
									<td>300kg</td>
									<td>5%</td>
									<td>10kg</td>
									<td>300.000đ</td>
									<td>Đất, nước, sỏi</td>
									<td>20.000.000đ</td>
								</tr>
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">Tổng</td>
									<td>900kg</td>
									<td>15%</td>
									<td>30kg</td>
									<td>-</td>
									<td>Chè bẩn, đất nhiều</td>
									<td>60.000.000đ</td>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- order footer -->
					<!-- payment section -->
					<div class="pay-order mt-2">
						<button
							class="btn btn-primary"
							data-toggle="modal"
							data-target="#order-loan-payment"
							type="button"
						>
							Thanh toán nợ
						</button>
						<div
							class="modal fade text-dark"
							id="order-loan-payment"
							role="dialog"
						>
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Thanh toán nợ</h4>
										<button type="button" data-dismiss="modal">
											&times;
										</button>
									</div>
									<div class="modal-body">
										<form action="">
											<div class="form-group">
												Tổng giá trị đơn :
												<span class="order-value"> 20.000.000 đ</span>
											</div>
											<div class="form-group d-block">
												Còn nợ : <span class="order-loan">10.000.000 đ</span>
											</div>
											<div class="form-group">
												<label for="tea-paid-money">Tiền thanh toán : </label>
												<input
													type="text"
													id="tea-loan-money"
													class="form-control"
												/>
											</div>
											<input
												type="submit"
												class="btn btn-success d-block m-auto"
												value="Xác nhận thanh toán"
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
		<!-- JS  Bootsrap -->
		<script src="./js/test1.js"></script>
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
