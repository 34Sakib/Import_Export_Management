@props(['clients'])

<!-- Our Valuable Client Section -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-uppercase mb-3">Our Valuable Clients</h2>
            <div class="mx-auto bg-danger" style="width: 80px; height: 3px;"></div>
            <p class="text-muted mt-3">Trusted by industry leaders worldwide</p>
        </div>
        
        @if(isset($clients) && $clients->count() > 0)
            <!-- Client Logos -->
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">
                @foreach($clients as $client)
                    <div class="col">
                        <div class="client-logo h-100 p-3 bg-white rounded-3 shadow-sm d-flex align-items-center justify-content-center" 
                             style="height: 120px; transition: all 0.3s ease;">
                            @if($client->logo)
                                <img src="{{ $client->logo_url }}" 
                                     alt="{{ $client->name }}" 
                                     class="img-fluid" 
                                     style="max-height: 60px; max-width: 100%; object-fit: contain; filter: grayscale(100%) opacity(0.7); transition: all 0.3s ease;"
                                     onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name='+encodeURIComponent('{{ $client->name }}')+''"
                                     onmouseover="this.style.filter='grayscale(0%) opacity(1)'"
                                     onmouseout="this.style.filter='grayscale(100%) opacity(0.7)'">
                            @else
                                <div class="text-center p-2">
                                    <div class="text-muted fw-medium mb-1" style="font-size: 0.85rem;">{{ $client->name }}</div>
                                    <div class="text-muted" style="font-size: 0.7rem;">
                                        <i class="fas fa-image text-muted"></i> No logo
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <div class="py-4">
                    <i class="fas fa-building fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No clients found</p>
                    @if(auth()->check() && auth()->user()->hasRole('admin'))
                        <a href="{{ route('admin.clients.create') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus me-1"></i> Add New Client
                        </a>
                    @endif
                </div>
            </div>
        @endif
    </div>
</section>

@push('styles')
<style>
    .client-logos {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 15px;
    }
    
    .client-logo-item {
        flex: 0 0 calc(16.666% - 15px);
        max-width: calc(16.666% - 15px);
    }
    
    .client-logo {
        border-radius: 8px;
        transition: all 0.3s ease;
        border: 1px solid #eee;
    }
    
    .client-logo:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .client-logo img {
        filter: grayscale(100%);
        transition: all 0.3s ease;
    }
    
    .client-logo:hover img {
        filter: grayscale(0%);
        opacity: 1 !important;
    }
    
    @media (max-width: 991.98px) {
        .client-logo-item {
            flex: 0 0 calc(25% - 15px);
            max-width: calc(25% - 15px);
        }
    }
    
    @media (max-width: 767.98px) {
        .client-logo-item {
            flex: 0 0 calc(33.333% - 15px);
            max-width: calc(33.333% - 15px);
        }
    }
    
    @media (max-width: 575.98px) {
        .client-logo-item {
            flex: 0 0 calc(50% - 15px);
            max-width: calc(50% - 15px);
        }
    }
</style>
@endpush
