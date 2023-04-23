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

        function es_letra($l){
            if(($l>="A"&&$l<="Z")||($l>="a"&&$l<="z")){
                return true;
            }
            return false;
        }

        function contador($s){
            $contador=0;
            $palabra=0;

            for($i=0;$i<strlen($s);$i++){
                $l=es_letra(substr($s,$i,1));

                if($palabra==0&&$l){
                    $contador++;
                    $palabra=1;
                }else if($palabra==1&&$l==false){
                    $palabra=0;
                }
            }   
            return $contador;
        }

        echo contador("Hola mundo para todos");

        //          Hola mundo para todos
        //$palabra  111101111101111011111
        //$contador 111112222223333344444

    ?>

</body>
</html>