<?php

// Global variables
$uninitializedVar; // Uninitialized variable
$globalVar = "Hello, World!"; // Use of global variables

// Function with issues
function buggyFunction($input) {
    // Use of == instead of ===
    if ($input == "test") {
        echo "Test passed!";
    }

    // SQL Injection vulnerability
    $conn = mysqli_connect("localhost", "root", "", "test_db");
    $query = "SELECT * FROM users WHERE username = '$input'";
    $result = mysqli_query($conn, $query);

    // Possible resource leak: mysqli_close() not called
    // No check for null $conn or $result
}

// Hardcoded credentials
$username = "admin";
$password = "password123";

// Function with hardcoded credentials
function connectDatabase() {
    $conn = mysqli_connect("localhost", "admin", "password123", "test_db");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

// Function that does not return a value in all paths
function checkValue($value) {
    if ($value > 10) {
        return "Greater than 10";
    }
    // Missing return statement for other paths
}

// Function with code duplication
function duplicateFunction() {
    $value1 = 10;
    $value2 = 20;

    // Duplicate code block
    if ($value1 > $value2) {
        echo "Value 1 is greater";
    } else {
        echo "Value 2 is greater";
    }

    // Duplicate code block
    if ($value1 > $value2) {
        echo "Value 1 is greater";
    } else {
        echo "Value 2 is greater";
    }
}

// Function that uses deprecated function
function deprecatedFunction() {
    $input = "Hello";
    $result = split(",", $input); // split() is deprecated in PHP 7.0+
    return $result;
}

// Function with poor naming conventions
function a($b, $c) {
    return $b + $c;
}

// Function with no error handling
function divide($x, $y) {
    return $x / $y; // No error handling for division by zero
}

?>

