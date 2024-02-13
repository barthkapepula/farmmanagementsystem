function calculatePrice() {
    const quantity = parseFloat(document.getElementById('quantity').value) || 0;
    const unitPrice = document.getElementById('unit').value === 'kg' ? 20 : 5;

    const totalPrice = quantity * unitPrice;
    document.getElementById('price').value = totalPrice.toFixed(2);
}

function validatePrice() {
    const priceInput = document.getElementById('price');
    const price = parseFloat(priceInput.value) || 0;

    if (price < 20) {
        alert('Price must be ZMW 20 or more.');
        priceInput.value = 20;
    }
}

function submitDelivery() {
    const formData = $('#delivery-form').serialize();

    $.ajax({
        type: 'POST',
        url: 'process_delivery.php',
        data: formData,
        success: function (response) {
            alert('Delivery details saved successfully!');
            window.location.href = 'index.php';
        },
        error: function (error) {
            alert('Error saving delivery details.');
        }
    });
}
