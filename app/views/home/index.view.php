
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
    <script src="../js/ehr.js"></script>

</head>
<body>
<div class="row full-width navbar">
    <div class="logo">
        <img src="../images/logo.png" alt="logo.png">
    </div>
    <ul class="nav">
        <a href="home"><li class="active"><i class="fa fa-home"></i> Home</li></a>
        <a href="home/feedback"><li><i class="fa fa-bell-o"></i> Feedback</li></a>
        <a href="home/setting"><li><i class="fa fa-cog"></i> Settings</li></a>
        <a href="home/logout"><li class="logout"><i class="fa fa-sign-out"></i> Logout</li></a>
    </ul>

    <div class="search">
        <input type="text" name="mrn" placeholder="Select by MRN">
        <button type="button" name="mrn-search"><i class="fa fa-search"></i> </button>
    </div>
</div>

<div id="container">
    <div id="nav">

        <ul class="menu">
            <a href=""><li><i class="fa fa-money"></i> Administration and Billing</li></a>
            <a href=""><li><i class="fa fa-plus-square"></i> Medical History</li></a>
            <a href=""><li class="active"><i class="fa fa-flask"></i> Lab and Test Results</li></a>
            <a href=""><li><i class="fa fa-medkit"></i> Diagnosis</li></a>
            <a href=""><li><i class="fa fa-user-plus"></i> Medications</li></a>
            <a href=""><li><i class="fa fa-stethoscope"></i> Immunization</li></a>
            <a href=""><li><i class="fa fa-user-md"></i> Allergies</li></a>
        </ul>
    </div>

    <div id="display" class="fg-secondary">
        <div class="info pad-xs bg-cloud fg-secondary">
            <i class="fa fa-info-circle"></i> <i>You're currently operating on Stephen Kowee.</i>
        </div>
        <div class="row">

        </div>

    </div>
</div>
</body>
</html>