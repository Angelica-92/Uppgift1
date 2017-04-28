<?php
	require 'vendor/autoload.php';
	use GuzzleHttp\Client;
	//Autoloads visitors in app.log
	$log = new Monolog\Logger('unicorn');
	$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::INFO));
	$log->addInfo('Foo');

	//skapa en HTTP-client
	$client = new Client();
	//Anropa URL: http://unicorns.idioti.se/

	if (isset($_GET['number'])) {
		// Hämta en enhörning
		$res = $client->request('GET', 'http://unicorns.idioti.se/' . $_GET['number'], [
		'headers' => [
		'Accept' => 'application/json'
		]
		]);
		$data = json_decode($res->getBody());
	} else {
		//hämtar alla enhörningar
		$res = $client->request('GET', 'http://unicorns.idioti.se/', [
		'headers' => [
		'Accept' => 'application/json'
		]
		]);
		//Omvandla JSON-svar till datatyper
		$data = json_decode($res->getBody());
	}
	?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>uppgift 1</title>
    <link href="stylesheet.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body>
    <div class="header">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
		<script>

		$(document).ready(function(){
    $(".visa").click(function(){
				console.log('hej');
        $(".visaMer").toggle();
    });
});
		</script>
      <div class="container">
        <div class="row">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-6">
                <form action = "<?php $_PHP_SELF ?>" method = "GET">
                    <div class="form-group">
                    <label for="search">Sök på Enhörningens ID <span class="glyphicon glyphicon-search"></span></label>
                    <br>
                    <input type="text" class="form-control" name="number">
                    <br>
                    <button type="submit" id="unicorn" class="btn btn-info" value="Button1">Visa enhörning</a></button>
                    <button type="submit" id="buttonColor" class="btn btn-info" value="Button2"> <a href="localhost:8080" id="textColor">Visa alla enhörningar</a></button>
                    </div>
                </form>
				<br>
				<br>
				<script>
					</script>
				<?php
				if (isset($_GET['number'])){
					echo "<div class='unicornNr'>
					<h3> $data->id $data->name</h3>
					<p>$data->description</p>
					<img src='$data->image' alt=''>
					<p> Reporterat av: $data->reportedBy</p>
					</div>";
				}

				if (empty($_GET['number'])) {
					foreach ($data as $key => $value) {
						echo "<div class='panel panel-default'><div class='panel-heading'> <h4>Id: $value->id $value->name </h4> <button type='button' class='btn btn-default btn-xs visa'>Läs mer</button></div></div><div class='panel-body visaMer'><a href=$value->details>$value->details</a></div>";
						}


			}
				?>
	</body>
</html>
