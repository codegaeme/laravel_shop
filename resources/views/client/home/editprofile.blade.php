@extends('layouts.client.default')
@section('content')
<div class="main-banner">
    <div class="container py-15" >
        <div class="row justify-content-center">
            <div class="col-lg-12" >
                <!-- Customer Profile Card -->
                <div class="card profile-card shadow-lg" style="width: 90% ;margin: 0 auto ;border-radius: 10px">
                    <div class="card-body">

                            <form action="{{ route('profile.editprofile', $tt->id) }}" method="post" >
                                @csrf
                                @method('put')
                                <div class="col-md-12">

                                    <div class="row mt-4">
                                        <label for="">Email</label>
                                        <input type="text" placeholder="Nhập email" name='email' value="{{$tt->email}}" class="form-control mt-3">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="row mt-4">
                                        <label for="">Tên</label>
                                        <input type="text" placeholder="Nhập tên" name='name' value="{{$tt->name}}" class="form-control mt-3">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="row mt-4">
                                        <label for="">Số Điện thoại</label>
                                        <input type="text" placeholder="Nhập số điện thoại" name='tel' value="{{$tt->tel}}" class="form-control mt-3">
                                        @error('tel')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="row mt-4">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" placeholder="Nhập địa chỉ" name='address' value="{{$tt->address}}" class="form-control mt-3">
                                        @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="row mt-4 ">
                                        <button type="submit" class="btn btn-primary ">Sửa</button>
                                    </div>
                                </div>
                            </form>



                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

