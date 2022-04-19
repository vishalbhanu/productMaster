@extends('layouts.app')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register Customer</h3>
                    <div class="card-body">
                        <form action="{{ route('customer.register') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="First Name" id="firstName" class="form-control" name="firstName"
                                    required autofocus>
                                @if ($errors->has('firstName'))
                                <span class="text-danger">{{ $errors->first('firstName') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Last Name" id="lastName" class="form-control" name="lastName"
                                    required autofocus>
                                @if ($errors->has('lastName'))
                                <span class="text-danger">{{ $errors->first('lastName') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Contact Number" id="conatctNumber" class="form-control"
                                    name="contactNumber" required autofocus>
                                @if ($errors->has('contactNumber'))
                                <span class="text-danger">{{ $errors->first('contactNumber') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <!-- <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Remember Me</label>
                                </div>
                            </div> -->
                            <p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}"> Sign In</a></p>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection