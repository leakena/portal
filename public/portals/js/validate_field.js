function jsValidator(object_form, urlRemote, user_id) {

    object_form.formValidation({

        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Please add a  user id!'
                    },
                    stringLength: {
                        min: 3,
                        max: 15,
                        message: 'The userid must be more than 3 and less than 15 characters long'
                    },
                    /*remote: {
                        message: 'This User ID is already in used, please choose another ID!',
                        url: urlRemote,
                        type: 'POST',
                        data: {
                            type: 'username',
                            user_id: function () {
                                if(user_id != null) {
                                    return user_id;
                                } else {
                                    return null;
                                }
                            },
                            _token: $('input[name=_token]').val()
                        }
                    }*/
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 8,
                        max: 15,
                        message: 'The password must be at least 8 and less than 100 characters long'
                    }
                    /*identical: {
                     field: 'password_confirmation',
                     message: 'The password and its confirm are not the same'
                     }*/
                }
            },
            password_confirmation: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'Please input a valid email address'
                    }
                }
            },

            first_name: {
                validators: {
                    notEmpty: {
                        message: 'Please input your first name!'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'Please input your last name!'
                    }
                }
            },

            tel: {
                validators: {
                    notEmpty: {
                        message: 'Please input your phone number!'
                    }
                    /*phone: {
                     country: 'country',
                     message: 'The value is not valid %s phone number'
                     }*/
                }
            },
            gender_id: {

                validators: {
                    notEmpty: {
                        message: 'Please select your gender!'
                    }
                }
            },

            country: {
                validators: {
                    notEmpty: {
                        message: 'Please choose your country!'
                    }
                }
            },

            birth_date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'DD-MM-YYYY',
                        message: 'Please input a valid date!'
                    }
                }
            }
        }
    })

}