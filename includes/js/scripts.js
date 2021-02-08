// Calculate days of checkin and checkouts
function totalDays() {
    const oneDay=1000*60*60*24;
    let checkin = new Date(document.getElementById('checkin').value);
    let checkout = new Date(document.getElementById('checkout').value);
    let days = (checkout - checkin) / oneDay;
    if(days <= 0){
        document.getElementById('date-error').classList.remove('hidden');
        document.getElementById('num-days').value = 0;
    } else {
        document.getElementById('date-error').classList.add('hidden');
        document.getElementById('num-days').value = days;
    }
}

// Error on no input data for text input
function inputError(id){
    let inputValue = document.getElementById(id).value;
    if(inputValue == ""){
        document.getElementById(id).classList.add('error-input');
    } else {
        document.getElementById(id).classList.remove('error-input');
    }
}

// Add to date to check that the date is not prior to the current date.