  // Initialize carousel
  var schoolCarousel = new bootstrap.Carousel(document.getElementById('schoolCarousel'), {
    interval: 5000,
    wrap: true
});

// Highlight current day in schedule
document.addEventListener('DOMContentLoaded', function() {
    const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const today = new Date().getDay();
    const dayElements = document.querySelectorAll('.schedule-calendar .day');
    
    if (dayElements.length > 0 && today >= 0 && today <= 6) {
        // Remove any existing today class
        dayElements.forEach(day => day.classList.remove('today'));
        
        // Add today class to current day
        if (days[today] === 'Wed') {
            document.querySelector('.music-day').classList.add('pulse-animation');
        } else {
            dayElements[today - 1].classList.add('today');
        }
    }
    
    // Smooth scrolling for navigation
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});

// Animation for elements when they come into view
function animateOnScroll() {
    const elements = document.querySelectorAll('.program-card, .feature-box');
    
    elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.3;
        
        if (elementPosition < screenPosition) {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }
    });
}

// Set initial state for animation
document.querySelectorAll('.program-card, .feature-box').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
});

// Run on load and scroll
window.addEventListener('load', animateOnScroll);
window.addEventListener('scroll', animateOnScroll);
// Custom carousel animation
document.addEventListener('DOMContentLoaded', function() {
    const galaxyCarousel = document.getElementById('galaxyCarousel');
    
    if (galaxyCarousel) {
      const carousel = new bootstrap.Carousel(galaxyCarousel, {
        interval: 6000,
        pause: false
      });
      
      // Add slide transition animations
      galaxyCarousel.addEventListener('slide.bs.carousel', function (e) {
        const activeSlide = e.from;
        const nextSlide = e.to;
        
        // Reset animations
        const activeCaption = document.querySelector(`.carousel-item:nth-child(${activeSlide + 1}) .caption-wrapper`);
        if (activeCaption) {
          activeCaption.querySelector('.caption-title').classList.remove('animate__fadeInDown');
          activeCaption.querySelector('.caption-subtitle').classList.remove('animate__fadeInUp');
          activeCaption.querySelector('.btn-glow').classList.remove('animate__fadeInUp');
        }
        
        // Animate next slide
        setTimeout(() => {
          const nextCaption = document.querySelector(`.carousel-item:nth-child(${nextSlide + 1}) .caption-wrapper`);
          if (nextCaption) {
            nextCaption.querySelector('.caption-title').classList.add('animate__fadeInDown');
            nextCaption.querySelector('.caption-subtitle').classList.add('animate__fadeInUp');
            nextCaption.querySelector('.btn-glow').classList.add('animate__fadeInUp');
          }
        }, 50);
      });
      
      // Initialize first slide animation
      const firstCaption = document.querySelector('.carousel-item.active .caption-wrapper');
      if (firstCaption) {
        firstCaption.querySelector('.caption-title').classList.add('animate__fadeInDown');
        firstCaption.querySelector('.caption-subtitle').classList.add('animate__fadeInUp');
        firstCaption.querySelector('.btn-glow').classList.add('animate__fadeInUp');
      }
    }

});
  // Auto open modal after 1 second
  setTimeout(function() {
    document.getElementById('autoOpenModal').click();
    
    // Countdown timer for 5 seconds
    let seconds = 5;
    const countdownElement = document.getElementById('countdown');
    const countdownInterval = setInterval(function() {
        seconds--;
        countdownElement.textContent = `00:0${seconds}`;
        
        if (seconds <= 0) {
            clearInterval(countdownInterval);
            // Auto close modal after 5 seconds
            const modal = bootstrap.Modal.getInstance(document.getElementById('attractiveModal'));
            modal.hide();
        }
    }, 1000);
}, 1000);
