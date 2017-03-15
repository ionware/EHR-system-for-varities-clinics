<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Pragma" content="no-cache">
    <meta name="expires" content="0">
    <meta name="cache-control" content="no-store">
    <title>Clinicians Dashboard | Lautech MIMS</title>
    <link rel="shortcut icon" href="../images/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Merriweather:900" rel="stylesheet">
    <link rel="stylesheet" href="../css/app.css"/>
    <link rel="stylesheet" href="../css/auth.index.css"/>
    <link rel="stylesheet" href="../vendor/fontawesome/css/font-awesome.min.css"/>
    <!--Include Javascript Files-->
    <script src="../vendor/jquery/jquery-3.0.0.min.js"></script>

</head>
<body>
<div id="screenlock">
    <div>
        <img src="../images/loader.gif" style="width: 30px; height: 30px;"><br>
        <i>Please wait a moment</i>
    </div>
</div>
<div class="row full-width navbar">
    <div class="logo">
        <img src="../images/logo.png" alt="logo.png">
    </div>
    <ul class="nav">
        <a href="/home"><li><i class="fa fa-home"></i> Home</li></a>
        <a href="/home/feedback"><li><i class="fa fa-bell-o"></i> Feedback</li></a>
        <a href="/home/setting"><li class="active"><i class="fa fa-cog"></i> Settings</li></a>
        <a href="/home/logout"><li class="logout"><i class="fa fa-sign-out"></i> Logout</li></a>
    </ul>

    <div class="search">
        <form id="mrn-select" method="post" action="/home/select">
            <input type="text" name="mrn" placeholder="Select by MRN" required>
            <button type="submit"><i class="fa fa-search"></i> </button>
        </form>
    </div>
</div>

<div class="row">
    <div class="small-8 small-offset-2 column pad-tb-lg">
        <?php
            if(isset($_SESSION['error'])) {
                ?>
                <div class="row">
                    <div class="small-5 small-offset-7 pad-md rad-sm bg-secondary">
                        <?= $_SESSION['error'] ?><br>
                        <b>Please try again or contact the MRD for assistance.</b>
                    </div>
                </div>
            <?php
            }
        unset($_SESSION['error']);

        if(isset($_SESSION['info'])) {
            ?>
            <div class="row">
                <div class="small-5 small-offset-7 pad-md rad-sm bg-secondary">
                    <?= $_SESSION['info'] ?><br>
                </div>
            </div>
        <?php
        }
        unset($_SESSION['info']);
        ?>
        <h5 class="fg-secondary">Change Your Account Password</h5>
        <form method="post" action="/home/setting">
            <div class="row">
                <div class="small-10 column pad-tb-md">
                    <label class="fg-secondary"><b>New Password</b></label>
                    <input type="password" name="password" class="field2" placeholder="Password" required>
                    <small>Enter your new password. Not less than 8-characters</small>
                </div>
            </div>

            <div class="row">
                <div class="small-10 column pad-tb-md">
                    <label class="fg-secondary"><b>re-type Password</b></label>
                    <input type="password" name="password_comfirmation" class="field2" placeholder="re-type" required>
                </div>
            </div>

            <div class="row">
                <div class="small-3 column pad-tb-sm">
                    <button type="submit" class="btn-primary btn-block">Update Settings</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="../js/ehr.js"></script>
</body>
</html>