document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault(); 
    const form = this;
    const formMessage = document.getElementById('form-message');
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        formMessage.style.display = 'block';
        if (data.success) {
            formMessage.style.color = 'green';
            formMessage.textContent = 'Message sent successfully!';
            form.reset();
        } else {
            formMessage.style.color = 'red';
            formMessage.textContent = 'Error: ' + data.message;
        }
    })
    .catch(error => {
        formMessage.style.display = 'block';
        formMessage.style.color = 'red';
        formMessage.textContent = 'Error: Failed to send message.';
        console.error('Error:', error);
    });
});