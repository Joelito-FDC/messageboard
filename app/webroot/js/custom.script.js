$(document).ready(function() {
    if($('#profile-date').length) {
        $('#profile-date').datepicker();
        $('#profile-date').attr('required', false);
    }

    if($('#recip-list').length) {
        $('#recip-list').select2();
    }

    if($('#UserProfilePic').length) {
        $('#UserProfilePic').on('change', function(e) {
            let file = this.files[0];

            if(file) {
                let reader = new FileReader();
                
                reader.onload = function(event) {
                    $('#profile-img-preview').attr('src', event.target.result);
                };

                reader.readAsDataURL(file);
            }
        });
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
                    if(response == '_sent_') {
                        window.location.href = linkRedirect + '/' + recipient;
                    }
                },
                error: function (error) {
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
                        loadThread($('#thread-message-list').data('threadLink'));
                    } 
                },
                error: function (error) {
                }
            });
        });
    }

    if($('#message-all-list').length && $('#message-list-compose-message').length) {
        loadThread($('#message-all-list').data('messageListLink'));

        $('#message-list-compose-message').on('click', function() {
            window.location.href = $('#message-list-compose-message').data('newMessageLink');
        });
    }

    function loadThread(threadLink) {
        $.get(threadLink, function (response) {
            $('.message-list').html(response);

            if($('.next').length && !$('.next > a').length) {
                $('.next').html('');
            } else {
                $('.next > a').on('click', function(e) {
                    e.preventDefault();
                    
                    let next = $('.next > a').attr('href');       
    
                    loadThread(next);
                });
            }

            if($('#message-list-delete-btn').length && $('#message-all-list').length) {
                let user = $('#message-list-delete-btn').data('deleteUser');
                let recipient = $('#message-list-delete-btn').data('deleteRecipient');
                let linkUrl = $('#message-list-delete-btn').data('removeLink');

                $('#message-list-delete-btn').on('click', function() {
                    $.ajax({
                        method: 'POST',
                        url: linkUrl,
                        data: {
                            user,
                            recipient
                        },
                        dataType: 'text',
                        success: function (response) {
                            if(response == '_deleted_') {
                                loadThread($('#message-all-list').data('newMessageLink'));
                            }
                        },
                        error: function (error) {
                        }
                    });
                });
            }
        }).fail(function () {
            $('#message-list').html('<div class="text-center">Error fetching data.</div>');
        });
    }
})