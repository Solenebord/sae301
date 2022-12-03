liste = recupCookie("panier") //recupere le cookie  sous forme de chaine de caractere
if (liste!="")montab = JSON.parse(liste) // transforme la chaine  en tableau JSON
else montab =Array() // si il n'y a pas de tableau dans le cookie alors créer le tableau
console.log(montab)
document.getElementById('liste').value=JSON.stringify(montab); // sauver montab pour le formulaire



var totalgeneral=0
montab.forEach(uneinfo => {

    html = `<tr id="${uneinfo.id}">
    <td>${uneinfo.quantite}</td>
    <td>${uneinfo.article}</td>
    <td><span class="prix">${uneinfo.prix * uneinfo.quantite}</span>€</td>
    </tr>`;

    document.getElementById('zone').innerHTML += html
    totalgeneral += uneinfo.prix * uneinfo.quantite
})
document.getElementById('total').innerHTML = totalgeneral