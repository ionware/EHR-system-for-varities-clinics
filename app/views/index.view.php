
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clinicians Login | Lautech MIMS</title>
    <link rel="shortcut icon" href="images/logo.png">
    <meta name="Pragma" content="No-Cache must-revalidate">
    <meta name="cookie" content="no-cache">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Merriweather:900" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css"/>

</head>
<body>
<div class="full-width">
    <img src="images/logo.png" class="brand" alt="logo.png" style="z-index: 999; position: relative; bottom: -10px">
</div>
<div id="login">
<div class="row">
    <div class="small-12 column pad-sm text-center bg-primary"><h3>Sign Into Account</h3></div>
</div>

    <div class="row">
        <div class="small-offset-1 small-10 column pad-sm margin-top-md">

            <form method="post" action="verify.php">
                <div class="row pad-sm">
                    <div class="small-12 column">
                        <label>E-Mail</label>
                        <input type="text" class="input-control" placeholder="E-Mail" name="email">
                    </div>
                </div>

                <div class="row pad-sm">
                    <div class="small-12 column">
                        <label>Password</label>
                        <input type="password" class="input-control" placeholder="Password" name="password">
                    </div>
                </div>

                <div class="row pad-sm">
                    <div class="small-12 column">
                        <button type="submit" class="btn btn-primary btn-block rad-sm">Sign In</button>
                    </div>
                </div>

                <div class="row pad-sm">
                    <div class="small-12 column">
                        <p class="info">
                            <a href="#"><i class="fa fa-lock"></i> Forgotten Password?</a>
                            Please contact the Medical Record Department Administrators for your
                            password retrival.
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>