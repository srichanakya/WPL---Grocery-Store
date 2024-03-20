var products;
function loadCartData() {

    // Make an AJAX call to fetch products based on the selected category
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // alert('cart updatd');
            products = JSON.parse(this.responseText);
            displayProducts(products);
        }
        else{
            // alert('cart not updated');
        }
    };

    xhttp.open("GET", "../PHP/loadCart.php", true);
    xhttp.send();
}

function displayProducts(products) {
    var container = document.getElementById('Container');
    container.innerHTML = '';
    var totalPrice = 0;

    // dispTransactionID();
    var disptransactionID = document.getElementById('TransactionID');
    // disptransactionID.innerHTML = '<p>This is some content added with JavaScript!</p>';

    var product = products[0];
    disptransactionID.innerHTML = '<h2>Transaction ID: '+ product.TransactionID + '</h2>';
    // var para = document.createElement('p');
    // para.textContent = 'Transaction ID: ';
    // disptransactionID.appendChild(para);
    // var container = document.getElementById('Container');
    // container.appendChild(disptransactionID);

    var table = document.createElement('table');
    table.border = '1';


    var headerRow = table.insertRow();
    for (const header of ['Item Id', 'Category', 'Sub Category', 'Name', 'Quantity', 'Price ($)']) {
        var headerCell = headerRow.insertCell();
        headerCell.textContent = header;
        headerCell.style.fontWeight = 'bold';
    }

    for (var i = 0; i < products.length; i++) {
        var product = products[i];
        console.log(product);
        if (product.Quantity > 0) {
            let formattedCategory = product.Category.charAt(0).toUpperCase() + product.Category.slice(1).replace(/([A-Z])/g, ' $1').trim();
            let formattedSubCategory = product.Subcategory.split('-')[0].charAt(0).toUpperCase() + product.Subcategory.split('-')[0].slice(1);

            var row = table.insertRow();
            row.insertCell().textContent = product.ItemNumber;
            row.insertCell().textContent = formattedCategory;
            row.insertCell().textContent = formattedSubCategory;
            row.insertCell().textContent = product.Name;
            row.insertCell().textContent = product.Quantity;
            row.insertCell().textContent = product.Price;

            // Add Remove button
            var removeButton = document.createElement('button');
            removeButton.textContent = 'Cancel';
            // Use a closure to capture the correct product ID
            removeButton.addEventListener('click', (function (productId, cartQuantity, InventoryQuantity) {
                return function () {
                    // Call your removeItem function or handle the removal logic here
                    removeItem(productId, parseInt(cartQuantity) + parseInt(InventoryQuantity));
                };
            })(product.ItemNumber, product.Quantity, product.InventoryQuantity));

            // Add the Remove button to the row
            var actionsCell = row.insertCell();
            actionsCell.appendChild(removeButton);
        }

        var container = document.getElementById('Container');
        container.appendChild(table);
    }

    calculateAndDisplayPriceTotal();
    

}

function dispTransactionID(){
    var disptransactionID = document.getElementById('TransactionID');
    var product = products[0];
    disptransactionID.innerHTML = '';
    var para = document.createElement('p');
    para.textContent = 'Transaction ID: ';
    disptransactionID.appendChild(para);
    // var /container = document.getElementById('Container');
    // container.appendChild(disptransactionID);
}
function calculateAndDisplayPriceTotal() {
    var table = document.querySelector('table');
    var rows = table.getElementsByTagName('tr');
    var priceTotal = 0;


    for (var i = 1; i < rows.length; i++) {
        var priceCell = rows[i].getElementsByTagName('td')[5]; 
        var priceValue = parseFloat(priceCell.textContent);
        var QuantityCell = rows[i].getElementsByTagName('td')[4];
        var quantityValue = parseInt(QuantityCell.textContent);
        
        if (!isNaN(priceValue)) {
            priceTotal += priceValue*quantityValue;
        }
    }

    var totalRow = table.insertRow();
    totalRow.insertCell(); 
    totalRow.insertCell(); 
    totalRow.insertCell(); 
    totalRow.insertCell(); 
    var totalCell = totalRow.insertCell();
    totalCell.textContent = 'Total ';
    totalCell.style.fontWeight = 'bold';
    var totalPriceCell = totalRow.insertCell();
    totalPriceCell.textContent = `$${priceTotal.toFixed(2)}`;
    totalPriceCell.style.fontWeight = 'bold';

    var buyButton = document.createElement('button');
    buyButton.textContent = 'Buy';
    var actionsCell = totalRow.insertCell();
    actionsCell.appendChild(buyButton);
    buyButton.addEventListener('click', function() {
        // Call your removeItem function or handle the removal logic here
        buyAll();
    });

}
// cart status incart cancelled shopped
// transaction status same
function buyAll(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // alert('success');
            window.location.reload(true);
            console.log("XML file updated successfully.");
        }
    };
  
  
    xhr.open('POST', '../PHP/buyAll.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send();
}

function removeItem(ItemNumber,newQuantity){
    updateCartRemoveItem(ItemNumber);
    updateAddInventory(ItemNumber,newQuantity);
    
}

function updateCartRemoveItem(ItemNumber){
    // console.log(itemnumber+" this is new item ");
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // alert('cart updatd');
            window.location.reload(true);
            console.log("XML file updated successfully.");
        }
        else{
            // alert('cart not updatd');
        }
    };
  
  
    xhr.open('POST', '../PHP/updateCartRemoveItem.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('productId=' + ItemNumber);
}

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

function myfunction1(){
    // alert('cart updatd');
    loadCartData();
    
}

