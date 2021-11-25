<?php

    include '../project/db/authentication.php';

    $sec = mysqli_query($con,"SELECT * FROM monitor ORDER BY 'timestamp' DES ");

    $json_arr = array();

    if (mysqli_num_rows($sec) == 1) {
        
        while ($val = mysqli_fetch_array($sec)) {
            
            $temp = $val['temeperature'];
            $hum = $val['moisture'];
            $smoke = $val['smoke'];
            $human = $val['human'];

            
        }
        
    }
    else {
        echo '0';
    }


?>