@extends('layouts.app')
@section('title', 'Your Profile')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endprepend
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
    </div>
@else
    <div class="alert alert-info">
        All fields with <span class='text-danger'>(*)</span> asterisk mark are required
    </div>
@endif
    
    <div class="card">
        <div class="card-header">
            <span class='h6'>
                Login Credentials
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('administrator.update.profile') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class='h6'>
                        Username
                        <span class='text-danger'>*</span>
                    </label>
                    <input type="text" name="username" placeholder="Username" value="{{ old('username', $user->username ) }}" @class([
                        'form-control',
                        'is-invalid' => $errors->has('username'),
                    ])>
                    <span class='text-danger'>
                        @error('username')
                            {{ $errors->first('username') }}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <label class='h6'>Password</label>
                    <input type="password" name="old_password" placeholder="********" @class([
                        'form-control',
                        'is-invalid' => $errors->has('old_password'),
                    ])>
                    <span class='text-danger'>
                        @error('old_password')
                            {{ $errors->first('old_password') }}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <label class='h6'>New Password</label>
                    <input type="password" name="password" placeholder="********" @class([
                        'form-control',
                        'is-invalid' => $errors->has('password')
                    ])>
                    <span class='text-danger'>
                        @error('password')
                            {{ $errors->first('password') }}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <label class='h6'>Re-type new password</label>
                    <input type="password" name="password_confirmation" placeholder="********" @class([
                        'form-control',
                        'is-invalid' => $errors->has('password')
                    ])>
                </div>

                <div class="form-group">
                    <div class="float-right">
                        <input type="submit" value="Update" class='btn btn-success text-white'>
                    </div>
                    <div class="clearfix"></div>
                </div>
        
            </form>
        </div>

        
    </div>
@push('page-scripts')
@endpush

@endsection
