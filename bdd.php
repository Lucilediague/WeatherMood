<?php

function insertTableChanson($titre, $artiste) {
    $bdd = mysqli_connect('localhost', 'root', 'r7t8y9', 'WeatherMood');
    $req_pre = mysqli_prepare($bdd, 'INSERT INTO Chanson (titre, artiste) VALUES ( ?, ?)');
    mysqli_stmt_bind_param($req_pre, "ss", $titre, $artiste);

    mysqli_stmt_execute($req_pre);
}

function insertTableMeteo($ville,$date, $temperature, $description) {
    $bdd = mysqli_connect('localhost', 'root', 'r7t8y9', 'WeatherMood');
    $req_pre = mysqli_prepare($bdd, 'INSERT INTO Meteo (Ville, Date_recherche, Temperature, Description) VALUES ( ?, ?, ?, ?)');
    mysqli_stmt_bind_param($req_pre, "ssis", $ville,$date, $temperature, $description);

    mysqli_stmt_execute($req_pre);
}
function selectTableMeteo() {
    $bdd = mysqli_connect('localhost', 'root', 'r7t8y9', 'WeatherMood');
    $req_pre = mysqli_prepare($bdd, 'SELECT * FROM Meteo ORDER BY Date_recherche DESC LIMIT 14');
    $donnees=[];
    mysqli_stmt_execute($req_pre);
    mysqli_stmt_bind_result($req_pre, $donnees['ID'], $donnees['Ville'], $donnees['Date_recherche'],$donnees['Temperature'], $donnees['Descritpion']);
    while(mysqli_stmt_fetch($req_pre))
    {
        echo '<li><span>' . $donnees['ID'] . '</span><span>' . $donnees['Date_recherche'] . '</span><span>' . $donnees['Ville'] . '</span><span>' . $donnees['Temperature'] . ' °C</span><span>' . $donnees['Descritpion'] . '</span></li>' ;
    }


}
?>

