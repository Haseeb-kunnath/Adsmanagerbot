<?php


 $disp = mysqli_query($db, "SELECT * FROM channel WHERE u_id = '".$chatid."'");
        $disp1 = mysqli_query($db, "SELECT * FROM ban WHERE u_id = '".$chatid."'");
        $disp2 = mysqli_query($db, "SELECT * FROM payment WHERE u_id = '".$chatid."'");
        if(mysqli_num_rows($disp2) > 0){
        
        if(mysqli_num_rows($disp) == 0 && mysqli_num_rows($disp1) == 0){
        $rem = mysqli_query($db, "DELETE FROM payment WHERE u_id = '".$chatid."'");
        }}
        $keyboard = new InlineKeyboardMarkup(true, false);
        $options[0][0] = ['text' => '♻️ Update payment details', 'callback_data' => 'paychange'];
        $options[1][0] = ['text' => '🏧 Withdrew earnings', 'callback_data' => 'withdrew'];
        $keyboard->add_option($options);
        $disp = mysqli_query($db, "SELECT * FROM channel WHERE u_id = '".$chatid."'");
        $disp1 = mysqli_query($db, "SELECT * FROM ban WHERE u_id = '".$chatid."'");
        $disp2 = mysqli_query($db, "SELECT * FROM payment WHERE u_id = '".$chatid."'");       
        if(mysqli_num_rows($disp2) > 0){
            foreach($disp2 as $datass){
            $update = mysqli_query($db, "UPDATE channel SET u_name = '@".$username."' WHERE u_id = '".$chatid."'");
            $item2 .= "🛄 Payment Mode: ".$datass['method']."\n&#128179 Payment detail: ".$datass['pay']."\n";
            }
            foreach($disp as $datas){
 $result = $bot->getChat($datas['c_id']);
print_r($result);
            $type = $result->result->username;   
             $insert = mysqli_query($db, "UPDATE channel SET c_name = '@$type' WHERE c_id = '".$datas['c_id']."'");
                    
               $item .= "&#9775 ID: ".$datas['id']."\n&#127380 Channel ID: <code>".$datas['c_id']."</code>\n&#128226 Channel Name: @$type \n&#128176 Earnings: ₹".$datas['balance']."\n🥌 Status: Active\n\n"; 
              $tot = $tot + $datas['balance'];
            }
        if(mysqli_num_rows($disp1) > 0){
            foreach($disp1 as $datas){

              $item1 .= "&#9775 ID: ".$datas['id']."\n&#127380 Channel ID: <code>".$datas['c_id']."</code>\n&#128226 Channel Name: ".$datas['c_name']."\n&#128176 Earnings: ₹".$datas['balance']."\n🥌 Status: Banned\n\n"; 
            
            }}
            $update = mysqli_query($db, "UPDATE payment SET tot = '".$tot."' WHERE u_id = '".$chatid."'");
              $bot->send_message($chatid, "🗳 Registred channels\n\n".$item."".$item1."".$item2."🏧Total earnings : ₹".$tot, null, json_encode($keyboard), "HTML");
        
  
        }else{
            
            $bot->send_message($chatid, "<b>👋 Hey $username</b>\nYou havent't registered any channel with our bot yet Or Channels might have been removed ⚠️", null, null, "HTML");
        }