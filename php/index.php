<html>
<head>
	<?php echo file_get_contents("./html/head.html"); ?>
</head>
<body>
	<header>
		<?php echo file_get_contents("./html/header.html"); ?>
	</header>
	<main>
		<div id="homepage-wrapper">
			<div id="homepage-finder">
				<div class="inverted-color" style="width:40%">
					<h2>Find a property</h2>
				</div>
				<br />
				<form action="/property-details.php" id="searchform">
					<input type="hidden" id="property-search-value" name="address" form="searchform" />
					<div style="border: 1px solid #DDD; width: 100%;">
						<div style="background-color: white; padding-left: 0px;">
							<input id="property-search" type="text" autocomplete="off" />
						</div>
						<div style="background-color: white;">
							<img id="search-icon" src="./img/icon-search.png"/>
						</div>
					</div>
					<div id="suggest-matches"></div>
				</form>
			</div>
			<div id="homepage-about">
				<h3>About ReLand</h3>
				<div style="width:40%"><img src="./img/yellow-orange-blue-highlight-band.png"></div>
				<div>
					<p>
						ReLand works to solve a problem that is commonplace to cities nationwide: the slow pace of reactivating former
						industrial properties, especially those in economically depressed communities, into new job-creating facilities. It can
						take decades - and for some locations it seems to never happen.
					</p>
					<p>
						Fortunately many organizations and individuals have a vital stake in the redevelopment of urban industrial properties,
						including cities, real estate brokers, economic development agencies, community organizations, land trusts, unions - all
						want to make this happen. Given the right tools, this process can be accelerated.
					</p>
					<p>
						ReLand is a mash-up of place-based data on individual parcels with market-wide data on the sales of industrial sites.
						Using a depth of data on specific properties, it assigns a ReLand Score to industrial properties to identify sites that are
						desirable for redevelopment.
					</p>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<?php echo file_get_contents("./html/footer.html"); ?>
	</footer>
</body>
<script type="text/javascript">

	
	var properties = [
		{
			address: '12000 S Peoria St, Chicago, IL',
			submitVal: '12000_S_Peoria'
		},
		{
			address: '4711 N Lamon Ave, Chicago, IL',
			submitVal: '4711_N_Lamon'
		},
		{
			address: '13636 S Western Ave, Blue Island, IL',
			submitVal: '13636_S_Western'
		},
		{
			address: '17100 Halsted St, Harvey, IL',
			submitVal: '17100_Halsted'
		}
	]
	
	$('#property-search').keyup(function(event) {
		$("#suggest-matches").empty();
		
		let searchValue = $("#property-search").val();
		properties.forEach(function(element) {
			if (searchValue && element.address.indexOf(searchValue) > -1) {		
				$("#suggest-matches").append("<div class=\"suggested-match suggested-match-unhover\" onclick=\"submitSearch(\'" + element.submitVal + "\');\">" + element.address +"</div>");			
			}
		});
		
		$('.suggested-match').hover(function() {
			$(this).removeClass('suggested-match-unhover').addClass('suggested-match-hover');
		}, function() {
			$(this).removeClass('suggested-match-hover').addClass('suggested-match-unhover');
		});
	});
		
	function submitSearch(submitValue) {
		$("#suggested-matches").empty();
		$("#property-search-value").val(submitValue);
		$("#searchform").submit();
	}
	
</script>
</html>