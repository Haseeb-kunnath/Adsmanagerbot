<?php



$disp1 = mysqli_query($db, "SELECT * FROM payout");
        $read1 = mysqli_fetch_assoc($disp1);
       
       if($read1[paytm] == open){
        $insert = mysqli_query($db, "UPDATE payout SET paytm = 'close' WHERE id = '1'");
        }else{
        $insert = mysqli_query($db, "UPDATE payout SET paytm = 'open' WHERE id = '1'");
        }
       
    $disp = mysqli_query($db, "SELECT * FROM payout");
        $read = mysqli_fetch_assoc($disp);
       $inline = new InlineKeyboardMarkup(true, true);
       if($read[paytm] == open){
        $options[0][0] = ["text" => "✅Paytm", "callback_data" => "paytmopen"];
        }else{
        $options[0][0] = ["text" => "Paytm", "callback_data" => "paytmopen"];
        }
        if($read[upi] == open){
        $options[0][1] = ["text" => "✅UPI", "callback_data" => "upiopen"];
        }else{
        $options[0][1] = ["text" => "UPI", "callback_data" => "upiopen"];
        }
        if($read[paypal] == open){
        $options[0][2] = ["text" => "✅Paypal", "callback_data" => "paypalopen"];
        }else{
        $options[0][2] = ["text" => "Paypal", "callback_data" => "paypalopen"];
        }
        if($read[gpay] == open){
        $options[1][0] = ["text" => "✅Gpay", "callback_data" => "gpayopen"];
        }else{
        $options[1][0] = ["text" => "Gpay", "callback_data" => "gpayopen"];
        }
        if($read[phonepe] == open){
        $options[1][1] = ["text" => "✅Phonepe", "callback_data" => "phonepeopen"];
        }else{
        $options[1][1] = ["text" => "Phonepe", "callback_data" => "phonepeopen"];
        }
        $options[2][0] = ["text" => "✖️ Cancel", "callback_data" => "cancelch"];
        
        $inline->add_option($options);
        $bot->edit_message($chatid2,$mid2,"<b>On or off Payment methods.</b>\n\n💎 Current Status\nPaytm =>      <b>".$read[paytm]."</b>\nPaypal =>      <b>".$read[paypal]."</b>\nUPI =>            <b>".$read[upi]."</b>\nGpay =>         <b>".$read[gpay]."</b>\nPhonepe =>  <b>".$read[phonepe]."</b>\n", null, 'HTML', null);
        $bot->edit_replymarkup($chatid2,$mid2, null, json_encode($inline));