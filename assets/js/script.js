"use strict"

const buttonMinus = document.querySelectorAll('.minus-btn');
const buttonPlus = document.querySelectorAll('.plus-btn');
const quantityInput = document.querySelectorAll('.quantity input');
const productIdAll = document.querySelectorAll('.remove');
const priceElements = document.querySelectorAll('.busket-product-price[data-title="Ціна"] bdi');
const totalElements = document.querySelectorAll('.busket-product-price[data-title="Проміжний підсумок"] bdi');
const subTotalElement = document.querySelector('.sub-total span');

for (let i = 0; i < buttonMinus.length; i++) {

    function myCart_total_change(price, quantity) {
        let total_change = price * quantity;
        totalElements[i].textContent = total_change + ' ' + 'грн';
    };

    function myCart_subtotal_change() {
        let count = 0;
        for (let j = 0; j < quantityInput.length; j++) {
            let sub_total = Number(totalElements[j].textContent.replace(/[^\d\.]+/g, ''));
            count += sub_total;
        };
        subTotalElement.textContent = count + ' ' + 'грн';
    };

    function myCart_quantity_change(product_id, quantity, price) {
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
        let price = priceElements[i].textContent;
        price = parseInt(price);
        myCart_quantity_change(productId, quantityInput[i].value);
        myCart_total_change(price, quantityInput[i].value)
        myCart_subtotal_change();
        event.preventDefault();
    });

    buttonPlus[i].addEventListener('click', function (event) {
        if (quantityInput[i].value >= 1) {
            quantityInput[i].value = Number(quantityInput[i].value) + 1;
        }
        let price = priceElements[i].textContent;
        price = parseInt(price);
        myCart_quantity_change(productId, quantityInput[i].value);
        myCart_total_change(price, quantityInput[i].value);
        myCart_subtotal_change();
        event.preventDefault();
    });

};








