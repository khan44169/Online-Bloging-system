$(document).ready(function () {
  function check_signup() {
    var username = $('#username').val();
    console.log($(username));
    var userEmail = $('#signupemail').val();
    var password = $('#password').val();
    var cpassword = $('#cpassword').val();
    if (
      username == '' &&
      userEmail == '' &&
      password == '' &&
      cpassword == ''
    ) {
      text = '*please fill all information';
      document.getElementById('form_fill').style.color = '#ff0000';
      document.getElementById('form_fill').innerHTML = text;
      console.log('hello');
      return false;
    } else {
      return true;
    }
  }
  $('#signupForm').submit(function (event) {
    if (check_signup()) {
      return true;
    } else {
      event.preventDefault();
    }
  });
  function staticModal(modalId) {
    modal1 = '#' + modalId + '';
    $(modal1).modal({
      backdrop: 'static',
      keyboard: true,
      show: true,
    });
  }
  var checkSignpmodal = document.getElementById('inp').value;
  console.log(checkSignpmodal);
  // const a = document.getElementById('username').value;
  // console.log(a);
  if (checkSignpmodal == true) {
    staticModal('signupModal');
  }
  //login modal show after submission of sigun modal
  var modal_login_show = document.getElementById('login_modal_show').value;
  console.log(modal_login_show);
  if (modal_login_show) {
    $('#loginModal').modal({
      show: true,
    });
  }

  //making login modal static
  checkLoginmodal = document.getElementById('stacticLoginmodal').value;
  console.log(checkLoginmodal);
  if (checkLoginmodal == true) {
    staticModal('loginModal');
  }
});
