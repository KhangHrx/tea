<!-- @format -->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <base href="{{asset('')}}">
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
		<title>@yield('title')</title>
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
		<!-- show case -->
		<section id="home-page-admin" class="home-page">
			
			@yield('content')
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
