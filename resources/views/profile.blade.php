@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h1><i class="fas fa-user me-2" style="color: var(--cia-purple);"></i>My Profile</h1>
        <p class="text-muted">Manage your account settings and preferences</p>
    </div>
    <div class="col-md-4 text-md-end">
        <button class="btn btn-primary">
            <i class="fas fa-edit me-2"></i>Edit Profile
        </button>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 mb-4">
        <div class="card">
            <div class="card-header purple">
                <h5 class="mb-0"><i class="fas fa-id-card me-2"></i>Personal Info</h5>
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('assets/logo.jpg') }}" alt="Profile Image" class="profile-img mb-3">
                <h4>Vellysia Nazharina</h4>
                <p class="text-muted mb-3">CiaLoops Crafter</p>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-sm btn-outline-turquoise me-2">
                        <i class="fas fa-camera me-1"></i>Change Photo
                    </button>
                </div>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header pink">
                <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Stats</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-4">
                        <h3 style="color: var(--cia-turquoise);">42</h3>
                        <p class="text-muted small">Projects</p>
                    </div>
                    <div class="col-4">
                        <h3 style="color: var(--cia-pink);">28</h3>
                        <p class="text-muted small">Customers</p>
                    </div>
                    <div class="col-4">
                        <h3 style="color: var(--cia-purple);">2</h3>
                        <p class="text-muted small">Years</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Account Details</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" value="Vellysia">
                        </div>
                        <div class="col-md-6">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" value="Nazharina">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" value="cciaabc@gmail.com">
                    </div>
                    
                    <div class="mb-3">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" value="(+62)857 9021 4932">
                    </div>
                    
                    <div class="mb-3">
                        <label for="bio">Bio</label>
                        <textarea class="form-control" id="bio" rows="3">welcome to this little corner filled with warmth and handmade crochet creations!🧶✨</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="specialty">Specialty</label>
                        <select class="form-control" id="specialty">
                            <option selected>Amigurumi</option>
                            <option>Blankets</option>
                            <option>Clothing</option>
                            <option>Accessories</option>
                            <option>Home Decor</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        
<!-- tombol logout -->
<div class="text-center mt-4">
    <form id="logout-form" method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="button" class="btn btn-danger" onclick="confirmLogout()">
            <i class="fas fa-sign-out-alt me-2"></i>Logout
        </button>
    </form>
</div>

<!-- tambahkan skrip konfirmasi logout -->
<script>
    function confirmLogout() {
        if (confirm('Apakah kamu yakin ingin logout?')) {
            document.getElementById('logout-form').submit();
        }
    }
</script>

<script src="{{ asset('js/app.js') }}"></script>
@endsection
