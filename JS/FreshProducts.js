
var products;
function onCategoryChange() {
    var selectedCategory = document.getElementById("category-dropdown").value;
    
    // Make an AJAX call to fetch products based on the selected category
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            products = JSON.parse(this.responseText);
            displayProducts(products);
        }
    };

    xhttp.open("GET", "../PHP/loadFreshProducts.php?category=" + selectedCategory, true);
    xhttp.send();
}

function baking(selectedCategory) {
    

    // Make an AJAX call to fetch products based on the selected category
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            products = JSON.parse(this.responseText);
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
            <button onclick="addToCart(${product.ItemNumber})">Add to Cart</button>
        `;

        cardContainer.appendChild(card);
    }
}


function addToCart(itemnumber){
    var Quantity = document.getElementById(`inventory_${itemnumber}`).innerHTML;
// alert(Quantity)
// alert(itemnumber)
if(Quantity > 0){
    Quantity--;
    document.getElementById(`inventory_${itemnumber}`).innerHTML = Quantity;
    updateFreshInventory(itemnumber,Quantity);
    updateCartInventory(itemnumber);
    // alert("update request sent");
}
else{
    alert('Out of stock');
}
// Quantity--;
// // alert(Quantity);
// document.getElementById(`inventory_${itemnumber}`).innerHTML = Quantity;
// updateFreshInventory(itemnumber,Quantity);

// // alert("update request sent");
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

function updateCartInventory(itemnumber){
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
  
  
    xhr.open('POST', '../PHP/updateCartProducts.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('productId=' + itemnumber);

}


function myfunction1(){
    onCategoryChange();
}

function myfunction2(){
    baking('baking');
}

