// Initialize all carousels on the page
document.addEventListener('DOMContentLoaded', function() {
    initializeTestimonialCarousel();
    initializeClientLogosCarousel();
});

// Initialize Testimonial Carousel
function initializeTestimonialCarousel() {
    const testimonialCarousels = document.querySelectorAll('.testimonial-carousel');
    
    if (testimonialCarousels.length > 0) {
        testimonialCarousels.forEach(carousel => {
            $(carousel).slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true,
                autoplaySpeed: 5000,
                arrows: false
            });
        });
    }
}

// Initialize Client Logos Carousel
function initializeClientLogosCarousel() {
    const clientLogos = document.querySelectorAll('.client-logos');
    
    if (clientLogos.length > 0) {
        clientLogos.forEach(logoCarousel => {
            $(logoCarousel).slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                dots: false,
                pauseOnHover: true,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 2
                    }
                }]
            });
        });
    }
}
