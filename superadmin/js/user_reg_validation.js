   $(document).ready(function() {
    $('#reg_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            user_login: {
                validators: {
                        stringLength: {
                        min: 3,
                    },
                        notEmpty: {
                        message: 'Please Enter Login ID like AD ID'
                    }
                }
            },
            contact_name: {
              validators:{
                stringLength:{
                  min:5,
                  max:15,
                  message:'Please enter at least 5 characters and no more than 15'
                },

                notEmpty:{
                  message:'User Full Name'
                }
              }
            },
            user_contact: {
               validators:{
                stringLength:{
                  min:11,
                  max:11,
                  message:'Please enter 11 digits number'
                },

                notEmpty:{
                  message:'User Phone Number'
                }
              }
            },

            user_mail: {
                validators: {
                    notEmpty: {
                        message: 'Enter user email address'
                    },
                    emailAddress: {
                        message: 'Please enter a valid email address'
                    }
                }
            },

           bu_mail: {
              validators: {
                    notEmpty: {
                        message: 'If multiple B.U. email address separated by comma'
                    }
                }
            },

            user_office_id: {
               validators:{
                stringLength:{
                  min:7,
                  max:9,
                  message:'Please enter at least 7 characters and no more than 9'
                },

                notEmpty:{
                  message:'valid Office Id'
                }
              }
            },

            user_location: {
              validators: {
                    notEmpty: {
                        message: 'Choose a  B.U. location of user'
                    }
                }
            },

             user_dept: {
              validators: {
                    notEmpty: {
                        message: 'Choose a department of user'
                    }
                }
            },

         

             photo: {
              validators: {
                    notEmpty: {
                        message: 'Choose only .jpeg or .png'
                    }
                }
            },


            }
        })



            
});