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


function validate_reference(object) {

    object.formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            name: {
                validators: {
                    notEmpty: {
                        message: 'Please add your reference name!'
                    },
                    stringLength: {
                        min: 3,
                        max: 100,
                        message: 'The  name must be more than 3 and less than 100 characters long'
                    }
                }
            },
            position: {
                validators: {
                    notEmpty: {
                        message: 'Please specify your reference position !'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please add your reference phone number'
                    },
                    regexp: {
                        regexp: '^\([0-9])',
                        message: 'The value is not a valid phone number'

                    }
                }
            },
            email: {
                validators: {
                    emailAddress: {
                        message: 'The value is not a valid email address'
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'The value is not a valid email address'
                    }
                }
            }
        }
    });

}

function validate_interest(object) {

    object.formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            name: {
                validators: {
                    notEmpty: {
                        message: 'Please add your Title!'
                    },
                    stringLength: {
                        min: 3,
                        max: 20,
                        message: 'The school name must be more than 3 and less than 100 characters long'
                    }
                }
            },
            description: {
                validators: {
                    notEmpty: {
                        message: 'Please add your descrtiption !'
                    },
                    stringLength: {
                        min: 5,
                        max: 100,
                        message: 'The description must be more than 5 and less than 100 characters long'
                    }
                }
            }
        }
    });

}

function validate_skill(object) {
    object.formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Please add your Skill !'
                    },
                    stringLength: {
                        min: 3,
                        max: 20,
                        message: 'The school name must be more than 3 and less than 100 characters long'
                    }
                }
            },
            description: {
                validators: {
                    notEmpty: {
                        message: 'Please choose your level of your skill !'
                    }
                }
            }
        }
    });

}

function validate_language(object) {
    object.formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            language_id: {
                validators: {
                    notEmpty: {
                        message: 'Please choose your Language !'
                    }
                }
            },
            proficiency: {
                validators: {
                    notEmpty: {
                        message: 'Please choose your proficiency of your language !'
                    }
                }
            }
        }
    });
}

function validate_personal_info(object) {
    object.formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            status_id: {
                validators: {
                    notEmpty: {
                        message: 'Please choose your marital status !'
                    }
                }
            },
            birth_place: {
                validators: {
                    notEmpty: {
                        message: 'Please add your place of birth !'
                    }
                }
            },
            job: {
                validators: {
                    notEmpty: {
                        message: 'Please add your job !'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please add your phone number !'
                    },
                    regexp: {
                        regexp: '^\([0-9])',
                        message: 'The value is not a valid phone number'

                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'Please add your address !'
                    },
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please add your email !'
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'The value is not a valid email address'
                    }
                }
            }

        }
    });
}