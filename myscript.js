<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		#map {
			height: 800px;
			width: 100%;
		}
	}
	</style>
</head>
<body>

<div id="map"></div>

<script> 
	function initMap()
	{
		var location = {lat: 54.9, lng: 23.9};
		var locatione = {lat: 19.576359, lng: 4.428246};
		var map = new google.maps.Map(document.getElementById("map"),{
			zoom: 4,
			center: {lat: 54.9, lng: 23.9}
		});
		addMarker({location});
		addMarker({locatione});
		function addMarker(coords)
		{
			var marker = new google.maps.Marker({
				position:coords,
				map: map
			});
		}
	}
</script>
<script
async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNDYKlvBlpgJePS6mOQ6jK6Qghl9xkNZs&callback=initMap"></script>

</body>
</html>	
