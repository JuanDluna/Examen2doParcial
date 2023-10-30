<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resultados</title>
</head>
<?php
$cont=0;
$datos = array(
    $_POST["p1"],
    $_POST["p2"],
    $_POST["p3"],
    $_POST["p4"],
    $_POST["p5"]
);
$respuesta = array(
    "pr1" =>"a",
    "pr2" => "a",
    "pr3" => "b",
    "pr4" => "d",
    "pr5" =>"a"
    );
    $i=0;
    $cont=0;
    foreach($respuesta as $p => $r){
        if($r== $datos[$i]){
        $cont++;}
    }
?>
<h1> el resultado fue <?php echo ":", $cont ?> </h1>

<body>
    
</body>
</html>
