document.addEventListener('DOMContentLoaded', function() {
  // Fetch inventory data from PHP script
  fetch('dispinv2.php')
    .then(response => {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error('Failed to fetch inventory data');
      }
    })
    .then(data => {
      const inventoryList = document.getElementById('inventoryList');
      data.forEach(item => {
        const listItem = document.createElement('div');
        listItem.classList.add('inventory-item');
        listItem.innerHTML = `
          <h3>${item.item_name}</h3>
          <p>Quantity: ${item.quantity}</p>
          <p>Category: ${item.category}</p>
          <p>Description: ${item.description}</p>
        `;
        inventoryList.appendChild(listItem);
      });
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Failed to fetch inventory data. Please try again later.');
    });
});
