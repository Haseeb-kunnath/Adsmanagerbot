<?php


  mysqli_query($db, "UPDATE users SET step='kk' WHERE chat='$chatid'");
    $keyboard = new ReplyKeyboardMarkup(true, false);
 $options[0][0]="🚫 Cancel";        
 $keyboard->add_option($options);
   $bot->send_message($chatid, "Its fast and easy to add buttons to any already made post, just send the following format message\n\nExample:\n\nPOST ID\ntext1+link1,text2+link2\ntext3+link3\ntext4+link4,text5+link5,text6+link6\n\n\nAfter sending you may preview the post from Preview Created Post 📲 in admins menu" , null, json_encode($keyboard), 'HTML');