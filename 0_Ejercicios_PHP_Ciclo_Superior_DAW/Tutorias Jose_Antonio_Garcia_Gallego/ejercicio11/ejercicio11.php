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
        function mcm($a,$b){
            for($i=$a;$i%$a!=0 || $i%$b!=0;$i++);
            return($i);
        }

        echo mcm(7,8);

    ?>

</body>
</html>