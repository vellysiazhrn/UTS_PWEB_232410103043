@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login-container">
    <div class="login-header">
        <div class="logo-container heartbeat-animation">
            <img src="{{ asset('assets/logo.jpg') }}" alt="CiaLoops Logo" class="logo-img">
        </div>
        <h2 class="login-title">Welcome to CiaLoops!</h2>
        <p class="text-muted">Your crochet project management companion</p>
    </div>
    
    <div class="card">
        <div class="card-header pink">
            <h4 class="text-center mb-0"><i class="fas fa-lock me-2"></i>Login</h4>
        </div>
        <div class="card-body p-4">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mb-3">
                <label for="username"><i class="fas fa-user me-2"></i>Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
            </div>

            <div class="mb-3">
                <label for="password"><i class="fas fa-key me-2"></i>Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>

            <button type="submit" class="btn btn-pink w-100 mb-3">
                <i class="fas fa-sign-in-alt me-2"></i>Login
            </button>
        </form>


        </div>
    </div>
    
    <div class="mt-4 text-center">
        <p>Don't have an account? <a href="#" style="color: var(--cia-turquoise);">Sign up!</a></p>
    </div>
</div>