const mongoose = require('mongoose');
var Schema = mongoose.Schema;
const djelatnikSchema = mongoose.Schema({

    ime: { type: String },
    prezime: { type: String },
    odjel: { type: String },
    email: { type: String },
    id_mjesta: { type: mongoose.Schema.Types.ObjectId, ref: 'Mjesto' }
});
module.exports = mongoose.model("Djelatnik", djelatnikSchema);
