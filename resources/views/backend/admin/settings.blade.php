@extends('backend.layout.master')

@section('title', 'Admin Settings')

@section('page-title', 'Settings')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Settings</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Admin Settings</h3>
            </div>
            <div class="card-body">
                <p>Admin settings page content will go here.</p>
                <p>Configure your admin panel settings and preferences.</p>
            </div>
        </div>
    </div>
</div>
@endsection
