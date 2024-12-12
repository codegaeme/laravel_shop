@extends('layouts.admin.default')
@section('content')
    <main id="content" class="bg-body-tertiary-01 d-flex flex-column main-content">
        <div class="dashboard-page-content">
            <div class="row mb-9 align-items-center">
                <div class="col-xxl-9">
                    <div class="row">
                        <div class="col-sm-6 mb-8 mb-sm-0">
                            <h2 class="fs-4 mb-0">Add New Product</h2>
                        </div>
                        <div class="col-sm-6 d-flex flex-wrap justify-content-sm-end">
                            <a href="#" class="btn btn-outline-primary me-4">
                                Save to draft
                            </a>
                            <a href="#" class="btn btn-primary">
                                Publish
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-8 rounded-4">
                                <div class="card-header p-7 bg-transparent">
                                    <h4 class="fs-18 mb-0 font-weight-500">Basic</h4>
                                </div>
                                <div class="card-body p-7">
                                    <form class="form-border-1" action="{{ route('admin.categories.store') }}"
                                        enctype="multipart/form-data" method="post">
                                        @csrf
                                       
                                        <div class="mb-8">
                                            <label for="product_title" class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Tên
                                                danh mục</label>
                                            <input type="text" placeholder="Type here" class="form-control"
                                                name="img_name" id="product_title" value="{{old('img_name')}}">
                                            @error('img_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-8">
                                            <label for="product_title"
                                                class="mb-4 fs-13px ls-1 fw-bold text-uppercase">Ảnh</label>
                                            <input type="file" placeholder="Type here" class="form-control"
                                                name="img_cate" id="product_title" value="{{old('img_cate')}}">
                                            @error('img_cate')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <label class="form-check mb-5 col-sm-66" for="make-template">
                                            <input class="form-check-input" type="radio" value="2" name="status"
                                                id="make-template">
                                            <span class="form-check-label"> Ẩn </span>


                                        </label>
                                        <label class="form-check mb-5 col-sm-6" for="make-template">
                                            <input class="form-check-input" type="radio" value="1" name="status"
                                                id="make-template">
                                            <span class="form-check-label"> Hiển thị </span>
                                        </label>

                                        <button class="btn btn-success mt-5">Thêm </button>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
