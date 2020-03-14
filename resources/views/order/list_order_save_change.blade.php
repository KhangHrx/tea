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
								Mã đơn số : <span class="order-code">#f847574</span>
							</p>
							<div class="order-date pb-1">
								Ngày : <span class="date-order">12/2/2020</span>
							</div>
							<div class="add-new-tea mt-2">
								<button
									class="btn btn-primary"
									data-toggle="modal"
									data-target="#add-tea"
									type="button"
								>
									Thêm <i class="fas fa-plus"></i>
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
															placeholder="Khấu trừ(%)"
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
														<input type="text" class="form-control">
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
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- info customer -->
						<div class="order-header-right customer-info">
							<div>
								Tên nông hộ :
								<span class="customer-name">
									Trần Đại Nghĩa
								</span>
							</div>
							<div class="py-2">
								Số điện thoại:
								<span class="customer-phone-number">
									0726828733
								</span>
							</div>
							<div>
								Địa chỉ : <span class="user-address">Thôn A - Yên Bái</span>
							</div>
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
								<tr>
									<td>
										Chè thái nguyên
									</td>
									<td>300kg</td>
									<td>5%</td>
									<td>10kg</td>
									<td>280kg</td>
									<td>300.000đ</td>
									<td>Đất, nước, sỏi</td>
									<td>20.000.000đ</td>
									<td>						
											<a
												class="text-danger delete"
												data-toggle="modal"
												data-target="#delete-row"
											>
												Xóa
											</a>
											<!-- Modal -->
											<div
												class="modal fade text-left"
												id="delete-row"
												role="dialog"
											>
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title">
																Xóa phần này
															</h4>
														</div>
														<div class="modal-body">
															<form action="">
																<input
																	type="submit"
																	class="btn btn-danger"
																	value="Xóa"
																/>
															</form>
														</div>
														<div class="modal-footer">
															<button
																type="button"
																class="btn btn-default"
																data-dismiss="modal"
															>
																Hủy
															</button>
														</div>
													</div>
												</div>
											</div>
										
									</td>
								</tr>
								
							</tbody>
							<tfoot class="tfoot-light">
								<tr>
									<td class="font-weight-bold">Tổng</td>
									<td>300kg</td>
									<td>-</td>
									<td>-</td>
									<td>280kg</td>
									<td>-</td>
									<td>-</td>
									<td>60.000.000đ</td>
									<td>-</td>
								
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- order footer -->
					<div class="order-footer">
						<td>
							<div class="container d-inline">
								<a
									class="btn btn-success text-white change-info"
									data-toggle="modal"
									data-target="#change-order-info"
								>
									Chỉnh sửa
								</a>
								<!-- Modal -->
								<div
									class="modal fade text-left"
									id="change-order-info"
									role="dialog"
								>
									<div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">
													Xác nhận thay đổi đơn
												</h4>
											</div>
											<div class="modal-body">
												<form action="">
													<input
														type="submit"
														class="btn btn-primary"
														value="Gửi cho kế toán"
													/>
												</form>
											</div>
											<div class="modal-footer">
												<button
													type="button"
													class="btn btn-default"
													data-dismiss="modal"
												>
													Hủy
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</td>
						<a
							class="btn btn-success save-btn mx-2"
							href="save_list_order.html"
						>
							Lưu
						</a>
						<a class="btn btn-danger cancel-btn" href="save_list_order.html">
							Hủy
						</a>
					</div>
				</div>
			</main>
		</section>
@endsection