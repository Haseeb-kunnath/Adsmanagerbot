<?php


if($chatid == ADMIN_CHAT_ID){
        if($text){
        $bot->send_message($replyid, $text, null, null, 'HTML');
        }elseif($photo){
        $bot->send_Photo($replyid, $photo,$caption,null, null, null);
        }
        }else{
        $disp1 = mysqli_query($db, "SELECT * FROM count");
        $read1 = mysqli_fetch_assoc($disp1);       
        if($read1[chat] == open){
        $bot->forward_message(ADMIN_CHAT_ID, $chatid, $mid);           
        }}
        