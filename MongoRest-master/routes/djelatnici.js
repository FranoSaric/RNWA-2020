const express = require('express');
const router = express.Router();
const Djelatnik = require('../models/djelatnik');
const Mjesto = require('../models/mjesto');

router.get('/', (req, res) => {
    Djelatnik.find({}).populate('id_mjesta')
        .exec(function (err, djelatnici) {
            Mjesto.find({}, (err, mjesta) => {
                if (err) { console.log(err) }
                else {
                    res.send(djelatnici);
                }
            });
        });

});

router.get("/dodavanjeDjelatnika", (req, res) => {
    Mjesto.find({}, (err, mjesta) => {
        if (err) {
            console.log(err)
        } else {
            res.render("addDjelatnik", {
                mjesto: mjesta
            })
        }
    })
})

router.delete("/delete/:id", (req, res) => {
    const id = req.params.id;

    Djelatnik.findByIdAndRemove(id, (err, result) => {
        if (err) { console.log(err); }
        else {
            res.send("USPJESNO BRISANJE DJELATNIKA " + result.naziv)
        }
    })

});

router.post("/edit/:id", (req, res) => {
    const uredjeniDjelatnika = {
        ime: req.body.ime,
        prezime: req.body.prezime,
        odjel: req.body.odjel,
        email: req.body.email,
        id_mjesta: req.body.id_mjesta
    }
    Djelatnik.findByIdAndUpdate(req.params.id, uredjeniDjelatnika, (err, uredjeni) => {
        if (err) console.log(err)
        else console.log("Uspjesno azuriran djelatnik", uredjeni)
    })

    res.redirect("/djelatnici");
});

router.get("/edit/:id", (req, res) => {

    const id = req.params.id;
    console.log("ID DJELATNIKA JE : " + id);

    Djelatnik.findById(id, (err, djelatnici) => {
        console.log(djelatnici)
        Mjesto.find({}, (err, mjesta) => {
            if (err) { console.log(err) }
            else {
                res.render("editDjelatnik", {
                    mjesto: mjesta,
                    uredi: djelatnici
                });
            }
        })
    })
});


router.post("/", (req, res) => {
    console.log(req.body);

    const djelatnik = new Djelatnik({

        ime: req.body.ime,
        prezime: req.body.prezime,
        odjel: req.body.odjel,
        email: req.body.email,
        id_mjesta: req.body.id_mjesta

    });
    djelatnik.save()
        .then((result) => {
            console.log(result);
        })
        .catch((err) => console.log(err));
    console.log("Spremljno u bazu");
    res.redirect("/djelatnici");
});


module.exports = router;

