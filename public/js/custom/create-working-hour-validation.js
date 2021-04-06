function saveDescription() {
    var text = $('.ql-editor').html();
    var workingText = document.querySelector('input[name=workingText]');
    workingText.value = text;
}
FormValidation.formValidation(document.getElementById("workingForm"), {
    fields: {
        start_date: {
            validators: {
                checkIfRequired: {
                    message: 'Start Date is required',
                        callback: function(input) {
                            return !!input.value;
                        },
                }
            },
        },
        start_time: {
            validators: {
                checkIfRequired: {
                    message: 'Start Time is required',
                        callback: function(input) {
                            return !!input.value;
                        },
                },
            },
        },
        end_date: {
            validators: {
                checkIfRequired: {
                    message: 'End Date is required',
                        callback: function(input) {
                            return !!input.value;
                        },
                },
                notAfterNow: {
                    message: 'End Date must be earlier than Today',
                        callback: function(input) {
                            var start = Date.parse($("#end_date").val());
                            var end = Date.now();
                            return start<end;
                        },
                },
                startIsGreater: {
                    message: 'End Date must be greater than Start Date',
                        callback: function(input) {
                            var start = Date.parse($("#start_date").val()+" "+$("#start_time").val());
                            var end = Date.parse($("#end_date").val()+" "+$("#end_time").val());
                            return start<end;
                        },
                }
            },
        },
        end_time: {
            validators: {
                checkIfRequired: {
                    message: 'End Time is required',
                        callback: function(input) {
                            return !!input.value;
                        },
                },
                notAfterNow: {
                    message: 'End Time must be earlier than Today',
                        callback: function(input) {
                            var start = Date.parse($("#end_date").val()+" "+$("#end_time").val());
                            var end = Date.now();
                            return start<end;
                        },
                },
            },
        },
        workingText: {
            validators: {
                checkIfRequired: {
                    message: 'Work Description is required',
                        callback: function(input) {
                            return input.value !== "<p><br></p>";
                        },
                },
            },
        },
    },

    plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap(),
        alias: new FormValidation.plugins.Alias({
            checkIfRequired: 'callback',
            startIsGreater: 'callback',
            notAfterNow: 'callback'
       }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
    },
});
