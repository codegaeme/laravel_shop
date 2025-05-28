<!-- Load Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Load Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<h2>Danh sách danh mục</h2>

@include('component.alert')

<a href="{{ route('admin.categories.create-cate') }}" class="btn btn-primary mb-3">+ Thêm danh mục</a>

<table class="table table-bordered p-3 m-4">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Slug</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $cate)
            <tr>
                <td>{{ $cate->name_cate }}</td>
                <td>{{ $cate->slug }}</td>
                <td>{{ $cate->description ? $cate->description : 'Không có mô tả' }}</td>
                <td class="text-center align-middle">
                    <span class="badge {{ $cate->status ? 'bg-success' : 'bg-danger' }}">
                        {{ $cate->status ? 'Hiển thị' : 'Ẩn' }}
                    </span>
                </td>
                <td class= "text-center align-middle">
                    <a href="{{ route('admin.categories.edit-cate', $cate->id) }}" class="btn btn-nm btn-success" title="Sửa">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <form action="{{ route('admin.categories.delete-cate',) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xoá không?');">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{$cate->id}}" name="id">
                        <button type="submit" class="btn btn-nm btn-danger" title="Xoá">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination -->
{{ $categories->links() }}

<!-- Load Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
