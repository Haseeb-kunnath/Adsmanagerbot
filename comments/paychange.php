 <?php


 $keyboard = new InlineKeyboardMarkup(true, false);
        $options[0][0] = ['text' => 'Paytm', 'callback_data' => 'Paytm'];
        $options[0][1] = ['text' => 'UPI', 'callback_data' => 'UPI'];
        $options[0][2] = ['text' => 'Paypal', 'callback_data' => 'paypal'];
        $options[1][0] = ['text' => 'Google pay', 'callback_data' => 'gpay'];
        $options[1][1] = ['text' => 'Phonepe', 'callback_data' => 'phonepe'];        
        $options[2][0] = ['text' => '✳️ Cancel', 'callback_data' => 'cancel'];
        $keyboard->add_option($options);
        
        $bot->send_Photo($chatid2, "https://telegrambots.tk/adsbot/payz.jpg","Please Select a payment method 💳",null, null, json_encode($keyboard));
        $bot->delete_message($chatid2,$mid2);