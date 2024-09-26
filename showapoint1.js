document.addEventListener('DOMContentLoaded', function() {
    // Fetch appointment data from PHP script
    fetchAppointments();

    function fetchAppointments() {
        fetch('showapoint2.php')
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Failed to fetch appointment data');
                }
            })
            .then(data => {
                displayAppointments(data);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to fetch appointment data. Please try again later.');
            });
    }

    function displayAppointments(appointments) {
        const appointmentList = document.getElementById('inventoryList');
        appointments.forEach(appointment => {
            const listItem = document.createElement('div');
            listItem.classList.add('inventory-item');
            listItem.innerHTML = `
                <h3>Patient: ${appointment.patient_name}</h3>
                <p>Doctor: ${appointment.doctor}</p>
                <p>Date: ${appointment.appointment_date}</p>
                <p>Time: ${appointment.appointment_time}</p>
                <p>Reason: ${appointment.reason}</p>
            `;
            appointmentList.appendChild(listItem);
        });
    }
});
