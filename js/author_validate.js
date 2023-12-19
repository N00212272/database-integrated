 let submitBtn = document.getElementById('submit_btn');
 let firstNameInput = document.getElementById('firstName');
 let lastNameInput = document.getElementById('lastName');
 let linkInput = document.getElementById('link');
 
 
  let firstNameError = document.getElementById('firstName_error');
  let lastNameError = document.getElementById('lastName_error');
  let linkError = document.getElementById('link_error');
 
 
  const FIRSTNAME_REGEX = /^[a-zA-Z-' ]$/;
  const LASTNAME_REGEX = /^[a-zA-Z-' ]*$/;
 
  submitBtn.addEventListener('click', onSubmitForm);
 
  let errorExists = false;
 
  function showError(errorField, errorMessage) {
     errorExists = true;
     errorField.innerHTML = errorMessage;
  }
 
  function regexValid(regex, str) {
      return regex.test(str);
  }
 
  function resetValues() {
    firstNameError.innerHTML = "";
    lastNameError.innerHTML = "";
     linkError.innerHTML = "";
     errorExists = false;
  }
 
  function onSubmitForm(evt) {
     resetValues();

    if (firstNameInput.value === "") {
        showError(firstNameError, "The first name field is required.")
    }
    else if (!regexValid(FIRSTNAME_REGEX, firstNameInput.value)) {
        showError(firstNameError, "Only letters and white spaces are allowed.")
    }

     if (lastNameInput.value === "") {
        showError(lastNameError, "The last name field is required.")
    }
    else if (!regexValid(LASTNAME_REGEX, lastNameInput.value)) {
        showError(lastNameError, "Only letters and white spaces are allowed.")
    }

    if (linkInput.value === "") {
        showError(linkError, "The link field is required.")
    }

    if (errorExists) {
        evt.preventDefault();
    }
  }
