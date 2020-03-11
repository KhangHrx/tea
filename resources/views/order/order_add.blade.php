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
		<title>Tạo mới đơn | Admin</title>
	</head>
	<body>
			<!-- admin home page -->
			<header id="main-header">
				<nav class="navbar navbar-expand-lg navbar-light bg-navbar">
					<a class="navbar-brand" href="index.html">
						<!-- <img src="./IMG/logo.png" alt=""> -->
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link current" href="index.html">Khách hàng</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="list_type_tea.html"
									>Các loại chè</a
								>
							</li>
	
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Công nợ
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">Chưa thanh toán</a>
									<a class="dropdown-item" href="#">Đã thanh toán</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Thanh toán đơn
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">Chưa thanh toán</a>
									<a class="dropdown-item" href="#">Đã thanh toán</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Báo cáo
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">Báo cáo ngày</a>
									<a class="dropdown-item" href="#">Báo cáo tuần</a>
									<a class="dropdown-item" href="#">Báo cáo tháng</a>
									<a class="dropdown-item" href="#">Báo cáo năm</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Danh sách đơn
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">Đơn đã lưu</a>
									<a class="dropdown-item" href="#">Đơn đã gửi</a>
								</div>
							</li>
						</ul>
							<!-- user info section -->
							<div class="user-wrap dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-user-shield"></i> Admin</a>
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">0946284647</a>
									<a class="dropdown-item" href="#">Quản trị viên</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="signin.html">Đăng xuất</a>
								</div>
							</div>
				
					</div>
				</nav>
				
				
			</header>
		<!-- main table -->
		<section id="create-new-order" class="order home-page">
		
			<main class="p-4 right-content">
				<!-- order header -->
				<div class="order-header d-flex">
					<div class="order-header-left mr-3">
						<p class="btn btn-danger">
							Mã đơn số : <span class="order-code">#f847574</span>
						</p>
						<div class="py-2">
							Ngày : <span>12/2/2020</span>
						</div>
						<div class="add-new-tea">
							<button
								class="btn btn-primary"
								data-toggle="modal"
								data-target="#add-tea"
								type="button"
							>
								Tạo mới <i class="fas fa-plus"></i>
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
											<form action="">
												<div class="form-group">
													<label for="tea-type">Loại chè</label>
													<select class="form-control" id="tea-type" name="">
														<option>Chè búp loại 1</option>
														<option>Chè xanh loại 2</option>
														<option>Chè xanh loại 3</option>
														<option>Chè khô loại 3</option>
													</select>
												</div>
												<div class="form-group">
													<input
														type="text"
														id="tea-mass"
														class="form-control"
														placeholder="Khối lượng"
													/>
												</div>
												<div class="form-group">
													<input
														type="text"
														id="tea-mass-rate"
														class="form-control"
														placeholder="Khấu trừ(kg)"
													/>
												</div>
												<div class="form-group">
													<label for="tea-price">Đơn giá</label>
													<select class="form-control" id="tea-price" name="">
														<option>100.000đ</option>
														<option>200.000đ</option>
														<option>300.000đ</option>
														<option>400.000đ</option>
													</select>
												</div>
												<div class="form-group">
													<label for="tea-message">Ghi chú</label>
													<textarea
														name="message"
														class="form-control"
														id="tea-message"
														cols="30"
														rows="2"
														placeholder="Ghi chú"
													></textarea>
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
									KL sau khấu trừ
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
								<td>275kg</td>
								<td>300.000đ</td>
								<td>Đất, nước, sỏi</td>
								<td>20.000.000đ</td>
							</tr>
							<tr>
								<td>
									Chè búp 1
								</td>
								<td>150kg</td>
								<td>5%</td>
								<td>10kg</td>
								<td>130kg</td>
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
								<td>280kg</td>
								<td>300.000đ</td>
								<td>Đất, nước, sỏi</td>
								<td>20.000.000đ</td>
							</tr>
						</tbody>
						<tfoot class="tfoot-light">
							<tr>
								<td class="font-weight-bold">Tổng</td>
								<td>900kg</td>
								<td>-</td>
								<td>30kg</td>
								<td>200kg</td>
								<td>-</td>
								<td>-</td>
								<td>60.000.000đ</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- order footer -->
				<div class="order-footer">
					<a class="btn btn-success submit-btn" href="index.html">
						Submit
					</a>
					<a class="btn btn-success save-btn mx-2" href="index.html">
						Lưu
					</a>
					<a class="btn btn-danger cancel-btn" href="index.html">
						Hủy
					</a>
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
