"use strict";

var CategoryProjectWizardFV;
const skills_category_project_wizard = {
    validators: {
        notEmpty: {
            message: 'Category is required'
        }
    }
}

const sub_categories_project_wizard = {
    validators: {
        notEmpty: {
            message: 'Sub-category is required'
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
        CategoryProjectWizardFV = FormValidation.formValidation(
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
        _validations.push(CategoryProjectWizardFV);

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					description: {
						validators: {
							notEmpty: {
								message: 'Project Description is required'
							}
						}
					},
					name: {
						validators: {
							notEmpty: {
								message: 'Task Title is required'
							}
						}
					},
					type: {
						validators: {
							notEmpty: {
								message: 'Project Type is required'
							}
						}
					},
					payment_type: {
						validators: {
							notEmpty: {
								message: 'Project Payment Type is required'
							}
						}
					},
					deadline: {
						validators: {
							notEmpty: {
								message: 'Project Deadline is required'
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

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					user_name: {
						validators: {
							notEmpty: {
								message: 'Your Name is required'
							}
						}
					},
					phone: {
						validators: {
							notEmpty: {
								message: 'Your Phone is required'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Your Email is required'
							}
						}
					},
					city: {
						validators: {
							notEmpty: {
								message: 'Your City is required'
							}
						}
					},
					street_01: {
						validators: {
							notEmpty: {
								message: 'Your Street Address is required'
							}
						}
					},
					province: {
						validators: {
							notEmpty: {
								message: 'Your Province is required'
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
		console.log(workingEqualsUser());
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					site_city: {
						validators: {
							notEmpty: {
								message: 'Location City is required'
							}
						}
					},
					site_street_01: {
						validators: {
							notEmpty: {
								message: 'Location Street is required'
							}
						}
					},
					site_province: {
						validators: {
							notEmpty: {
								message: 'Location Province is required'
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
