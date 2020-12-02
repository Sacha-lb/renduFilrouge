//On lance les fonctions qui récupere les résultats et le chat au chargement de la page
getChat();
getResult();

//On relance ces fonctions chaque 3 seconde
const chatRefresh = window.setInterval(getChat, 3000);
const resultRefresh = window.setInterval(getResult, 3000);

//Lance la fonction lors du click sur le bouton
$("#submit").click(function (e) {
    e.preventDefault();
    //récupere les données néecessaire a la bdd
    let sondage = $('#sondage').text();
    let message = $('#chat').val();
    let user = $('#user').text();
    //Lance un fonction ajax qui envoie les message dans la bdd puis rafraichis le chat
    $.ajax({
        url: "../Public/resultat.php?task=write&user_id=" + user + "&sondage_id=" + sondage + "&text=" + message,
        dataType: "json",
        method: "POST",
        success: function (response) {
            getChat();
        }
    })
})


function getChat() {
    //récupere les données néecessaire a la bdd
    let sondage = $('#sondage').text();
    //Lance un fonction ajax qui récupere les messages dans la bdd puis les affiches a l'endroit indiquée
    $.ajax({
        url: "../Public/resultat.php?task=get&sondage_id=" + sondage,
        dataType: "json",
        method: "POST",
        success: function (response) {
            $('#zoneMessage').html("");
            response.forEach(chat => {
                $('#zoneMessage').append("<div class='message'><p><b>" + chat.user_pseudo + " : </b>" + chat.message_content + "</p></div>");
            });
        }
    })
}

function getResult() {
    //récupere les données néecessaire a la bdd
    let sondage = $('#sondage').text();
    //Lance un fonction ajax qui récupere les résultats dans la bdd puis les affiches a l'endroit indiquée
    $.ajax({
        url: "../Public/resultat.php?task=result&sondage_id=" + sondage,
        dataType: "json",
        method: "POST",
        success: function (response) {
            $('#zoneReponse').html("");
            $('#zoneReponse').append("<ul>");
            response.forEach(result => {
                $('#zoneReponse').append("<li>" + result.sondageReponse_reponse + " : " + result.sondageReponse_reponseScore + " Votes");
            });
            $('#zoneReponse').append("</ul>");
        }
    })
}