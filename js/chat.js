getChat();
const interval = window.setInterval(getChat, 3000);


$("#submit").click(function(e){
    e.preventDefault();
    let sondage = $('#sondage').text();
    let message = $('#chat').val();
    let user = $('#user').text();
    $.ajax({
        url:"../Public/chat.php?task=write&user_id="+user+"&sondage_id="+sondage+"&text="+message,
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
        url:"../Public/chat.php?task=get&sondage_id="+sondage,
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