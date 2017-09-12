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
						<div class="score"><?php echo $json['scores']['overall']; ?></div>
						<div>Subscore 1: <?php echo $json['scores']['subscore1']['score']; ?> </div>
						<div>Subscore 2: <?php echo $json['scores']['subscore2']['score']; ?> </div>
						<div>Subscore 3: <?php echo $json['scores']['subscore3']['score']; ?> </div>
					</span>
					<br />
					<span id="collaborators" class="info-panel col-md-12">
						<h3>Collaborators</h3>
						<?php foreach ($json['collabs'] as $collab) {
						echo "<div>" .
								$collab['name'] . "<br />" . $collab['title'] .
								", " . $collab['company'] . 
							 "</div>";
						}?>
					</span>
				</div>
				<div class="col-md-4">
					<div id="property-specs" class="info-panel">
						<h3>Property Specs</h3>
						<div>Address: <?php echo $json['specs']['street'] . ", " . $json['specs']['state'] . ", " . $json['specs']['zip']; ?></div>
						<div>Size: <?php echo $json['specs']['size'] . " sq. ft."; ?></div>
						<div>Zoning: <?php echo $json['specs']['zoning'] ?></div>
						<div>Type: <?php echo $json['specs']['type'] ?> </div>
					</div>
				</div>
				<div class="col-md-4">
					<div id="property-image" class="info-panel">
						<img src="./img/<?php echo $json['image'] ?>">
					</div>
				</div>
			</div>
			<br />
			<h2>Notes</h2>
			<div class="row">
				<div id="notes" class="col-md-12">
					<?php foreach ($json['notes'] as $note) {
					echo "<div class=\"note\"><b>" . $note['name'] . "</b> <i>" . $note['timestamp'] . "</i>: " . $note['text'] . "</div>";
					}?>
				</div>
			</div>
			<br />
			<h4>Historical Comparable Properties</h4>
			<div class="row">
				<?php foreach ($json['comps'] as $comp) {
				echo "<div class=\"col-md-4\">" .
							"<div class=\"comp info-panel\">
								<img src=\"./img/" . $comp['image'] . "\"> <br />" .
								$comp['street'] . ", " . $comp['city'] . ", " . $comp['state'] . " " . $comp['zip'] . "<br />" .
							"</div>" .
					 "</div>";
				}?>
			</div>
		</div>
	</main>
</body>

<script type="text/javascript">
    

    
</script>
</html>