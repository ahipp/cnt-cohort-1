'use strict';
const express = require('express');
const app = express();
const fs = require('fs');

app.use(express.static('public'));
app.set('view engine', 'ejs');

app.get('/property-details', function(req, res) {
    console.log('Property details request made. Address: ' + req.query.address); 
    if (req.query.address) {
		// Hacking the search to find a unique part of the search string for matching
		// the demo files. 
		var csvFileName = '';
		if (req.query.address.toLowerCase().indexOf('fake') > 0) {
			csvFileName = '123FakeStreet.csv'; 
		}
		var csvFile = fs.readFileSync('./app/datafiles/' + csvFileName);
		if (csvFile) {
			var csvString = csvFile.toString();
		}
		var pageJSON = {};
		var label = '';
		var attrVal = '';
		csvString.split('\r\n').forEach(function(row) {
			pageJSON[row.split(',')[0].replace(' ','').toLowerCase()] = row.split(',')[1];
		});
			
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