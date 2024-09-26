document.getElementById('appointment-form').addEventListener('submit', function(event) {
    event.preventDefault();
    scheduleAppointment();
});

function scheduleAppointment() {
    var patientName = document.querySelector('#patient-name').value;
    var doctor = document.querySelector('#doctor').value;
    var appointmentDate = document.querySelector('#appointment-date').value;
    var appointmentTime = document.querySelector('#appointment-time').value;
    var reason = document.querySelector('#reason').value;

    var appointmentData = {
        patientName: patientName,
        doctor: doctor,
        appointmentDate: appointmentDate,
        appointmentTime: appointmentTime,
        reason: reason
    };

    fetch('newapoint2.php', {
        method: 'POST',
        body: JSON.stringify(appointmentData)
    })
    .then(response => {
        if (response.ok) {
            return response.text();
        } else {
            throw new Error('Network response was not ok');
        }
    })
    .then(data => {
        alert(data); // Display success message or handle response
        document.getElementById('appointment-form').reset(); // Clear form fields after successful submission
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to schedule appointment. Please try again later.');
    });
}
