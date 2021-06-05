<?php
	error_reporting(E_ALL);
	error_reporting(-1);
	ini_set('error_reporting', E_ALL);
	include_once 'dbh.inc.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script> 
	var locations = new Array();
	var number_plates = new Array();
	var telefonas = new Array();
	var iden = new Array ();
	var data = new Array ();
	var vair = new Array();
	var ilg = new Array();
	var plat = new Array();
	var vieta = new Array();
	var titles = new Array();
</script>
<html>
<head>
	<title></title>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		#map 
		{
			height: 100%;
			width: 100%;
		}
	</style>
</head>
<body>

<div id="map"></div>

<script> 
	var i = 0 
	</script>
   <?php
	$sql = "SELECT * FROM vairuotojai";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{ ?>
			<script> iden[i] = <?=$row['id']; ?></script>
			<script> vair[i] =  "<?=$row['vairuotojas']; ?>"</script>
			<script> number_plates[i] =  "<?=$row['valstnum'];?>"</script>
			<script> telefonas[i] =  <?=$row['tlfnr']; ?></script>
			<script> ilg[i] =  <?=$row['longitude']; ?></script>
			<script> plat[i] =  <?=$row['latitude']; ?></script>
			<script>
				vieta [i] = {lat: +plat[i], lng: + ilg[i]};
				titles [i] = "Vartotojas: " + vair[i] + "\nAutomobilio numeriai: " +  number_plates[i] + "\n" +"Telefono Numeris: +"+ telefonas[i];
				i = i +1;
			</script>
			<html><br></html>
		<?php }
	} ?>
	<script>
	function initMap()
	{
		var a;
		var map = new google.maps.Map(document.getElementById("map"),{
			zoom: 7,
			center: vieta[1]
		});
		for (a = 0; a<=vieta.length;a++)
		{
			addMarker(vieta[a], titles[a]);
			console.log(titles[a]);
			console.log(vieta[a]);

		}
		function addMarker(coords, pav)
		{
			var marker = new google.maps.Marker({
				position:coords,
				map: map,
				title: pav
			});
		}
	}
</script>
<script

async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNDYKlvBlpgJePS6mOQ6jK6Qghl9xkNZs&callback=initMap"></script>

</body>
</html>