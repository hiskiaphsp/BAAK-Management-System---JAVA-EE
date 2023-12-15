<x-auth-layout title="Register">
<div class="container-fluid p-0">
   <div class="row m-0">
        <div class="col-md-12">
                     <div class="login-card">
            <div>
               <div class="login-main">
                  <form class="theme-form" method="post" action="{{route('register')}}">
                    @csrf
                     <div class="m-20">
                            <h4 class="text-center">Create your account</h4>
                        </div>
                     <div class="form-group">
                        <label for="nama_lengkap" class="col-form-label">Name<span class="text-danger">*</span></label>
                        <input value="{{ old('nama_lengkap') }}" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" type="text" placeholder="Your Name" autofocus old="nama_lengkap">
                        @error('nama_lengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label class="col-form-label">Username<span class="text-danger">*</span></label>
                        <input value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" placeholder="Username">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label class="col-form-label">KTP<span class="text-danger">*</span></label>
                        <input value="{{ old('Nomor_KTP') }}" class="form-control @error('Nomor_KTP') is-invalid @enderror" id="Nomor_KTP" name="Nomor_KTP" type="text" placeholder="62xxxxxxxxx">
                        @error('Nomor_KTP')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label class="col-form-label">NIM<span class="text-danger">*</span></label>
                        <input value="{{ old('NIM') }}" class="form-control @error('NIM') is-invalid @enderror" id="NIM" name="NIM" type="text" placeholder="62xxxxxxxxx">
                        @error('NIM')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label class="col-form-label">NoHP<span class="text-danger">*</span></label>
                        <input value="{{ old('Nhp') }}" class="form-control @error('Nhp') is-invalid @enderror" id="Nhp" name="Nhp" type="text" placeholder="62xxxxxxxxx">
                        @error('Nhp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label class="col-form-label">Password<span class="text-danger">*</span></label>
                        <input value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="*********">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- <div class="show-hide"><span class="show"></span></div> --}}
                     </div>
                     <div class="form-group row justify-content-center">
                            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                     </div>

                     <p class="text-center mt-4 mb-0">Already have an account?<a class="ms-2" href="{{ route('vlogin') }}">Sign in</a></p>
                  </form>
               </div>
            </div>
         </div>
        </div>
   </div>
</div>
</x-auth-layout>
