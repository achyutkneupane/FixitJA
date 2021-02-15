document.addEventListener('DOMContentLoaded', function(e) {
    const demoForm = document.getElementById('demoform');
    const signupnButton = document.getElementById('signup');
    FormValidation.formValidation(demoForm, {
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    },
                    
                }
            },
			 
			email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
			phone: {
                validators: {
                    notEmpty: {
                        message: 'Phone is required'
                    },
                   
                }
            },
			user_type: {
                validators: {
                    notEmpty: {
                        message: 'Type address is required'
                    },
                   
                }
            },
			gender: {
                validators: {
                    notEmpty: {
                        message: 'Gender is required'
                    },
                   
                }
            },
			companyname: {
                validators: {
                    notEmpty: {
                        message: 'CompanyName is required'
                    },
                   
                }
            },

            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    stringLength: {
                        min: 8,
						// regex:[A-Z],      // must contain at least one uppercase letter
						regex:[0-9],

                        message: 'The password must have at least 8 characters'
                    },
                    different: {
                        message: 'The password cannot be the same as username',
                        compare: function() {
                            return demoForm.querySelector('[name="username"]').value;
                        }
                    }
                }
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
            }),
        },
    }).on('core.form.validating', function() {
        signupnButton.innerHTML = 'Validating ...';
    });

    signupnButton.addEventListener('click', function() {
        fv.validate().then(function(status) {
            signup.innerHTML = (status === 'Valid') ? 'Form is validated. Logging in ...' : 'Please try again';
        });
    });
});