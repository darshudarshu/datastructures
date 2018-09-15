<?php
include "utility.php";
$ref=new Stack();
echo "enter the expression \n";
$expression = readline();
$len= strlen($expression);
$temp=true;
for ($i=0; $i <$len; $i++) { 
    $char = $expression[$i];
   
    if($char=='[' || $char=='(' || $char=='{'){
        $ref->push($char);
        
    }
    else if($char==')' || $char=='}' || $char==']'){
        if($ref->isEmpty())
        {   $temp=false;
            break;
        }
        else
         $ref->pop();
    }
}
if($temp){
    if($ref->isEmpty())
    echo "the stack is balanced \n";
    else 
    echo "the stack is not balanced \n";
}
else
echo "the stack is not balanced \n";


