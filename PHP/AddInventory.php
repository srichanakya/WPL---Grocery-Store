<?php

// Check if a file is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"];

    // Check if the file is an XML or JSON file
    $fileExtension = pathinfo($file["name"], PATHINFO_EXTENSION);

    if ($fileExtension === "xml" || $fileExtension === "json") {
        // Read data from the uploaded file
        $fileContent = file_get_contents($file["tmp_name"]);

        $conn = new mysqli('localhost', 'root', '', 'HW5');
        if ($conn->connect_error) {
            header('Location: ../test/error.html');
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the file content is not empty
        if ($fileContent !== false) {
            // Now $fileContent contains the content of the uploaded file as a string

            // Convert the string back to SimpleXMLElement for XML processing
            if ($fileExtension === "xml") {
                $data = simplexml_load_string($fileContent);

                // Process each product and insert or update into the database
                foreach ($data->product as $product) {
                    $itemNumber = $conn->real_escape_string($product->itemNumber);
                    $name = $conn->real_escape_string($product->name);
                    $category = $conn->real_escape_string($product->category);
                    $subcategory = $conn->real_escape_string($product->subcategory);
                    $price = floatval($product->price);
                    $quantity = intval($product->quantity);

                    // Check if the ItemNumber exists in the database
                    $checkSql = "SELECT * FROM `Inventory` WHERE `ItemNumber` = '$itemNumber'";
                    $result = $conn->query($checkSql);

                    if ($result->num_rows > 0) {
                        // ItemNumber exists, update quantity
                        $updateSql = "UPDATE `Inventory` SET `Quantity` = `Quantity` + $quantity WHERE `ItemNumber` = '$itemNumber'";
                        if ($conn->query($updateSql) === TRUE) {
                            echo "Record updated successfully<br>";
                        } else {
                            echo "Error updating record: " . $conn->error;
                            header('Location: ../test/error.html');
                            exit(); // Ensure script stops execution after redirect
                        }
                    } else {
                        // ItemNumber doesn't exist, insert new record
                        $insertSql = "INSERT INTO `Inventory`(`ItemNumber`, `Name`, `Category`, `Subcategory`, `Price`, `Quantity`) 
                                VALUES ('$itemNumber', '$name', '$category', '$subcategory', $price, $quantity)";
                        if ($conn->query($insertSql) === TRUE) {
                            echo "Record inserted successfully<br>";
                        } else {
                            echo "Error inserting record: " . $conn->error;
                            header('Location: ../test/error.html');
                            exit(); // Ensure script stops execution after redirect
                        }
                    }
                }

                header('Location: ../HTML/Dashboard.php');
            } elseif ($fileExtension === "json") {
                // Process JSON file
                $data = json_decode($fileContent, true);

                // Insert or update data into the Inventory table (customize according to your JSON structure)
                // Example:
                foreach ($data["products"] as $product) {
                    $itemNumber = $conn->real_escape_string($product["itemNumber"]);
                    $name = $conn->real_escape_string($product["name"]);
                    $category = $conn->real_escape_string($product["category"]);
                    $subcategory = $conn->real_escape_string($product["subcategory"]);
                    $price = floatval($product["price"]);
                    $quantity = intval($product["quantity"]);

                    // Check if the ItemNumber exists in the database
                    $checkSql = "SELECT * FROM `Inventory` WHERE `ItemNumber` = '$itemNumber'";
                    $result = $conn->query($checkSql);

                    if ($result->num_rows > 0) {
                        // ItemNumber exists, update quantity
                        $updateSql = "UPDATE `Inventory` SET `Quantity` = `Quantity` + $quantity WHERE `ItemNumber` = '$itemNumber'";
                        if ($conn->query($updateSql) === TRUE) {
                            echo "Record updated successfully<br>";
                        } else {
                            echo "Error updating record: " . $conn->error;
                            header('Location: ../test/error.html');
                            exit(); // Ensure script stops execution after redirect
                        }
                    } else {
                        // ItemNumber doesn't exist, insert new record
                        $insertSql = "INSERT INTO `Inventory`(`ItemNumber`, `Name`, `Category`, `Subcategory`, `Price`, `Quantity`) 
                                VALUES ('$itemNumber', '$name', '$category', '$subcategory', $price, $quantity)";
                        if ($conn->query($insertSql) === TRUE) {
                            echo "Record inserted successfully<br>";
                        } else {
                            echo "Error inserting record: " . $conn->error;
                            header('Location: ../test/error.html');
                            exit(); // Ensure script stops execution after redirect
                        }
                    }
                }

                header('Location: ../HTML/Dashboard.php');
            } else {
                echo "Invalid file format. Please upload an XML or JSON file.";
                header('Location: ../test/error.html');
                exit(); // Ensure script stops execution after redirect
            }

            // Close the database connection
            $conn->close();
        } else {
            echo "Error reading file content.";
            header('Location: ../test/error.html');
            exit(); // Ensure script stops execution after redirect
        }
    } else {
        echo "Invalid file format. Please upload an XML or JSON file.";
        header('Location: ../test/error.html');
        exit(); // Ensure script stops execution after redirect
    }
} else {
    echo "No file submitted.";
    header('Location: ../test/error.html');
    exit(); // Ensure script stops execution after redirect
}
?>
