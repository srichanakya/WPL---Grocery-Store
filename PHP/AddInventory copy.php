<?php
session_start();


// Check if the admin is logged in
if (!isset($_SESSION["FirstName"]) || !$_SESSION["FirstName"]) {
    header("Location: ../HTML/Login.php");
    exit();
}

// Check if a file is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"];

    // Check if the file is an XML or JSON file
    $fileExtension = pathinfo($file["name"], PATHINFO_EXTENSION);
    
    if ($fileExtension === "xml") {
        // Process XML file
        $data = simplexml_load_file($file["tmp_name"]);
        
        // Insert data into the Inventory table (customize according to your XML structure)
        // Example:
        $data1 = $data;
        
        foreach ($data1->product as $product) {
            $itemNumber = $product->itemNumber;
            $name = $product->name;
            $category = $product->category;
            $subcategory = $product->subcategory;
            $price = $product->price;
            $quantity = $product->quantity;

            
            
            // Perform any necessary validation or sanitization

            // Insert into the database
            $conn = new mysqli('localhos', 'root', '', 'HW5');

            if ($conn->connect_error) {
                header('Location: ../test/index.html');
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO `Inventory` (ItemNumber, Name, Category, Subcategory, Price, Quantity) 
                    VALUES ('$itemNumber', '$name', '$category', '$subcategory', '$price', '$quantity')";

            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully";
            } else {
                header('Location: ../test/index.html');
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            $conn->close();
            
        }
        echo "XML file uploaded and processed successfully.";
        
    } elseif ($fileExtension === "json") {
        // Process JSON file
        $data = json_decode(file_get_contents($file["tmp_name"]), true);

        // Insert data into the Inventory table (customize according to your JSON structure)
        // Example:
        foreach ($data["products"] as $product) {
            $itemNumber = $product["itemNumber"];
            $name = $product["name"];
            $category = $product["category"];
            $subcategory = $product["subcategory"];
            $price = $product["price"];
            $quantity = $product["quantity"];

            // Perform any necessary validation or sanitization

            // Insert into the database
            $conn = new mysqli("localhost", "root", "", "HW5");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO Inventory (ItemNumber, Name, Category, Subcategory, Price, Quantity) 
                    VALUES ('$itemNumber', '$name', '$category', '$subcategory', '$price', '$quantity')";

            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }

        echo "JSON file uploaded and processed successfully.";
    } else {
        echo "Invalid file format. Please upload an XML or JSON file.";
    }
} else {
    echo "No file submitted.";
}
?>
