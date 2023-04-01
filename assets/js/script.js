"use strict"

const buttonMinus = document.querySelectorAll('.minus-btn');
const buttonPlus = document.querySelectorAll('.plus-btn');
const quantityInput = document.querySelectorAll('.quantity input');
const productIdAll = document.querySelectorAll('.remove');

for (let i = 0; i < buttonMinus.length; i++) {

    function myCart_quantity_change(product_id, quantity) {
        const formData = new FormData();
        formData.append('action', 'quantity_change');
        formData.append('product_id', product_id);
        formData.append('quantity', quantity);

        fetch(myajax['url'], {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(text => {
                console.log(text);
            })
            .catch(error => console.error(error));
    };

    let productId = productIdAll[i].getAttribute('data-product_id');
    buttonMinus[i].addEventListener('click', function (event) {
        if (quantityInput[i].value > 1) {
            quantityInput[i].value = Number(quantityInput[i].value) - 1;
        }
        myCart_quantity_change(productId, quantityInput[i].value);
        event.preventDefault();
    });

    buttonPlus[i].addEventListener('click', function (event) {
        if (quantityInput[i].value >= 1) {
            quantityInput[i].value = Number(quantityInput[i].value) + 1;
        }
        myCart_quantity_change(productId, quantityInput[i].value);
        event.preventDefault();
    });

};






