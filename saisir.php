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
    if (isset($_POST["num"]) and isset($_POST["mat"]) and isset($_POST["DC"]) and isset($_POST["DS"])) {
        $num = $_POST["num"];
        $mat = $_POST["mat"];
        $DC = $_POST["DC"];
        $DS = $_POST["DS"];
    } else {
        $num = "";
        $mat = "";
        $DC = "";
        $DS = "";
    }
    $c = mysql_connect("localhost", "root", "");
    $db = mysql_select_db("BD2013");
    $req = "SELECT * FROM eleve WHERE Numero = '$num' ";
    $res = mysql_query($req);
    if (mysql_num_rows($res) == 0)
        echo ("Eleve non inscrit");
    else {
        $req = "SELECT * FROM note WHERE NumEleve = '$num' and CodeMatiere = '$mat'";
        $res = mysql_query($req);
        if (mysql_num_rows($res) == 1)
            echo ('Notes deja saisie');
        else {
            $req = "INSERT INTO note (NumEleve, CodeMatiere, DC, DS) VALUES ('$num', '$mat', '$DC', '$DS');";
            $res = mysql_query($req);
            echo ('operation reusitte');
        }
    }


    ?>
</body>

</html>