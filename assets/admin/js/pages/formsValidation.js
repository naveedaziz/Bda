var FormsValidation=function(){return{init:function(){$("#form-validation").validate({errorClass:"help-block animation-slideDown",errorElement:"div",errorPlacement:function(e,t){t.parents(".form-group > div").append(e)},highlight:function(e){$(e).closest(".form-group").removeClass("has-success has-error").addClass("has-error");$(e).closest(".help-block").remove()},success:function(e){e.closest(".form-group").removeClass("has-success has-error");e.closest(".help-block").remove()},rules:{val_username:{required:true,minlength:3},first_name:{required:true,minlength:3},last_name:{required:true,minlength:3},val_last_name:{required:true,minlength:3},val_first_name:{required:true,minlength:3},val_email:{required:true,email:true},title:{required:true},password:{required:true,minlength:5},val_password:{required:true,minlength:5},val_confirm_password:{required:true,equalTo:"#val_password"},city:{required:true},val_skill:{required:true},val_website:{required:true,url:true},val_credit_card:{required:true,creditcard:true},val_digits:{required:true,digits:true},val_number:{required:true,number:true},val_range:{required:true,range:[1,1e3]},val_terms:{required:true}},messages:{val_username:{required:"Please enter a username",minlength:"Your username must consist of at least 3 characters"},first_name:{required:"Please enter a first name",minlength:"Your first name must consist of at least 3 characters"},last_name:{required:"Please enter a last name",minlength:"Your last name must consist of at least 3 characters"},val_first_name:{required:"Please enter a first name",minlength:"Your first name must consist of at least 3 characters"},val_last_name:{required:"Please enter a last name",minlength:"Your last name must consist of at least 3 characters"},val_email:"Please enter a valid email address",title:"Please enter a title.",val_password:{required:"Please provide a password",minlength:"Your password must be at least 5 characters long"},val_confirm_password:{required:"Please provide a password",minlength:"Your password must be at least 5 characters long",equalTo:"Please enter the same password as above"},city:"Please select city",val_skill:"Please select a skill!",val_website:"Please enter your website!",val_credit_card:"Please enter a valid credit card! Try 446-667-651!",val_digits:"Please enter only digits!",val_number:"Please enter a number!",val_range:"Please enter a number between 1 and 1000!",val_terms:"You must agree to the service terms!"}});$("#profile-setting").validate({errorClass:"help-block animation-slideDown",errorElement:"div",errorPlacement:function(e,t){t.parents(".form-group > div").append(e)},highlight:function(e){$(e).closest(".form-group").removeClass("has-success has-error").addClass("has-error");$(e).closest(".help-block").remove()},success:function(e){e.closest(".form-group").removeClass("has-success has-error");e.closest(".help-block").remove()},rules:{val_username:{required:true,minlength:3},val_first_name:{required:true,minlength:3},val_last_name:{required:true,minlength:3},val_password:{required:true,minlength:5},val_confirm_password:{required:true,equalTo:"#val_password"}},messages:{val_username:{required:"Please enter a username",minlength:"Your username must consist of at least 3 characters"},val_first_name:{required:"Please enter a first name",minlength:"Your first name must consist of at least 3 characters"},val_last_name:{required:"Please enter a last name",minlength:"Your last name must consist of at least 3 characters"},val_password:{required:"Please provide a password",minlength:"Your password must be at least 5 characters long"},val_confirm_password:{required:"Please provide a password",minlength:"Your password must be at least 5 characters long",equalTo:"Please enter the same password as above"}}});$("#masked_date").mask("99/99/9999");$("#masked_date2").mask("99-99-9999");$("#masked_phone").mask("(999) 999-9999");$("#masked_phone_ext").mask("(999) 999-9999? x99999");$("#masked_taxid").mask("99-9999999");$("#masked_ssn").mask("999-99-9999");$("#masked_pkey").mask("a*-999-a999")}}}()
$(function(){ FormsValidation.init(); TablesDatatables.init(); });