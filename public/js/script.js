rating = document.getElementById('rating');
watched_check = document.getElementById('watched_check');

function updateRatingVisibility() {
    if (watched_check.checked) {
        rating.classList.remove('disabled');
    } else {
        rating.classList.add('disabled');
        const stars = rating.querySelectorAll('input[type="radio"]');
        stars.forEach(star => {
            star.checked = false;
        });
    }
}

watched_check.addEventListener('change',updateRatingVisibility);

document.addEventListener('DOMContentLoaded', updateRatingVisibility);
