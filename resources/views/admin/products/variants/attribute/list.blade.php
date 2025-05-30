<!-- Load Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Load Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<h2>Danh sách thuộc tính</h2>

@include('component.alert')



<table class="table table-bordered p-3 m-4">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $cate)
            <tr>
                <td>{{ $cate->name }}</td>

                <td class="text-center align-middle">
                    <!-- Nút xem giá trị -->
                    <button type="button" class="btn btn-info btn-sm mb-1" data-bs-toggle="modal"
                        data-bs-target="#attributeValuesModal{{ $cate->id }}">
                        <i class="bi bi-eye-fill"></i> Xem giá trị
                    </button>

                    <!-- Nút thêm giá trị -->
                    <a href="{{ route('admin.products.variants.attributes.value.store', $cate->id) }}"
                        class="btn btn-success btn-sm">
                        <i class="bi bi-pencil-fill"></i> Thêm giá trị
                    </a>
                </td>
            </tr>
        @endforeach
        <td>
            <form action="{{ route('admin.products.variants.generate') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Tạo biến thể</button>
            </form>
        </td>
    </tbody>
</table>

<!-- MODALS -->
@foreach ($data as $cate)
    <div class="modal fade" id="attributeValuesModal{{ $cate->id }}" tabindex="-1"
        aria-labelledby="attributeValuesModalLabel{{ $cate->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Giá trị thuộc tính - {{ $cate->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    @if ($cate->values && $cate->values->count())
                        @foreach ($cate->values as $attribute)
                            <h6 class="mt-3"><strong>{{ $attribute->value }}</strong></h6>
                        @endforeach
                    @else
                        <p class="text-muted">Chưa có thuộc tính nào cho danh mục này.</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Pagination -->
{{ $data->links() }}

<!-- Load Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
