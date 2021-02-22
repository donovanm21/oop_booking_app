# Hotel Booking App

This is a very simple booking application. The application uses data stored in a json file to populate content with in the application.

Things to change in order to get the app working 100%. Once setup you can use all the app functions.

- Download a copy of the main branch.
- You can adjust the data.json objects to reflect your hotel or accomidation relevant details.
- Open the mail.php file and edit the below sections to reflect your smtp server details.

```
$mail->Host       = 'smtp.example.co.za';
$mail->Username   = 'bookings@example.co.za';
$mail->Password   = 'yourpassword';
$mail->Port       = 587;

//Recipients
$mail->setFrom('bookings@example.co.za', 'Hotel Bookings');
$mail->addAddress('manager@example.co.za'); // Email address for receiving the booking cofirmation (Your email)
```

## Sign In Window

<img src="https://github.com/donovanm21/oop_booking_app/blob/main/includes/img/github/signin.png" />

## Search Window

<img src="https://github.com/donovanm21/oop_booking_app/blob/main/includes/img/github/search.png" />

