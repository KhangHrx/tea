@extends('master-layout')
@section('title','Danh sách các loại chè')
@section('content')

				<!-- table info section -->
				<div class="container text-center mt-5">
					<div class="order-header d-flex justify-content-between">
					<h3 class="list-tea-header text-left py-2">
						Danh sách các loại chè có sẵn
					</h3>
					<!-- add new tea type -->
					<!-- add new customer section -->
					<div class="add-new-customer">
						<button
							class="btn btn-primary"
							data-toggle="modal"
							data-target="#add-new-tea-type"
							type="button"
						>
							Tạo mới <i class="fas fa-plus"></i>
						</button>
						<!-- modal -->
						<div class="modal fade" id="add-new-tea-type" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Thêm mới loại chè</h4>
										<button type="button" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<form action="{{route('product.add')}}" class="form-group-add-new-tea" method="post">
											@csrf
											<div class="form-group">
												<input
													type="text"
													class="form-control"
													placeholder="Tên loại chè" name="name"
												/>
											</div>
											<div class="form-group">
												<input
													type="text"
													class="form-control"
													placeholder="Khấu trừ tối đa" name="deduction"
												/>
											</div>
											
											<div class="form-group">
												<input
													type="text"
													class="form-control"
													placeholder="Đơn giá" name="price"
												/>
											</div>
											<div class="form-group">
												<select name="state" id="">
													<option value="1">Đang thu mua</option>
													<option value="0">Ngừng thu mua</option>
												</select>
											</div>
											<div class="py-2 text-left">
												Ngày áp dụng <span class="date-apply">{{date('d/m/Y',$nowTimeStamp)}}</span>
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
					<table class="table">
						<thead>
							<tr>
								<th>Các loại chè</th>
								<th>Đơn giá (vnđ/kg)</th>
								<th>Khấu trừ tối đa(%)</th>
								<th>Ngày áp dụng giá</th>
								<th>Trang thái</th>
								<th>Chỉnh sửa</th>
							</tr>
						</thead>
						<tbody>
							@foreach($model as $m)
							<tr>
								<td>{{$m->name}}</td>
								<td>{{number_format($m->price)}}đ</td>
								<td>{{$m->deduction}}%</td>
								<td>{{date('d/m/Y',strtotime($m->updated_at))}}</td>
								<td>
									@if($m->state==0)
										<button class="btn btn-warning">Ngừng thu mua</button>
									@else
										<button class="btn btn-success">Đang thu mua</button>
									@endif
								</td>
								<td>
									<div class="container d-inline">
										<button
											class="change-btn"
											type="button"
											data-toggle="modal"
											data-target="#change-tea-type-{{$m->id}}"
										>
											<i class="fas fa-edit text-primary"></i>
										</button>
										<!-- Modal -->
										<div
											class="modal fade text-left"
											id="change-tea-type-{{$m->id}}"
											role="dialog"
										>
											<div class="modal-dialog">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															Thay đổi thông tin loại chè
														</h4>
													</div>
													<div class="modal-body">
														<form action="{{route('product.edit')}}" method="post">
															@csrf
															<input type="text" value="{{$m->id}}" style="display: none;" name="id">
															<div class="form-group">
																<input
																	type="text"
																	class="form-control"
																	value="{{$m->name}}" name="name"
																/>
																@if($errors->has('name'))
																	<div class="text-danger">{{$errors->first('name')}}</div>
																@endif
															</div>
															<div class="form-group">
																<input
																	type="text"
																	class="form-control"
																	value="{{($m->price)}}" name="price"
																/>
															</div>
															<div class="form-group">
																<input
																	type="text"
																	class="form-control"
																	value="{{$m->deduction}}" name="deduction"
																/>
															</div>
															<div class="form-group">
																<select name="state" id="">
																	<option value="1" <?php echo ($m->state==1)?"selected":""; ?> >Đang thu mua</option>
																	<option value="0" <?php echo ($m->state==0)?"selected":""; ?> >Ngừng thu mua</option>
																</select>
															</div>

															<div class="py-2">
																Ngày áp dụng <span class="date-apply">{{date('d/m/Y',strtotime($m->updated_at))}}</span>
															</div>
															<input
																type="submit"
																value="Chỉnh sửa"
																class="btn btn-primary"
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
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</main>
		</section>
@endsection
