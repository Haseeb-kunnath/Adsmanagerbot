 <?php


  $ex = explode('||', $data2);
    mysqli_query($db, "UPDATE users SET step='none' WHERE chat='$chatid2'");
    $bot->edit_message($chatid2,$mid2, "Working broadcast $ex[0] 💬 \nPlease try to take few mins gap within each broadcast ⚠️️" , null, null, 'HTML');
    
    if($ex[1] == 'user'){
        $datas = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM posts WHERE id='$ex[0]'"));
        $query = mysqli_query($db, "SELECT chat FROM users");
        $i = 0;
        while ($row = mysqli_fetch_assoc($query)) {    
            $i++;
            ################################
            $key = json_encode(['inline_keyboard' => json_decode($datas['keyboard'], true)]);
            if(!isset($datas['keyboard'])){
                $key = null;
            }
            $bot->edit_message($chatid2,$mid2, "Working broadcast $ex[0] 💬 \nPlease try to take few mins gap within each broadcast ⚠️️\nSending $i" , null, null, 'HTML');
            if($datas['type'] == 'message'){
                $bot->send_message($row['chat'], "".$datas['caption']."" , null, $key, 'HTML');    
        }elseif($datas['type'] == 'photo'){
            $bot->send_Photo($row['chat'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key);                
        }elseif($datas['type'] == 'document'){
            $bot->send_Document($row['chat'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key);                
        }elseif($datas['type'] == 'video'){
            $bot->send_Video($row['chat'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key);                
        }elseif($datas['type'] == 'voice'){
            $bot->send_Voice($row['chat'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key);          
        }elseif($datas['type'] == 'audio'){
            $bot->send_Audio($row['chat'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key);                    
            }                
            ################################
            if(mt_rand(1,9) == 1){sleep(2);}
        }// end while 
        $bot->edit_message($chatid2,$mid2, "User Broadcast Successful! 👔 Total send to $i users", null, null, 'HTML');
    }elseif($ex[1] == 'loud' || $ex[1] == 'silent'){
        $i = 0;
        $errors = '';
        $stat = false;
        if($ex[1] == 'silent'){$stat = true;}
        $datas = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM posts WHERE id='$ex[0]'"));
        $query = mysqli_query($db, "SELECT c_id FROM channel");

        while ($row = mysqli_fetch_assoc($query)){        
            ################################
            $key = json_encode(['inline_keyboard' => json_decode($datas['keyboard'], true)]);
            if(!isset($datas['keyboard'])){
                $key = null;
            }
            $bot->edit_message($chatid2,$mid2, "Working broadcast $ex[0] 💬 \nPlease try to take few mins gap within each broadcast ⚠️️\nSending $i" , null, null, 'HTML');
            if($datas['type'] == 'message'){
                $botz = $bot->send_message($row['c_id'], "".$datas['caption']."" , null, $key, 'HTML',$stat);    
                $bot_message_id = $botz->result->message_id;
                $bot_chat_id = $botz->result->chat->id;
                $bot_chat_user = $botz->result->chat->username;
                if($botz->ok == false){$errors .= "Channel: {$row['c_id']}:\n {$botz->description}\n\n";}else{$i++; mysqli_query($db, "INSERT INTO messages(message_id,channel,id) VALUES ('$bot_message_id','$bot_chat_id','$ex[0]')");}
            }elseif($datas['type'] == 'photo'){
                $botz = $bot->send_Photo($row['c_id'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key,$stat);
                $bot_message_id = $botz->result->message_id;
                $bot_chat_id = $botz->result->chat->id;
                $bot_chat_user = $botz->result->chat->username;
                if($botz->ok == false){$errors .= "Channel: {$row['c_id']}:\n {$botz->description}\n\n";}else{$i++; mysqli_query($db, "INSERT INTO messages(message_id,channel,id) VALUES ('$bot_message_id','$bot_chat_id','$ex[0]')");}
            }elseif($datas['type'] == 'document'){
                $botz = $bot->send_Document($row['c_id'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key,$stat);        
                $bot_message_id = $botz->result->message_id;
                $bot_chat_id = $botz->result->chat->id;
                $bot_chat_user = $botz->result->chat->username;
                if($botz->ok == false){$errors .= "Channel: {$row['c_id']}:\n {$botz->description}\n\n";}else{$i++; mysqli_query($db, "INSERT INTO messages(message_id,channel,id) VALUES ('$bot_message_id','$bot_chat_id','$ex[0]')");}
            }elseif($datas['type'] == 'video'){
                $botz = $bot->send_Video($row['c_id'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key,$stat);        
                $bot_message_id = $botz->result->message_id;
                $bot_chat_id = $botz->result->chat->id;
                $bot_chat_user = $botz->result->chat->username;
                if($botz->ok == false){$errors .= "Channel: {$row['c_id']}:\n {$botz->description}\n\n";}else{$i++; mysqli_query($db, "INSERT INTO messages(message_id,channel,id) VALUES ('$bot_message_id','$bot_chat_id','$ex[0]')");}
            }elseif($datas['type'] == 'voice'){
                $botz = $bot->send_Voice($row['chat'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key,$stat);          
                $bot_message_id = $botz->result->message_id;
                $bot_chat_id = $botz->result->chat->id;
                $bot_chat_user = $botz->result->chat->username;
                if($botz->ok == false){$errors .= "Channel: {$row['c_id']}:\n {$botz->description}\n\n";}else{$i++; mysqli_query($db, "INSERT INTO messages(message_id,channel,id) VALUES ('$bot_message_id','$bot_chat_id','$ex[0]')");}
            }elseif($datas['type'] == 'audio'){
                $botz = $bot->send_Audio($row['c_id'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key,$stat);         
                $bot_message_id = $botz->result->message_id;
                $bot_chat_id = $botz->result->chat->id;
                $bot_chat_user = $botz->result->chat->username;
                if($botz->ok == false){$errors .= "Channel: {$row['c_id']}:\n {$botz->description}\n\n";}else{$i++; mysqli_query($db, "INSERT INTO messages(message_id,channel,id) VALUES ('$bot_message_id','$bot_chat_id','$ex[0]')");}
            }                
            ################################
            if(mt_rand(1,9) == 1){sleep(2);}
        }// end second while
        $actives = mysqli_num_rows($query);
        $keyboard = new ReplyKeyboardMarkup(true, false);
        $options[0][0]="📤 Send Broadcast"; 
        $options[0][1]="🗑 Delete Broadcast"; 
        $options[1][0]="📦 Create Post"; 
        $options[1][1]="🏝 Preview Post"; 
        $options[2][0]="⌨ Add Inline Buttons";
        $options[3][0]="📗 Channels List"; 
        $options[3][1]="⛔Banned channels"; 
        $options[4][0]="👤Admins list"; 
        $options[4][1]="📈 Promo"; 
        $options[5][0]="💳 Set Amount"; 
        $options[5][1]="💻 View Amount"; 
        $options[6][0]="⏰ Tasks"; 
        $options[6][1]="📟 Total Earnings"; 
        $options[7][0]="🧾 View Count"; 
        $options[7][1]="📚 Channels Earning"; 
        $options[8][0]="ℹ️ Get Channel Info"; 
        $options[8][1]="ℹ️ Get User Info"; 
        $options[9][0]="🔃 Update Subscribers"; 
        $options[9][1]="💾 Update Count"; 
        $options[10][0]="🤖 Bot Information"; 
        $options[10][1]="🗃️ Commands"; 
        $options[11][0]="🎲 Goto Start Menu";
        
        $keyboard->add_option($options);
        $bot->delete_message($chatid2,$mid2); 
        $bot->send_message($chatid2, "❕ Total Channels : $actives\nSuccessful 📗 : $i\n\n Unsuccessful 📙  \n🗳 Error List : \n$errors", null, json_encode($keyboard), 'HTML');

    }// end second (else)if