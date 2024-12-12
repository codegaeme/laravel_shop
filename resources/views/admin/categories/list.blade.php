@extends('layouts.admin.default')
@section('content')
    <main id="content" class="bg-body-tertiary-01 d-flex flex-column main-content">
        <div class="dashboard-page-content">
            <div class="row mb-9 align-items-center justify-content-between">
                <div class="col-md-6 mb-8 mb-md-0">
                    <h2 class="fs-4 mb-0">Category List</h2>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="col-md-6 d-flex flex-wrap justify-content-md-end">
                    <a href="#" class="btn btn-outline-primary btn-hover-bg-primary me-4">
                        Export
                    </a>
                    <a href="#" class="btn btn-outline-primary btn-hover-bg-primary me-4">
                        Import
                    </a>
                    <a href="{{route('admin.categories.create')}}" class="btn btn-primary">
                        Create new
                    </a>
                </div>
            </div>
            <div class="card mb-4 rounded-4 p-7">
                <div class="card-header bg-transparent px-0 pt-0 pb-7">

                </div>
                <div class="card-body px-0 pt-7 pb-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle table-nowrap mb-0">
                            @foreach ($listCate as $item)


                          <tbody>
                            <tr>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input class="form-check-input rounded-0 ms-0" type="checkbox"
                                            id="transactionCheck-3">
                                        <label class="form-check-label" for="transactionCheck-3"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center flex-nowrap">
                                        <a href="../shop/product-details-v1.html"
                                            title="Striped cotton-blend sweatshirt">
                                            <img src="{{Storage::url($item->img_cate)}}"
                                                data-src="../assets/images/products/product-09-75x100.jpg"
                                                alt="Striped cotton-blend sweatshirt" class="lazy-image"
                                                width="60" height="80">
                                        </a>
                                        <a href="../shop/product-details-v1.html"
                                            title="Striped cotton-blend sweatshirt" class="ms-6">
                                            <p class="fw-semibold text-body-emphasis mb-0">{{$item->img_name}}</p>
                                        </a>
                                    </div>
                                </td>

                                <td>
                                    <span
                                        class="badge rounded-lg rounded-pill alert py-3 px-4 mb-0 alert-warning border-0 text-capitalize fs-12"> @if ($item->status==1) {{'Hiển thị'}}

                                        @else
                                            {{'Ẩn'}}
                                        @endif</span>
                                </td>

                                <td class="text-center">
                                    <div class="d-flex flex-nowrap justify-content-center">
                                        <a href="{{route('admin.categories.edit',$item->id)}}"
                                            class="btn btn-primary py-4 px-5 btn-xs fs-13px me-4"><i
                                                class="far fa-pen me-2"></i> Edit</a>

                                        <form action="{{route('admin.categories.destroy',$item->id)}}" method="post" >
                                            @csrf
                                            @method('delete')
                                           <button  class="btn btn-outline-primary btn-hover-bg-danger btn-hover-border-danger btn-hover-text-light py-4 px-5 fs-13px btn-xs me-4"  onclick="return confirm('Bạn có chắc chắn muốn xóa')"> <i class="far fa-trash me-2"></i> Delete</button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                          </tbody>
                          @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example" class="mt-6 mb-4">
                <ul class="pagination justify-content-start">
                    <li class="page-item active mx-3"><a class="page-link" href="#">01</a></li>
                    <li class="page-item mx-3"><a class="page-link" href="#">02</a></li>
                    <li class="page-item mx-3"><a class="page-link" href="#">03</a></li>
                    <li class="page-item mx-3"><a class="page-link dot" href="#">...</a></li>
                    <li class="page-item mx-3"><a class="page-link" href="#">16</a></li>
                    <li class="page-item mx-3">
                        <a class="page-link" href="#"><i class="far fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>

    </main>
@endsection
