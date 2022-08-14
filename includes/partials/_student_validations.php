<script>
            $(document).ready(function(){
                $.validator.setDefaults({
                    submitHandler: function () {
                        return true;
                    }
                });
                //validate student form
                $('#regForm').validate({
                    rules: {
                        f_name: {
                            required: true,
                            minlength: 3,
                        },
                        job: {
                            required: true,
                        },
                        work_location: {
                            required: true
                        },
                        f_address: {
                            required: true,
                        },
                        mobile: {
                            required: true,
                            number: true,
                            minlength: 11
                        },
                        stud_name: {
                            required: true
                        },
                        birth_date: {
                            required: true
                        },
                        birth_place: {
                            required: true
                        },
                        stud_address: {
                            required: true
                        },
                        year: {
                            required: true,
                            number: true,
                            maxlength: 4
                        }
                    },
                    messages: {
                        f_name: {
                            required: "father name field is required",
                            maxlength: "father name must be more than 50 characters long"
                        },
                        job: {
                            required: "job field is required",
                        },
                        work_location: {
                            required: "work location field is required"
                        },
                        f_address: {
                            required: "father address is required"
                        },
                        mobile: {
                            required: "mobile field is required",
                            number: "mobile filed must be number",
                            minlength: "mobile filed must be at least 11 numbers"
                        },
                        stud_name: {
                            required: "student name field is required"
                        },
                        birth_date: {
                            required: "date birth field is required"
                        },
                        birth_place: {
                            required: "birth place field is required"
                        },
                        stud_address: {
                            required: "student address field is required"
                        },
                        year: {
                            required: "year field is required",
                            number: "year field must be numbers",
                            maxlength: "year field must not be more than 4 numbers"
                        }

                    },
                    errorElement: 'span',
                    errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                    },
                    highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    }
                });
            });
        </script>