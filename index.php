<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width"/>
    <title>Weather Mood</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row-fluid user-row">
                        <img src="http://www.transatcovoyages.com/wp-content/uploads/2014/02/meteo.png"
                             class="img-responsive" alt="Logo appli"/>
                    </div>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" class="form-signin" method="post" action="result.php">
                        <fieldset>
                            <label for="ville">Saisissez une ville :</label>
                            <input class="form-control" placeholder="exemple : Bordeaux" id="ville" type="text"
                                   name="ville">
                            <br>
                            <input class="btn btn-lg btn-success btn-block" type="submit" id="OK" value="Rechercher">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>