$(function() {

    // Get the form.
    var form = $('#contact-form');

    // Get the messages div.
    var formMessages = $('.form-messege');

    // Set up an event listener for the contact form.
    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        // Serialize the form data.
        var formData = $(form).serialize();

        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
            success: function(response) {
                // console.log(response);
                //
                // $(formMessages).removeClass('alert-danger');
                // $(formMessages).addClass('alert-success');
                // //set text
                // $(formMessages).text(response['success']);

                clearErrors()

                const itemSubmit = document.getElementById('submit')

                itemSubmit.insertAdjacentHTML('afterend', '<div class="alert alert-success mt-10" id="success">Yêu cầu đã gửi đi thành công!</div>')

                // Clear the form.
                $('#contact-form input,#contact-form textarea').val('');
            }, error: function(error) {
                const errors = error.responseJSON['errors'];
                const firstItem = Object.keys(errors)[0]
                const firstItemDOM = document.getElementById(firstItem)
                const firstErrorMessage = errors[firstItem][0]

                // scroll to the error message
                firstItemDOM.scrollIntoView({behavior: "smooth",block: "center"});

                clearErrors()

                // show the error message
                firstItemDOM.insertAdjacentHTML('afterend', `<div class="text-danger">${firstErrorMessage}</div>`)

                // highlight the form control with the error
                firstItemDOM.classList.add('border', 'border-danger')

                // Set the message text.
                // if (error.responseText !== '') {
                //     forEach(error.responseJSON['errors'] as $err){
                //         $(formMessages).text($err);
                //     }
                //
                // } else {
                //     $(formMessages).text('Oops! An error occured and your message could not be sent.');
                // }
            }
        })
        // Submit the form using AJAX.
        // $.ajax({
        //     type: 'POST',
        //     url: $(form).attr('action'),
        //     data: formData
        // })
        //     .done(function(response) {
        //         // Make sure that the formMessages div has the 'success' class.
        //         $(formMessages).removeClass('error');
        //         $(formMessages).addClass('success');
        //
        //         // Set the message text.
        //         $(formMessages).text(response['success']);
        //
        //         // Clear the form.
        //         $('#contact-form input,#contact-form textarea').val('');
        //     })
        //     .fail(function(response) {
        //         // Make sure that the formMessages div has the 'error' class.
        //         $(formMessages).removeClass('success');
        //         $(formMessages).addClass('error');
        //
        //         $(formMessages).text(response);
        //         console.log(response);
        //         // console.log(response['responseJSON'].errors['email']);
        //         // console.log(response['errors']);
        //
        //         // Set the message text.
        //         // if (data.responseText !== '') {
        //         //     $(formMessages).text(data.responseText);
        //         // } else {
        //         //     $(formMessages).text('Oops! An error occured and your message could not be sent.');
        //         // }
        //     });
        //

    });
    function clearErrors() {
        // remove all error messages
        const errorMessages = document.querySelectorAll('.text-danger')
        errorMessages.forEach((element) => element.textContent = '')

        // remove all form controls with highlighted error text box
        const formControls = document.querySelectorAll('input, textarea')
        formControls.forEach((element) => element.classList.remove('border', 'border-danger'))
    }


});

