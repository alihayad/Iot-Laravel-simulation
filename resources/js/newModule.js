document.getElementById('createModuleForm').addEventListener('submit', async (event) => {
    event.preventDefault();

    const formData = new FormData(event.target);
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    try {
        const response = await axios.post('/modules', data);
        let successMessage = document.querySelector('#formResult');

        successMessage.classList.add('text-success');
        successMessage.classList.add('text-center');
        successMessage.innerText = "A new Module added";
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach((errorMessage) => {
            errorMessage.style.display = 'none';
        });

        const inputs = document.querySelectorAll('.create-module-inputs');
        inputs.forEach(input => {
            input.classList.remove('is-invalid');
        });
        event.target.reset();

    } catch (error) {
        let formResult = document.querySelector(`#formResult`);

        if (typeof error.response !== 'undefined' && error.response.status === 422) {
            const errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach((errorMessage) => {
                errorMessage.style.display = 'none';
            });

            formResult.innerText = "";
            let errors = error.response.data.errors;
            for (const [field, messages] of Object.entries(errors)) {
                let input = document.querySelector(`#${field}`);
                input.classList.add('is-invalid');
                let errorMessage = document.createElement('div');
                errorMessage.classList.add('invalid-feedback');
                errorMessage.classList.add('error-message');
                errorMessage.innerText = messages[0];
                input.after(errorMessage);
            }
        } else {
            formResult.classList.add('text-danger');
            formResult.classList.add('text-center');
            formResult.innerText = "An error occured!";
        }
    }
});