#!/usr/bin/env node    /* this line allows you to run the script directly with 'Node.js' from the command line. */

/* I import the node-fetch module, which is used to make HTTP requests from Node.js. */

import fetch from 'node-fetch';

async function getCheapestFuels() {
    /* try-catch block, where we try to execute the code and catch any errors if it fails. */
    try {
        /* I use the fetch function to make a GET request to the API. */
        const response = await fetch(
            'https://data.economie.gouv.fr/api/explore/v2.1/catalog/datasets/prix-des-carburants-en-france-flux-instantane-v2/records?limit=20'
        );
        const data = await response.json();

        /* I create an object that will contain the cheapest fuel prices for each region. */
        const regions = {};

        data.results.forEach((station) => {
            const region = station.region;
            const carburants_disponibles = station.carburants_disponibles;
            const prix = JSON.parse(station.prix)[0]['@valeur'];
            const adresse = station.adresse;

            /* I check if the region exists in the object, if not I create it. */

            if (!regions[region]) {
                regions[region] = {};
            }

            /* I check if the fuel is available in the region, if not I create it. */

            /* I check if the price is lower than the one already in the object, if so I replace it. */

            if (
                !regions[region][carburants_disponibles] ||
                prix < regions[region][carburants_disponibles].prix
            ) {
                /* If the above conditions are met, the fuel information is updated in the regions object. */
                regions[region][carburants_disponibles] = { prix, adresse };
            }
        });

        /* With this 'for loop' i gonna display the cheapest fuel prices for each region. */
        for (const region in regions) {
            console.log(region + ':');

            /* The loop now covers every type of fuel available in the region. */
            for (const carburants_disponibles in regions[region]) {
                const { prix, adresse } =
                    regions[region][carburants_disponibles];
                console.log(
                    `  ${carburants_disponibles} : ${prix}€ / ${adresse}`
                );
            }
        }
    } catch (error) {
        console.error("Une erreur s'est produite :", error);
    }
}

getCheapestFuels();
