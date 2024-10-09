 <?php


    $inline = new InlineKeyboardMarkup(true, true);
        $options[0][0] = ["text" => "📧 Contact ".ADMIN_NAME, "url" => "https://t.me/".ADMIN_USERNAME];
        $inline->add_option($options);
        
        $bot->send_message($chatid, "<b>Hey $username</b> 👋\nDo you want to advertise in ".AD_SERVICE_NAME." advertising network!\nClick contact button to talk with admin about advertising", null, json_encode($inline), 'HTML');