// Animated counting with plus sign
function animateCounters() {
    const counters = document.querySelectorAll('.stat-number');
    const speed = 200; // The lower the faster
    
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const increment = target / speed;
        
        // Check if we already added the plus sign
        const hasPlus = counter.innerText.includes('+');
        
        if (count < target) {
            counter.innerText = Math.ceil(count + increment);
            setTimeout(animateCounters, 1);
        } else {
            // Add plus sign if not already present
            if (!hasPlus && counter.classList.contains('add-plus')) {
                counter.innerText = target + '+';
            } else {
                counter.innerText = target;
            }
        }
    });
}

// Initialize when page loads
window.addEventListener('DOMContentLoaded', (event) => {
    // Set data-target attributes (use your actual numbers)
    document.querySelectorAll('.stat-number').forEach(el => {
        const currentText = el.innerText;
        // Remove existing plus sign if present to get the number
        const numberValue = currentText.replace('+', '');
        el.setAttribute('data-target', numberValue);
        el.innerText = '0'; // Start counting from 0
        
        // Add class to numbers that should get plus sign
        if (currentText.includes('+')) {
            el.classList.add('add-plus');
        }
    });
    
    // Start animation when stats section is in view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        observer.observe(statsSection);
    }
});