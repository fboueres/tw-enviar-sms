let celNumber = $('#celnumber');
const validationButton = $('#validation-button');
const validationCodeContainer = $('validation-code-container');

validationButton.on('click', (event) => {
    event.preventDefault();

    $.ajax({
        url: `/send-sms/${celNumber.val()}`,
        method: 'POST',
        headers: {
            "X-CSRF-TOKEN": $('input[name="_token"]').val(),
        },
        success: (response) => {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
            console.log('error');
        }
    });
});