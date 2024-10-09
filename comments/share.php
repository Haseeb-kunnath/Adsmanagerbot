 <?php


   $inline = new InlineKeyboardMarkup(true, true);
        $options[0][0] = ["text" => "Share with your friends", "url" => "https://t.me/share/url?url=https://t.me/".REGISTER_BOT_USERNAME];
        $inline->add_option($options);
        
        $bot->send_message($chatid, "🎁 Share our bot and get exiting rewards from ".AD_SERVICE_NAME, null, json_encode($inline), 'HTML');