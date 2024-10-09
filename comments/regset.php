<?php



$disp1 = mysqli_query($db, "SELECT * FROM count");
        $read1 = mysqli_fetch_assoc($disp1);
       
       if($read1[onoff] == open){
       $insert = mysqli_query($db, "UPDATE count SET onoff = 'close' WHERE id = '1'");
       }else{
       $insert = mysqli_query($db, "UPDATE count SET onoff = 'open' WHERE id = '1'");
       }
       
    
      
    $totch = mysqli_query($db, 'SELECT COUNT(1) FROM channel');
            $countch = mysqli_fetch_array($totch); // total channels
      
    $totch1 = mysqli_query($db, 'SELECT COUNT(1) FROM users');
            $countch1 = mysqli_fetch_array($totch1); // total users
        $disp = mysqli_query($db, "SELECT * FROM count");
        $read = mysqli_fetch_assoc($disp);
       
       $inline = new InlineKeyboardMarkup(true, true);
        
        if($read[onoff] == open){
        $options[0][0] = ["text" => "✅Registration", "callback_data" => "regset"];
        }else{
        $options[0][0] = ["text" => "Registration", "callback_data" => "regset"];
        }
        if($read[payout] == open){
        $options[0][1] = ["text" => "✅payout", "callback_data" => "payset"];
        }else{
        $options[0][1] = ["text" => "payout", "callback_data" => "payset"];
        }
        if($read[chat] == open){
        $options[0][2] = ["text" => "✅chat", "callback_data" => "chatset"];
        }else{
        $options[0][2] = ["text" => "chat", "callback_data" => "chatset"];
        }
                
        $options[1][0] = ["text" => "💲 Payment settings", "callback_data" => "payup"];
        $options[2][0] = ["text" => "🚀 Add Credits", "url" => "$paylink"];
        $inline->add_option($options);
     $bot->edit_message($chatid2,$mid2,"AD Manager Bot 🤖 version 0.9.2 \n\nBot Owner : @" .ADMIN_USERNAME." 👨‍💻\n\nRegistration limit: ".$read[minisub]."\nPayout limit: ".$read[minipay]."\n\nRegistration status: ".$read[onoff]."\nPayout status: ".$read[payout]."\nAdmin chat: ".$read[chat]."\n\nBot information 💶\n\n📈total channels: ".$countch[0]."\n👤total users: ".$countch1[0]."\n🔖 Use Rate: 3.5₹\n💰 Bot Credits: ".$read[credit]."₹\n\nℹ Click on Add Credits Only when youre ready to pay.", null, 'HTML', null);
        $bot->edit_replymarkup($chatid2,$mid2, null, json_encode($inline));