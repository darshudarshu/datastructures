<?php
include "utility.php";
$ref=new Dqueue();
echo "enter the string \n";
$string = readline();
$len= strlen($string);
for ($i=0; $i <$len; $i++) { 
    $char = $string[$i];
    $ref->insertFirst($char);
}
$removedFront="";
for ($i=0; $i <$len; $i++) { 
    $char = $ref->deleteFront();
    $removedFront=$removedFront . $char;
}


$len= strlen($string);
for ($i=0; $i <$len; $i++) { 
    $char = $string[$i];
    $ref->insertFirst($char);
}
$removedLast="";
for ($i=0; $i <$len; $i++) { 
    $char = $ref->deleteLast();
    $removedLast=$removedLast . $char;
}
if($removedLast==$removedFront)
    echo "given string is a palindrome \n";
else
    echo "given string is not a palindrome \n";



