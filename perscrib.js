document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".prescription-form form");
  
    form.addEventListener("submit", function(event) {
      event.preventDefault();
      const formData = new FormData(form);
  
      // Send form data to the PHP file using fetch
      fetch('perscrib1.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(result => {
        // Display the result returned by the PHP file
        console.log(result);
        // You can perform further actions based on the result if needed
      })
      .catch(error => console.error('Error:', error));
  
      // Reset the form after submission
      form.reset();
    });
  });
  