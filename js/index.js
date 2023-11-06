"use strict";

const API_URL = "http://localhost/Facultad/TPE-WEB2-API";

async function getAllProducts() {
    try {
        let response = await fetch(API_URL);
        if(!response.ok){
            throw new Error('Recurso no existe');
        }
        let products = await response.json();
        showAllProducts(products);
    } 
    catch(e){
        console.log(e);
    }
}

function showAllProducts(products) {
    let div = document.querySelector("#container-cards");
    div.innerHTML = "";
    for (const product of products) {
        div.innerHTML += `
        <a href="${product.Category_id}/${product.Product_id}" class="no-style">
        <div class="card" categoryID="${product.Product_name}">
            <div class="card-header">
                ${product.Category_id}
            </div>
            <div class="card-img">
                <img src="img/productos/${product.Product_name}.png" alt="${product.Product_name} ${product.Milliliters}ml">
            </div>
            <div class="card-info">
                <div class="card-description">
                    <p class="card-productName">${product.Product_name}</p>
                </div>
            </div>
        </div>
        </a>
        `;
    }
}

getAllProducts();


async function insertProduct(e){
    e.preventDefault();

    let data = new FormData(fom);
    let product = {
        Product_name: data.get('Product_name'),
        Millileters: data.get('Milliliters'),
        Price: data.get('Price'),
        Cate
    }
}


function showAllProductsInfo(products) {
    let div = document.querySelector("#container-cards");
    div.innerHTML = "";
    for (const product of products) {
        div.innerHTML += `
        <div class="card" categoryID="${product.Product_name}">
            <div class="card-header">
                ${product.Category_id}
            </div>
            <div class="card-img">
                <img src="img/productos/${product.Product_name}.png" alt="${product.Product_name} ${product.Milliliters}ml">
            </div>
            <div class="card-info">
                <div class="card-description">
                    <p class="card-productName">${product.Product_name}</p>
                    <p class="card-milliliters">${product.Milliliters}ml</p>
                </div>
                <hr class="card-divider">
                <div class="card-footer">
                    <p class="card-price">$${product.Price}</p>
                </div>
            </div>
        </div>
        `;
    }
}