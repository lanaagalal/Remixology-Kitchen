<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f9f3ea;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            min-height: 100vh; /* Full viewport height */
            margin: 0; /* Remove default margin */
        }
        .container {
            width: 100%;
            max-width: 500px; /* Maximum width of the form container */
            padding: 20px;
            background-color: #fff; /* White background for the form */
            box-shadow: 0 0 15px rgba(0,0,0,0.1); /* Subtle shadow for 3D effect */
            border-radius: 8px; /* Rounded corners for the container */
        }
        h1 {
            color: #be872c;
            text-align: center; /* Center the title */
        }
        .contact-form label, .contact-form input, .contact-form textarea, .contact-form button {
            color: #be872c;
            border-color: #be872c;
            width: 100%; /* Full width inputs */
        }
        .contact-form input, .contact-form textarea {
            border-style: solid;
            background-color: #ffffff; /* Light background for input */
            padding: 12px; /* Adds more space inside inputs */
            border-radius: 4px; /* Rounded borders for inputs */
        }
        .contact-form button {
            background-color: #f4e6d2;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer; /* Changes cursor to pointer when hovering over the button */
            width: auto; /* Auto width for the button */
            display: block; /* Make the button a block element */
            margin: 10px auto 0; /* Center the button horizontally */
        }
        .contact-form button:hover {
            background-color: #e2d2c0; /* Lighter shade for hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact</h1>
        <form class="contact-form" method="post" action="send-email.php">
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            
            <div class="mb-3">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" required>
            </div>
            
            <div class="mb-3">
                <label for="message">Message</label>
                <textarea name="message" id="message" required></textarea>
            </div>
            
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>
