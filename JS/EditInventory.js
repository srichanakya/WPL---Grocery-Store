


function searchItem(itemnumber) {
    // var selectedCategory = document.getElementById("category-dropdown").value;

    // Make an AJAX call to fetch products based on the selected category
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            products = JSON.parse(this.responseText);
            displayProducts(products);
        }
    };

    xhttp.open("GET", "../PHP/EditInventory.php?category=" + itemnumber, true);
    xhttp.send();
}


function displayProducts(products){
    document.getElementById('productitem').value = products[0].ItemNumber;
    document.getElementById('productname').value = products[0].Name;
    document.getElementById('productprice').value = products[0].Price;
    document.getElementById('productquantity').value = products[0].Quantity;
}

function getData(){
    searchItem(document.getElementById('itemsear').value);
}

function updateInventory(){
    updateFreshInventory(document.getElementById('productitem').value ,
    document.getElementById('productprice').value,
    document.getElementById('productquantity').value );
//     alert("Update Successful");
}

function updateFreshInventory(itemnumber,Price,Quantity){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // alert('success');
            // console.log("XML file updated successfully.");
            alert("Update Successful");
            document.getElementById('productitem').value ="";
    document.getElementById('productprice').value="";
    document.getElementById('productquantity').value="";
    document.getElementById('productname').value ="";
            
        }
    };
  
  
    xhr.open('POST', '../PHP/updateEditInventory.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('productId=' + itemnumber + '&newInventory=' + Quantity+ '&newPrice='+Price);
}