# Booking-Form
Simple PHP booking form with jQuery validation

## Getting Started

The form requires transfered to web servers that supports PHP will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Package should be uploaded to a web server with PHP installed. Files and folders should keep the same structure. Booking form is launched when `index.php` file is opened in the browser.

### File structure

The root directory contains following and folders:

+---css
|   \---styles.css        --> 
+---includes
|   \---form2email.php    -->
+---js
|   \---main.js
+---resources
|   +---library
|   |   +---datepicker
|   |   +---tel
+---index.php
+---README.md

## Usage

The form consists of the following fields:
1. Full name - required
2. Last name - required
3. Email - required, must be valid email addres (gmail.com domain is not accepted)
4. Phone number - required (automatically retrieves current country based on the IP address
geolokaciju i odgovarajuća zemlja je odabrana, obavezno polje
5. Number of Guests - brojač, obavezno polje
6. Date / Time - obavezno polje, plugin za datum
7. Time - obavezno polje, plugin za vrijeme
8. Reservation type - obavezno polja, koristiti library za select polje tipa https://select2.org ili
https://selectize.github.io/selectize.js/
Ukoliko se odabere “Other” kao vrsta, dodatno polje se otvara za kratko pojašnjenje “Please
tell more …” kao placeholder
9. Any Special Request - nije obavezno, text area sa dodatnim pojašnjenjem


## Built With

* [PHP]
* [jQuery]
* [International Telephone Input](https://intl-tel-input.com) - JavaScript plugin for entering and validating international telephone numbers
* [Select2](https://select2.org) -  jQuery based replacement for select boxes
* [jQuery Validation Plugin](https://jqueryvalidation.org) - jQuery validation plugin
* [Datepicker](https://github.com/fengyuanchen/datepicker) - A simple jQuery datepicker plugin
* [jQuery Timepicker](https://timepicker.co) - jQuery plugin for selecting times


