<?php


if($there_admin == 1)    {
          $insert = mysqli_query($db, "UPDATE count SET message = '".$ex[0]."' WHERE id = '1'");
$insert = mysqli_query($db, $sql_insert);  

    $bot->delete_message($chatid,$mid-1);
    $inline_keyboard = new InlineKeyboardMarkup(true, true);
        $options[0][0]= ['text'=>'🗄️ Clear Balance', 'callback_data'=>'clearbal'];
        $options[1][0]=['text'=>'⬅️ Back','callback_data'=>'cancelch'] ;

         $inline_keyboard->add_option($options);
        
        $disp = mysqli_query($db, "SELECT * FROM channel WHERE u_id = '".$ex[0]."'");
        $disp1 = mysqli_query($db, "SELECT * FROM ban WHERE u_id = '".$ex[0]."'");
        $disp2 = mysqli_query($db, "SELECT * FROM payment WHERE u_id = '".$ex[0]."'");
        if(mysqli_num_rows($disp2) > 0){
        foreach($disp2 as $datass){
        
            foreach($disp as $datas){

              $item .= "&#9775 ID: ".$datas['id']."\n👤 user: @".$datas['u_name']."\n&#127380 Channel ID: <code>".$datas['c_id']."</code>\n&#128226 Channel Name: ".$datas['c_name']."\n&#128176 Earnings: ₹".$datas['balance']."\n🥌 Status: Active\n\n"; 
              $tot = $tot + $datas['balance'];
            }
        if(mysqli_num_rows($disp1) > 0){
            foreach($disp1 as $datas){

              $item1 .= "&#9775 ID: ".$datas['id']."\n👤 user: @".$datas['u_name']."\n&#127380 Channel ID: <code>".$datas['c_id']."</code>\n&#128226 Channel Name: ".$datas['c_name']."\n&#128176 Earnings: ₹".$datas['balance']."\n🥌 Status: Banned\n\n"; 
            
            }}
            $item2 .= "🛄 Payment Mode: ".$datass['method']."\n&#128179 Payment detail: ".$datass['pay']."\n";
        
              $bot->send_message($chatid, "🗳 Registred channels\n\n".$item."".$item1."————————————————\n".$item2."🏧Total earnings : ₹".$tot, null, json_encode($inline_keyboard), "HTML");
        
             }}else{
        $inline_keyboard1 = new InlineKeyboardMarkup(true, true);       
        $options1[0][0]=['text'=>'⬅️ Back','callback_data'=>'cancelch'] ;
        $inline_keyboard1->add_option($options1);
            $bot->send_message($chatid, "<b>⚠️ Channel not found</b>", null, json_encode($inline_keyboard1), 'HTML');
        }}