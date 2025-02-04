<!doctype html>
<html lang="en-US">

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    {{-- SEO --}}
    <meta name="description" content="Damian Corporate">
    <meta name="keywords" content="Damian Corporate, Damian, Corporate">
    <meta name="author" content="Damian Corporate,">
    <meta name="robots"
        content="index, follow, noarchive, noimageindex, nosnippet, noydir, noodp, notranslate, noyaca">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Responsive Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Damian Corporate | Send Contact Us Thank You Mail</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Averta-Regular !important;
        }

        a:hover {
            text-decoration: underline !important;
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:left;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding: 0 35px;">
                                        <img width="220" height="80" src="https://mbihosting.in/damiancorporate/demo1/assets/img/logo/damian-logo.png" title="Damian Corporate" alt="logo">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height: 20px;">&nbsp;</td>
                                </tr>
                                <td style="padding:0 35px; text-align:left;">
                                    <h1 style="color:#1e1e2d; font-weight:500; margin:0; font-size:25px;">
                                        Thank You for Contacting Us!
                                    </h1><br><br>

                                    <p style="color:#44474d; font-size:18px;line-height:24px; margin:0; text-align: justify;">
                                        Dear {{ $mailData['name'] }},
                                    </p><br><br>

                                    <p style="color:#44474d; font-size:18px;line-height:24px; margin:0; text-align: justify;">
                                        Thank you for reaching out to us. We have received your inquiry and will get back to you as soon as possible. We appreciate your patience and look forward to assisting you.
                                    </p><br><br>

                                    <p style="color:#44474d; font-size:18px;line-height:24px; margin:0; text-align: justify;">
                                        Best regards,<br>
                                        <strong>Damian Corporates Pvt. Ltd.</strong>
                                    </p><br><br>
                                </td>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:16px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">
                                &copy; {{ date('Y') }}
                                <strong>
                                    <a href="{{ route('frontend.home') }}" title="Damian Corporate" target="_blank"
                                        style="color: #000000;">
                                        Damian Corporates Pvt. Ltd.
                                    </a>
                                </strong>. All rights reserved.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>


</html>
