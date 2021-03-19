"use strict";

// const { Collapse } = require("bootstrap");
//Initialize validator for dynamic changes
var CategoryFV;
var CertificateFV;
var ReferencFv;
const skills_category = {
    validators: {
        notEmpty: {
            message: 'Category is required'
        }
    }
}

const sub_categories = {
    validators: {
        notEmpty: {
            message: 'Sub-category is required',
            callback: function(input) {
						$("").text(input.value);
                        const subArray = JSON.parse(input.value);
				        subArray.forEach((element,index) => {
						$("#skill").append(element.value + ",");
								
        });
        	return !!input.value;
		},
    }
}
}

const experienceValidator = {
    validators: {
        notEmpty: {
            message: 'Experience is required',
             callback: function(input) {
									$("#experience").text(input.value);
									return !!input.value;
								},

        },
        digits: {
            message: 'Value must be numeric and cannot contain decimal'
        }
    }
}
const certificateValidator = {
    validators: {
        notEmpty: {
            message: 'Certificate is required',
            

        },
        file: {
            extension: 'jpeg,jpg,png,pdf,doc,docx',
            type: 'image/jpeg,image/png,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            maxSize: 4194304,   // 4096 * 1024
            message: 'The selected file is not valid or exceeded the size limit.'
        }
    }
}

const referal_name = {
    validators: {
        notEmpty:{
            message: 'Referable Name is required'
        }
    }
}

const referal_email = {
    validators: {
        notEmpty:{
            message: 'Referable Email is required'
        }
    }
}

const referal_phone = {
    validators:{
        notEmpty:{
            message: 'Referable phone is required'
        }
    }
}

