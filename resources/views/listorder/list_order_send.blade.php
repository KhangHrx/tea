@extends('master-layout')
@section('title','Danh sách đơn')
@section('content')
<section id="paid-order-admin" class="order home-page">
			
			<main class="right-content pt-3">
				<!-- user info section -->
				
					<!-- table section -->
          <div class="container mt-3">
            <div class="d-flex justify-content-between">
              <h3>Danh sách đơn đã gửi</h3>
              <div>
                <input
                  type="text"
                  placeholder="Tìm kiếm ..."
                  class="search-box"
                />
              </div>
              
            </div>
  
            <table class="table mt-4 text-center ">
              <thead class="thead-light">
                <tr>
                  <th>Mã đơn</th>
                  <th>Nông hộ</th>
                  <th>Địa chỉ</th>
                  <th>Tổng khối lượng</th>
                  <th>Loại chè</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->orderCustomer->name }}</td>
                  <td>{{ $order->orderCustomer->address }}</td>
                  <td>{{ number_format($order->total_weight) }}</td>
                  <td class="dropdown">
                    <a
                      type="button"
                      class="dropdown-toggle"
                      data-toggle="dropdown"
                    >
                      Chi tiết
                    </a>
                    <div class="dropdown-menu bg-light p-2">
                      @foreach($order->orderDetail as $or)
                        <p class="drop-down-item">
                          {{ $or->orderDetail->name }}
                        </p>
                      @endforeach
                    </div>
                  </td>
                  <td class="text-center">
                    <a href="{{ route('listorder.list_order_send_detail',['id'=>$order->id]) }}">Xem</i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
			</main>
		</section>
@endsection