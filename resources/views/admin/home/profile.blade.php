@extends('layouts.admin.default')
@section('content')
<main id="content" class="bg-body-tertiary-01 d-flex flex-column main-content">
    <div class="dashboard-page-content">


        <div class="main-banner">
            <div class="container py-15" >
                <div class="row justify-content-center">
                    <div class="col-lg-12" >
                        <!-- Customer Profile Card -->
                        <div class="card profile-card shadow-lg">
                            <div class="card-body">
                                <div class="row m-5">
                                    <!-- Profile Picture -->
                                    <div class="col-md-4 text-center">

                                        <h3>{{$profile->name}}</h3>
                                        <p class="text-muted">Customer ID: #12345</p>
                                    </div>

                                    <!-- Customer Details -->
                                    <div class="col-md-8">
                                        <h5 class="text-primary mb-4">Contact Information</h5>
                                        <ul class="list-group mb-4">
                                            <li class="list-group-item"><strong >Email:</strong> {{$profile->email}}</li>
                                            <li class="list-group-item"><strong>Phone:</strong> {{$profile->tel}}</li>
                                            <li class="list-group-item"><strong>Address:</strong> {{$profile->address}}</li>
                                        </ul>


                                        <div class="table-responsive mt-3">
                                          <a href="{{route('profile.adminedit',$profile->id)}}" class="btn btn-primary">Edit Profile</a>
                                          <a href="" class="btn btn-primary">Completed Orders</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</main>

@endsection

