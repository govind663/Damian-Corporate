<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- SEO --}}
    <meta name="description" content="Damian Corporate">
    <meta name="keywords" content="Damian Corporate, Damian, Corporate">
    <meta name="author" content="Damian Corporate,">
    <meta name="robots" content="index, follow, noarchive, noimageindex, nosnippet, noydir, noodp, notranslate, noyaca">

    {{-- Title --}}
    <title>Damian Corporate | Subscribe Us Mail</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #0073e6;
            text-align: left;
        }

        .details {
            margin-bottom: 15px;
            text-align: left;
        }

        .details strong {
            display: inline-block;
            width: 150px; /* Adjust width as needed */
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }

        .logo {
            width: 180px;
            height: 120px;
            margin-bottom: 5px;
        }

        .logo-title {
            font-size: 18px;
            color: #0073e6; /* Match the color of h2 */
            margin-bottom: 20px; /* Space below the title */
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Contact Us Section -->
        <div class="contact">
            <!-- Contact Us Section -->
            <div class="contact">
                <img src="https://damiancorporate.com/assets/img/Damian%20Corporate%20Logo.png" alt="Damian Corporate Logo" class="logo" style="width: 220px; height: 100px;">
            </div>

            <h2>New Subscriber Details :-</h2>

            <p class="details">
                <strong>Email : </strong> {{ $mailData['email'] }}
            </p>
            <p>
                Thank you for subscribing to Bhairaav! We will keep you updated with our latest offerings and news.
            </p>

            <!-- Footer Section -->
            <div class="footer">
                <p style="font-size: 12px;color: #666;">
                    Copyright © {{ date('Y') }}
                    <a href="{{ route('frontend.home') }}" style="color: #0073e6;" target="_blank">Damian Corporate</a>.
                    All Rights Reserved.
                </p>

                <p class="mb-0" style="font-size: 12px;color: #666;">
                    Damian Corporate
                    <br>
                    Email : contact@damiancorporate.com
                </p>
            </div>
            </div>
        </div>
    </div>
</body>

</html>
