$(function () {
  var icpForm5770 = $('#icpsignup5770');
  if (icpForm5770.length == 1) {
    icpForm5770.on('submit', function () {
      fname = icpForm5770.find('[name="fields_fname"]');
      if (fname.val() == "") {
        fname.focus();
        alert("The Name field is required.");
        return false;
      }
      
      email = icpForm5770.find('[name="fields_email"]');
      if (email.val() == "") {
        email.focus();
        alert("The Email field is required.");
        return false;
      }
      return true;
    });
  }
});

var addthis_share = {
  url_transforms : {
    add: {
      source: 'addthis-email',
    }
  }
} 

