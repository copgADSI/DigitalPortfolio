let alertDOM = document.querySelector('.alert-success')
console.log(alertDOM);

const showAlert = () => {
    setTimeout(() => {
        if (alertDOM !== null) {
            alertDOM.classList.add('alertHide')
            window.location.href('/')
        }
    }, 2000);
}

showAlert()