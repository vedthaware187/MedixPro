document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("record-form");
  
    form.addEventListener("submit", function(event) {
      event.preventDefault();
      const formData = new FormData(form);
  
      fetch('record.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(result => {
        console.log(result);
        // You can perform further actions based on the result if needed
      })
      .catch(error => console.error('Error:', error));
  
      form.reset();
    });
});
