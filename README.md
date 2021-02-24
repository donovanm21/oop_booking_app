# Hotel Booking App

This is a very simple booking application. The application uses data stored in a json file to populate content with in the application.

This application serves as a starting template for someone wanting to build there own booking web application.

## Demo site below

<a href="https://bookings-demo.ydev.co.za" target="_blank">https://bookings-demo.ydev.co.za</a>

## Welcome / Sign in Screen

<img src="https://github.com/donovanm21/oop_booking_app/blob/main/includes/img/github/signin.png" />

## Simple setup instructions (Docker)

### 1. Install docker onto your machine using the link below.

https://www.docker.com/products/docker-desktop

### 2. Ensure that you have git installed on your machine. Download and install for your OS.

https://git-scm.com/downloads

### 3. Clone the repo to your machine, this will create a copy of all the code onto your machine.

```bash
git clone https://github.com/donovanm21/oop_booking_app.git
```

### 4. Ensure that you are in the folder you cloned above,

On mac, open terminal and use the cd command to change to the oop_booking_app directory. Type cd and drag the directory over the terminal.
On windows, open CMD and use the cd command to change to the oop_booking_app directory. Type cd and drag the directory over the terminal.

### 5. Once docker and git is installed and running, you will use Terminal on Mac or CMD on Windows to run the below command.

Ensuring you are in the cloned directory, you can run the below command to start a php docker container and serve the files from the folder on your machine.

```bash
docker run -d -p 8070:80 --name oop-booking-app -v "$PWD":/var/www/html php:7.2-apache
```

### 6. Access the application

If everything went well, you should be able to access the app using this link http://127.0.0.1:8070

### 7. Adjusting the application code

Any adjustments you make to the code should reflect on your local app running via the docker instance.

### 8. Email settings

Ensure you update the mail.php section with your own email settings in order to have the book email confirmation working.

```php
$mail->Host       = 'smtp.example.co.za';
$mail->Username   = 'bookings@example.co.za';
$mail->Password   = 'yourpassword';
$mail->Port       = 587;

//Recipients
$mail->setFrom('bookings@example.co.za', 'Hotel Bookings');
$mail->addAddress('manager@example.co.za'); // Email address for receiving the booking cofirmation (Your email)
```