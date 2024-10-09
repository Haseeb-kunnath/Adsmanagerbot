<?php



if($there_admin == 1)  {
        if(!empty($ex[1])){
            $rem = mysqli_query($db, "DELETE FROM channel WHERE id = '".$ex[1]."'");
            if($rem){
                $bot->send_message($chatid, "✅ Channel removed sucessfully.", null, null, 'HTML');
            }else{
                $bot->send_message($chatid, "❌ Failed to remove channel", null, null, 'HTML');
            }
        }else{
            $bot->send_message($chatid, "❌ Invalid format", null, null, 'HTML');
        }}