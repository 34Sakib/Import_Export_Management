@extends('backend.layout.master')

@section('title', 'Admin Profile')

@section('page-title', 'Profile')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Profile</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Admin Profile</h3>
            </div>
            <div class="card-body">
                <p>Admin profile page content will go here.</p>
                <p>User: {{ session('admin_name', 'Administrator') }}</p>
                <p>Email: {{ session('admin_email', 'admin@gmail.com') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
