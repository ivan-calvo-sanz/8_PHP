<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        function palindromo($s){
            for($i=0,$j=strlen($s)-1;$i<$j;$i++,$j--){
                if(substr($s,$i,1)!=substr($s,$j,1)){
                    return 0;
                }
            }
            return 1;
        }

        //echo substr("abc",0,2);
        echo palindromo("hopooh");

    ?>
    
</body>
</html>