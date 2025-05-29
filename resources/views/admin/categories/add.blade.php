 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-4">
    <h2 class="mb-4">Thêm danh mục sản phẩm</h2>

    <form action="{{ route('admin.categories.store-cate') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name_cate" class="form-label">Tên danh mục</label>
            <input type="text" name="name_cate" id="name_cate" class="form-control @error('name_cate') is-invalid @enderror" value="{{ old('name_cate') }}" >
            @error('name_cate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        {{-- <div class="mb-3">
            <label for="sort_order" class="form-label">Thứ tự hiển thị</label>
            <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div> --}}

       <div class="mb-3">
    <label class="form-label d-block">Trạng thái</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="status_show" value="1" {{ old('status', '1') == '1' ? 'checked' : '' }}>
        <label class="form-check-label" for="status_show">Hiển thị</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="status_hide" value="0" {{ old('status') == '0' ? 'checked' : '' }}>
        <label class="form-check-label" for="status_hide">Ẩn</label>
    </div>
</div>


        <button type="submit" class="btn btn-success">Lưu danh mục</button>
        <a href="{{ route('admin.categories.list-cate') }}" class="btn btn-secondary">Quay lại</a>
    </form>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</div>

