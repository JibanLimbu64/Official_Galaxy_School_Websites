document.addEventListener('DOMContentLoaded', function() {
    // Animation on scroll
    const teacherCards = document.querySelectorAll('.teacher-card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });
    
    teacherCards.forEach(card => {
        observer.observe(card);
    });
    
    // Department filter functionality
    const filterButtons = document.querySelectorAll('.department-filter .btn');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            const filterValue = this.getAttribute('data-filter');
            const teacherCards = document.querySelectorAll('.teacher-card');
            
            teacherCards.forEach(card => {
                const cardDepartment = card.parentElement.getAttribute('data-department');
                
                if (filterValue === 'all' || filterValue === cardDepartment) {
                    card.parentElement.style.display = 'block';
                } else {
                    card.parentElement.style.display = 'none';
                }
            });
        });
    });
});