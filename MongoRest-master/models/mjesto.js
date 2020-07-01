const mongoose = require('mongoose');
var Schema = mongoose.Schema;
const mjestoSchema = mongoose.Schema({

    naziv: String,

});
module.exports = mongoose.model("Mjesto", mjestoSchema);