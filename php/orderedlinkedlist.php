<?php
include "utility.php";

$listlink = new LinkedList();

$file = fopen("darshunum.txt", "r");
$tem="";
while (!feof($file)) {

    $tem=$tem . fgetc($file);
   
}
$name = explode(" ", $tem);
for ($i = 0; $i < sizeof($name); $i++) {
    if($name[$i]!=""){
    $listlink->insertLast($name[$i]);
    }
}

$listlink->sort();
echo "enter the element to search \n";
$search = readline();
if ($listlink->deleteNode($search) == 1){
    $listlink->insertinto($search);
}
    $f = @fopen("darshunum.txt", "r+");
    if ($f !== false) {
        ftruncate($f, 0);
        fclose($f);
    }
$filename ="darshunum.txt";
$listlink->addToFile($filename);
$listlink->readListInList();
