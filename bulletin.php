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
    if (isset($_POST["num"]))
        $num = $_POST["num"];
    else
        $num = "";
    $c = mysql_connect("localhost", "root", "");
    $db = mysql_select_db("BD2013");
    $req = "SELECT * FROM eleve WHERE Numero = '$num' ";
    $res = mysql_query($req);
    if (mysql_num_rows($res) == 0)
        echo ("vous n'etes pas inscrit");
    else {
        $req = "SELECT COUNT(NumEleve) FROM note WHERE numEleve = '$num' AND DC > 0  AND DS > 0";
        $res = mysql_query($req);
        $e = mysql_fetch_array($res);
        if ($e[0] != 3)
            echo ("saisie incomplaite des notes");
        else {
            $req = "SELECT E.NomPrenom,M.Libelle  ,M.coeff , N.DC , N.DS FROM note N , matiere M , eleve E  WHERE E.Numero = N.NumEleve AND N.CodeMatiere = M.Code AND E.Numero = '$num' ";
            $res = mysql_query($req);
            $e = mysql_fetch_array($res);
    ?>
            <table>
                <tr>
                    <th>Bulletin de notes de l'eleve</th>
                    <td><?php echo ($e[0]); ?></td>
                </tr>
                <tr>
                    <th><?php echo ($e[1]); ?></th>
                    <td><?php echo ($e[2]); ?></td>
                    <td><?php echo ($e[3]); ?></td>
                    <td><?php echo ($e[4]); ?></td>
                    <td><?php echo ((intval($e[3]) + intval($e[4]) + intval($e[4])) / 3); ?></td>
                    <td><?php echo (((intval($e[3]) + intval($e[4]) + intval($e[4])) / 3) * 3); ?></td>
                </tr>

                <?php
                while ($e = mysql_fetch_array($res)) {
                ?>
                    <tr>
                        <th><?php echo ($e[1]); ?></th>
                        <td><?php echo ($e[2]); ?></td>
                        <td><?php echo ($e[3]); ?></td>
                        <td><?php echo ($e[4]); ?></td>
                        <td><?php echo ((intval($e[3]) + intval($e[4]) + intval($e[4])) / 3); ?></td>
                        <td><?php echo (((intval($e[3]) + intval($e[4]) + intval($e[4])) / 3) * floatval($e[2])); ?></td>
                    </tr>

        <?php
                }
            }
        }

        ?>
            </table>
</body>

</html>