@extends('master-layout')
@section('title','Chỉnh sửa đơn hàng')
@section('content')
<section id="paid-order-admin" class="order home-page">	
    <main class="right-content pt-3">
    <div class="container">
            <!-- Modal -->
            <div>
                <div class="">
                    <!-- Modal content-->
                    <div class="content">
                        <div>
                            <h4>
                                Thay đổi thông tin đơn hàng
                            </h4>
                        </div>
                        <form action="{{route('listorder.update_item',[$cate->id])}}" method="post">
                            @csrf
                            <div class="dev-hoa">
                                <input type="text" value="{{$products[0]->id}}" id="productId" style="display: none;" name="id">
                                <div class="form-group">
                                    <label for="item_id">Tên loại chè</label>
                                    <select class="form-control" id="item_id" name="item_id" onchange="changeProduct()">
                                        @foreach($sp as $s)
                                        <option <?php echo ($cate['product_id']==$s['id'])?"selected":''; ?> 
                                        value="{{$s['id']}}">{{$s['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="weight">Khối lượng</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{$cate->weight}}" name="weight"
                                        id="weight"
                                    />
                                    <div class="text-danger mt-2"></div>
                                        <div class="text-danger"></div>
                                </div>

                                <div class="form-group">
                                <label for="weight">Khấu trừ (%) - Tối đa: <span id="defaultDeduction">{{$products[0]->deduction}}</span>%</label>
                                    <input
                                        type="text"
                                        class="form-control"									
                                        id="tea-mass-rate-deduction"
                                        value="{{$cate->deduction_per}}" name="deduction_per"
                                    />
                                    <div class="text-danger mt-2"></div>
                                        <div class="text-danger"></div>
                                </div>

                                <div class="form-group">
                                <label for="weight">Khấu trừ khối lượng</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{$cate->deduction_kg}}" name="deduction_kg"
                                    />
                                    <div class="text-danger mt-2"></div>
                                        <div class="text-danger"></div>
                                </div>

                                <div class="form-group">
                                <label for="unit_price">Đơn giá - Mặc định: <span id="defaultPrice">{{ number_format($products[0]->price) }}</span>đ/kg)</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ number_format($products[0]->price) }}"
                                        id="tea-mass-rate-price"
                                        name="unit_price"
                                    />
                                    <div class="text-danger mt-2"></div>
                                        <div class="text-danger"></div>
                                </div>

                                <div class="form-group">
                                <label for="note">Ghi chú</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{$cate->note}}" name="note"
                                    />
                                    <div class="text-danger mt-2"></div>
                                        <div class="text-danger"></div>
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
    </main>
</section>
@endsection
@section('script')

<script>
	var products = @json($products->toArray());
	function changeProduct(){
		let select = document.getElementById('item_id');
		let product = products.find(product=>product.id == (select.selectedIndex+1));
		document.getElementById('tea-mass-rate-deduction').value = product.deduction;
		$('#defaultDeduction').text(product.deduction);
		document.getElementById('tea-mass-rate-price').value = product.price;
		$('#defaultPrice').text(product.price);
		document.getElementById('productId').value = product.id;
	}
</script>
@endsection