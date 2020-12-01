getChat();
getResult();
const interval = window.setInterval(getChat, 3000);


$("#submit").click(function(e){
    e.preventDefault();
    let sondage = $('#sondage').text();
    let message = $('#chat').val();
    let user = $('#user').text();
    $.ajax({
        url:"../Public/resultat.php?task=write&user_id="+user+"&sondage_id="+sondage+"&text="+message,
        dataType:"json",
        method:"POST",
        success:function(response){
            getChat();
        }
    })
})

function getChat() {
    let sondage = $('#sondage').text();
    $.ajax({
        url:"../Public/resultat.php?task=get&sondage_id="+sondage,
        dataType:"json",
        method:"POST",
        success: function(response){
            $('#zoneMessage').html("");
            response.forEach(chat => {
                $('#zoneMessage').append("<div class='message'><p><b>" + chat.user_pseudo + " : </b>" + chat.message_content + "</p></div>");
            });
        }
    })
}

function getResult() {
    let sondage = $('#sondage').text();
    $.ajax({
        url:"../Public/resultat.php?task=result&sondage_id="+sondage,
        dataType:"json",
        method:"POST",
        success: function(response){
            $('#zoneReponse').html("");
            $('#zoneReponse').append("<ul>");
            response.forEach(result => {
                $('#zoneReponse').append("<li>" + result.sondageReponse_reponse + " : " + result.sondageReponse_reponseScore + " Votes");

            });
            $('#zoneReponse').append("</ul>");
        }
    })
}