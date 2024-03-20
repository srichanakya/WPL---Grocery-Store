<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"];

    // Check if the file is an XML file
    $fileExtension = pathinfo($file["name"], PATHINFO_EXTENSION);
    if ($fileExtension === "xml") {
        // Process XML file
        $xmlContent = simplexml_load_file($file["tmp_name"]);

        // Debugging: Display XML content
        echo "<h2>Debugging: XML Content</h2>";
        var_dump($xmlContent);

        // Display XML content in a table
        echo "<h2>XML Content:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Element</th><th>Attributes</th><th>Value</th></tr>";

        // Iterate through XML elements and display in table rows
        displayXmlData($xmlContent);

        echo "</table>";
    } else {
        echo "Invalid file format. Please upload an XML file.";
    }
} else {
    echo "No file submitted.";
}

// Function to recursively display XML data
function displayXmlData($xmlElement) {
    foreach ($xmlElement->children() as $child) {
        echo "<tr>";

        // Display element name
        echo "<td>{$child->getName()}</td>";

        // Display element attributes, if any
        $attributes = $child->attributes();
        echo "<td>";
        foreach ($attributes as $attrName => $attrValue) {
            echo "{$attrName}: {$attrValue}<br>";
        }
        echo "</td>";

        // Display element value
        echo "<td>{$child}</td>";

        echo "</tr>";

        // Recursively display child elements
        displayXmlData($child);
    }
}
?>
