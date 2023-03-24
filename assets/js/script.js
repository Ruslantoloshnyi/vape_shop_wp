"use strict"

const buttonMinus = document.querySelectorAll('.minus-btn');
const buttonPlus = document.querySelectorAll('.plus-btn');
const quantityInput = document.querySelectorAll('#quantity-input');

for (let i = 0; i < buttonMinus.length; i++) {

    buttonMinus[i].addEventListener('click', function () {
        if (quantityInput[i].value > 1) {
            quantityInput[i].value = Number(quantityInput[i].value) - 1;
        }
    });

    buttonPlus[i].addEventListener('click', function () {
        if (quantityInput[i].value >= 1) {
            quantityInput[i].value = Number(quantityInput[i].value) + 1;
        }
    });
};