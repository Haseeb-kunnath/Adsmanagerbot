<?php


if(!empty($update->inline_query->query)){
        $pst = $update->inline_query->query;
        $datas = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM posts WHERE id='".$pst."'"));
        $post = mysqli_num_rows(mysqli_query($db, "SELECT * FROM posts WHERE id='".$pst."'"));
        
      if($post >= 1){
        $key = ['inline_keyboard' => json_decode($datas['keyboard'], true)];
            if(!isset($datas['keyboard'])){
                $key = " ";
            }
            $put = "'reply_markup'=> $key";
        
        
        if($datas['type'] == 'message'){
                $results = array(
			array(
				"type" => "article",
				"id" => $datas['id'],
				"title" => "send post $datas[id]",
				"message_text" => $datas[caption],
				"parse_mode" => "HTML",
			        "reply_markup"=> $key
			        									  
		));
        }elseif($datas['type'] == 'photo'){
            $results = array(
			array(
				"type" => "photo",
				"id" => $datas['id'],	
				"title" => "send post $datas[id]",		
				"photo_file_id" => $datas['file_id'],			
				"caption" => $datas['caption'],				
				"parse_mode" => "HTML",
			        "reply_markup"=> $key
			        									  
		));                
        }elseif($datas['type'] == 'document'){
            $results = array(
			array(
				"type" => "document",
				"id" => $datas['id'],	
				"title" => "send post $datas[id]",
				"document_file_id" => $datas['file_id'],			
				"caption" => $datas['caption'],				
				"parse_mode" => "HTML",
			        "reply_markup"=> $key
			        									  
		));                
        }elseif($datas['type'] == 'video'){
            $results = array(
			array(
				"type" => "video",
				"id" => $datas['id'],		
				"title" => "send post $datas[id]",		
				"video_file_id" => $datas['file_id'],			
				"caption" => $datas['caption'],				
				"parse_mode" => "HTML",
			        "reply_markup"=> $key
			        									  
		));                
        }elseif($datas['type'] == 'voice'){
            $results = array(
			array(
				"type" => "voice",
				"id" => $datas['id'],	
				"title" => "send post $datas[id]",		
				"voice_file_id" => $datas['file_id'],			
				"caption" => $datas['caption'],				
				"parse_mode" => "HTML",
			        "reply_markup"=> $key
			        									  
		));                
        }elseif($datas['type'] == 'audio'){
            $results = array(
			array(
				"type" => "audio",
				"id" => $datas['id'],	
				"title" => "send post $datas[id]",	
				"audio_file_id" => $datas['file_id'],			
				"caption" => $datas['caption'],				
				"parse_mode" => "HTML",
			        "reply_markup"=> $key
			        									  
		));                
        }}else{
        $results = array(
			array(
				"type" => "article",
				"id" => $update->inline_query->query,
				"title" => "Post not found",
				"message_text" => "Post not found",
				"thumb_url" => "https://telegrambots.tk/adsbot/post.jpeg",
			        									  
		));
	}
        
		$results = json_encode($results);

		
	$bu =	$bot->send_inline($update->inline_query->id,$results,null,null);
//	$t = $bu->description;
//		$bot->send_message($update->inline_query->from->id," h5i $t",null,null,null);
	}
	

   /*     
$datas = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM posts WHERE id='$ex[0]'"));
        $query = mysqli_query($db, "SELECT chat FROM users");
        $i = 0;
        while ($row = mysqli_fetch_assoc($query)) {    
            $i++;
            ################################
            $key = json_encode(['inline_keyboard' => json_decode($datas['keyboard'], true)]);
            if(!isset($datas['keyboard'])){
                $key = null;
            }
            $bot->edit_message($chatid2,$mid2, "Working broadcast $ex[0] 💬 \nPlease try to take few mins gap within each broadcast ⚠️️\nSending $i" , null, null, 'HTML');
            
            
            if($datas['type'] == 'message'){
                $results = array(
			array(
				"type" => "article",
				"id" => $datas['id'],
				"title" => "send post $datas[id]",
				"photo_url" => "https://telegrambots.tk/adsbot/payz.jpg",
				"thumb_url" => "https://telegrambots.tk/adsbot/payz.jpg",
				"caption" => $datas['caption'],				
				"parse_mode" => "HTML",
			        $put									  
		));
        }elseif($datas['type'] == 'photo'){
            $results = array(
			array(
				"type" => "photo",
				"id" => $datas['id'],			
				"photo_file_id" => $datas['file_id'],			
				"caption" => $datas['caption'],				
				"parse_mode" => "HTML",
			        $put									  
		));                
        }elseif($datas['type'] == 'document'){
            $results = array(
			array(
				"type" => "document",
				"id" => $datas['id'],			
				"document_file_id" => $datas['file_id'],			
				"caption" => $datas['caption'],				
				"parse_mode" => "HTML",
			        $put									  
		));                
        }elseif($datas['type'] == 'video'){
            $results = array(
			array(
				"type" => "video",
				"id" => $datas['id'],			
				"video_file_id" => $datas['file_id'],			
				"caption" => $datas['caption'],				
				"parse_mode" => "HTML",
			        $put									  
		));                
        }elseif($datas['type'] == 'voice'){
            $results = array(
			array(
				"type" => "voice",
				"id" => $datas['id'],			
				"voice_file_id" => $datas['file_id'],			
				"caption" => $datas['caption'],				
				"parse_mode" => "HTML",
			        $put									  
		));                
        }elseif($datas['type'] == 'audio'){
            $results = array(
			array(
				"type" => "audio",
				"id" => $datas['id'],			
				"audio_file_id" => $datas['file_id'],			
				"caption" => $datas['caption'],				
				"parse_mode" => "HTML",
			        $put									  
		));                
        }
            
            "reply_markup"=>['inline_keyboard'=>[
              [
                ['text'=>'monster','url'=>'monsterbot.ir']
              ]
            ]
          ]
            */