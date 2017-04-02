<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width"/>
    <title>Weather Mood</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="result.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>

<?php

$ville = $_POST['ville'];

include 'meteo.php';
$meteo_datas = get_weather($ville);
$description = $meteo_datas['description'];

include('deezer.php');
$playlist = get_playlist($description);
$songs_list = '';

include('bdd.php');
$today = date("Y-m-d H:i:s");
insertTableMeteo($ville, $today, $meteo_datas['temp'], $description);

foreach ($playlist['data'] as $song) {
    $songs_list = $songs_list . $song['id'] . ',';
    insertTableChanson($song['title'], $song['artist']['name']);
};

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4">
            <div id="card" class="weather">
                <div class="city-selected">
                    <article>
                        <div class="info">
                            <div class="city"><span>Ville:</span> <?php echo $meteo_datas['ville'] ?> </div>
                            <div class="night"><?php echo date('H:i'); ?> </div>

                            <div class="temp"><?php echo $meteo_datas['temp'] ?>°C</div>

                            <div class="wind">
                                <svg version="1.1" id="wind" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 300.492 300.492" style="enable-background:new 0 0 300.492 300.492;"
                                     xml:space="preserve">
									<g>
                                        <g>
                                            <g>
                                                <path style="fill:#FFFFFF;" d="M287.166,100.421c-9.502-13.217-24.046-23.034-39.868-26.945
													c-5.309-1.365-10.845-2.061-16.453-2.061c-11.531,0-22.257,3.035-30.981,8.746c-14.076,8.86-23.709,23.91-25.759,40.157
													c-2.698,16.644,4.357,34.315,17.519,43.959c7.555,5.716,17.47,8.991,27.201,8.991c7.332,0,14.109-1.811,19.575-5.216
													c14.936-8.991,21.495-28.577,14.626-43.665c-3.525-7.669-10.427-13.647-18.455-15.975c-2.361-0.696-4.754-1.082-7.131-1.164
													l-0.288,5.434c1.974,0.141,3.916,0.544,5.782,1.202c6.288,2.143,11.536,7.093,14.044,13.288c1.256,2.975,1.893,6.211,1.822,9.355
													c-0.071,3.421-0.658,6.565-1.855,9.861c-2.366,6.222-6.967,11.667-12.678,14.968c-10.269,6.233-26.624,4.329-37.171-4.172
													c-10.405-8.278-15.529-21.87-13.364-35.528c1.8-13.413,9.85-25.71,21.56-32.912c5.553-3.514,12.069-5.803,18.868-6.636
													c2.823-0.359,6.619-0.413,10.285-0.131c3.497,0.31,7.033,0.903,10.231,1.713c13.358,3.437,25.623,11.863,33.668,23.154
													c8.365,11.324,12.325,24.96,11.438,39.477c-0.587,14.098-5.423,28.305-13.619,40.021c-8.159,11.759-19.907,21.354-33.108,27.027
													c-6.059,2.654-13.07,4.574-20.832,5.695c-4.803,0.68-9.959,0.8-16.203,0.892l-176.09,2.339l-29.817,1.164l0.109,5.439
													l199.015,0.131c2.295,0,4.596,0,6.88,0.022l4.253,0.027c3.835,0,8.376-0.071,12.988-0.593c8.36-1.033,16.263-3.111,23.464-6.168
													c14.925-6.206,28.283-16.905,37.606-30.127c9.426-13.206,15.072-29.36,15.893-45.438
													C301.476,130.293,296.679,113.399,287.166,100.421z">
                                            </g>
                                            <g>
                                                <path style="fill:#FFFFFF;" d="M106.617,209.839c0.664-0.027,1.463-0.038,2.23-0.038l5.445,0.065
													c1.528,0.027,2.959,0.049,4.395,0.049c2.801,0,6.511-0.076,10.438-0.647c7.626-1.246,14.849-4.471,20.864-9.312
													c12.374-9.752,18.874-25.999,16.562-41.391c-2.371-15.648-15.953-28.697-31.547-30.35c-8.539-1.05-16.421,0.979-22.404,5.619
													c-6.451,4.824-10.688,12.091-11.612,19.842c-1.229,8.077,1.806,16.589,7.664,21.637c5.803,5.287,15.431,7.43,22.387,5.037
													c5.102-1.702,9.42-5.798,11.563-10.971l-4.928-2.284c-1.817,3.519-5.096,6.124-8.762,6.957c-1.218,0.277-2.317,0.408-3.367,0.408
													c-4.329,0-8.762-1.866-11.591-4.89c-3.835-4.003-5.249-9.11-4.096-14.762c1.044-5.08,4.308-10.106,8.496-13.124
													c4.449-3.176,9.284-4.286,15.349-3.405c11.123,1.441,20.603,10.943,22.077,22.229c1.996,11.335-2.877,24.013-12.173,31.585
													c-4.585,3.867-10.193,6.494-16.236,7.604c-2.469,0.479-4.922,0.571-7.647,0.642l-104.506,2.752
													C10.264,203.524,5.134,203.9,0,204.275l0.19,5.434L106.617,209.839z">
                                            </g>
                                        </g>
                                    </g>
                                </svg>

                                <p><?php echo $meteo_datas['wind'] ?> m/s</p>
                            </div>
                        </div>

                        <div class="icon">
                            <img src=<?php echo "http://openweathermap.org/img/w/" . $meteo_datas['icon'] . ".png" ?>>
                        </div>
                    </article>
                    <figure style="background-image: url(https://farm2.static.flickr.com/1449/24142464270_fbba1c034b_b.jpg)"></figure>
                </div>
                <script>
                    (function (d, s, id) {
                        var js, djs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "http://e-cdn-files.deezer.com/js/widget/loader.js";
                        djs.parentNode.insertBefore(js, djs);
                    }(document, "script", "deezer-widget-loader"));
                </script>
                <div class="deezer-widget-player"
                     data-src="<?php echo "http://www.deezer.com/plugins/player?format=classic&autoplay=true&playlist=true&width=100%&height=230&color=007FEB&layout=dark&size=medium&type=tracks&id=" . $songs_list . "&app_id=1" ?>"
                     data-scrolling="no" data-frameborder="0" data-allowTransparency="true"
                     data-width="100%"  data-height="230px">
                </div>
            </div>


        </div>
    </div>

    <div class="bouton-centre">
        <a href="index.php">
            <button type="button" class="btn btn-success taille-bouton">Nouvelle recherche</button>
        </a>
        <a href="historique.php">
            <button type="button" class="btn btn-success taille-bouton">Historique</button>
        </a>
    </div>
</div>

</body>

</html>