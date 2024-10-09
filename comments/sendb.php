<?php



if($there_admin == 1){
 mysqli_query($db, "UPDATE users SET step='getIDSend' WHERE chat='$chatid'"); 
 $keyboard = new ReplyKeyboardMarkup(true, false);
        $options[0][0]="🚫 Cancel";        
        $keyboard->add_option($options);
          $bot->send_message($chatid, "Send the Post ID to broadcast (Remember Banned Channels wont included" , null, json_encode($keyboard), 'HTML');    
   }