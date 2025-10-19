@extends('frontend.master')

@section('title', 'CREATE NEW SHIPMENT - World Shipping')

@section('content')
<!-- Shipping Hero Section -->
<section class="shipping-hero-section d-flex align-items-center justify-content-center text-white position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <!-- Page Title -->
                <h1 class="shipping-hero-title mb-3">CREATE NEW SHIPMENT</h1>
                
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center shipping-breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Current Shipment</li>
                    </ol>
                </nav>
                
                <!-- Description Text -->
                <p class="shipping-hero-description lead mb-0">
                    We freight to all over the world The best logistic company, 
                    <span class="text-danger fw-bold">FAST</span> and 
                </p>
            </div>
        </div>
    </div>
    
    <!-- Background Overlay -->
    <div class="shipping-hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
</section>

<!-- Create New Shipping Form Section -->
<section class="create-shipping-section py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Section Header -->
                <div class="mb-5">
                    <h2 class="create-shipping-title mb-1">Create New Shipping</h2>
                    <div class="create-shipping-underline"></div>
                </div>
                
                <!-- Progress Steps -->
                <div class="shipping-progress-container mb-5">
                    <div class="shipping-progress-steps d-flex justify-content-between align-items-center">
                        <div class="progress-step active">
                            <div class="step-circle">1</div>
                            <div class="step-label">WHERE FROM</div>
                        </div>
                        <div class="progress-step">
                            <div class="step-circle">2</div>
                            <div class="step-label">WHERE GOING</div>
                        </div>
                        <div class="progress-step">
                            <div class="step-circle">3</div>
                            <div class="step-label">WHAT</div>
                        </div>
                        <div class="progress-step">
                            <div class="step-circle">4</div>
                            <div class="step-label">HOW</div>
                        </div>
                        <div class="progress-step">
                            <div class="step-circle">5</div>
                            <div class="step-label">PAYMENT</div>
                        </div>
                        <div class="progress-step">
                            <div class="step-circle">6</div>
                            <div class="step-label">REVIEW</div>
                        </div>
                        <div class="progress-step">
                            <div class="step-circle">7</div>
                            <div class="step-label">COMPLETE</div>
                        </div>
                    </div>
                    <div class="progress-line"></div>
                </div>
                
                <!-- Shipping Form -->
                <div class="shipping-form-container bg-light p-4 rounded">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="shipping-form-title mb-0">Hello. Where are you shipping from?</h4>
                        <a href="#" class="login-link text-primary">Login</a>
                    </div>
                    
                    <p class="required-field-note mb-4">
                        <span class="text-danger">*</span> Indicates required field
                    </p>
                    
                    <form class="shipping-form">
                        <div class="row g-4">
                            <!-- Country -->
                            <div class="col-md-4">
                                <label class="form-label shipping-label">Country<span class="text-danger">*</span></label>
                                <select class="form-select shipping-input" required>
                                    <option value="">United States</option>
                                    <option value="canada">Canada</option>
                                    <option value="uk">United Kingdom</option>
                                    <option value="australia">Australia</option>
                                </select>
                            </div>
                            
                            <!-- Company or Name -->
                            <div class="col-md-4">
                                <label class="form-label shipping-label">Company or Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control shipping-input" required>
                            </div>
                            
                            <!-- Contact -->
                            <div class="col-md-4">
                                <label class="form-label shipping-label">Contact<span class="text-danger">*</span></label>
                                <input type="text" class="form-control shipping-input" required>
                            </div>
                            
                            <!-- Address -->
                            <div class="col-md-4">
                                <label class="form-label shipping-label">Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control shipping-input" placeholder="Street Address" required>
                            </div>
                            
                            <!-- Apartment, suite, unit -->
                            <div class="col-md-4">
                                <label class="form-label shipping-label">&nbsp;</label>
                                <input type="text" class="form-control shipping-input" placeholder="Apartment, suite, unit, building, floor, etc.">
                            </div>
                            
                            <!-- Department -->
                            <div class="col-md-4">
                                <label class="form-label shipping-label">&nbsp;</label>
                                <input type="text" class="form-control shipping-input" placeholder="Department, c/o, etc.">
                            </div>
                            
                            <!-- Postal Code -->
                            <div class="col-md-4">
                                <label class="form-label shipping-label">Postal Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control shipping-input" required>
                            </div>
                            
                            <!-- City -->
                            <div class="col-md-4">
                                <label class="form-label shipping-label">City<span class="text-danger">*</span></label>
                                <input type="text" class="form-control shipping-input" required>
                            </div>
                            
                            <!-- Other Address Information -->
                            <div class="col-md-4">
                                <label class="form-label shipping-label">Other Address Information</label>
                                <input type="text" class="form-control shipping-input">
                            </div>
                            
                            <!-- Residential Address Toggle -->
                            <div class="col-12">
                                <div class="form-check-container mb-3">
                                    <label class="shipping-label">Is this a residential address?</label>
                                    <div class="toggle-switch">
                                        <input type="checkbox" id="residential" class="toggle-input">
                                        <label for="residential" class="toggle-label">
                                            <span class="toggle-text"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Email -->
                            <div class="col-md-4">
                                <label class="form-label shipping-label">E-mail<span class="text-danger">*</span></label>
                                <input type="email" class="form-control shipping-input" required>
                            </div>
                            
                            <!-- Telephone -->
                            <div class="col-md-4">
                                <label class="form-label shipping-label">Telephone<span class="text-danger">*</span></label>
                                <input type="tel" class="form-control shipping-input" required>
                            </div>
                            
                            <!-- Ext -->
                            <div class="col-md-4">
                                <label class="form-label shipping-label">Ext.</label>
                                <input type="text" class="form-control shipping-input">
                            </div>
                            
                            <!-- Checkboxes -->
                            <div class="col-12">
                                <div class="shipping-checkboxes">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="sendUpdates">
                                        <label class="form-check-label shipping-label" for="sendUpdates">
                                            Send updates on this shipment
                                        </label>
                                    </div>
                                    
                                    <div class="row g-4">
                                        <div class="col-md-4">
                                            <div class="form-check-container">
                                                <label class="shipping-label">Save as new entry</label>
                                                <div class="toggle-switch">
                                                    <input type="checkbox" id="saveEntry" class="toggle-input">
                                                    <label for="saveEntry" class="toggle-label">
                                                        <span class="toggle-text"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-check-container">
                                                <label class="shipping-label">Use this as my default address</label>
                                                <div class="toggle-switch">
                                                    <input type="checkbox" id="defaultAddress" class="toggle-input">
                                                    <label for="defaultAddress" class="toggle-label">
                                                        <span class="toggle-text"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-check-container">
                                                <label class="shipping-label">Add a Different Return Address</label>
                                                <div class="toggle-switch">
                                                    <input type="checkbox" id="returnAddress" class="toggle-input">
                                                    <label for="returnAddress" class="toggle-label">
                                                        <span class="toggle-text"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Form Buttons -->
                            <div class="col-12">
                                <div class="form-buttons d-flex gap-3">
                                    <button type="submit" class="btn btn-success shipping-continue-btn px-4 py-2">Continue</button>
                                    <button type="button" class="btn btn-danger shipping-cancel-btn px-4 py-2">Cancel Shipment</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
