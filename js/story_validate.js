let submitBtn = document.getElementById('submit_btn');
let headlineInput = document.getElementById('headline');
let shortHeadlineInput = document.getElementById('shortHeadline');
let subHeadingInput = document.getElementById('subHeading');
let articleInput = document.getElementById('article');
let summaryInput = document.getElementById('summary');
let dateInput = document.getElementById('date');
let timeInput = document.getElementById('time');

 let headlineError = document.getElementById('headline_error');
 let shortHeadlineError = document.getElementById('shortHeadline_error');
 let subHeadingError = document.getElementById('subHeading_error');
 let articleError = document.getElementById('article_error');
 let summaryError = document.getElementById('summary_error');
 let dateError = document.getElementById('date_error');
 let timeError = document.getElementById('time_error');

 const HEADLINE_REGEX = /^[a-zA-Z-' ]*$/;
 const SHORTHEADING_REGEX = /^[a-zA-Z-' ]*$/;
 const SUBHEADING_REGEX = /^[a-zA-Z-' ]*$/;
 const ARTICLE_REGEX = /^[a-zA-Z-' ]*$/;
 const SUMMARY_REGEX = /^[a-zA-Z-' ]*$/;
 const DATE_REGEX = /^(((((0[1-9])|(1\d)|(2[0-8]))-((0[1-9])|(1[0-2])))|((31-((0[13578])|(1[02])))|((29|30)-((0[1,3-9])|(1[0-2])))))-((20[0-9][0-9]))|(29-02-20(([02468][048])|([13579][26]))))$/;
 const TIME_REGEX = /^ *(1[0-2]|[1-9]):[0-5][0-9] *(a|p|A|P)(m|M) *$/;



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
    headlineError.innerHTML = "";
    shortHeadlineError.innerHTML = "";
    subHeadingError.innerHTML = "";
    articleError.innerHTML = "";
    summaryError.innerHTML = "";
    dateError.innerHTML = "";
    timeError.innerHTML = "";

    errorExists = false;
 }

 function onSubmitForm(evt) {
    resetValues();

   if (headlineInput.value === "") {
       showError(headlineError, "The headline is required.")
   }
   else if (!regexValid(HEADLINE_REGEX, headlineInput.value)) {
       showError(headlineError, "Only letters and white spaces are allowed.")
   }

    if (shortHeadlineInput.value === "") {
       showError(shortHeadlineError, "The short headline is required.")
   }
   else if (!regexValid(SHORTHEADING_REGEX, shortHeadlineInput.value)) {
       showError(shortHeadlineError, "Only letters and white spaces are allowed.")
   }

   if (subHeadingInput.value === "") {
       showError(subHeadingError, "The subheading is required.")
   }
   else if (!regexValid(SHORTHEADING_REGEX, subHeadingInput.value)) {
    showError(subHeadingError, "Only letters and white spaces are allowed.")
    }
    
    if (articleInput.value === "") {
        showError(articleError, "The article is required.")
    }
    else if (!regexValid(ARTICLE_REGEX, articleInput.value)) {
     showError(articleError, "Only letters and white spaces are allowed.")
     }

     if (summaryInput.value === "") {
        showError(summaryError, "The Summary is required.")
    }
    else if (!regexValid(SUMMARY_REGEX, summaryInput.value)) {
     showError(summaryError, "Only letters and white spaces are allowed.")
     }

     if (dateInput.value === "") {
        showError(dateError, "The date is required.")
    }
    else if (!regexValid(DATE_REGEX, dateInput.value)) {
     showError(dateError, "Only letters and white spaces are allowed.")
     }

     if (timeInput.value === "") {
        showError(timeError, "The time is required.")
    }
    else if (!regexValid(TIME_REGEX, timeInput.value)) {
     showError(timeError, "Only letters and white spaces are allowed.")
     }

   if (errorExists) {
       evt.preventDefault();
   }
 }