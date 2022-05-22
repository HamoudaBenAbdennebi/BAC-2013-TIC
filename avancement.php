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
    $c = mysql_connect("localhost", "root", "");
    $db = mysql_select_db("BD2013");
    $req = "SELECT COUNT(Numero) FROM eleve";
    $res = mysql_query($req);
    $e = mysql_fetch_array($res);
    $nbtotal = $e[0];
    $req2 = "SELECT COUNT(DISTINCT NumEleve) FROM note";
    $res2 = mysql_query($req2);
    $e2 = mysql_fetch_array($res2);
    $nb = $e2[0];
    echo ((intval($nb) / intval($nbtotal)) * 100)
    ?>
</body>

</html>