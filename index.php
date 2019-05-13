<?php
require_once 'app/config/config.php';
require_once 'app/modules/hg-api.php';

$hg = new HG_API(HG_API_KEY);
$dolar = $hg->dolar_quotation();
$euro = $hg->euro_quotation();
$bitcoin = $hg->btc_quotation();
$geoinformation = $hg->get_geoinformation();
$weatherinformation = $hg->get_weatherinformation();
$stocksinformation = $hg->stocks_points();

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Cotação Dólar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <br></br>
                <h1>API - Testing</h1>
                <br></br>
                <div class="card">
                    <div class="card-header">
                    <h3><span class="badge badge-light">Cotação <?php echo ($geoinformation['country']['code'])?> <img src="<?php echo $geoinformation['country']['flag']['svg'] ?>" height="20" width="30"/></span></h3>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>USD</th>
                                <th><span class="badge badge-pill badge-primary"><?php echo ($dolar['buy'])?></span></th>
                            </tr>
                            <tr>
                                <th>EURO</th>
                                <th><span class="badge badge-pill badge-primary"><?php echo ($euro['buy'])?></span></th>
                            </tr>
                            <tr>
                                <th>BTC</th>
                                <th><span class="badge badge-pill badge-primary"><?php echo ($bitcoin['buy'])?></span></th>
                            </tr>
                            <tr>
                                <th><?php echo ($stocksinformation['IBOVESPA']['name'])?></th>
                                <th><span class="badge badge-pill badge-primary"><?php echo ($stocksinformation['IBOVESPA']['points'])?></span></th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                    <div class="card-footer text-muted">
                        <footer class='footer mt-auto py-3'>
                            <div class='container'>
                                <span class='text-muted'><?php echo ($geoinformation['continent'] . " - " . $geoinformation['country_name'] . ", ". $geoinformation['city']. " - ". $geoinformation['region_code'])?></span>
                                <span class='text-muted'><?php echo ("                                                                                                     Temperatura: " . $weatherinformation['temp'] . "ºC - " . $weatherinformation['description']. ", " . $weatherinformation['currently'])?></span>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>