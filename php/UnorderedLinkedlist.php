<?php
include "utility.php";

$listlink = new LinkedList();

$file = fopen("darshu.txt", "r");
$name = array();
$tem="";
while (!feof($file)) {

    $tem=$tem . fgetc($file);
}
$name = explode(" ", $tem);
for ($i = 0; $i < sizeof($name); $i++) {
    $listlink->insertLast($name[$i]);
}

$mydata = $listlink->readList();
$store = $mydata;
for ($i = 0; $i < count($mydata); $i++) {
    echo $mydata[$i] . " ";
}
echo "enter the element to search \n";
$search = readline();
$listlink->deleteNode($search);
$delete = $listlink->readList();

if (count($delete) < count($store)) {
    for ($i = 0; $i < count($delete); $i++) {
        echo $delete[$i] . " ";
    }
    $fname = "darshu.txt";
    $fhandle = fopen($fname, "r");
    $content = fread($fhandle, filesize($fname));

    $content = str_replace($search . " ", "", $content);

    $fhandle = fopen($fname, "w");
    fwrite($fhandle, $content);
    fclose($fhandle);
} else {
    $listlink->insertLast($search);
    $newdata = $listlink->readList();
    for ($i = 0; $i < count($newdata); $i++) {
        echo $newdata[$i] . " ";
    }
    $File = "darshu.txt";
    $fh = fopen($File, 'a');
    $Data = " " . $search;
    fwrite($fh, $Data);
    fclose($fh);
}

fclose($file);
