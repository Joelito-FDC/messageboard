$(document).ready(function() {
    // if($('#UserRegistrationForm').length) {
    //     $('#UserRegistrationForm').on('submit', function(e) {
    //         let userName = $('#UserName');
    //         let userEmail = $('#UserEmail');
    //         let userPassword = $('#UserPassword');
    //         let userConfirmPassword = $('#UserConfirmPassword');
    //         let infoStatus = $('#registration-info-status');
    
    //         if(userName.val().length < 5 || userName.val().length > 20) {
    //             infoStatus.html(`<div class="alert alert-warning" role="alert">Name should be 5 to 20 characters.</div>`);
    //             e.preventDefault();
    //         } else if(userPassword.val() != userConfirmPassword.val()) {
    //             infoStatus.html(`<div class="alert alert-warning" role="alert">Password did not match.</div>`);
    //             e.preventDefault();
    //         } 
    //     });
    // }

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

    if($('#message-srch-btn').length) {
        $('#message-srch-btn').on('click', function() {
            srchConvo($(this).data('threadLink'), $('#message-srch-input').val());
        });   
    }

    if($('#message-list-srch-btn').length) {
        $('#message-list-srch-btn').on('click', function() {
            srchConvo($(this).data('threadLink'), $('#message-list-srch-input').val());
        })
    }

    function srchConvo(linkUrl, searchWord) {
        $.ajax({
            method: 'POST',
            url: linkUrl,
            data: {
                searchWord
            },
            dataType: 'text',
            success: function (response) {
                $('.message-list').html(response);

                if($('.next').length && !$('.next > a').length) {
                    $('.next').html('');
                } else {
                    console.log($('.next > a').attr('href'));

                    $('.next > a').on('click', function(e) {
                        e.preventDefault();
                        
                        let next = $('.next > a').attr('href');  
                        
                        srchConvo(next);
                    });
                }
            }
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

            if($('.message-delete-btn').length) {
                let elDelBtn = $('.message-delete-btn');

                for(let elCount = 0; elCount < elDelBtn.length; elCount++) {
                    $(elDelBtn[elCount]).on('click', function() {
                        let user = $(this).data('deleteUser');
                        let recipient = $(this).data('deleteRecipient');
                        let linkUrl = $(this).data('removeLink');

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
                            }
                        });
                    });
                }
            }

            if(('.msg-clickable-container').length) {
                let msgClickable = $('.msg-clickable-container');

                for(let count = 0; count < msgClickable.length; count++) {
                    $(msgClickable[count]).on('click', function() {
                        window.location.href = $(this).data('redirectLink');
                    })
                }
            }

            if($('.show-more-msg-content').length) {
                let showMore = $('.show-more-msg-content');
                let showLess = $('.show-less-msg-content');
                let showMoreContainer = $('.msg-more-container');
                let showLessContainer = $('.msg-less-container');

                for(let count = 0; count < showMore.length; count++) {
                    $(showMore[count]).on('click', function(e) {
                        e.preventDefault();
                        $(showMoreContainer[count]).removeClass('d-none').addClass('d-block');
                        $(showLessContainer[count]).removeClass('d-block').addClass('d-none');
                    });

                    $(showLess[count]).on('click', function(e) {
                        e.preventDefault();
                        $(showLessContainer[count]).removeClass('d-none').addClass('d-block');
                        $(showMoreContainer[count]).removeClass('d-block').addClass('d-none');
                    })
                }
            }
        }).fail(function () {
            $('#message-list').html('<div class="text-center">Error fetching data.</div>');
        });
    }
});
