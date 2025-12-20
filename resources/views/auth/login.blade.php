@extends('layouts.auth')

@section('content')
<div class="container-fuild" id="App">
    <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
        <div class="row">
            <div class="col-lg-5">
                <div
                    class="login-background position-relative d-lg-flex align-items-center justify-content-center d-none flex-wrap vh-100">
                    <div class="bg-overlay-img">
                       
                    </div>
                    <div class="authentication-card w-100">
                        <div class="authen-overlay-item border w-100">
                            <h1 class="text-white display-1">Empowering people <br> through seamless HR <br>
                                management.</h1>
                            <div class="my-4 mx-auto authen-overlay-img">
                                
                            </div>
                            <div>
                                <p class="text-white fs-20 fw-semibold text-center">Efficiently manage your
                                    workforce, streamline <br> operations effortlessly.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap">
                    <div class="col-md-7 mx-auto vh-100" v-cloak>
                        <form action="{{ route("login") }}" @submit.prevent="login"  class="vh-100">
                            <div class="vh-100 d-flex flex-column justify-content-between p-4 pb-0">
                                <div class=" mx-auto text-center">
                                    <img src="assets/img/logo.png" style="height: 80px;" class="img-fluid" alt="Logo">
                                </div>
                                <div class="">
                                    <div class="text-center mb-3">
                                        <h2 class="mb-2">Sign In</h2>
                                        <p class="mb-0">Please enter your details to sign in</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <div class="input-group">
                                            <input type="text" value="" name="email" placeholder="email" class="form-control border-end-0">
                                            <span class="input-group-text border-start-0">
                                                <i class="ti ti-mail"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="pass-group">
                                            <input type="password" name="password" placeholder="mot de passe..." class="pass-input form-control">
                                            <span class="ti toggle-password ti-eye-off"></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" :disabled="isLoading" class="btn btn-primary w-100">Sign In <span v-if="isLoading" class="spinner-border spinner-border-sm ms-2"></span> </button>
                                    </div>
                                </div>
                                <div class="mt-5 pb-4 text-center">
                                    <p class="mb-0 text-gray-9">Copyright &copy; 2024 - Salama Group</p>
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

@push("scripts")
<script type="module" src="{{ asset("assets/js/scripts/auth.js") }}"></script>
@endpush