let validationButton = document.getElementById('validation-button');
let celNumber = document.getElementById('celnumber');
let validationCodeContainer = document.getElementById('validation-code-container');
var csrfToken = document.querySelector('input[name="_token"]').value;

validationButton.addEventListener('click', (event) => {
    event.preventDefault();

    let url = `/send-sms/${celNumber.value}`;

    fetch(url,
        {
            headers: {
                "X-CSRF-TOKEN": csrfToken
            },
            method: 'post'
        })
        .then((response) => {
            if (response.ok) {
                alert('O código foi enviado com sucesso!');

                validationCodeContainer.classList.remove('d-none');
            }
        });
});