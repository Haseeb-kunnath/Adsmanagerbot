 <?php


 if($there_admin == 1)  {
      
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
        $bot->send_message($chatid,"AD Manager Bot 🤖 version 0.9.3 \n\nBot Owner : @" .ADMIN_USERNAME." 👨‍💻\n\nRegistration limit: ".$read[minisub]."\nPayout limit: ".$read[minipay]."\n\nRegistration status: ".$read[onoff]."\nPayout status: ".$read[payout]."\nAdmin chat: ".$read[chat]."\n\nBot information 💶\n\n📈total channels: ".$countch[0]."\n👤total users: ".$countch1[0]."\n🔖 Use Rate: 3.5₹\n💰 Bot Credits: ".$read[credit]."₹\n\nℹ Click on Add Credits Only when youre ready to pay.", null, json_encode($inline), 'HTML');
  }