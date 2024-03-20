var products;

function cancelShop(){
    console.log("hi");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // alert('cart updatd');
            products = JSON.parse(this.responseText);
            // console.log(products);
            // displayProducts(products);
            console.log(products);
            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                updateAddInventory(product.ItemNumber, parseInt(product.Quantity) + parseInt(product.InventoryQuantity))
            }
            updateCartAndTransaction();

            // window.location.reload(true);
        }
        else{
            // alert('cart not updated');
        }
    };

    xhttp.open("GET", "../PHP/loadCart.php", true);
    xhttp.send();
}
// function cancelShop(){
//     loadCart();
    
// }

function updateAddInventory(ItemNumber, newInventory){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // alert('success');
            console.log("XML file updated successfully.");
        }
    };
  
  
    xhr.open('POST', '../PHP/updateFreshProducts.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('productId=' + ItemNumber + '&newInventory=' + newInventory);
}




function updateCartAndTransaction(){
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
  
  
    xhr.open('POST', '../PHP/MyAccountCancel.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send();
}


// function getTransactions() {
//     // Get selected option and value
//     var selectedOption = document.getElementById("option").value;
//     var selectedValue = document.getElementById("dateInput").value;

//     // Make an AJAX request to the server
//     fetch('../PHP/getTransactions.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//         },
//         body: 'option=' + encodeURIComponent(selectedOption) + '&value=' + encodeURIComponent(selectedValue),
//     })
//     .then(response => response.text())
//     .then(data => {
//         // Display the result in the 'result' div
//         document.getElementById("result").innerHTML = data;
//     })
//     .catch(error => {
//         console.error('Error:', error);
//     });
// }