"use strict";

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
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					// category1: {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Category is required'
					// 		}
					// 	}
					// },
					// sub_categories1: {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Sub-category is required'
					// 		}
					// 	}
					// }
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
					// payment_type: {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Project Payment Type is required'
					// 		}
					// 	}
					// },
					// deadline: {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Project Deadline is required'
					// 		}
					// 	}
					// }
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
					// user_name: {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Your Name is required'
					// 		}
					// 	}
					// },
					// phone: {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Your Phone is required'
					// 		}
					// 	}
					// },
					// email: {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Your Email is required'
					// 		}
					// 	}
					// },
					// city: {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Your City is required'
					// 		}
					// 	}
					// },
					// street_01: {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Your Street Address is required'
					// 		}
					// 	}
					// },
					// province: {
					// 	validators: {
					// 		notEmpty: {
					// 			message: 'Your Province is required'
					// 		}
					// 	}
					// },
					// site_city: {
					// 	validators: {
					// 		checkIfRequired: {
					// 			message: 'Working City is required',
					// 			callback: function(input) {
					// 				return workingEqualsUser() || !!input.value;
					// 			},
					// 		}
					// 	}
					// },
					// site_street_01: {
					// 	validators: {
					// 		checkIfRequired: {
					// 			message: 'Working Street is required',
					// 			callback: function(input) {
					// 				return workingEqualsUser() || !!input.value;
					// 			},
					// 		}
					// 	}
					// },
					// site_province: {
					// 	validators: {
					// 		checkIfRequired: {
					// 			message: 'Working Perish is required',
					// 			callback: function(input) {
					// 				return workingEqualsUser() || !!input.value;
					// 			},
					// 		}
					// 	}
					// }
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
							text: "Sorry, looks like there are some errors detected, please try again.",
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
