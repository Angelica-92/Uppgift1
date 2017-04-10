<?php
//skapa en HTTP-client	
	$client = new Client();
	
	//Anropa URL: http://unicorns.idioti.se/
	$res = $client->request('GET', 'http://unicorns.idioti.se/', [
	'headers' => [
		'Accept' => 'application/json'		
]
]);
	
	//Omvandla JSON-svar till datatyper
	$data = json_decode($res->getBody());
	
	
	if( $_REQUEST["unicornID"] || "$value->id" ) {
		foreach($_REQUEST["unicornID"] as $key => $value){
			echo "<p> id: $value->id </p>";
		exit();
}
}
	?>
