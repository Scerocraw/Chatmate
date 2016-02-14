var chatmateClientHtml = {
    init: function () {
        // On "send" button click
        $('.inputRow button').on('click', function () {
            chatmateClientHtml.addMessage();
        });

        // Or "enter" keypress
        $('#messageToSend').keypress(function (e) {
            if (e.which == 13) {
                chatmateClientHtml.addMessage();
                return false;
            }
        });
        
        if($('.inputRow button').length > 0) {
            // Also add event for refresihing chat
            setInterval(function() {
                chatmateClientHtml.apiRequest('getMessages');
            }, 500);
        }
    },
    /**
     * Add message
     * @returns {undefined}
     */
    addMessage: function () {
        // Make api call
        chatmateClientHtml.apiRequest('sendMessage', $('#messageToSend').val());

        // Clear the input field
        $('#messageToSend').val('');
    },
    /**
     * API Handling
     * @param {type} type
     * @param {type} param
     * @returns {undefined}
     */
    apiRequest: function (type, param) {
        switch (type) {
            // SendMessage handling
            case 'sendMessage':
                // Add a message
                $.ajax({
                    url: "/api/addMessage",
                    data: {'message': param},
                    type: "POST",
                    dataType: "POST",
                    success: function (response) {
                        
                    }
                });
                break;
            case 'getMessages':
                // Add a message
                $.ajax({
                    url: "/api/getMessages",
                    type: "POST",
                    dataType: "JSON",
                    success: function (response) {
                        if(typeof response !== "undefined") {
                            $(response).each(function(key, message) {
                                // Get message
                                $('#messages').append($('<li>').text("[" + message.postTime + "] " + message.user + ": " + message.message));
                            });
                        }
                    }
                });
                break;
        }
    }
};

$(document).ready(function () {
    chatmateClientHtml.init();
});