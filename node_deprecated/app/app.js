'use strict';
const express = require('express');
const app = express();
const fs = require('fs');

app.use(express.static('public'));
app.set('view engine', 'ejs');

app.get('/property-details', function(req, res) {
    console.log('Property details request made. Address: ' + req.query.address); 
	var propertyAddress = "";
    switch (req.query.address) {
		case '123 Fake Street': propertyAddress = '123FakeStreet'; break;
		default: propertyAddress = ''; 
	}
	
	if (propertyAddress.length)
	{
		var pageJSON = require('./datafiles/' + propertyAddress + '.json');
		var csvFile = fs.readFileSync('./app/datafiles/' + propertyAddress + 'Scores.csv');
				
		if (csvFile) {
			var csvString = csvFile.toString();
			var scoresJSON = {};
			var label = '';
			var attrVal = '';
			csvString.split('\r\n').forEach(function(row) {
				scoresJSON[row.split(',')[0].replace(' ','').toLowerCase()] = row.split(',')[1];
			});
		
			pageJSON['scores'] = scoresJSON;
		}
			
		console.log(pageJSON);
		res.render('../app/views/pages/property-details', pageJSON);
	}
	else {res.status(500).send('No property matches that address!')}
});

app.get('/', function(req, res) {
    res.render('../app/views/pages/index');
});

app.listen(3000, function() {
    console.log('Listening on port 3000');
})