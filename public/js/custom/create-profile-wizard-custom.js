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
            message: 'Sub-category is required'
        }
    }
}

const experienceValidator = {
    validators: {
        notEmpty: {
            message: 'Experience is required'
        },
        digits: {
            message: 'Value must be numeric and cannot contain decimal'
        }
    }
}
const certificateValidator = {
    validators: {
        notEmpty: {
            message: 'Certificate is required'
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
                    })
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
                    })
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
                                message: 'Educationinstutional Name is required'
                            }
                        }
                    },
                    degree: {
                        validators: {
                            notEmpty: {
                                message: 'Degree type is required'
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
                    })
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
                    })
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
                                message: 'Personal descrption is required'
                            }
                        }
                    },
                    hours: {
                        validators: {
                            notEmpty: {
                                message: 'Hours is required'
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
                    })
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
                    })
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
                                message: 'Street is required'
                            }
                        }
                    },
                    
                    City: {
                        validators: {
                            notEmpty: {
                                message: 'City is required'
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
                    })
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

