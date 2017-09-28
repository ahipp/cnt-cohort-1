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
			<div class="row">
				<div class="col-md-12">
					<div style="padding-left: 15px;">
						<h3><?php echo $json['address'] ?></h3>
						<b>Characteristics segmented by:</b> <br />
						Property Size: <b><?php echo $json['specs']['size'] ?></b><br />
						Type: <b><?php echo $json['specs']['type'] ?></b><br /><br />
					</div>
				</div>
			</div>
			<div class="row">			
				<div class="col-md-4">
					<div class="inverted-color" style="padding-left: 15px;">
						<h3><b>Property Details</b></h3>
					</div>
					<div class="divider"><img src="./img/yellow-orange-blue-highlight-band.png"></div>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-md-4">
					<span id="reland-score" class="info-panel col-md-12">
						<div>
							<h3>ReLand Score</h3>
						</div>
						<div style="display:inline-block;">
							<div class="score score-big"><?php echo $json['scores']['overall']; ?></div>
						</div>
						<hr style="height:1px; visibility: hidden">
						<div>Median score for Cook County: 52</div>
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
								"<div style=\"display:inline-block; line-height:30px; font-size:30px;\">" .
									"ReLand Score" .
								"</div>" .
								"<div style=\"display:inline-block; float: right;\">" .
									"<div class=\"score score-small right-align\">" . $comp['scores']['overall'] . "</div>" .
								"</div>" .
								"<br /><br />" .
								"<span style=\"font-size: 18px;\">" .
									"<div>Transportation: <b>" . $comp['scores']['transportation'] . "</b></div>" .
									"<div>Work force: <b>" . $comp['scores']['workforce'] . "</b></div>" .
									"<br />" .
									"<div>Current business: <b>" . $comp['business'] . "</b></div>" .
									"<div>Property size: <b>" . $comp['size'] . "</b> acres</div>" .
									"<div>Type of property: <b>" . $comp['type'] . "</b></div>" .
								"</span>" .
							"</div>" .
							"<div class=\"divider\"><img src=\"./img/yellow-orange-blue-highlight-band.png\"></div>" .
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