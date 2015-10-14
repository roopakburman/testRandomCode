$('#sendBtn').click(function() {
	var firstName = document.getElementById('first-name').value 
	var lastName = document.getElementById('last-name').value 
	var email = document.getElementById('email').value 
	var phone = document.getElementById('phone').value 
	var description = document.getElementById('description').value 
		$.ajax({
	  type: "POST",
	  url: "https://mandrillapp.com/api/1.0/messages/send.json",
	  data: {
		'key': 'pMkmakltdD0LqLjHSZqbyg',
		'message': {
		  'from_email': 'info@chimmera.com',
		  'to': [
			  {
				'email': 'roopak.burman@gmail.com',
				'name': 'Chimmera Info',
				'type': 'to'
			  }
			  //,
			  //{
			//	'email': 'RECIPIENT_NO_2@EMAIL.HERE',
			//	'name': 'ANOTHER RECIPIENT NAME (OPTIONAL)',
			//	'type': 'to'
			//  }
			],
		  'autotext': 'true',
		  'subject': 'Query from Chimmera.com',
		  'html': '<p>Name: ' + firstName + ' ' + lastName + '</p> <p>Email: ' + email +'</p> <p>Phone Number: ' + phone +'</p> <p>Description: ' + description + '</p>'
		}
	  }
	 }).done(function(response) {
	   console.log(response); // if you're into that sorta thing
	   $('#contactForm').find("input[type=text], input[type=email], textarea[type=text]").val("");
	   
	 });
	 });