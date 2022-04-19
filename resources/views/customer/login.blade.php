@extends('layouts.app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Customer Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('customer.login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" autocomplete="off" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" autocomplete="off" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <!-- <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div> -->
                            <p class="sign-up">Don't have an Account?<a href="{{ route('customer.register') }}"> Sign Up</a></p>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Signin</button>
                            </div>
                            <br/>
                            @if(session()->has('success'))
                                <div class="alert alert-danger">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection