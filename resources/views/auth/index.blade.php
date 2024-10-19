@extends('layouts.main_frontend')
@section('content')

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center align-items-center" style="height: 70vh">

                <div class="col-xl-5 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Selamat Datang Di Layanan Perpustakaan FMIPA
                                                UHO</h1>
                                        </div>
                                        <form action="/auth/login" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control form-control-user" id="username"
                                                    name="username" aria-describedby="username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control form-control-user" id="password"
                                                    name="password" placeholder="Password">
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-user mt-2 btn-block text-white"
                                                    style="background-color: #0053A0;">
                                                    Login
                                                </button>
                                            </div>
                                        </form>
                                        {{-- <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    @endsection
