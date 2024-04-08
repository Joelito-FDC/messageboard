$(document).ready(function() {
    if($('#profile-date').length) {
        $('#profile-date').datepicker();
        $('#profile-date').attr('required', false);
    }

    if($('#recip-list').length) {
        $('#recip-list').select2();
    }

    if($('#send-message-btn').length) {
        $('#send-message-btn').on('click', function(e) {
            let recipient = $('#recip-list').val();
            let message = $('#message').val();
            let linkUrl = $(e.target).data('linkUrl') + '/' + recipient;
            let linkRedirect = $(e.target).data('linkRedirect');

            $.ajax({
                method: 'POST',
                url: linkUrl,
                data: {
                    message
                },
                dataType: 'text',
                success: function (response) {
                    window.location.href = linkRedirect + '/' + recipient;
                },
                error: function (error) {
                    // console.log(error);
                }
            });
        });
    }

    if($('#send-thread-message-btn').length && $('#thread-message-list').length) {
        loadThread($('#thread-message-list').data('threadLink'));
        
        $('#send-thread-message-btn').on('click', function(e) {
            let linkUrl = $(e.target).data('threadSendLink');
            let message = $('#thread-message').val();

            $.ajax({
                method: 'POST',
                url: linkUrl,
                data: {
                    message
                },
                dataType: 'text',
                success: function (response) {
                    if(response == '_sent_') {
                        $('#thread-message').val('');
                        loadThread();
                        $('.next > a').on('click', function(e) {
                            console.log('Hello');
                        })
                    } 
                },
                error: function (error) {
                    // console.log(error);
                }
            });
        });
    }

    if($('#message-all-list').length && $('#message-list-compose-message').length) {
        console.log($('#message-all-list').data('messageListLink'));
        loadThread($('#message-all-list').data('messageListLink'));

        $('#message-list-compose-message').on('click', function() {
            window.location.href = $('#message-list-compose-message').data('newMessageLink');
        });
    }

    function loadThread(threadLink) {
        $.get(threadLink, function (response) {
            $('.message-list').html(response);
            $('.next > a').on('click', function(e) {
                e.preventDefault();
                
                let next = $('.next > a').attr('href');
                loadThread(next);
            });
        }).fail(function () {
            $('#message-list').html('<div class="text-center">Error fetching data.</div>');
        });
    }
})