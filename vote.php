<?php
if (session_id() == "") session_start();

//check session for our voter
if (!isset($_SESSION['username'])){
    header("Location: index.html");//set the redirect so no headers get sent to client
    die();//die for now makeing sure headers get sent
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js" charset="utf-8"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <title>MyVote - Your online voting portal</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">
    <link rel="stylesheet" href="css/myVote.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">
<!-- main navbar -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">MyVote</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="about.html">About</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">Login</a>
                    <!-- <li>
                    <a class="page-scroll" href="#">MyEnrolement</a>
                    </li> -->
                </li>

                <li>
                    <a class="page-scroll" href="#portfolio">Enrole</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!---------------- party vote section ------------------------>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 partyVoteHeader">
    <h2>Select a party to vote</h2>
    <hr/>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>
<section class="no-padding" id="portfolio">
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-lg-4 col-sm-6">
                <a href="#" id="actparty" type="party" selected="false" class="portfolio-box">
                    <img src="img/portfolio/1.jpg" class="img-responsive vote-mp" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Party
                            </div>
                            <div class="project-name">
                                Party Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#" id="labourparty" type="party" selected="false" class="portfolio-box">
                    <img src="img/portfolio/2.jpg" class="img-responsive vote-mp" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Party
                            </div>
                            <div class="project-name">
                                Party Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#" id="greenparty" type="party" selected="false" class="portfolio-box">
                    <img src="img/portfolio/3.jpg" class="img-responsive vote-mp" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Party
                            </div>
                            <div class="project-name">
                                Party Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#" id="internetparty" type="party" selected="false" class="portfolio-box">
                    <img src="img/portfolio/4.jpg" class="img-responsive vote-mp" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Party
                            </div>
                            <div class="project-name">
                                Party Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#" id="nationalparty" type="party" selected="false" class="portfolio-box">
                    <img src="img/portfolio/5.jpg" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Party
                            </div>
                            <div class="project-name">
                                Party Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#" id="maoriparty" type="party" selected="false" class="portfolio-box vote-mp">
                    <img src="img/portfolio/6.jpg" class="img-responsive " alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Party
                            </div>
                            <div class="project-name">
                                Party Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#" id="nzfirstparty" type="party" selected="false" class="portfolio-box vote-mp">
                    <img src="img/portfolio/7.jpg" class="img-responsive " alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Party
                            </div>
                            <div class="project-name">
                                Party Name
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-------------------- mp vote section --------------------------->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mpVoteHeader">
    <h2>Choose your MP</h2>
    <hr/>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mpVoteSection">
    <div class="container">
        <!--- mp list one --->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 teamBody">
        <div class="col-lg-12 col-md-12 col-xs-12 mpListOne">

            <div mp_name="Bill English" class="col-lg-1 col-md-12 col-sm-12 col-xs-12 test mp-vote">
                <div class="view view-first">
                    <img class="img-responsive img-circle" src="img/mps/10.jpg" width="280" alt="">
                    <div class="mask">
                        <h2>Select</h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 memberDesc">
                    <h4>JOHN DOE</h4>
                    <label>Creative Director</label>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 teamColor"></div>
            </div>

            <div mp_name="David Bennet" class="col-lg-1 col-md-12 col-sm-12 col-xs-12 test mp-vote">
                <div class="view view-first">
                    <img class="img-responsive img-circle" src="img/mps/94.jpg" width="280" alt="">
                    <div class="mask">
                        <h2>Select</h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 memberDesc">
                    <h4>JOHN DOE</h4>
                    <label>Creative Director</label>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 teamColor"></div>
            </div>

            <div mp_name="Todd Barclay" class="col-lg-1 col-md-12 col-sm-12 col-xs-12 test mp-vote">
                <div class="view view-first">
                    <img class="img-responsive img-circle" src="img/mps/89.jpg" width="280" alt="">
                    <div class="mask">
                        <h2>Select</h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 memberDesc">
                    <h4>JOHN DOE</h4>
                    <label>Creative Director</label>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 teamColor"></div>
            </div>

            <div mp_name="John Key" class="col-lg-1 col-md-12 col-sm-12 col-xs-12 test mp-vote">
                <div class="view view-first">
                    <img class="img-responsive img-circle" src="img/mps/71.jpg" width="280" alt="">
                    <div class="mask">
                        <h2>Select</h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 memberDesc">
                    <h4>JOHN DOE</h4>
                    <label>Creative Director</label>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 teamColor"></div>
            </div>
            <button class="btn btn-info pull-right" id="submitVote">Submit</button>
            </div>

            </div>
        </div>
</div>

<!------------------ separator div !!!DO NOT REMOVE THIS DIV!!! ----------------->
<div style="font-size: 0.1px;"></div>

    <!--- footer --->
    <footer>

        <section id="contact" class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 left-footer">
                        MyVote Logo
                        <br/><br/>
                        <a href="#">MyVote</a>
                        <i class="fa fa-circle"></i>
                        <a href="#">About</a>
                        <i class="fa fa-circle"></i>
                        <a href="#">Login</a>
                        <p style="margin-top: 5px">MyVote &copy; 2015</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 middle-footer">
                        <i class="fa fa-map-marker pull-left"></i>
                        <p style="margin-top: 0px !important;">
                            <span>21 Revolution Street</span>
                            <br/>Wellington, New Zealand
                        </p>
                        <br/>
                        <i class="fa fa-envelope pull-left"></i>
                        <p>
                            <span>myvote@mail.co.nz</span>
                        </p>
                        <br/>
                        <i class="fa fa-phone pull-left"></i>
                        <p>
                            <span>0800 123 456</span>
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 right-footer">
                        <h4>About</h4>
                        <span>Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.</span>
                        <br/><br/>
                        <a href="https://www.facebook.com/myvotenz"> <i class="fa fa-facebook"></i></a>
                        &nbsp;
                        <i class="fa fa-twitter"></i>
                        &nbsp;
                        <i class="fa fa-reddit"></i>
                        &nbsp;
                        <i class="fa fa-linkedin"></i>
                    </div>
                </div>
            </div>
        </section>
    </footer>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.fittext.js"></script>
<script src="js/wow.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/creative.js"></script>
<script src="js/vote.js"></script>

</body>

</html>
