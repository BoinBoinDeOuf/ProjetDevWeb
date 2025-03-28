document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(event.target);

    fetch('register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('message').innerText = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
