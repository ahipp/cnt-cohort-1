'use strict';
const express = require('express');
const app = express();
const path = require('path');

function PropertyResults() {
    this.att1 = '';
    this.att2 = '';
    this.att3 = '';    
}

app.get('/property-results', function(req, res) {
    console.log('Property results request made.'); 
    if (req.query.pin) {
        var pin = req.query.pin;
        var results = new PropertyResults();
        results.att1 = 'Attribute 1 value for ' + pin;
        results.att2 = 'Attribute 2 value for ' + pin;
        results.att3 = 'Attribute 3 value for ' + pin;
        res.setHeader('Content-Type', 'application/json');
        res.send(JSON.stringify(results));
    }
    else {
        res.status(500);
        res.send('Error!');
    }
});
function getPropertyResults(pin) {

}

app.get('/', function(req, res) {
    res.sendFile(path.join(__dirname + '/../index.html'));
})

app.listen(3000, function() {
    console.log('Listening on port 3000');
})