 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

 <div class="container py-4">
     <h2 class="mb-4">Thêm thuộc tính</h2>

     <form action="{{ route('admin.products.variants.attributes.store') }}" method="POST">
         @csrf

         <div class="mb-3">
             <label for="name" class="form-label">Tên Thuộc tính</label>
             <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                 value="{{ old('name') }}">
             @error('name')
                 <div class="invalid-feedback">{{ $message }}</div>
             @enderror
         </div>




 <button type="submit" class="btn btn-success">Lưu thuộc tính</button>

 </form>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 </div>
