
   $('.carousel').carousel({
       //interval: 5000 //changes the speed
   });
   
   $(document).ready(function() {
	   $('#category-carousel-inner div:first').addClass('active');
   
    	// captcha code
		var a = Math.ceil(Math.random() * 10)+ '';
        var b = Math.ceil(Math.random() * 10)+ '';       
        var c = Math.ceil(Math.random() * 10)+ '';  
        var d = Math.ceil(Math.random() * 10)+ '';  
        var e = Math.ceil(Math.random() * 10)+ '';  
        var f = Math.ceil(Math.random() * 10)+ '';  
        var g = Math.ceil(Math.random() * 10)+ '';  
        var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
       
	   document.getElementById("txtCaptcha").value = code;
       document.getElementById("txtCaptcha").innerHTML = code;
   
   // varify captcha
   
   $( "#captch" ).keyup(function() {
	  
	var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
    var str2 = removeSpaces(document.getElementById('captch').value);
	 console.log(str1);
	 console.log(str2);
	//If a name is not specified, show an error
	if( (str1=="") || (str1!=str2)){   
	  $('#captcha-error').show();
	}else{
		 $('#captcha-error').hide();
	}
  });
   
   // validate signup form on keyup and submit
		
		$("#form-validation").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				username: {
					required: true,
					minlength: 2
				},
				company: "required",
				city: "required",
				category_name: "required",
				brand_name: "required",
				contact: {
					required: true,
					number: true
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"
			},
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy"
			}
		});
});


function changeImageSrc(src){
  $(".plarge").attr('src',src);
}

// Remove the spaces from the entered and generated code
    function removeSpaces(string)
    {
        return string.split(' ').join('');
    }
	
	
	function captchaConfirm(){
	var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
    var str2 = removeSpaces(document.getElementById('captch').value);
	//If a name is not specified, show an error
	if( (str1=="") || (str1!=str2)){ 
	 $('#captcha-error').show();  
		 return false
	}else{
		 $('#captcha-error').hide();
		return true;
	}
}