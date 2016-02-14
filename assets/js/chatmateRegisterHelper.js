var chatmateRegisterHelper = {
    /**
     * Init functions
     * @returns {undefined}
     */
    init: function () {
        // Listener on userName
        $('input[name=username]').keyup(function (e) {
            chatmateRegisterHelper.checkExists($(this), 'username', $('input[name=username]').val());
        });
        $('input[name=username]').change(function (e) {
            chatmateRegisterHelper.checkExists($(this), 'username', $('input[name=username]').val());
        });

        // Listener on eMail
        $('input[name=eMail]').keyup(function (e) {
            chatmateRegisterHelper.checkExists($(this), 'eMail', $('input[name=eMail]').val());
        });
        $('input[name=eMail]').change(function (e) {
            chatmateRegisterHelper.checkExists($(this), 'eMail', $('input[name=eMail]').val());
        });
        
        // Listener password
        $('input[name=password]').keyup(function (e) {
            if(chatmateRegisterHelper.checkField('password', $('input[name=password]').val(), $('input[name=passwordRepeat]').val())) {
                $(this).removeAttr('class').addClass('existsFalse form-control');
                $('input[name=passwordRepeat]').removeAttr('class').addClass('existsFalse form-control');
            } else {
                $(this).removeAttr('class').addClass('existsTrue form-control');
                $('input[name=passwordRepeat]').removeAttr('class').addClass('existsTrue form-control');
            }
        });
        $('input[name=password]').change(function (e) {
            if(chatmateRegisterHelper.checkField('password', $('input[name=password]').val(), $('input[name=passwordRepeat]').val())) {
                $(this).removeAttr('class').addClass('existsFalse form-control');
                $('input[name=passwordRepeat]').removeAttr('class').addClass('existsFalse form-control');
            } else {
                $(this).removeAttr('class').addClass('existsTrue form-control');
            }
        });
        
        // Listener password
        $('input[name=passwordRepeat]').keyup(function (e) {
            if(chatmateRegisterHelper.checkField('password', $('input[name=password]').val(), $('input[name=passwordRepeat]').val())) {
                $(this).removeAttr('class').addClass('existsFalse form-control');
                $('input[name=password]').removeAttr('class').addClass('existsFalse form-control');
            } else {
                $(this).removeAttr('class').addClass('existsTrue form-control');
                $('input[name=password]').removeAttr('class').addClass('existsTrue form-control');
            }
        });
        $('input[name=passwordRepeat]').change(function (e) {
            if(chatmateRegisterHelper.checkField('password', $('input[name=password]').val(), $('input[name=passwordRepeat]').val())) {
                $(this).removeAttr('class').addClass('existsFalse form-control');
                $('input[name=password]').removeAttr('class').addClass('existsFalse form-control');
            } else {
                $(this).removeAttr('class').addClass('existsTrue form-control');
            }
        });
        
        // AGB
        $('input[name=agb]').change(function() {
            chatmateRegisterHelper.checkField('agb', $('input[name=agb]').prop('checked'));
        });
    },
    /**
     * Current request
     * @type Boolean
     */
    pendingRequest: false,
    /**
     * Check if exists
     * @param [type} requestedElement
     * @param {type} type
     * @param {type} value
     * @returns {undefined}
     */
    checkExists: function (requestedElement, type, value) {
        // Check if there already is a pending request
        if(chatmateRegisterHelper.pendingRequest) {
            // Abort then
            chatmateRegisterHelper.pendingRequest.abort();
        }
        // Init a new request
        chatmateRegisterHelper.pendingRequest = $.ajax({
            type: 'POST',
            url: '/api/checkExists',
            dataType: "JSON",
            data: {'type': type, 'value': value},
            success: function (data) {
                if(data.exists && chatmateRegisterHelper.checkField(type, value)) {
                    $(requestedElement).removeAttr('class').addClass('existsTrue form-control');
                } else {
                    $(requestedElement).removeAttr('class').addClass('existsFalse form-control');
                }
            }
        });
    },
    /**
     * Check if is valid email
     * @param {type} emailAddress
     * @returns {Boolean}
     */
    isValidEmailAddress: function(emailAddress) {
        // REGEX pattern for a simple eMail validity check
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    },
    /**
     * Check fields
     * @param {type} type
     * @param {type} value
     * @param {type} optional
     * @returns {Boolean}
     */
    checkField: function(type, value, optional) {
        // Contains teh returnValue later
        var returnValue = false;
        
        switch(type) {
            // Rules for the username
            case 'username':
                // Check if value greater than 0
                if(value.length > 0) {
                    returnValue = true;
                }
                break;
            // Rules for the eMail
            case 'eMail':
                returnValue = chatmateRegisterHelper.isValidEmailAddress(value);
                break;
            // Case for the password
            case 'password':
                if(value.length > 0 && value === optional) {
                    returnValue = true;
                }
                break;
            case 'agb':
                // Dobule negative- automatic cast to bool
                returnValue = !!value;
                break;
        }
        
        
        if($('.existsFalse').length >= 4 && $('input[name=agb]').prop('checked')) {
            $('button[name=submitRegister]').attr('disabled', false);
        } else {
            $('button[name=submitRegister]').attr('disabled', 'disabled');
        }
        
        // Return the returnValue
        return returnValue;
    }
};

$(document).ready(function () {
    chatmateRegisterHelper.init();
});