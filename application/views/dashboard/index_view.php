<?php $this->load->view('layouts/header'); ?>
<style>
.main-container {
	padding: 0px;
}
</style>
<div class="row">
<div class="col-md-12">
<div id="map" style="height: 600px"></div>
    <script>
      function initMap() {
        var uluru = {lat: 6.613059, lng: 80.605598};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 20,
          center: uluru
        });

		/* now inside your initialise function */
		infowindow = new google.maps.InfoWindow({
			content: "holding..."
		});

        <?php
        foreach ($homeLocation as $key => $value) {?>
          var uluru = {lat: <?=$value->longitude; ?>, lng: <?=$value->latitude; ?>};

          var marker = new google.maps.Marker({
            position: uluru,
            map: map,
          });

		  var content = "<p><?=$value->address; ?></p>";

		  <?php if($loggedInUserType == 'superadmin' && $loggedInUserType == 'admin' && $loggedInUserType == 'grama_niladhari') { ?>
			content += "<a href=\"/grama_niladhari/people1/<?=$value->id; ?>\">View</a>";
		  <?php } ?>

		  google.maps.event.addListener(marker, 'click',
				function(event)
				{
					infowindow.setContent(content);
					infowindow.open(map, this);
				}
			);

        <?php }
        ?>
        


      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLO1_PyGMSU20vMCDK7pb4m1Q6OFQtij4&callback=initMap">
    </script>

</div>
</div>

<?php $this->load->view('layouts/footer'); ?>    

    