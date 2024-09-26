document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('inventory-form');
  
    form.addEventListener('submit', function(event) {
        event.preventDefault();
  
        fetch('addinv1.php', {
            method: 'POST',
            body: new FormData(form)
        })
        .then(response => {
            if (response.ok) {
                return response.text();
            } else {
                throw new Error('Failed to add item to inventory');
            }
        })
        .then(data => {
            alert(data);
            form.reset();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to add item to inventory. Please try again later.');
        });
    });
});