// Class definition
var KTWizard1 = function () {
    // Base elements
    var _wizardEl;
    var _formEl;
    var _wizardObj;
    var _validations = [];

    // Private functions
    var _initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/


        // Step 1
        CategoryFV = FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    'skills_category': skills_category,
                    'sub_categories': sub_categories,
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    }),
                    alias: new FormValidation.plugins.Alias({
						 notEmpty: 'callback',
					}),
                }
            }
        );
        _validations.push(CategoryFV);

        // Step 2
        CertificateFV = FormValidation.formValidation(
            _formEl,
            {
                fields: {
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    }),
                      alias: new FormValidation.plugins.Alias({
						 notEmpty: 'callback',
					}),
                }
            }
        );
        _validations.push(CertificateFV);

        // Step 3
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    educationinstutional_name: {
                        validators: {
                            notEmpty: {
                                message: 'Education Instutional Name is required',
                                callback: function(input) {
									$("#educationname").text(input.value);
									return !!input.value;
								},

                            }
                        }
                    },
                    degree: {
                        validators: {
                            notEmpty: {
                                message: 'Degree type is required',
                                callback: function(input) {
									$("#educationdegree").text(input.value);
									return !!input.value;
								},
                            }
                        }
                    },
                    start_date: {
                        validators: {
                            notEmpty: {
                                message: 'Start Date is required',
                                callback: function(input) {
									$("#educationstartdate").text(input.value);
									return !!input.value;
								},
                            }
                        }
                    },
                      end_date: {
                        validators: {
                            notEmpty: {
                                message: 'End Date is required',
                                callback: function(input) {
									$("#educationenddate").text(input.value);
									return !!input.value;
								},
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
                     alias: new FormValidation.plugins.Alias({
						 notEmpty: 'callback',
					}),
                }
            }
        ));

        // Step 4
        ReferencFv = FormValidation.formValidation(
            _formEl,
            {
             fields: {
                 'referal_name': referal_name,
                 'referal_email': referal_email,
                 'referal_phone' : referal_phone,
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    }),
                     alias: new FormValidation.plugins.Alias({
						 notEmpty: 'callback',
					}),
                }
            }
        );
        _validations.push(ReferencFv);

        /* step 5 */
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    personal_description: {
                        validators: {
                            notEmpty: {
                                message: 'Personal description is required',
                                callback: function(input) {
									$("#description").text(input.value);
									return !!input.value;
								},
                            }
                        }
                    },
                    hours: {
                        validators: {
                            notEmpty: {
                                message: 'Hours is required',
                                callback: function(input) {
									$("#hours").text(input.value);
									return !!input.value;
								},
                            }
                        }
                    },
                    police_report:{
                         validators: {
                            notEmpty: {
                                
                                callback: function(input) {
									$("#policereport").text(input.value);
									return !!input.value;
								},
                            }
                        }

                    },

                      is_travelling:{
                         validators: {
                            notEmpty: {
                                
                                callback: function(input) {
									$("#istravelling").text(input.value);
									return !!input.value;
								},
                            }
                        }

                    },
                    totaldistance:{
                         validators: {
                            notEmpty: {
                                
                                callback: function(input) {
									$("#totaldistance").text(input.value);
									return !!input.value;
								},
                            }
                        }

                    },
                      working_days:{
                         validators: {
                            notEmpty: {
                                
                                callback: function(input) {
									
                                    const subArray = JSON.parse(input.value);
				                    subArray.forEach((element,index) => {
						            $("#workingdays").append(element.value + ",");
				                    });
									return !!input.value;
								},
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
                     alias: new FormValidation.plugins.Alias({
						 notEmpty: 'callback',
					}),
                }
            }
        ));

        //step 6
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    profile: {
                        validators: {
                            notEmpty: {
                                message: 'Profile image is required'
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
                    }), alias: new FormValidation.plugins.Alias({
						 notEmpty: 'callback',
					}),
                }
            }
        ));

      

        // step 7
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    street: {
                        validators: {
                            notEmpty: {
                                message: 'Street is required',
                                callback: function(input) {
									$("#workingStreet1Id").text(input.value);
									return !!input.value;
								},
                            }
                        }
                    },
                        parishes: {
                        validators: {
                            notEmpty: {
                                message: 'Parishes is required',
                                callback: function(input) {
									$("#workingPerishId").text(input.value);
									return !!input.value;
								},
                            }
                        }
                    },
                    postal_code: {
						validators: {
							checkIfRequired: {
								callback: function(input) {
									$("#workingPostalCodeId").text(input.value);
								},
							}
						}
					},
                    
                    cities: {
                        validators: {
                            notEmpty: {
                                message: 'City is required',
                                callback: function(input) {
									
									$("#workingCityId").text($("select[name='cities'] option:selected").text());
									return workingEqualsUser() || !!input.value;
								},
                            }
                        }
                    },
                    house_number:
                    {
                        validators: {
							checkIfRequired: {
								callback: function(input) {
									$("#workingHouseNumberId").text(input.value);
								},
							}
						}
                    },
                    
                    loccountry: {
                        validators: {
                            notEmpty: {
                                message: 'Country is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //eleInvalidClass: '',
                        eleValidClass: '',
                    }), 
                    alias: new FormValidation.plugins.Alias({
						 notEmpty: 'callback',
					}),
                }
            }
        ));
        
      
    }

    var _initWizard = function () {
        // Initialize form wizard
        _wizardObj = new KTWizard(_wizardEl, {
            startStep: 1, // initial active step number
            clickableSteps: false  // allow step clicking
        });

        // Validation before going to next page
        _wizardObj.on('change', function (wizard) {
            if (wizard.getStep() > wizard.getNewStep()) {
                return; // Skip if stepped back
            }

            // Validate form before change wizard step
            var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

            if (validator) {
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        wizard.goTo(wizard.getNewStep());

                        KTUtil.scrollTop();
                    } else {
                        Swal.fire({
                            text: "Please fill all the required fields.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light"
                            }
                        }).then(function () {
                            KTUtil.scrollTop();
                        });
                    }
                });
            }

            return false;  // Do not change wizard step, further action will be handled by he validator
        });

        // Change event
        _wizardObj.on('changed', function (wizard) {
            KTUtil.scrollTop();
            LoadWizardData(wizard);
        });

        // Submit event
        _wizardObj.on('submit', function (wizard) {
            Swal.fire({
                text: "All is good! Please confirm the form submission.",
                icon: "success",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, submit!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-primary",
                    cancelButton: "btn font-weight-bold btn-default"
                }
            }).then(function (result) {
                if (result.value) {
                    _formEl.submit(); // Submit form
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been submitted!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-primary",
                        }
                    });
                }
            });
        });
    }

    return {
        // public functions
        init: function () {
            _wizardEl = KTUtil.getById('kt_wizard');
            _formEl = KTUtil.getById('kt_form');

            _initValidation();
            _initWizard();
        }
    };
}();

jQuery(document).ready(function () {
    KTWizard1.init();
});

