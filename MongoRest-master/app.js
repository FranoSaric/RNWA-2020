const express = require('express');
const bodyParser = require('body-parser');
const mongoose = require("mongoose");
const Djelatnik = require("./models/djelatnik");
const Mjesto = require("./models/mjesto");
const app = express();


mongoose.connect("mongodb://localhost/rest", { useNewUrlParser: true });
var db = mongoose.connection;
db.on("error", console.error.bind(console, "connection error"));
db.once("open", () => {
    console.log("Connected to MOngoDB");
});
app.use(bodyParser.urlencoded({ extended: true }))
app.set('view engine', 'ejs');

app.use(bodyParser.json());


app.get("/", (req, res,) => {
    res.render('pocetna');
});

const djelatnik = require('./routes/djelatnici');
const mjesto = require('./routes/mjesta');
app.use("/djelatnici", djelatnik);
app.use("/mjesta", mjesto);

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}.`);
});