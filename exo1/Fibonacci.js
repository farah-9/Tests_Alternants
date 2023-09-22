/* On définit une fonction qui calcule la somme des nombres pairs de la séquence de Fibonacci inférieurs à maxValeur */

function sommeFibonacciPair(maxValeur) {
    /* On initialise les deux premiers nombres de la séquence */
    let a = 1;
    let b = 2;
    /* On initialise la somme */
    let somme = 0;

    /* On boucle tant que b est inférieur à maxValeur */
    while (b <= maxValeur) {
        /* On teste si b est pair */
        if (b % 2 === 0) {
            /* Si b est pair, on l'ajoute à la somme */

            somme += b;
        }

        /* On met à jour a et b pour avancer dans la séquence */

        [a, b] = [b, a + b];
    }

    return somme;
}
/* On affiche le résultat */

const maxValeur = 4000000;
const resultat = sommeFibonacciPair(maxValeur);
console.log(
    'La somme des nombres pairs de la séquence de Fibonacci inférieurs à ' +
        maxValeur +
        ' ' +
        'est ' +
        ' ' +
        resultat +
        '.'
);
