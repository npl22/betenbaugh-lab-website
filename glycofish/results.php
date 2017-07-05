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
    <a href="index.php" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>

    <?php
        include ("search.php");
    ?>
</div>

<div class="table">
    <table cellspacing="0" cellpadding="0">
    <tr>
    <td bgcolor="black"><b>Accession Number</b></td>
    <td bgcolor="black"><b>Protein Name</b></td>
    <td bgcolor="black"><b>Number of Observed Peptides</b></td>
    </tr>

    <?php
    ///////////////////////////// PHP CODE BEGINS HERE /////////////////////////////////////////////////////
    $searchTerm = $_POST["query"];
    $method = $_POST["type"];
    ///////////////////////////////////////////////////////////////////////////////////////
    // CONNECT TO THE DATABASE
    ///////////////////////////////////////////////////////////////////////////////////////
    $conn = mysql_connect("mysql.betenbaugh.dreamhosters.com", "betenbaugh", "neb039");
    mysql_select_db("betenbaugh", $conn);
    ///////////////////////////////////////////////////////////////////////////////////////
    // FETCH DATA FROM DATABASE
    ///////////////////////////////////////////////////////////////////////////////////////
    if ($method == "Bulk Search") {
        $sql = "SELECT * FROM proteinDataFish
    WHERE ProteinID LIKE '%$searchTerm%' OR Name LIKE '%$searchTerm%' OR AnnotationSymbol LIKE '%$searchTerm%' OR ProteinSymbol LIKE '%$searchTerm%' OR ProteinFunction LIKE '%$searchTerm%' ORDER BY ProteinID";
    }
    else {
        $sql = "SELECT * FROM proteinDataFish
    WHERE Sequence like '%$searchTerm%' ORDER BY ProteinID";
    }

    $result = mysql_query($sql);
    $gray=0;
    while ($fetchedRow = mysql_fetch_assoc($result)) {
        $ProteinID = $fetchedRow["ProteinID"];
        $Name = $fetchedRow["Name"];
        
        echo "<td><a href='protein.php?ID=".$Name."'>".$ProteinID."</a></td>\r\n";
        echo "<td>".$Name."</td>\r\n";

        $sql2 = "SELECT * FROM `sequenceDataFish` WHERE `ReferenceID` = '$ProteinID' ";
        $result2 = mysql_query($sql2);
        $i = 0;
        while ($fetchedRow2 = mysql_fetch_assoc($result2)) {
            $i = $i + 1;
        }
        echo "<td>".$i."</td></tr>\r\n";
    }
    ?>
    </table>
</div>

<p align="center"><span class="style1">&copy; 2014 Johns Hopkins University</span></p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/grayscale.js">