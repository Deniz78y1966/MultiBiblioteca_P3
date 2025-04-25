$(document).ready(function () {
    function loadMessages() {
        $.ajax({
            url: 'includes/load_messages.php',
            success: function (data) {
                $('#chat-box').html(data);
            }
        });
    }

    $('#chat-form').on('submit', function (e) {
        e.preventDefault();
        const message = $('#message').val();

        $.post('includes/send_message.php', { message: message }, function () {
            $('#message').val('');
            loadMessages();
        });
    });

    loadMessages();
    setInterval(loadMessages, 3000);
});

