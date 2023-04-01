"use strict"

const buttonMinus = document.querySelectorAll('.minus-btn');
const buttonPlus = document.querySelectorAll('.plus-btn');
const quantityInput = document.querySelectorAll('.quantity input');

for (let i = 0; i < buttonMinus.length; i++) {

    function myCart_quantity_change() {
        const formData = new FormData();
        formData.append('action', 'quantity_change');
        formData.append('quantity', Number(quantityInput[i].value));

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

    buttonMinus[i].addEventListener('click', function (event) {
        if (quantityInput[i].value > 1) {
            quantityInput[i].value = Number(quantityInput[i].value) - 1;
        }
        myCart_quantity_change();
        event.preventDefault();
    });

    buttonPlus[i].addEventListener('click', function (event) {
        if (quantityInput[i].value >= 1) {
            quantityInput[i].value = Number(quantityInput[i].value) + 1;
        }
        myCart_quantity_change();
        event.preventDefault();
    });
    
};






