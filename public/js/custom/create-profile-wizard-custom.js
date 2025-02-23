"use strict";

// const { Collapse } = require("bootstrap");
//Initialize validator for dynamic changes
var CategoryFV;
var CertificateFV;
var ReferencFv;
var ProfileFV;
const skills_category = {
    validators: {
        notEmpty: {
            message: 'Category is required',
            callback: function(input) {
                return !!input.value;
            },
        }
    }
}

const sub_categories = {
    validators: {
        notEmpty: {
            message: 'Sub-Category is required',
            callback: function(input) {

                if (input.value.length > 0) {
                    const subArray = JSON.parse(input.value);


                    subArray.forEach((element, index) => {
                        $("#skill").append(element.value + ", ");
                    });
                }


                const subArray = JSON.parse(input.value);
                subArray.forEach((element, index) => {
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
        file: {
            extension: 'jpeg,jpg,png,pdf,doc,docx',
            type: 'image/jpeg,image/png,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            maxSize: 4194304, // 4096 * 1024
            message: 'The selected file is not valid or exceeded the size limit.'
        }
    }
}

const profileValidation = {
    validators: {
        notEmpty: {
            message: 'Profile is required',
            callback: function(input) {
                return !!input.value;
            },
        },
        file: {
            extension: 'jpeg,jpg,png',
            type: 'image/jpeg,image/jpg,image/png',
            maxSize: 2097152, // 2048 * 1024
            message: 'The selected file is not valid'
        }
    }
}

const referal_name = {
    validators: {
        notEmpty: {
            message: 'Referral Name is required',
            callback: function(input) {
                return !!input.value;
            },
        }
    }
}

const referal_email = {
    validators: {
        emailAddress: {
            message: 'The value is not a valid email address'
        }
    }
}

const referal_phone = {
    validators: {
        notEmpty: {
            message: 'Referral phone is required',
            callback: function(input) {
                return !!input.value;
            }
        },
        phone: {
            message: ' The input is not a valid for phone number'
        }
    }
}



// Class definition
var KTWizard1 = function() {
    // Base elements
    var _wizardEl;
    var _formEl;
    var _wizardObj;
    var _validations = [];

    // Private functions
    var _initValidation = function() {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/


        // Step 1
        CategoryFV = FormValidation.formValidation(
            _formEl, {
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
            _formEl, {
                fields: {},
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
            _formEl, {
                fields: {
                    educationinstutional_name: {
                        validators: {
                            notEmpty: {
                                message: 'Education Institutional Name is required',
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
                                message: 'Degree is required',
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
                                message: 'Start Date is required with End Date',
                                callback: function(input) {
                                    $("#educationstartdate").text(input.value);
                                    if($("#selectenddate").val() != '')
                                    {
                                        return !!input.value;
                                    }
                                    else
                                        return true;
                                },
                            },
                            dateMatch: {
                                message: 'Start date cannot be greater than End date',
                                callback: function(input) {
                                    $("#educationstartdate").text(input.value);
                                    var startDate = new Date(input.value);
                                    var endDate = new Date($("#selectenddate").val());
                                    var nowDate = new Date();
                                    if(!!input.value)
                                    {
                                        if(startDate.setHours(0, 0, 0, 0) >= endDate.setHours(0,0,0,0)) {
                                            return false;
                                        }
                                    }
                                    else
                                    {
                                        return true;
                                    }
                                },
                            }
                        }
                    },
                    end_date: {
                        validators: {
                            notEmpty: {
                                message: 'End Date is required with Start Date',
                                callback: function(input) {
                                    $("#educationenddate").text(input.value);
                                    if($("#selectstartdate").val() != '')
                                    {
                                        return !!input.value;
                                    }
                                    else
                                        return true;
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
                        dateMatch: 'callback'
                    }),
                }
            }
        ));

        // Step 4
        ReferencFv = FormValidation.formValidation(
            _formEl, {
                fields: {
                    'referal_name': referal_name,
                    'referal_email': referal_email,
                    'referal_phone': referal_phone,
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
            _formEl, {
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
                    police_report: {
                        validators: {
                            notEmpty: {
                                message: "This field must be selected",
                                callback: function(input) {
                                    if (input.value === "1") {
                                        var confirmStatus = "Yes"
                                        $("#policereport").text(confirmStatus);
                                    }
                                    if (input.value === "0") {
                                        var confirmStatus = 'No'
                                        $("#policereport").text(confirmStatus);
                                    }
                                    return !!input.value;
                                },
                            }
                        }

                    },

                    is_travelling: {
                        validators: {
                            notEmpty: {
                                message: "This field must be selected",
                                callback: function(input) {
                                    if (input.value == 1) {
                                        var confirmStatus = "Yes"
                                        $("#istravelling").text(confirmStatus);
                                    }
                                    if (input.value == 0) {
                                        var confirmStatus = 'No'
                                        $("#istravelling").text(confirmStatus);
                                    }

                                    return !!input.value;
                                },
                            }
                        }

                    },
                    total_distance: {
                        validators: {
                            notEmpty: {
                                callback: function(input) {
                                    $("#totaldistance").text(input.value);
                                    return !!input.value;
                                },
                            }
                        }

                    },
                    working_days: {
                        validators: {
                            notEmpty: {
                                message: "Working days must be selected",
                                callback: function(input) {
                                    const subArray = JSON.parse(input.value);
                                    subArray.forEach((element, index) => {
                                        $("#working_days").append(element.value + ",");
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

        ProfileFV = FormValidation.formValidation(
            _formEl, {
                fields: {
                    'profile': profileValidation,
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
        _validations.push(ProfileFV);


        //Location 
        _validations.push(FormValidation.formValidation(
            _formEl, {
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
                    parish: {
                        validators: {
                            notEmpty: {
                                message: "Parish must be selected",
                                callback: function(input) {
                                    $('#userParishSelect').on('change', function() {
                                        var parish = $("#userParishSelect  option:selected").text();
                                        $("#workingPerishId").text(parish);
                                    })
                                    var parish = $("#userParishSelect  option:selected").text();
                                    $("#workingPerishId").text(parish);


                                    return !!input.value;

                                }
                            }
                        }
                    },
                    cities: {
                        validators: {
                            notEmpty: {
                                message: "Cities must be selected",
                                callback: function(input) {
                                    $('#userCitySelect').on('change', function() {
                                        var city = $("#userCitySelect  option:selected").text();
                                        $("#workingCityId").text(city);
                                    })
                                    var city = $("#userCitySelect  option:selected").text();
                                    $("#workingCityId").text(city);


                                    return !!input.value;

                                }
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

        // step 7
        _validations.push(FormValidation.formValidation(
            _formEl, {
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
                                    $("#workingPerishId").text($("select[name='cities'] option:selected").text());
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

                    // cities: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'City is required',
                    //             callback: function (input) {
                    //                 $("#workingCityId").text($("select[name='cities'] option:selected").text());
                    //                 return !!input.value;
                    //             },
                    //         }
                    //     }
                    // },
                    house_number: {
                        validators: {
                            notEmpty: {
                                callback: function(input) {
                                    $("#workingHouseNumberId").text(input.value);
                                },
                            }
                        }
                    },

                    loccountry: {
                        validators: {
                            notEmpty: {
                                message: 'Country is required',
                                callback: function(input) {
                                    return !!input.value;
                                },
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

    var _initWizard = function() {
        // Initialize form wizard
        _wizardObj = new KTWizard(_wizardEl, {
            startStep: 3, // initial active step number
            clickableSteps: false // allow step clicking
        });

        // Validation before going to next page
        _wizardObj.on('change', function(wizard) {
            if (wizard.getStep() > wizard.getNewStep()) {
                return; // Skip if stepped back
            }

            // Validate form before change wizard step
            var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

            if (validator) {
                validator.validate().then(function(status) {
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
                        }).then(function() {
                            KTUtil.scrollTop();
                        });
                    }
                });
            }

            return false; // Do not change wizard step, further action will be handled by he validator
        });

        // Change event
        _wizardObj.on('changed', function(wizard) {
            KTUtil.scrollTop();
            LoadWizardData(wizard);
        });

        // Submit event
        _wizardObj.on('submit', function(wizard) {
            Swal.fire({
                html: "<label>All is good! By submitting this form, you automatically agree to our&nbsp;</label><a href='/termsandconditions' target='_blank'>Terms & Conditions</a>",
                icon: "success",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, I agree & submit!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-primary",
                    cancelButton: "btn font-weight-bold btn-default"
                }
            }).then(function(result) {
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
        init: function() {
            _wizardEl = KTUtil.getById('kt_wizard');
            _formEl = KTUtil.getById('kt_form');

            _initValidation();
            _initWizard();
        }
    };
}();

jQuery(document).ready(function() {
    KTWizard1.init();
});