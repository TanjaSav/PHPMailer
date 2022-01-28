# Sending email via SMTP Server using PHPMailer


### Why Use PHPMailer to Send Emails?

PHPMailer is a popular mail sending library that supports mail sending via the `mail()` function or through an Simple Mail Transfer Protocol (SMTP) server. It gives access to a set of functions for sending emails, simplifying the process of configuring PHP mail.

### How to install PHPMailer?

1.	Use Composer to download PHPMailer and automatically create an autoloader file;
2.	Manually download the PHPMailer source code and include the required files yourself.

The first option is the recommended one, because Composer takes care of all the download, update and dependency check steps.

However, the second option may be useful if you don’t want to install Composer for some reason, for example if you are using PHPMailer on a testing environment.
Let’s see both installation options, starting with the one with Composer.

### Installing Composer and PHPMailer on Windows (if you use XAMPP, WAMP etc.)

Composer is a dependency manager for PHP. It helps you download, install and keep up to date PHP extensions and libraries.
Installing Composer requires just a couple of minutes:
 
1.	First, make sure you have a web development environment already installed (XAMPP, WAMP, EasyPHP etc.) as Composer needs a PHP executable to work;
2.	Download the Composer installation file (under “Windows Installer”) and run it;
3.	Follow the installation instructions, and make sure you can select a PHP executable
4.	Once the installation is complete, you will be able to use the Composer command line tools to install PHPMailer.
 
Now you need to open a terminal (by executing “cmd.exe” or looking for `“Command prompt”` in the Start menu) and navigate to the directory where you want to install the Composer packages including PHPMailer.
For example, let’s use `“C:\xampp\composer”` as installation directory. First create the directory, then go back to the terminal and move into the directory by typing `“cd C:\xampp\composer”`.
Then, simply execute the command: `“composer require phpmailer/phpmailer” `

PHPMailer will be installed and you’ll be ready to use it.
 
Composer will generate an `“autoload.php”` file you can use to include the installed libraries, in this case PHPMailer. This file is located under the “vendor” directory by default, although you can configure Composer to use a different directory name.

So, assuming your installation directory is `“C:\xampp\composer”`, you need to include the `“C:\xampp\composer\vendor\autoload.php”` file.

 
### Installing PHPMailer without Composer

If you prefer not to use Composer, you can just download the PHPMailer source files and include the required files manually.

You can download the ZIP file with the source code from the PHPMailer homepage, clicking on the “Clone or download” green button (on the right) and then selecting “Download ZIP”. Unzip the package inside the directory where you want to save the source files.
 
Then you just need to include the needed classes files in your PHP script.
As a minimum, you want to include the main PHPMailer class, the Exception class (for error handling) and probably the SMTP class too, if you are going to connect to an SMTP server for mail delivery.


### PHPMailer Components

To understand how PHPMailer works, let’s take a look at each component of the script above.

If you have used Composer for installation, include the Composer generated autoload.php file:  
`require 'path/to/composer/vendor/autoload.php';`  

If you have installed PHPMailer manually, initialize it like this:  
`require path/to/PHPMailer/src/PHPMailer.php';  `  
`require path/to/PHPMailer/src/SMTP.php';       `  
`require path/to/PHPMailer/src/Exception.php';  `  

Then create the PHPMailer class:  
`<?php                             `  
`use PHPMailer\PHPMailer\PHPMailer;`  
`use PHPMailer\PHPMailer\SMTP;     `  
`use PHPMailer\PHPMailer\Exception;`  

The next step is to create a new PHPMailer object:  
`$mail = new PHPMailer();`  

Now let’s move to an Gmail SMTP configuration:  
`$mail->isSMTP(); // Set mailer to use SMTP                            `  
`$mail->Host = 'smtp.gmail.com'; // Define SMTP Host                   `  
`$mail->SMTPAuth = true; // Enable SMTP authentication                 `  
`$mail->Username = 'test@gmail.com'; // Set your gmail username        `  
`$mail->Password = '123456’ // Set your gmail password                 `  
`$mail->SMTPSecure = 'tls'; // Define encription type                  `  
`$mail->Port = 587; // Define Port to connect SMTP (for tls we use 587)`  

Specify PHPMailer headers:  
`$mail->setFrom('sender@gmail.com'); //Set sender email         `  
`$mail->Subject = 'Test Email using PHPMailer'; // Set a subject`  
`$mail->addAddress('recipient@gmail.com') // Add recipient      `  


Then set the email format to HTML with isHTML(true) property:  
`$mail->isHTML(true);`  

Now you can input the desired content:   
`$mail->Body = "<h1>Send HTML Email using SMTP in PHP</h1>                                         `  
`    <p>This is a test email I’m sending using SMTP mail server with PHPMailer.</p>"; // Email body`  


With PHPMailer, you can also make a nice HTML email, with custom formatting, images, and send emails with attachments.   
`$mail->addAttachment(‘img/attachment.jpg’)// The file inside this directory named attachment.jpg`  

In the end, specify the email sending attributes:  
`if($mail->send()){                             `                       `  
`    echo 'Message has been sent';           `                          `  
`}else{                                  `                              `  
`    echo 'Message could not be sent.Mailer Error: ' [$mail->ErrorInfo];`  
`}`  

Closing SMTP connection:  
`$mail->smtpClose();`  


Let’s go to the terminal and type  `php -S localhost:8000`.

The result “Message has been sent” informs you that your code is executing correctly. 

When you’re going to use your SMTP server outside your official apps you should to enable this settings: go to security in your Google account and then Allow less secure apps.

To check the delivery result and details, go to your Gmail inbox: your messages will get there in seconds.

