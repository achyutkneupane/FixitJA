// By Achyut Neupane

"use strict";

var CategoryProjectWizardFV;
const skills_category_project_wizard = {
    validators: {
		checkIfRequired: {
			message: 'Category is required',
			callback: function(input) {
				$("#catsId").text(input.value);
				return !!input.value;
			},
		}
    }
}

const sub_categories_project_wizard = {
    validators: {
		checkIfRequired: {
			message: 'Sub-Category is required',
			callback: function(input) {
				const subArray = JSON.parse(input.value);
				subArray.forEach((element,index) => {
						$("#subCatsId").append(element.value + "<br>");
				});
				return !!input.value;
			},
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
                    }),

					alias: new FormValidation.plugins.Alias({
						checkIfRequired: 'callback',
					}),
                }
            }
        );
        _validations.push(CategoryProjectWizardFV);

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					name: {
						validators: {
							checkIfRequired: {
								message: 'Task Title is required',
								callback: function(input) {
									$("#taskTitleId").text(input.value);
									return !!input.value;
								},
							}
						}
					},
					description: {
						validators: {
							checkIfRequired: {
								message: 'Task Description is required',
								callback: function(input) {
									$("#taskDescriptionId").text(input.value);
									return !!input.value;
								},
							}
						}
					},
					type: {
						validators: {
							checkIfRequired: {
								message: 'Project type is required',
								callback: function(input) {
									$("#taskTypeId").text($("select[name='type'] option:selected").text());
									return !!input.value;
								},
							}
						}
					},
					payment_type: {
						validators: {
							checkIfRequired: {
								message: 'Payment type is required',
								callback: function(input) {
									$("#paymentTypeId").text($("select[name='payment_type'] option:selected").text());
									return !!input.value;
								},
							}
						}
					},
					deadline: {
						validators: {
							checkIfRequired: {
								message: 'Project Deadline is required',
								callback: function(input) {
									$("#projectDeadlineId").text($("select[name='deadline'] option:selected").text());
									return !!input.value;
								},
							}
						}
					},
					is_client_on_site: {
						validators: {
							checkIfRequired: {
								callback: function(input) {
									$("#onSiteId").text($("select[name='is_client_on_site'] option:selected").text());
								},
							}
						}
					},
					is_repair_parts_provided: {
						validators: {
							checkIfRequired: {
								callback: function(input) {
									$("#repairPartId").text($("select[name='is_repair_parts_provided'] option:selected").text());
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
						checkIfRequired: 'callback',
					}),
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
							checkIfRequired: {
								message: 'Your Name is required',
								callback: function(input) {
									$("#userNameId").text(input.value);
									return !!input.value;
								},
							}
						}
					},
					phone: {
						validators: {
							checkIfRequired: {
								message: 'Your Phone is required',
								callback: function(input) {
									$("#userPhoneId").text(input.value);
									return !!input.value;
								},
							}
						}
					},
					email: {
						validators: {
							checkIfRequired: {
								message: 'Your Email is required',
								callback: function(input) {
									$("#userEmailId").text(input.value);
									return !!input.value;
								},
							}
						}
					},
					city: {
						validators: {
							checkIfRequired: {
								message: 'Your City is required',
								callback: function(input) {
									$("#userCityId").text($("select[name='city'] option:selected").text());
									return !!input.value;
								},
							}
						}
					},
					street_01: {
						validators: {
							checkIfRequired: {
								message: 'Your Street Address is required',
								callback: function(input) {
									$("#userStreet1Id").text(input.value);
									return !!input.value;
								},
							}
						}
					},
					street_02: {
						validators: {
							checkIfRequired: {
								callback: function(input) {
									$("#userStreet2Id").text(input.value);
								},
							}
						}
					},
					house_number: {
						validators: {
							checkIfRequired: {
								callback: function(input) {
									$("#userHouseNumberId").text(input.value);
								},
							}
						}
					},
					postal_code: {
						validators: {
							checkIfRequired: {
								callback: function(input) {
									$("#userPostalCodeId").text(input.value);
								},
							}
						}
					},
					parish: {
						validators: {
							checkIfRequired: {
								message: 'Your Parish is required',
								callback: function(input) {
									$("#userParishId").text(input.value);
									return !!input.value;
								},
							}
						}
					},
					site_city: {
						validators: {
							checkIfRequired: {
								message: 'Working City is required',
								callback: function(input) {
									$("#workingCityId").text($("select[name='site_city'] option:selected").text());
									return workingEqualsUser() || !!input.value;
								},
							}
						}
					},
					site_street_01: {
						validators: {
							checkIfRequired: {
								message: 'Working Street is required',
								callback: function(input) {
									$("#workingStreet1Id").text(input.value);
									return workingEqualsUser() || !!input.value;
								},
							}
						}
					},
					site_street_02: {
						validators: {
							checkIfRequired: {
								callback: function(input) {
									$("#workingStreet2Id").text(input.value);
								},
							}
						}
					},
					site_house_number: {
						validators: {
							checkIfRequired: {
								callback: function(input) {
									$("#workingHouseNumberId").text(input.value);
								},
							}
						}
					},
					site_postal_code: {
						validators: {
							checkIfRequired: {
								callback: function(input) {
									$("#workingPostalCodeId").text(input.value);
								},
							}
						}
					},
					site_parish: {
						validators: {
							checkIfRequired: {
								message: 'Site Parish is required',
								callback: function(input) {
									$("#workingParishId").text(input.value);
									return workingEqualsUser() || !!input.value;
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
						checkIfRequired: 'callback',
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
                    //enable select option to get data in request
                    enableCategorySelectOptions();
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
