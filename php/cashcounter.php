<?php
include "utility.php";
$queue = new Queue();
echo "enter the how many people should be in queue \n";
$size=readline();
for ($i=0; $i <$size; $i++) { 
    echo "enter the name of people \n";
    $people =readline();
    $queue->enqueue($people);
}
while(!$queue->isEmpty()){
      $queue->dequeue();
}
echo "bank closed \n";