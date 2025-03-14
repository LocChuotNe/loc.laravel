<div class="content-inner container-fluid pb-0" id="page_layout">
  <div class="row">
    <div class="col-lg-12">
      <div class="">
        <div class="card-body card-body-custom">
          <div class="fancy-table table-responsive rounded">
            <table class="table table-striped mb-0">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tiêu Đề</th>
                  <th scope="col">Tác Giả</th>
                  <th scope="col">Danh Mục</th>
                  <th scope="col">Số Lượng</th>
                  <th scope="col">Giá Thuê</th>
                  <th scope="col">Trạng Thái</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($books as $index => $book)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td class="text-dark">{{ $book->title }}</td>
                  <td class="text-dark">{{ $book->author }}</td>
                  <td class="text-dark">{{ $book->category->name ?? 'Chưa có danh mục' }}</td>
                  <td class="text-dark">{{ $book->stock }}</td>
                  <td class="text-dark text-primary">${{ number_format($book->rental_price, 2) }}</td>
                  <td>
                    @if($book->stock > 0)
                      <span class="badge bg-soft-success p-2 text-success">Còn hàng</span>
                    @else
                      <span class="badge bg-soft-danger p-2 text-danger">Hết hàng</span>
                    @endif
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