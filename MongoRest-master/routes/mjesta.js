const express = require('express');
const router = express.Router();
const Djelatnik = require('../models/djelatnik');
const Mjesto = require('../models/mjesto');

router.get("/", (req, res) => {
    Mjesto.find({}, (err, svaMjesta) => {
        if (err) console.log(err);
        else res.send(svaMjesta);
    });
});

router.get("/dodavanjeMjesta", (req, res) => {
    res.render("addMjesto");
});
router.post("/", (req, res) => {
    Mjesto.create({
        naziv: req.body.naziv
    }).then((result) => {
        res.send(result)
    })


});

router.delete("/delete/:id", (req, res, next) => {
    console.log("BRISEMO MJESTO S ID-om : " + req.params.id);
    Djelatnik.count({ id_mjesta: req.params.id }, (err, ress) => {
        if (err) {
            console.log(err);
        } else {
            if (ress > 0) {
                res.send("DJELATNIK S TIM MJESTOM POSTOJI" + req.params.id)
            } else
                Mjesto.findByIdAndRemove(req.params.id, (err, res) => {
                    if (err) {
                        console.log(err);
                    }
                    else
                        console.log("Mjesto izbrisano ");

                })
        }
    })

});

router.get("/edit/:id", (req, res) => {

    const id = req.params.id;
    console.log("ID MJESTA JE : " + id);

    Mjesto.findById(id, (err, mjesta) => {
        if (err) { console.log(err) }
        else {
            res.render("editMjesta", {
                uredi: mjesta,
            });
        }
    })
});

router.post("/edit/:id", (req, res) => {

    Mjesto.findByIdAndUpdate(req.params.id, req.body, (err, uredjeni) => {
        if (err) console.log(err)
        else console.log("Uspjesno azurirano mjesto", uredjeni)
    })

    res.send("Uspjesno azurirano mjesto");
});


module.exports = router;

