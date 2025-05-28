 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <style>
     .image-wrapper {
         position: relative;
         display: inline-block;
         margin-right: 10px;
     }

     .image-wrapper img {
         width: 100px;
         height: auto;
         border-radius: 8px;
         border: 1px solid #ddd;
     }

     .image-wrapper button {
         position: absolute;
         top: 2px;
         right: 2px;
         background: red;
         color: white;
         border: none;
         border-radius: 50%;
         width: 20px;
         height: 20px;
         font-size: 14px;
         line-height: 20px;
         cursor: pointer;
     }
 </style>
 <div class="container py-4">
     <h2 class="mb-4">Thêm sản phẩm</h2>


     <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
         @csrf

         <div class="mb-3">
             <label for="name_cate" class="form-label">Tên sản phẩm</label>
             <input type="text" name="name" id="name_cate"
                 class="form-control @error('name_cate') is-invalid @enderror" value="{{ old('name') }}">
             @error('name')
                 <div class="invalid-feedback">{{ $message }}</div>
             @enderror
         </div>
         <div class="mb-3">
             <label for="category_id" class="form-label">Danh mục sản phẩm</label>
             <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                 <option value="">-- Chọn danh mục --</option>
                 @foreach ($categories as $category)

                     <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                         {{ $category->name_cate }}
                     </option>
                 @endforeach
             </select>
             @error('category_id')
                 <div class="invalid-feedback">{{ $message }}</div>
             @enderror
         </div>

         <div class="mb-3">
             <label for="price" class="form-label">Giá sản phẩm</label>
             <input type="number" name="price" id="price"
                 class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
             @error('price')
                 <div class="invalid-feedback">{{ $message }}</div>
             @enderror
         </div>
         <div class="mb-3">
             <label for="price_sale" class="form-label">Giá khuyến mãi</label>
             <input type="number" name="price_sale" id="name_cate"
                 class="form-control @error('price_sale') is-invalid @enderror" value="{{ old('price_sale') }}">
             @error('price_sale')
                 <div class="invalid-feedback">{{ $message }}</div>
             @enderror
         </div>
         <div class="mb-3">
             <label for="stook" class="form-label">Số lượng sản phẩm</label>
             <input type="number" name="stook" id="stook"
                 class="form-control @error('stook') is-invalid @enderror" value="{{ old('stook') }}">
             @error('stook')
                 <div class="invalid-feedback">{{ $message }}</div>
             @enderror
         </div>

         <div class="mb-3">
             <label for="decription_short" class="form-label">Mô tả ngắn</label>
             <input type="text" name="decription_short" id="decription_short"
                 class="form-control @error('decription_short') is-invalid @enderror"
                 value="{{ old('decription_short') }}">
             @error('decription_short')
                 <div class="invalid-feedback">{{ $message }}</div>
             @enderror
         </div>

         <div class="mb-3">
             <label for="description" class="form-label">Mô tả dài</label>
             <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
             @error('decription')
                 <div class="invalid-feedback">{{ $message }}</div>
             @enderror
         </div>
         <div class="mt-3">
             <label>Ảnh sản phẩm chính:</label><br>
             <input type="file" name="thumbnail" id="thumbnailInput" accept="image/*"><br>
             <div id="thumbnailPreviewWrapper" style="margin-top: 10px;"></div>

             <label>Ảnh chi tiết:</label><br>
             <input type="file" name="images[]" id="imageInput" accept="image/*" multiple><br>
             <div id="imagePreviewContainer" style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 10px;"></div>

         </div>
         <div class="mb-3">
             <label class="form-label d-block">Hiển thị lên trang chủ không</label>
             <div class="form-check form-check-inline">
                 <input class="form-check-input" type="radio" name="status" id="status_show" value="1"
                     {{ old('status', '1') == '1' ? 'checked' : '' }}>
                 <label class="form-check-label" for="status_show">Hiển thị</label>
             </div>
             <div class="form-check form-check-inline">
                 <input class="form-check-input" type="radio" name="status" id="status_hide" value="0"
                     {{ old('status') == '0' ? 'checked' : '' }}>
                 <label class="form-check-label" for="status_hide">Ẩn</label>
             </div>
         </div>



         <button type="submit" class="btn btn-success">Thêm sản phảm</button>
         <a href="{{ route('admin.categories.list-cate') }}" class="btn btn-secondary">Quay lại</a>
     </form>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
     {{-- xử lí hình ảnh --}}
     <script>
         const thumbnailInput = document.getElementById('thumbnailInput');
         const thumbnailWrapper = document.getElementById('thumbnailPreviewWrapper');

         const imageInput = document.getElementById('imageInput');
         const imageContainer = document.getElementById('imagePreviewContainer');
         let selectedImages = []; // giữ danh sách ảnh chi tiết

         // Xử lý thumbnail
         thumbnailInput.addEventListener('change', function(e) {
             const file = e.target.files[0];
             thumbnailWrapper.innerHTML = '';
             if (file) {
                 const img = document.createElement('img');
                 img.src = URL.createObjectURL(file);
                 img.style.maxWidth = '150px';
                 img.style.marginRight = '10px';

                 const removeBtn = document.createElement('button');
                 removeBtn.type = 'button';
                 removeBtn.textContent = 'Xoá';
                 removeBtn.onclick = () => {
                     thumbnailInput.value = '';
                     thumbnailWrapper.innerHTML = '';
                 };

                 thumbnailWrapper.appendChild(img);
                 thumbnailWrapper.appendChild(removeBtn);
             }
         });

         // Xử lý ảnh chi tiết
         imageInput.addEventListener('change', function(e) {
             const newFiles = Array.from(e.target.files);
             newFiles.forEach(file => {
                 const exists = selectedImages.some(f => f.name === file.name && f.size === file.size);
                 if (!exists) {
                     selectedImages.push(file);
                 }
             });
             // giữ ảnh cũ + thêm ảnh mới
             renderImagePreviews();
         });

         function renderImagePreviews() {
             imageContainer.innerHTML = '';

             selectedImages.forEach((file, index) => {
                 const wrapper = document.createElement('div');
                 wrapper.style.position = 'relative';
                 wrapper.style.marginRight = '10px';

                 const img = document.createElement('img');
                 img.src = URL.createObjectURL(file);
                 img.style.maxWidth = '100px';
                 img.style.border = '1px solid #ccc';
                 img.style.borderRadius = '6px';

                 const removeBtn = document.createElement('button');
                 removeBtn.type = 'button';
                 removeBtn.textContent = 'X';
                 removeBtn.style.position = 'absolute';
                 removeBtn.style.top = '0';
                 removeBtn.style.right = '0';
                 removeBtn.style.background = 'red';
                 removeBtn.style.color = 'white';
                 removeBtn.style.border = 'none';
                 removeBtn.style.borderRadius = '50%';
                 removeBtn.style.width = '20px';
                 removeBtn.style.height = '20px';
                 removeBtn.style.cursor = 'pointer';

                 removeBtn.onclick = () => {
                     selectedImages.splice(index, 1);
                     renderImagePreviews(); // render lại preview
                 };

                 wrapper.appendChild(img);
                 wrapper.appendChild(removeBtn);
                 imageContainer.appendChild(wrapper);
             });

             updateImageInput();
         }

         function updateImageInput() {
             const dataTransfer = new DataTransfer();
             selectedImages.forEach(file => dataTransfer.items.add(file));
             imageInput.files = dataTransfer.files;
         }
     </script>


 </div>
