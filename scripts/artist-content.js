document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.artist-link').forEach(function(link) {
        link.addEventListener('click', function() {
            var artistId = this.getAttribute('data-artist-id');
            var contentId = artistId + 'Content';

            // Hide all artist content
            document.querySelectorAll('.artist-content').forEach(function(content) {
                content.style.display = 'none';
            });

            // Show the clicked artist's content
            document.getElementById(contentId).style.display = 'block';
        });
    });
});

