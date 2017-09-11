<?php
	$data = file_get_contents("./datafiles/" . $_GET['address'] . ".json");
	$json = json_decode($data, true);
?>
<html>
<head>
	<?php echo file_get_contents("head.html");?>
</head>
<body>
	<header>
		<?php echo file_get_contents("header.html");?>
	</header>
	<main>
		<div id="data-wrapper" class="col-md-12">
			<h1>Property Details</h1>
			<span class="col-md-4">
				<div id="reland-score" class="info-panel">
					<h3>ReLand Score</h3><br />
					<div class="score"><?php echo $json['scores']['overall']; ?></div>
					Subscore 1: <?php echo $json['scores']['subscore1']['score']; ?> <br />
					Subscore 2: <?php echo $json['scores']['subscore2']['score']; ?> <br />
					Subscore 3: <?php echo $json['scores']['subscore3']['score']; ?>
				</div>
				<div id="collaborators" class="info-panel">
					<h3>Collaborators</h3>
					<?php foreach ($json['collabs'] as $collab) {
					echo "<div>" .
							$collab['name'] . "<br />" . $collab['title'] .
							", " . $collab['company'] . 
						 "</div>";
					}?>
				</div>
			</span>
			<span class="col-md-4">
				<div id="property-specs" class="info-panel">
					Address: <?php echo $json['specs']['street'] . ", " . $json['specs']['state'] . ", " . $json['specs']['zip']; ?><br />
					Size: <?php echo $json['specs']['size'] . " sq. ft."; ?><br />
					Zoning: <?php echo $json['specs']['zoning'] ?><br />
					Type: <?php echo $json['specs']['type'] ?> <br />
				</div>
			</span>
			<span class="col-md-4">
				<div id="property-image" class="info-panel">
					<img src="./img/<?php echo $json['image'] ?>">
				</div>
			</span>
			<div id="historical-comps" class="info-panel">
				<h4>Historical Comparable Properties</h4>
				<?php foreach ($json['comps'] as $comp) {
				echo "<div class=\"comp col-md-4\">
						<img src=\"./img/" . $comp['image'] . "\"> <br />" .
						$comp['street'] . ", " . $comp['city'] . ", " . $comp['state'] . " " . $comp['zip'] . "<br />" .
					 "</div>";
				}?>
			</div>
			<div id="notes" class="info-panel">
				<h2>Notes</h2>
				<?php foreach ($json['notes'] as $note) {
				echo "<div class=\"note\">" . $note['name'] . " " . $note['timestamp'] . ": " . $note['text'] . "</div>";
				}?>
			</div>
		</div>
	</main>
</body>

<script type="text/javascript">
    

    
</script>
</html>