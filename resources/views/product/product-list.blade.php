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
					@can('admin')
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
										<h4 class="modal-title">Thêm mới sản phẩm</h4>
										<button type="button" data-dismiss="modal">&times;</button>
									</div>
									<form action="{{route('product.add')}}" class="form-group-add-new-tea" method="post" onsubmit="return addSubmit()">
										@csrf
										<div class="modal-body">
											<div class="form-group">
												<input
													type="text"
													class="form-control"
													placeholder="Tên loại chè" name="name" id="addName"
												/>
												<div class="text-danger mt-2" id="addNameMessage"></div>
												@if($errors->has('name'))
													<div class="text-danger">{{$errors->first('name')}}</div>
												@endif
											</div>
											<div class="form-group">
												<input
													type="text"
													class="form-control"
													placeholder="Khấu trừ tối đa" name="deduction" id="addDeduction"
												/>
												<div class="text-danger mt-2" id="addDeductionMessage"></div>
												@if($errors->has('deduction'))
													<div class="text-danger">{{$errors->first('deduction')}}</div>
												@endif
											</div>
											
											<div class="form-group">
												<input
													type="text"
													class="form-control"
													placeholder="Đơn giá" name="price" id="addPrice"
												/>
												<div class="text-danger mt-2" id="addPriceMessage"></div>
												@if($errors->has('price'))
													<div class="text-danger">{{$errors->first('price')}}</div>
												@endif
											</div>
											<div class="form-group">
												<select name="state" class="form-control" style="width: 100%;">
													<option value="1">Đang thu mua</option>
													<option value="0">Ngừng thu mua</option>
												</select>
											</div>
											<div class="py-2 text-left">
												Ngày áp dụng <span class="date-apply">{{date('d/m/Y',$nowTimeStamp)}}</span>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Thêm mới</button>
											<button
												type="button"
												class="btn btn-secondary"
												data-dismiss="modal"
											>
												Đóng
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					@endcan
					</div>
					<table class="table">
						<thead>
							<tr>
								<th>Các loại chè</th>
								<th>Đơn giá (vnđ/kg)</th>
								<th>Khấu trừ tối đa(%)</th>
								<th>Ngày áp dụng giá</th>
								<th>Trang thái</th>
								@can('admin')
								<th>Chỉnh sửa</th>
								@endcan
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
								@can('admin')
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
															Thay đổi thông tin sản phẩm
														</h4>
													</div>
													<form action="{{route('product.edit')}}" method="post" onsubmit="return editSubmit({{$m->id}})">
														@csrf
														<div class="modal-body">
															<input type="text" value="{{$m->id}}" style="display: none;" name="id">
															<div class="form-group">
																<input
																	type="text"
																	class="form-control"
																	value="{{$m->name}}" name="name" id="editName{{$m->id}}"
																/>
																<div class="text-danger mt-2" id="editNameMessage{{$m->id}}"></div>
																@if($errors->has('name'))
																	<div class="text-danger">{{$errors->first('name')}}</div>
																@endif
															</div>
															<div class="form-group">
																<input
																	type="text"
																	class="form-control"
																	value="{{$m->deduction}}" name="deduction" id="editDeduction{{$m->id}}"
																/>
																<div class="text-danger mt-2" id="editDeductionMessage{{$m->id}}"></div>
																@if($errors->has('deduction'))
																	<div class="text-danger">{{$errors->first('deduction')}}</div>
																@endif
															</div>
															<div class="form-group">
																<input
																	type="text"
																	class="form-control"
																	value="{{($m->price)}}" name="price" id="editPrice{{$m->id}}"
																/>
																<div class="text-danger mt-2" id="editPriceMessage{{$m->id}}"></div>
																@if($errors->has('price'))
																	<div class="text-danger">{{$errors->first('price')}}</div>
																@endif
															</div>
															<div class="form-group">
																<select name="state" id="" class="form-control" style="width: 100%;">
																	<option value="1" <?php echo ($m->state==1)?"selected":""; ?> >Đang thu mua</option>
																	<option value="0" <?php echo ($m->state==0)?"selected":""; ?> >Ngừng thu mua</option>
																</select>
															</div>

															<div class="py-2">
																Ngày áp dụng <span class="date-apply">{{date('d/m/Y',strtotime($m->updated_at))}}</span>
															</div>
															<div class="modal-footer">
																<button type="submit" class="btn btn-success">Lưu thay đổi</button>
																<button
																	type="button"
																	class="btn btn-secondary"
																	data-dismiss="modal"
																>
																	Đóng
																</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</td>
								@endcan
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</main>
		</section>
@endsection

<script>
	function addSubmit(){
		let regNumber = /^\d+$/;
		let regFloat = /^\d+(\.\d+)?$/;
		$('#addNameMessage').text("");
		$('#addDeductionMessage').text("");
		$('#addPriceMessage').text("");
		if($('#addName').val().replace(/\s/g,'')==""){
			$('#addNameMessage').text("Tên sản phẩm không được để trống");
			return false;
		}else if($('#addDeduction').val().replace(/\s/g,'')==""){
			$('#addDeductionMessage').text("Khấu trừ tối đa không được để trống");
			return false;
		}else if(!regFloat.test($('#addDeduction').val())){
			$('#addDeductionMessage').text("Khấu trừ tối đa không hợp lệ");
			return false;
		}else if($('#addPrice').val().replace(/\s/g,'')==""){
			$('#addPriceMessage').text("Đơn giá không được để trống");
			return false;
		}else if(!regNumber.test($('#addPrice').val())){
			$('#addPriceMessage').text("Đơn giá không hợp lệ");
			return false;
		}
	}
	function editSubmit(e){
		let regNumber = /^\d+$/;
		let regFloat = /^\d+(\.\d+)?$/;
		$('#editNameMessage'+e).text("");
		$('#editDeductionMessage'+e).text("");
		$('#editPriceMessage'+e).text("");
		if($('#editName'+e).val().replace(/\s/g,'')==""){
			$('#editNameMessage'+e).text("Tên sản phẩm không được để trống");
			return false;
		}else if($('#editDeduction'+e).val().replace(/\s/g,'')==""){
			$('#editDeductionMessage'+e).text("Khấu trừ tối đa không được để trống");
			return false;
		}else if(!regFloat.test($('#editDeduction'+e).val())){
			$('#editDeductionMessage'+e).text("Khấu trừ tối đa không hợp lệ");
			return false;
		}else if($('#editPrice'+e).val().replace(/\s/g,'')==""){
			$('#editPriceMessage'+e).text("Đơn giá không được để trống");
			return false;
		}else if(!regNumber.test($('#editPrice'+e).val())){
			$('#editPriceMessage'+e).text("Đơn giá không hợp lệ");
			return false;
		}
	}
</script>
