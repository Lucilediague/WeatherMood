<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width"/>
    <title>Weather Mood - Historique</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="historique.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>

<div class="container">

    <div class="listWrap">

        <h1>Historique des recherches</h1>
        <ul class="list">

            <li>
                <span>N° recherche</span>
                <span>Date</span>
                <span>Ville</span>
                <span>Température</span>
                <span>Description</span>
            </li>
            <?php
            include ('bdd.php');
            selectTableMeteo();
            ?>
        </ul>

        <div class="bouton-centre">
            <a href="index.php">
                <button type="button" class="btn btn-success">Nouvelle recherche</button>
            </a>
        </div>
    </div>

</div>

</body>

</html>