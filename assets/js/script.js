"use strict"

const buttonMinus = document.querySelectorAll('.minus-btn');
const buttonPlus = document.querySelectorAll('.plus-btn');
const quantityInput = document.querySelectorAll('#quantity-input');

function myCartApi() {
    fetch('http://vape-shop/cart/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ quantity: quantityInput.value })
    })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Something went wrong.');
        })
        .then(data => {
            console.log(data);
            // Обновляем данные на странице
        })
        .catch(error => console.error(error));
};

for (let i = 0; i < buttonMinus.length; i++) {

    buttonMinus[i].addEventListener('click', function () {
        if (quantityInput[i].value > 1) {
            quantityInput[i].value = Number(quantityInput[i].value) - 1;
        }
        myCartApi();
    });

    buttonPlus[i].addEventListener('click', function () {
        if (quantityInput[i].value >= 1) {
            quantityInput[i].value = Number(quantityInput[i].value) + 1;
        }
        myCartApi();
    });
};






