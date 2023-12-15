<x-auth-layout title="Login">
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12">
                <div class="login-card">
                    <div>
                        <div class="login-main">
                            <form class="theme-form" method="post" action="{{ route('login') }}" id="loginForm">
                                <div class="m-20">
                                    <h4 class="text-center">Sign in</h4>
                                </div>
                                @csrf
                                <div class="form-group mt-20">
                                    <label class="col-form-label" for="username">username Address</label>
                                    <input value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" id="username" type="text" name="username" autofocus placeholder="Test@gmail.com">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="password">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="*********">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mt-20">
                                    <div class="row justify-content-center">
                                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                                    </div>
                                </div>

                                <p class="text-center mt-4 mb-0">Don't have an account?<a class="ms-2" href="{{ route('register') }}">Create Account</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>
