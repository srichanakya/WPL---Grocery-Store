
var newProducts;
function snacks(selectedCategory) {
    // Make an AJAX call to fetch products based on the selected category
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            products = JSON.parse(this.responseText);
            newProducts = products;
            console.log(products);
            displayProducts(products);
        }
    };
    xhttp.open("GET", "../PHP/loadFreshProducts.php?category=" + selectedCategory, true);
    xhttp.send();
}

function candy(selectedCategory) {
    // Make an AJAX call to fetch products based on the selected category
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            products = JSON.parse(this.responseText);
            newProducts = products;
            console.log(products);
            displayProducts(products);
        }
    };
    xhttp.open("GET", "../PHP/loadFreshProducts.php?category=" + selectedCategory, true);
    xhttp.send();
}


function displayProducts(products) {
    var cardContainer = document.getElementById("veg");
    cardContainer.innerHTML = ""; // Clear previous content
    
    for (var i = 0; i < products.length; i++) {
        
        var product = products[i];
    
        // console.log(product)
        var card = document.createElement("div");
        card.className = "card";

        card.innerHTML = `
            <img src="../Assets/fresh/${product.Name}.png" alt="${product.Name}">
            <p>${product.Name}</p>
            <p>Price: $${product.Price}</p>
            <p id='inventory_${product.ItemNumber}'>${product.Quantity}</p>
            <input type='number' id="quantityof${product.ItemNumber}" value="1" min="1"/>
            <button onclick="addToCart(${product.ItemNumber})">Add to Cart</button>
        `;

        cardContainer.appendChild(card);
    
}
}




function displaySearch(products) {
    
    var cardContainer = document.getElementById("veg");
    cardContainer.innerHTML = ""; // Clear previous content
 var flag = 0;
    for (var i = 0; i < newProducts.length; i++) {
        
        var product = newProducts[i];
      
    if(product.Name.toLowerCase().includes(products)){
        // console.log(product)
        flag++;
        var card = document.createElement("div");
        card.className = "card";

        card.innerHTML = `
            <img src="../Assets/fresh/${product.Name}.png" alt="${product.Name}">
            <p>${product.Name}</p>
            <p>Price: $${product.Price}</p>
            <p id='inventory_${product.ItemNumber}'>${product.Quantity}</p>
            <input type='number' id="quantityof${product.ItemNumber}" value="1" min="1"/>
            <button onclick="addToCart(${product.ItemNumber})">Add to Cart</button>
        `;

        cardContainer.appendChild(card);
    
}
    }
    if(flag == 0){
        alert('No Product Found');
        
    }
}



function addToCart(itemnumber){
    var Quantity = document.getElementById(`inventory_${itemnumber}`).innerHTML;
    var quantityof = document.getElementById(`quantityof${itemnumber}`).value;
    // alert(Quantity);
    // alert(quantityof);
    if(Quantity > 0 && Quantity >= quantityof){
// alert(Quantity)
// alert(itemnumber)
Quantity = Quantity - quantityof;
// alert(Quantity);
document.getElementById(`inventory_${itemnumber}`).innerHTML = Quantity;
updateFreshInventory(itemnumber,Quantity);
updateCartInventory(itemnumber, quantityof);
    }
    else{
        alert('Out of stock');
    }
// alert("update request sent");
}




function updateFreshInventory(itemnumber,Quantity){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // alert('success');
            console.log("XML file updated successfully.");
        }
    };
  
  
    xhr.open('POST', '../PHP/updateFreshProducts.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('productId=' + itemnumber + '&newInventory=' + Quantity);
}

function updateCartInventory(itemnumber, quantityof){
    console.log(itemnumber+" this is new item ");
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // alert('cart updatd');
            console.log("XML file updated successfully.");
        }
        else{
            // alert('cart not updatd');
        }
    };
  
  
    xhr.open('POST', '../PHP/updateCartProductsSearch.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('productId=' + itemnumber + '&newInventory='+quantityof);

}

function myfunction3(){
    // alert("search inventory");
    snacks('snacks')
}


function myfunction4(){
    // alert("search inventory");
    candy('candy')
}

function searchfunction(){
    var inputPattern = /^[a-zA-Z\s ]+$/;
    var prod = document.getElementById('search').value.toLowerCase();
    if (inputPattern.test(prod)) {
        console.log("Valid input");
        displaySearch(prod);
    } else {
        alert("only letters")
    }
    
    

}
