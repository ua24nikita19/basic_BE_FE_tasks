const express = require( "express");

let app = express();

app.set( "port", (process.env.PORT || 3000));

app.use("/", express.static(__dirname, { index: 'index.html' }));

app.listen(app.get( "port"), function() {
    console.log( "Server started: http://localhost:" + app.get( "port") + "/");
});
