function getParameterByName(name) {
    const url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }

  function calculateAge(dateOfBirth) {
    const dateOfBirthArray = dateOfBirth.split('-');
    const birthYear = parseInt(dateOfBirthArray[0]);
    const birthMonth = parseInt(dateOfBirthArray[1]);
    const birthDay = parseInt(dateOfBirthArray[2]);
  
    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();
    const currentMonth = currentDate.getMonth() + 1;
    const currentDay = currentDate.getDate();
  
    let age = currentYear - birthYear;
  
    if (currentMonth < birthMonth || (currentMonth === birthMonth && currentDay < birthDay)) {
      age--;
    }
  
    return age;
  }
  
  let userName = getParameterByName("name");
  let email = getParameterByName("email");
  let contact = getParameterByName("celular");
  let birthDay = getParameterByName("nascimento")
  let sex = getParameterByName("sexo");



  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("name-data").textContent = userName;
    document.getElementById("email-data").textContent = email;
    document.getElementById("contact-data").textContent = contact;
    document.getElementById("age-data").textContent = `${calculateAge(birthDay)} anos` 
    document.getElementById('person').src = `./assets/${sex}.png`;
  });  
  
  
  
  
  