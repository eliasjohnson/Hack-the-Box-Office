document.getElementById('search-form').addEventListener('submit', function(event) {
    const searchInput = document.getElementById('search-input').value;
    if (!searchInput) {
        event.preventDefault();
        alert('Please enter a search query');
    }
});