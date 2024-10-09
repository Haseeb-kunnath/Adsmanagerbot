  <?php

 $i = 0;
 $keyboard = new InlineKeyboardMarkup(true, false);
    $options[0][0] = ['text' => '⏲️ Add new task', 'callback_data' => "addtask"];
    $options[1][0] = ['text' => '🗑️ Delete task', 'callback_data' => "deletetask"];
    $options[2][0] = ['text' => 'ℹ️ Help', 'callback_data' => "helptask"];
    $options[3][0] = ['text' => '🗳 Cancel', 'callback_data' => "cancelch"];
    $keyboard->add_option($options);
    
    $ch = mysqli_query($db, "SELECT * FROM schedule WHERE status != 'done'");
        if(mysqli_num_rows($ch) > 0){
            
            foreach ($ch as $channel) {
                $item .= "<b>🆔Task: ".$channel['id']."\n📝Post ID: ".$channel['post']."\n🕒Post at: ".$channel['at']."\n🗑️Delete at: ".$channel['until']."\n📢Status: ".$channel['status']."\n\n——————————————</b>\n";
                $i++;
               if($i == 30){
               $bot->send_message($chatid, "<b>Upcoming tasks........ ⏰</b>\n".$item."", null, null, 'HTML');
               $i = 0;
               $item = '';
               }
            }
            $bot->send_message($chatid, "<b>Upcoming tasks........ ⏰</b>\n".$item."", null, json_encode($keyboard), 'HTML');
        }else{
            $bot->send_message($chatid, "💬 No tasks was found.", null, json_encode($keyboard), 'HTML');
        }
    