<?php


 $bot->delete_message($chatid2,$mid2); 
    $forcereply = new Forcereply(true, true); 
$bot->send_message($chatid2, "Enter the Task to Add ⏲",null, json_encode($forcereply), 'HTML'); 