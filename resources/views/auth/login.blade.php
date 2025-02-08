@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control userMail @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Enter your email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control userPassword @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password"
                                        placeholder="Enter your shop password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0" style="padding-left: 22px; padding-right:22px"> 
                                <button type="submit" class="btn btn-danger btn-sm">
                                    {{ __('Login') }}
                                </button> 
                            </div>
                        </form>
                        <form method="POST" action="{{ route('customLogin') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="userEmail" type="hidden"
                                        class="form-control userEmail @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Enter your email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <input id="userPassword" type="hidden"
                                        class="form-control userPassword @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password"
                                        placeholder="Enter your shop password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="row" style="padding-left: 22px; padding-right:22px">
                                        <button type="submit" name="admin" value="admin"
                                            class="btn btn-primary btn-sm admin">Admin</button>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end">
                                    <div class="row" style="padding-left: 22px; padding-right:22px">
                                        <button type="submit" name="merchant" value="merchant"
                                            class="btn btn-success btn-sm">Merchant</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.btn').click(function() {
                var type = $(this).val();
                var email = $('#email').val();
                var password = $('#password').val();
                if (type == 'admin') {
                    $('.userEmail').val(email);
                    $('.userPassword').val(password);
                }
                if (type == 'merchant') {
                    $('.userEmail').val(email);
                    $('.userPassword').val(password);
                }
            })
        })
    </script>
@endpush
