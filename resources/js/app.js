import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


function test(orderItemId) {
    console.log(orderItemId);
    var newQuantity = document.getElementById('quantity-' + orderItemId).value;

    // Make an AJAX request to update the quantity for the order item
    axios.put('http://127.0.0.1:8000/cart/' + orderItemId, {
        quantity: newQuantity
    })
    .then(function (response) {
        // The quantity has been updated successfully
        console.log(response.data);
    })
    .catch(function (error) {
        // An error occurred while updating the quantity

        console.log(error);
    });
}
