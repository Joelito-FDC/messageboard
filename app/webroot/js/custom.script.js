
$(document).ready(function() {
    if($('#profile-date').length) {
        $('#profile-date').datepicker();
        $('#profile-date').attr('required', false);
    }

    if($('#recip-list').length) {
        $('#recip-list').select2();
    }

    if($('#send-message-btn').length) {
        $('#send-message-btn').on('click', sendMessage);
    
        function sendMessage(e) {
            let recipient = $('#recip-list').val();
            let sender = $(e.target).data('userId');
            let message = $('#message').val();
            let linkUrl = $(e.target).data('linkUrl');
            let linkRedirect = $(e.target).data('linkRedirect');

            $.ajax({
                method: 'POST', 
                url: linkUrl,
                data: {
                    sender,
                    recipient,
                    message
                },
                dataType: 'text',
                success: function(response) {
                    window.location.href = linkRedirect + '/' + recipient;
                }, 
                error: function(error) {
                    console.log(error);
                }
            })
        }
    }

    if($('#thread-message-list').length) {
        let threadLink = $('#thread-message-list').data('threadLink');

        $.get(threadLink, function(response) {
            $('#thread-message-list').html(response);
        }).fail(function() {
            $('#thread-message-list').html('<div class="text-center">Error fetching data.</div>');
        });
    }
})