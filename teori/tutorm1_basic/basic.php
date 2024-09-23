<?php
// Variables
$name = "John";
$age = 25;
$fruits = ["Apple", "Banana", "Orange"];

// If statement
if ($age > 18) {
    echo $name . " is an adult.<br>";
} else {
    echo $name . " is not an adult.<br>";
}

// For loop
for ($i = 0; $i < count($fruits); $i++) {
    echo "Fruit: " . $fruits[$i] . "<br>";
}

// Foreach loop
foreach ($fruits as $fruit) {
    echo "I like " . $fruit . "<br>";
}
