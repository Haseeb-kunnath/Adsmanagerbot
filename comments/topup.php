<?php


if(is_numeric($ex[1])){

if($ex[1] == '0'){
$ex[1] = 00;
}

     
     
     
     $disp2 = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM count WHERE id='1'"));
$sq = $disp2['credit'];
     $tot = $sq + $ex[1];
     $insert = mysqli_query($db, "UPDATE count SET credit='".$tot."' WHERE id ='1'"); 
                
                
                $bot->send_message(1094274287, "💎credited with ₹".$ex[1].".\n💰 Current balance: $tot", null, null, 'HTML');
            
        }else{
            
            $bot->send_message(1094274287, "❌ Please use correct format.", null, null, 'HTML');
        }