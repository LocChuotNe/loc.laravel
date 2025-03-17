<div class="content-inner container-fluid pb-0" id="page_layout">
  <div class="row">
    <div class="col-lg-12">
      <div class="">
        <div class="card-body card-body-custom">
          <div class="fancy-table table-responsive rounded">
            <table class="table table-striped mb-0">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Khách hàng</th>
                  <th scope="col">Sách</th>
                  <th scope="col">Ngày thuê</th>
                  <th scope="col">Ngày trả</th>
                  <th scope="col">Trạng thái</th>
                  <th scope="col">Giá Thuê</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rentals as $rental)
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        {{ $rental->id }}
                      </div>
                    </td>
                    <td class="text-dark">{{ $rental->customer->name }}</td>
                    <td class="text-dark">{{ $rental->book?->title ?? 'No title available' }}</td>
                    <td class="text-dark">{{ $rental->rental_date }}</td>
                    <td class="text-dark">{{ $rental->return_date }}</td>
                    <td>
                      @if($rental->status == 'rented')
                          <span class="badge bg-warning">Đang thuê</span>
                      @elseif($rental->status == 'reserved')
                          <span class="badge bg-primary">Đã đặt trước</span>
                      @else
                          <span class="badge bg-success">Đã trả</span>
                      @endif
                    </td>
                    <td>
                      <h5 class="text-primary mt-2 mb-0">$45.99</h5>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>