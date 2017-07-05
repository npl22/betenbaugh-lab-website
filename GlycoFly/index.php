<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Lab website for Dr. Michael J. Betenbaugh, professor at The Johns Hopkins University. We specialize in glyco, cell, metabolic, and micro-algae engineering.">
    <meta name="keywords" content="JHU, Johns Hopkins, Betenbaugh, professor, research, algae, biofuels, engineering, metabolic, cell, glyco, CHO">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Betenbaugh Lab</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../img/favicon.ico">
    <!-- Custom Theme CSS -->
    <link href="../css/grayscale.css" rel="stylesheet">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom"><br><br>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="position:fixed; background-color:black">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="../index.html#page-top">
                    Betenbaugh Lab <span class="light"></span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="../index.html#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="../index.html#research">Research</a>
                    </li>
                    <li class="dropdowns">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Members <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="../professor.html">Professor Betenbaugh</a></li>
                    <li><a href="../members.html">Members</a></li>
                    </ul>
                    </li>
                    <li class="dropdowns">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Tools and Links <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="../GlycoFish">GlycoFish Database</a></li>
                    <li><a href="../GlycoFly">GlycoFly Database</a></li>
                    <li><a href="../publications.html">Publications</a></li>
                    <li><a href="../tools.html">Other Tools</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<div class="search">
    <?php
    include ("search.php");
    ?>
</div>

<div class="table">
    <?php
    include ("proteinTable.php");
    ?>
</div>

<p align="center"><span class="style1">&copy; 2014 Johns Hopkins University</span></p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/grayscale.js"></script>

    <!-- Google Analytics -->
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-50123108-1', 'betenbaugh.org');
    ga('send', 'pageview');
    </script>
    
</body>
</html>
