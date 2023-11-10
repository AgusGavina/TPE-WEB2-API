"use strict";

const main = document.querySelector("#main");


function showProductosPage() {
    getAllCategorys();
    getAllProducts();
}

async function getAllProducts() {
    try {
        let response = await fetch('api/Productos');
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }
        let products = await response.json();
        showProductsCards(products);
    }
    catch (e) {
        console.log(e);
    }
}

function showProductsCards(products) {
    let container = document.querySelector("#container-cards");
    container.innerHTML = "";
    for (const product of products) {
        container.innerHTML += `
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
                    <p class="card-milliliters">${product.Milliliters}ml</p>
                </div>
                <hr class="card-divider">
                <div class="card-footer">
                    <p class="card-price">$${product.Price}</p>
                </div>
            </div>
        </div>
        </a>
        `;
    }
}

async function getAllCategorys() {
    try {
        let response = await fetch('api/Categorias');
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }
        let categorys = await response.json();
        showCategorysMenu(categorys);
    }
    catch (e) {
        console.log(e);
    }
}

function showCategorysMenu(categorys) {
    let submenu = document.querySelector("#categorys-menu");
    for (const category of categorys) {
        submenu.innerHTML += `
            <li class="categorias-productos" id="${category.Category_id}">${category.Category_name}</li>
        `;
    }
}

showProductosPage();

// async function insertProduct(e){
//     e.preventDefault();

//     let data = new FormData(fom);
//     let product = {
//         Product_name: data.get('Product_name'),
//         Millileters: data.get('Milliliters'),
//         Price: data.get('Price'),
//         Cate
//     }
// }