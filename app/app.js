'use strict';
const express = require('express');
const app = express();
const path = require('path');

app.use(express.static('public'));
app.set('view engine', 'ejs');

app.get('/property-details', function(req, res) {
    console.log('Property details request made. Address: ' + req.query.address); 
    if (req.query.address) {
		// Read in csv
		
		res.render('../app/views/pages/property-details', {
			address: '123 Fake Street',
			city: 'Chicago',
			state: 'IL',
			zip: 60647,
			latitude: 41.911051,
			longitude: -87.680945,
			size: 10000,
			zoning:	'Industrial',
			type: 'Manufacturing',
			imageFileName: 'testImage.jpg',
			desirabilityScore: 99
		});
	}
	else {res.status(500).send('No property matches that address!')}
});

app.get('/', function(req, res) {
    res.render('../app/views/pages/index');
});

app.listen(3000, function() {
    console.log('Listening on port 3000');
})