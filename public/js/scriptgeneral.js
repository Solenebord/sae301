/*liste = recupCookie("panier") //recupere le cookie  sous forme de chaine de caractere
if (liste.length!==null)montab = JSON.parse(liste) // transforme la chaine  en tableau JSON
else montab =Array() // si il n'y a pas de tableau dans le cookie alors créer le tableau
console.log(montab)

var panier = 0
montab.forEach(element => {   panier = 1* panier + parseInt(element.quantite) })

document.getElementById('panier').innerHTML = panier*/

//On récupère les cookies pour les mettre dans le tableau JSON montab
liste = recupCookie("panier")
if (liste!==null) {
    montab = JSON.parse(liste)
    console.log('Panier rempli')
    console.log(montab)
}
else {
    montab =Array()
    console.log('panier vide')

    document.getElementById('message').style.display="block"
    document.getElementById('table_panier').style.display="none"
    document.getElementById('panier_boutons').style.display="none"
}

//On marque combien de produits sont dans le panier (Header)
var panier =0
montab.forEach(element => { panier+= element.quantite })
if (document.getElementById('panier') !== null) {
    document.getElementById('panier').innerHTML = parseInt(panier);
}


function recupCookie(nom){

    if(document.cookie.length === 0)return null;

    var cookies = document.cookie.split("; "); //separe chaque parametre contenu dans le cookie
    cookies.forEach(element => {
        ligne=element.split("=");
        if(ligne[0]===nom) sortie =ligne[1]
        else sortie=null;
    })
    return sortie
}