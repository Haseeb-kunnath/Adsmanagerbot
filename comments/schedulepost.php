<?php

$pik = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM schedule WHERE at='".$oo."' && status != 'done'"));
$step = $pik['u_id'];
$i = 0;
        $errors = '';
        $stat = false;
        
        $datas = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM posts WHERE id='".$pik['post']."'"));
        $query = mysqli_query($db, "SELECT c_id FROM channel");
        $actives = mysqli_num_rows($query);
$bot->send_message($step, "<b>⚡ Turbo schedule post executing⏳</b>\nFor post ".$pik['post']."" , null, null, 'HTML');
        while ($row = mysqli_fetch_assoc($query)){        
            ################################
            $key = json_encode(['inline_keyboard' => json_decode($datas['keyboard'], true)]);
            if(!isset($datas['keyboard'])){
                $key = null;
     
            }
            
            if($datas['type'] == 'message'){
                $botz = $bot->send_message($row['c_id'], "".$datas['caption']."" , null, $key, 'HTML',$stat);    
                $bot_message_id = $botz->result->message_id;
                $bot_chat_id = $botz->result->chat->id;
                $bot_chat_user = $botz->result->chat->username;
                if($botz->ok == false){$errors .= "Channel: {$row['c_id']}:\n {$botz->description}\n\n";}else{$i++; mysqli_query($db, "INSERT INTO messages(message_id,channel,id) VALUES ('$bot_message_id','$bot_chat_id','".$pik['post']."')");}
            }elseif($datas['type'] == 'photo'){
                $botz = $bot->send_Photo($row['c_id'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key,$stat);
                $bot_message_id = $botz->result->message_id;
                $bot_chat_id = $botz->result->chat->id;
                $bot_chat_user = $botz->result->chat->username;
                if($botz->ok == false){$errors .= "Channel: {$row['c_id']}:\n {$botz->description}\n\n";}else{$i++; mysqli_query($db, "INSERT INTO messages(message_id,channel,id) VALUES ('$bot_message_id','$bot_chat_id','".$pik['post']."')");}
            }elseif($datas['type'] == 'document'){
                $botz = $bot->send_Document($row['c_id'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key,$stat);        
                $bot_message_id = $botz->result->message_id;
                $bot_chat_id = $botz->result->chat->id;
                $bot_chat_user = $botz->result->chat->username;
                if($botz->ok == false){$errors .= "Channel: {$row['c_id']}:\n {$botz->description}\n\n";}else{$i++; mysqli_query($db, "INSERT INTO messages(message_id,channel,id) VALUES ('$bot_message_id','$bot_chat_id','".$pik['post']."')");}
            }elseif($datas['type'] == 'video'){
                $botz = $bot->send_Video($row['c_id'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key,$stat);        
                $bot_message_id = $botz->result->message_id;
                $bot_chat_id = $botz->result->chat->id;
                $bot_chat_user = $botz->result->chat->username;
                if($botz->ok == false){$errors .= "Channel: {$row['c_id']}:\n {$botz->description}\n\n";}else{$i++; mysqli_query($db, "INSERT INTO messages(message_id,channel,id) VALUES ('$bot_message_id','$bot_chat_id','".$pik['post']."')");}
            }elseif($datas['type'] == 'voice'){
                $botz = $bot->send_Voice($row['chat'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key,$stat);          
                $bot_message_id = $botz->result->message_id;
                $bot_chat_id = $botz->result->chat->id;
                $bot_chat_user = $botz->result->chat->username;
                if($botz->ok == false){$errors .= "Channel: {$row['c_id']}:\n {$botz->description}\n\n";}else{$i++; mysqli_query($db, "INSERT INTO messages(message_id,channel,id) VALUES ('$bot_message_id','$bot_chat_id','".$pik['post']."')");}
            }elseif($datas['type'] == 'audio'){
                $botz = $bot->send_Audio($row['c_id'], "".$datas['file_id']."","".$datas['caption']."",'HTML', null, $key,$stat);         
                $bot_message_id = $botz->result->message_id;
                $bot_chat_id = $botz->result->chat->id;
                $bot_chat_user = $botz->result->chat->username;
                if($botz->ok == false){$errors .= "Channel: {$row['c_id']}:\n {$botz->description}\n\n";}else{$i++; mysqli_query($db, "INSERT INTO messages(message_id,channel,id) VALUES ('$bot_message_id','$bot_chat_id','".$pik['post']."')");}
            }                
            ################################
            if(mt_rand(1,9) == 1){sleep(2);}
        }// end second while
        if($pik['status'] == '0/1'){
mysqli_query($db, "UPDATE schedule SET status='done' WHERE id= '".$pik['id']."'");
}else{
mysqli_query($db, "UPDATE schedule SET status='1/2' WHERE id= '".$pik['id']."'");
}
         
        $bot->send_message($step, "❕ Total Channels : $actives\nSuccessful 📗 : $i\n\n Unsuccessful 📙  \n🗳 Error List : \n$errors", null, null, 'HTML');
        