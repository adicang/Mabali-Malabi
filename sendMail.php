<?php
   
    
      
    $urlContents = file_get_contents('php://input');
    $urlaray = json_decode($urlContents, true);

    if (!$urlaray['name']){
        $post_data = array('code'=>0,'regError'=>'*אנא הזן שם');
    }
    else if(!$urlaray['email']){
        $post_data = array('code'=>0,'regError'=>'*אנא הזן כתובת אימייל ');
    }
    else if(!$urlaray['phone']){
        $post_data = array('code'=>0,'regError'=>'*אנא הזן מספר טלפון  ');
    }
    else if(!$urlaray['message']){
        $post_data = array('code'=>0,'regError'=>'*אנא הזן את תוכן הפניה  ');
    }
    else{
        $name=$urlaray['name'];
        $email=$urlaray['email'];
        $phone=$urlaray['phone'];
        $message=$urlaray['message'];
        
          
            
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "mabali-malabi@gmail.com";
        $to = "mabalimalabi@gmail.com";
        $subject = "מבאלי-מלבי הודעה מהאתר";
        $message = '<html lang="HE">
                            <head>
                            </head>
                            <body style="text-align:right; direction:rtl;">
                                <table>
                                    <tr>
                                        <td><h3> התקבלה הודעה חדשה באתר!</h3></td>
                                    </tr>
                                    <tr>
                                        <td>ראה את פרטי הבקשה:</td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <b> שם:  </b>  '.$name.'  </td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <b> אימייל:  </b>  '.$email.'  </td>
                                    </tr>
                                    <tr>
                                        <td>
                                    <b> מספר טלפון:  </b>  '.$phone.'  </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                    <b> פניה:  </b>  '.$message.'  </td>
                                    </tr> 
                                    <tr>
                                    <tr></tr>
                                    <tr></tr>
                                        <td>בברכה, </td>
                                    </tr>
                                    <tr>
                                        <td>החברה הכי טובה שלך</td>
                                    </tr
                                </table>
                            </body>
                        </html>';
                
                $headers = "From:" . $from;
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                mail($to,$subject,$message, $headers);
                $post_data = array('code'=>1,'regError'=>null);


            }
        
    
    
    
   	
    $info = json_encode($post_data);
    echo $info;

?>