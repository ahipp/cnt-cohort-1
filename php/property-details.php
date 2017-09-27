<?php
	$data = file_get_contents("./datafiles/" . $_GET['address'] . ".json");
	$json = json_decode($data, true);
?>
<html>
<head>
	<?php echo file_get_contents("./html/head.html");?>
</head>
<body>
	<header>
		<?php echo file_get_contents("./html/header.html");?>
	</header>
	<main>
		<div id="data-wrapper" class="container-fluid">
			<h1>Property Details</h1>
			<div class="row">
				<div class="col-md-4">
					<span id="reland-score" class="info-panel col-md-12">
						<h3>ReLand Score</h3>
						<div style="display:inline-block;" width="100%">
							<div class="score big left" width="20%"><?php echo $json['scores']['overall']; ?></div>
						</div>
						<div>Median score for Cook County: 52</div>
						<br />
						<div>Transportation: <?php echo $json['scores']['transportation']; ?> </div>
						<div>Work force: <?php echo $json['scores']['workforce']; ?> </div>
					</span>
					<br />
					<span id="development-rep" class="info-panel col-md-12">
						<h5>ECONOMIC DEVELOPMENT REP</h5>
						<br />
						<?php foreach ($json['collabs'] as $collab) {
						echo "<div>" .
								"<u>" . $collab['name'] . "</u>" . 
								"<br />" . 
								"<i><b>" . $collab['title'] . "</i></b>" .
								"<br />" . 
								$collab['company'] . 
								"<br />" . 
								$collab['phone'] .
								"<br />" .
								$collab['email'] . 
							 "</div>";
						}?>
					</span>
				</div>
				<div class="col-md-4">
					<div id="property-specs" class="info-panel">
						<h5>PROPERTY SPECS</h5>
						<br />
						<div>
							<h5>SIZE</h5>
							<div>Total acres: <b><?php echo $json['specs']['size'] ?></b></div>
							<div>Existing structures: <b><?php echo $json['specs']['existingStructures'] ?></b></div>
						</div>
						<br />
						<div>
							<h5>ZONING</h5>
							<div>Zone: <?php echo $json['specs']['zoning'] ?></div>
						</div>
						<br />
						<div>
							<h5>FINANCIAL INCENTIVES</h5>
							<ul>
							<?php foreach ($json['incentives'] as $incentive) {
							echo "<li>" . $incentive . "</li>";
							}?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div id="property-image" class="info-panel">
						<img src="./img/<?php echo $json['image'] ?>">
					</div>
					<br />
					<div id="map" class="info-panel">
						<div id="map-iframe-wrapper">
							<iframe id="map-iframe" src="<?php echo $json['mapsrc'] ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
			<br />
			<h5>PROPERTY NOTES</h5>
			<div class="row">
				<div id="notes" class="col-md-12">
					<b><?php echo $json['notes']['location'] ?></b> (<?php echo $json['notes']['type'] ?>): <?php echo $json['notes']['text'] ?>
				</div>
			</div>
			<br />
			<h4>HISTORICAL COMPARABLE PROPERTIES</h4>
			<div class="row">
				<?php foreach ($json['comps'] as $comp) {
				echo "<div class=\"col-md-4\">" .
							"<div class=\"comp info-panel\">
								<img src=\"./img/" . $comp['image'] . "\"> <br />" .
								$comp['location'] . 
								"<br />" .
								"<h3>ReLand Score</h3>" .
								"<div class=\"score right-align\">" . $comp['scores']['overall'] . "</div>" .
								"<br />" .
								"<div>Transportation: " . $comp['scores']['transportation'] . "</div>" .
								"<div>Work force: " . $comp['scores']['workforce'] . "</div>" .
								"<br />" .
								"<div>Current business: " . $comp['business'] . "</div>" .
								"<div>Property size: " . $comp['size'] . " acres</div>" .
								"<div>Type of property: " . $comp['type'] . "</div>" .
							"</div>" .
					 "</div>";
				}?>
			</div>
		</div>
		<br />
	</main>
	<footer>
		<?php echo file_get_contents("./html/footer.html"); ?>
	</footer>
</body>
<script type="text/javascript">
</script>
</html>