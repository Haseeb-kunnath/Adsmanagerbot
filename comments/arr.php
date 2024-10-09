<?php



if($there_admin == 1)  {
 
 $bot->send_message($chatid, "arranging Channels by ID.", null, null, 'HTML');
        mysqli_query($db, "ALTER TABLE channel DROP id");
        mysqli_query($db, "ALTER TABLE channel AUTO_INCREMENT = 1");
        mysqli_query($db, "ALTER TABLE channel ADD id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
        $bot->edit_message($chatid, $mid+1, "arranging admins by ID.", null, null, 'HTML');
        
        mysqli_query($db, "ALTER TABLE admins DROP id");
        mysqli_query($db, "ALTER TABLE admins AUTO_INCREMENT = 1");
        mysqli_query($db, "ALTER TABLE admins ADD id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
        $bot->edit_message($chatid, $mid+1, "arranging baned channels by ID.", null, null, 'HTML');
        
        mysqli_query($db, "ALTER TABLE ban DROP id");
        mysqli_query($db, "ALTER TABLE ban AUTO_INCREMENT = 1");
        mysqli_query($db, "ALTER TABLE ban ADD id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
        $bot->edit_message($chatid, $mid+1, "✅ Arranged sucessfully by ID.", null, null, 'HTML');
}