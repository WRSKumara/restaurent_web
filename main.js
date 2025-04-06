// Add scroll animation
document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('scroll', function() {
        const scrollPosition = window.scrollY;
        if (scrollPosition > 50) {
            document.querySelector('.hero-content').style.transform = `translateY(${scrollPosition * 0.1}px)`;
            document.querySelector('.bbq-image').style.transform = `translateY(${scrollPosition * 0.05}px)`;
        }
    });
    
    // Mobile responsive adjustment
    function checkSize() {
        if (window.innerWidth <= 768) {
            document.getElementById('hero-row').classList.add('col-reverse');
        } else {
            document.getElementById('hero-row').classList.remove('col-reverse');
        }
    }
    
    // Run on load and resize
    checkSize();
    window.addEventListener('resize', checkSize);
});