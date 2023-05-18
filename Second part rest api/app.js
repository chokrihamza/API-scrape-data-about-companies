///////////////////////////////////////////////////////
///  import all the dependencies                  /////
///////////////////////////////////////////////////////

const express = require('express');
const { JSDOM } = require('jsdom');
const axios = require('axios');
const app = express();
///////////////////////////////////////////////////////
/// Decare constant                               /////
///////////////////////////////////////////////////////
const PORT = process.env.PORT || 3000;
const defaultAddress = "https://www.moneyhouse.ch";

const companyData = (company) => `https://www.moneyhouse.ch/fr/search?q=${company}&status=1&tab=companies`;



///////////////////////////////////////////////////
///  Method Get : @ '/'                      //////
///    retrun: json empty                    /////
/////////////////////////////////////////////////

app.get('/', (req, res) => {
  return res.json({ data: "Enter Company Name to get data" });
})


///////////////////////////////////////////////////
///  Method Get : @ '/:companyName'         //////
///    retrun:company data                   /////
/////////////////////////////////////////////////


app.get('/:companyName', (req, res) => {
  let companyName = req.params.companyName;

  // declaration of the functions async 
  try {
    ///////////////////////////////////////////////////////
    ///  get link of the company to scrap it's data   /////
    ///////////////////////////////////////////////////////
    async function getData(company) {
      const links = [];
      const companyName = companyData(company);
      const { data } = await axios.get(companyName);
      const dom = new JSDOM(data);
      dom.window.document.querySelectorAll('table .l-grid a').forEach(link => {
        let match = link.href;
        if (/\d$/.test(match)) {
          match = defaultAddress.concat(match);
          links.push(match);
        }
      });
      ///////////////////////////////////////////////////
      ///  bunch of company data with promises      /////
      /////////////////////////////////////////////////
      let result = {

      }


      if (links[0] != undefined) {

        const { data } = await axios.get(links[0]);

        let dom1 = new JSDOM(data);
        let data_company = [];
        if (dom1.window.document.querySelector(".company-name").textContent.trim()) {
          result.companyName = dom1.window.document.querySelector(".company-name").textContent.trim();
        }
        if (dom1.window.document.querySelector("div.chnr").textContent.trim()) {
          result.Numero_registre_du_commerce = dom1.window.document.querySelector("div.chnr").textContent.trim();
        }

        if (dom1.window.document.querySelector("div.branch").textContent.trim()) {
          result.Secteur = dom1.window.document.querySelector("div.branch").textContent.trim()
        }
        if (dom1.window.document.querySelector(".point.section--small li").textContent.trim()) {
          result.A_propos = dom1.window.document.querySelector(".point.section--small li").textContent.trim();
        }

        if (dom1.window.document.querySelector(".company-status.company-info-block span.vertical-middle.margin-right-5").textContent.trim()) {
          result.statut = dom1.window.document.querySelector(".company-status.company-info-block span.vertical-middle.margin-right-5").textContent.trim();
        }



        dom1.window.document.querySelectorAll(".l-grid-cell.l-one-third.l-mobile-one-whole p").forEach(element => {

          data_company.push((element.textContent).trim());


        });
        result.Inscription_au_registre_du_commerce = data_company[1];
        result.Forme_juridique = data_company[2];
        result.Siège_social_de_entreprise == data_company[3];
        result.Registre_du_commerce = data_company[4];
        result.TVA_IDE = data_company[0];





      }

      return result;
    }

    getData(companyName).then((value) => {
      if (value) {
        return res.send(value);
      } else {
        return res.json({ 'Search': 'Not Found' });
      }


    })

  } catch (error) {
    console.log(error, error.message);
  }


});



///////////////////////////////////////////////////
///  app  listen in port 3000                /////
/////////////////////////////////////////////////

app.listen(PORT, () => {
  console.log(`server is running on PORT:${PORT}`);
});
