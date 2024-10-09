 <?php


      $bot->send_message($chatid, "" , null, null, 'HTML');    
        
        $keyboard = new ReplyKeyboardMarkup(true, false);
        $options[0][0]="Login Admin Panel 🖥️";
        $options[1][0]="🏕 Contact for Ad or Queries";
        $options[2][0]="🖌️ Register New Channels";
        $options[3][0]="📚 My Channels";
        $options[4][0]="📡 Share this bot";
        $options[4][1]="ℹ️ Help";
        $keyboard->add_option($options);
        
        $bot->send_message($chatid, "BACK TO MAIN" , null, json_encode($keyboard), 'HTML');