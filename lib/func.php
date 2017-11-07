<?php

/**
 * @author Akintola Oluwaseun
 * @copyright 2017
 */


	function getData(){
		$src = "../src/accf.csv";
		$results = array();

		if (($handle = fopen( "src/" . $src, "r" )) !== FALSE) 
		{
			$names = fgetcsv($handle, 1000, ",");

			while (( $data = fgetcsv($handle, 1000, ",")) !== FALSE) 
			{
				$obj = array();
				for ($i = 0; $i < count($names) - 1; $i ++)
				{
					if ($data[$i] != "")
					{if($i==0){
					   $obj[$names[$i ]] = "Name: ".$data[$i ];
					}if($i==1){
					   $obj[$names[$i ]] = "Inst.: ".$data[$i ];
					}if($i==2){
					   $obj[$names[$i ]] = "Fellowship: ".$data[$i ];
					}if($i==3){
					   $obj[$names[$i ]] = "Unit: ".$data[$i ];
					}if($i==4){
					   $obj[$names[$i ]] = "ID No.: ".$data[$i ];
					}
					}
				}

				$results[$data[0]] = $obj;
			}

			fclose($handle);
		}

		return $results;
	}


	function random_color_part() {
		return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}

	function random_color() {
		return random_color_part() . random_color_part() . random_color_part();
	}


	function generateCard($frame = "default.png", $left = 50, $top = 50, $canvas_width = 0, $canvas_height = 0, $data, $begin=0, $end = 0)
    
	{
	   
        $num_card = count($data);
		// create image
		$img = imageCreateFromPng("frames/" . $frame);
		imagealphablending($img, true);
		imagesavealpha($img, true);
		
		$img_width = imagesx($img);
		$img_height = imagesy($img);
        $k = 1;
        $m = 1;
        $cards_printed = 1;
        $count = 1;
        
        if($begin!=0){
            
        $y = 300;
        	foreach ($data as $name => $card)
	{
	   

            if($cards_printed >= $begin){
                
                
		$font_file = "fonts/CalibriBd.ttf";
		$font_size = 18;
		$angle = 10;
		
	              
            if ($k==2){
                $x = 1350;
                
            }else{
            $x = 130;    
            }
            
            if ($m  ==  1){
                $y = 320;
                
            } 
            else if ($m  ==  2){
                $y =320;
                
            } 
            else if ($m  ==  3){
                $y = 1000;
                
            } 
            else if ($m  ==  4){
                $y = 1000;
                
            } 
            else if ($m  ==  5){
                $y =1650;
                
            } 
            else if ($m  ==  6){
                $y = 1650;
                
            } 
            else if ($m  ==  7){
                $y = 2320;
                
            } 
            else if ($m  ==  8){
                $y =  2320;
                
            } 
            else if ($m  ==  9){
                $y =  3000;
                
            } 
            else if ($m  ==  10){
                $y = 3000;
                
            } 
            $i = 1;
            		foreach ($card as $writer => $message)
		{
		  
            
			$font_file = "fonts/CalibriBd.ttf";
			$font_size = 50;

			$direction = 0;
			$angle = 0;
            $text_colour = "102";
            if ($i==5){
            $newx = $x + 650;
            $newy = $y - 500;
		 ImageTTFText($img, $font_size, $angle, $newx, $newy, $text_colour, $font_file, $message);
			imagecolordeallocate( $img, $text_colour );
                         
            }else{
   
		 ImageTTFText($img, $font_size, $angle, $x, $y, $text_colour, $font_file, $message);
			imagecolordeallocate( $img, $text_colour );
            $y = $y + 100;
                         
            }

			$i ++;

		}
        
        $num_card = $num_card - 1;
                    
            if($k== 2){
		      $k = 0;
		  }
            $k ++;
            $m ++;
            if ($m == 11 ){
                
		header( "Content-type: image/png" );
		imagepng( $img, "accf_idcards/accf2017_idcard" .$cards_printed.".png" );
		imagedestroy( $img );
        
		header( "Content-type: text/html" );
        	   
		// create image
		$img = imageCreateFromPng("frames/" . $frame);
		imagealphablending($img, true);
		imagesavealpha($img, true);
		
		$img_width = imagesx($img);
		$img_height = imagesy($img);
        
        $m =1;
        $count ++;
            }elseif($cards_printed == $end){
                           
		header( "Content-type: image/png" );
		imagepng( $img, "accf_idcards/accf2017_idcard" .$cards_printed.".png" );
		imagedestroy( $img );
        
		header( "Content-type: text/html" );
        	   
		// create image
		$img = imageCreateFromPng("frames/" . $frame);
		imagealphablending($img, true);
		imagesavealpha($img, true);
		
		$img_width = imagesx($img);
		$img_height = imagesy($img);
        
        $m =1;
        $count ++;
            }
       
                
            }else{
                
                $bggg = 100;
            }
                  
            
            
              if($end!=0){
                
                if($end == $cards_printed){
                   
                    header("Location: print.php");
                    
                }
                
                
            }else{
                
                $bggg = 100;
            }
            
            $cards_printed ++;
            echo $cards_printed;
         }    
          
        } else{
            
            
        $y = 300;
        	foreach ($data as $name => $card)
	{
	   

		$font_file = "fonts/CalibriBd.ttf";
		$font_size = 18;
		$angle = 10;
		
	              
            if ($k==2){
                $x = 1350;
                
            }else{
            $x = 130;    
            }
            
            if ($m  ==  1){
                $y = 320;
                
            } 
            else if ($m  ==  2){
                $y =320;
                
            } 
            else if ($m  ==  3){
                $y = 1000;
                
            } 
            else if ($m  ==  4){
                $y = 1000;
                
            } 
            else if ($m  ==  5){
                $y =1650;
                
            } 
            else if ($m  ==  6){
                $y = 1650;
                
            } 
            else if ($m  ==  7){
                $y = 2320;
                
            } 
            else if ($m  ==  8){
                $y =  2320;
                
            } 
            else if ($m  ==  9){
                $y =  3000;
                
            } 
            else if ($m  ==  10){
                $y = 3000;
                
            } 
            $i = 1;
            		foreach ($card as $writer => $message)
		{
		  
            
			$font_file = "fonts/CalibriBd.ttf";
			$font_size = 50;

			$direction = 0;
			$angle = 0;
            $text_colour = "102";
            if ($i==5){
            $newx = $x + 650;
            $newy = $y - 500;
		 ImageTTFText($img, $font_size, $angle, $newx, $newy, $text_colour, $font_file, $message);
			imagecolordeallocate( $img, $text_colour );
                         
            }else{
   
		 ImageTTFText($img, $font_size, $angle, $x, $y, $text_colour, $font_file, $message);
			imagecolordeallocate( $img, $text_colour );
            $y = $y + 100;
                         
            }

			$i ++;

		}
        
        $num_card = $num_card - 1;
                    
            if($k== 2){
		      $k = 0;
		  }
            $k ++;
            $m ++;
            
            if ($m == 11 ){
                
		header( "Content-type: image/png" );
		imagepng( $img, "accf_idcards/accf2017_idcard" .$count.".png" );
		imagedestroy( $img );
        
		header( "Content-type: text/html" );
        	   
		// create image
		$img = imageCreateFromPng("frames/" . $frame);
		imagealphablending($img, true);
		imagesavealpha($img, true);
		
		$img_width = imagesx($img);
		$img_height = imagesy($img);
        
        $m =1;
        $count ++;
            }elseif($cards_printed == $num_card){
                           
		header( "Content-type: image/png" );
		imagepng( $img, "accf_idcards/accf2017_idcard" .$count.".png" );
		imagedestroy( $img );
        
		header( "Content-type: text/html" );
        	   
		// create image
		$img = imageCreateFromPng("frames/" . $frame);
		imagealphablending($img, true);
		imagesavealpha($img, true);
		
		$img_width = imagesx($img);
		$img_height = imagesy($img);
        
        $m =1;
        $count ++;
            }
            $cards_printed ++;
        }
            
        }

    }
?>