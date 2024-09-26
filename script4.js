document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("searchForm");
  
    form.addEventListener("submit", function(event) {
      event.preventDefault();
      const formData = new FormData(form);
  
      fetch('show1.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        displayPatientDetails(data);
      })
      .catch(error => console.error('Error:', error));
    });
  });
  
  function displayPatientDetails(data) {
    const patientDetails = document.getElementById("patientDetails");
    if (data.error) {
      patientDetails.innerHTML = `<p>${data.error}</p>`;
    } else {
      const { name, age, gender, disease, medication, dosage, frequency, instructions } = data;
      patientDetails.innerHTML = `
        <h2>Patient Details</h2>
        <p><strong>Name:</strong> ${name}</p>
        <p><strong>Age:</strong> ${age}</p>
        <p><strong>Gender:</strong> ${gender}</p>
        <p><strong>Disease:</strong> ${disease}</p>
        <h2>Prescription</h2>
        <p><strong>Medication:</strong> ${medication}</p>
        <p><strong>Dosage:</strong> ${dosage}</p>
        <p><strong>Frequency:</strong> ${frequency}</p>
        <p><strong>Instructions:</strong> ${instructions}</p>
      `;
    }
  }
  