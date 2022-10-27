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
                        name: {
                            required: true,
                            minlength: 3,
                        },
                        address: {
                            required: true,
                        },
                        phone: {
                            required: true,
                            maxlength: 20
                        },
                       
                        join_date: {
                            required: true
                        },
                        education: {
                            required: true,
                        },
                        email: {
                            required: true,
                        }
                    },
                    messages: {
                        name: {
                            required: "teacher name field is required",
                        },
                        address: {
                            required: "address is required"
                        },
                        phone: {
                            required: "phone field is required",
                            number: "phone filed must be number",
                            maxlength: "phone filed must not be more than 20 numbers"
                        },
                        join_date: {
                            required: "join date field is required"
                        },
                        education: {
                            required: "education field is required"
                        },
                        email: {
                            required: "email field is required"
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