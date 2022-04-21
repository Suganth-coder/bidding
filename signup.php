<?php session_start() ?>

<div class="container-fluid">
	<form action="" id="signup-frm">
		<div class="form-group">
			<label for="" class="control-label">Name</label>
			<input type="text" name="name" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Contact</label>
			<input type="text" name="contact" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Address</label>
			<textarea cols="30" rows="3" name="address" required="" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Email</label>
			<input type="email" name="email" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Username</label>
			<input type="text" name="username" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" required="" class="form-control">
		</div>


		<button class="button btn btn-primary btn-sm">Create</button>
		<button class="button btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>

	</form>
</div>

<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>

<script src=
    "https://smtpjs.com/v3/smtp.js">
  </script>
  
<script type="text/javascript">
    function sendEmail() {
      Email.send({
        Host: "smtp.gmail.com",
        Username: "srn200.rr@gmail.com",
        Password: "Sriram(98765)",
        To: 'phoneitags@gmail.com',
        From: "srn200.rr@gmail.com",
        Subject: "One Time Verification for bidding system",
        Body: "Your OTP for bidding website is 454523",
      })
        .then(function (message) {
        //   alert("mail sent successfully")
        });
    }
  </script>
  
<script>


	$('#signup-frm').submit(function(e){


		let otp = parseInt(prompt("[Check your email. Otp has been sent successfully!]\nEnter your otp: "));

		if (otp == 454523){

			e.preventDefault()
			start_load()
			if($(this).find('.alert-danger').length > 0 )
				$(this).find('.alert-danger').remove();
			$.ajax({
				url:'admin/ajax.php?action=signup',
				method:'POST',
				data:$(this).serialize(),
				error:err=>{
					console.log(err)
			$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');

				},
				success:function(resp){
					if(resp == 1){
						location.reload();
					}else{
						$('#signup-frm').prepend('<div class="alert alert-danger">Email already exist.</div>')
						end_load()
					}
				}
			})

		}else{
			alert("Otp verification failed");
		}
	})
</script>