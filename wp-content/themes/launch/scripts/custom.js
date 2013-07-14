/* Custom JS */
$(document).ready (function() {
var url = window.location.href;
var host = window.location.host;
if(url.indexOf('http://' + host + '/dk') != -1) {
   $('body').addClass('danish');
}
});

$(document).ready (function() {
	$('body.danish input[name=email]').val('Email');
	$('body.danish input[name=submit]').val('Send');
});

$(document).ready (function() {
$('body input#email')
  .on('focus', function(){
      var $this = $(this);
      if($this.val() == 'Email'){
          $this.val('');
      }
  })
  .on('blur', function(){
      var $this = $(this);
      if($this.val() == ''){
          $this.val('Email');
      }
  });
 });
 
$(document).ready (function() {
	$("span#response:contains('invalid')").addClass('errorMessage');
	$("span#response:contains('confirm')").addClass('successMessage');
	
	if($('body').hasClass('danish'))
{
	$('body.danish #response.errorMessage').text("E-mail-adressen er ugyldig");
} 
	if ($('body').hasClass('danish'))
{
	$('body.danish #response.successMessage').text("Sejt! Tjek din mail for at bekræftige.");	
}
});


$(document).ready(function() {
var width =  window.innerWidth || document.body.clientWidth;
var height = window.innerHeight || document.body.clientHeight;
if ((width <= 480)) {
 	//iPhone
 	$('body').addClass('iPhonePortraitMode');
} else if ((width <= 768)) {
 	//iPad
 	$('body').removeClass('iPhonePortraitMode');
 	$('body').addClass('iPadPortraitMode');
} else if ((width >= 800)) {
	//Laptop & Desktop
	$('body').removeClass('iPadPortraitMode');
} 

});