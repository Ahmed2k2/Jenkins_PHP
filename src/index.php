<?php

// Sample PHP Script with Bugs

// 1. SQL Injection Vulnerability
// The $user_id parameter is directly inserted into the SQL query without any sanitization or parameterization.
function getUserData($user_id) {
    $conn = mysqli_connect("localhost", "root", "password", "test_db");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE id = $user_id"; // Vulnerable to SQL Injection
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
}

// 2. Unused Variable
$unusedVariable = "This variable is not used anywhere in the code";

// 3. Use of Deprecated Function
// The split() function has been deprecated as of PHP 5.3.0 and removed as of PHP 7.0.0
function splitString($string) {
    $result = split(" ", $string); // Deprecated function
    return $result;
}

// 4. Hardcoded Password
// Hardcoding passwords is a bad practice.
function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "password"; // Hardcoded password
    $dbname = "test_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

// 5. Missing Error Handling
// The following function does not handle the case where file_get_contents() fails.
function readFileContents($filename) {
    $content = file_get_contents($filename);
    echo $content;
}

// 6. Inefficient Loop
// The following loop recalculates the length of the array on each iteration.
function printNumbers() {
    $numbers = array(1, 2, 3, 4, 5);
    for ($i = 0; $i < count($numbers); $i++) { // Inefficient loop
        echo $numbers[$i] . "\n";
    }
}

// 7. Insecure File Upload
// This function allows uploading of any file without checking its type or size.
function uploadFile($file) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $target_file); // No file type/size checks
}

// 8. Cross-Site Scripting (XSS)
// The following function echoes user input directly, which is vulnerable to XSS.
function greetUser($name) {
    echo "Hello, " . $name . "! Welcome to our site."; // XSS vulnerability
}

// 9. Using eval()
// The eval() function is dangerous and should be avoided as it allows execution of arbitrary PHP code.
function executeCode($code) {
    eval($code); // Dangerous use of eval()
}

// 10. SQL Query Without Error Checking
// The following function runs a query without checking if it was successful.
function runQuery($query) {
    $conn = connectToDatabase();
    mysqli_query($conn, $query); // No error checking
    mysqli_close($conn);
}

// Example Usage
getUserData(1);
printNumbers();
uploadFile($_FILES["file"]);
greetUser($_GET["name"]);
?>
