<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans:300' rel='stylesheet' type='text/css'>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Matt Snyder | Developer</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/_templates/assets/css/styles.css">
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<section id="header" data-scroll-index="0">
    <div class="container">
        <div class="col-sm-3 headshot">
            <div class="row">
                <img src="/_templates/assets/img/headshot.jpg" alt="Matt Snyder" class="img-responsive"/>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="nav-wrapper">
                <h1>M. SNYDER</h1>

                <h2>DEVELOPER</h2>

                <nav class="navbar navbar-main" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#nav-main-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="nav-main-collapse">
                            <ul class="nav navbar-nav nav-justified nav-divider">
                                <li><a data-scroll-nav="1">PORTFOLIO</a></li>
                                <li><a data-scroll-nav="2">PHOTOGRAPHY</a></li>
                                <li><a data-scroll-nav="3">RESUME</a></li>
                                <li><a data-scroll-nav="4">CONTACT</a></li>
                            </ul>

                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </div>
        </div>
    </div>
</section>

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>Hi, I'm Matt!</p>
                <p>I am a Jackson, TN based developer currently employed at Younger Associates where I lead a small team of code ninjas.  We develop responsive sites for clients all over the US in several different industries.  I love using open source web technology (especially Laravel).  Check out some of my web projects and photography below.</p>
                <p>I am not a designer, but did design this website myself.  If you like it, feel free to use it for your own portfolio!  Source is available on <a href="https://github.com/oblogic7/portfolio" target="_blank">Github</a>.</p>

            </div>
        </div>
    </div>
</section>

<section id="portfolio" data-scroll-index="1">
    <div class="container">
        <h2>PORTFOLIO</h2>
        <p>A sampling of websites that I have built.  Click a thumbnail for project information.</p>

        <div class="row">
            <div class="scroll-arrow">SCROLL FOR MORE <i class="glyphicon glyphicon-arrow-right"> </i> </div>
            <div class="wrapper">
                <div class="inner-wrapper">
                    <?php $count = 0; ?>
                    @foreach($projects as $p)
                    <div class="portfolio-thumb"><a href="{{ URL::route('projects.show', $p->id) }}" <?php if (++$count == 1) :?>class="selected"<?php endif; ?>><img class="img-responsive" src="{{ $p->desktop }}" alt="Screenshot"/></a></div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section id="portfolio-item">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 desktop-view">
                <div class="wrapper">
                    <img class="img-responsive" src="{{ $projects->first()->desktop }}" alt=""/>
                </div>
            </div>
            <div class="@if($projects->first()->mobile != '') col-sm-4 @else col-sm-6 @endif description">

                @if(isset($projects->first()->url))
                    <h3><a href="{{ $projects->first()->url }}" target="_blank">{{ $projects->first()->name }}@if($projects->first()->employer == true)* @endif</a></h3>
                @else
                    <h3>{{ $projects->first()->name }}@if($projects->first()->employer == true)* @endif</h3>
                @endif
                <p>{{ $projects->first()->description }}</p>
            </div>
            @if($projects->first()->mobile != '')
                <div class="col-sm-2 mobile-view hidden-xs">
                    <div class="wrapper">
                        <img class="img-responsive" src="{{ $projects->first()->mobile }}" alt=""/>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<section id="photography" data-scroll-index="2">
    <div class="container">
        <h2>PHOTOGRAPHY</h2>
        <div class="wrapper">
            @foreach($photos as $p)<img width="{{ $p[5]['width'] }}" height="{{ $p[5]['height'] }}" src="{{ $p[5]['source'] }}" alt=""/>@endforeach
        </div>
        <p class="pull-right text-muted">Be sure to check out <a href="https://www.flickr.com/photos/snyder07" target="_blank">my Flickr</a> for higher res images.</p>
    </div>
</section>

<section id="resume" data-scroll-index="3">
    <div class="container">
        <h2>RESUME</h2>
        <p>Download for later or view now? <br/></p>
        <div class="row">
            <div class="col-sm-6"><a class="btn btn-flat btn-blue" href="{{ URL::to('/pdfjs/web/viewer.html?file=/Resume.pdf') }}">View Online</a></div>
            <div class="col-sm-6"><a class="btn btn-flat btn-blue" href="{{ URL::to('/download/resume') }}">Download (PDF)</a></div>
        </div>
    </div>
</section>

<section id="contact" data-scroll-index="4">
    <div class="container">
        <h2>CONTACT</h2>
        <p>You were probably expecting a snazzy contact form here showing off my awesome form building skills.  However, I prefer a more personal method of contact.  Give me a call.  You can find my number in my resume.</p>
        <p>If you insist on getting in touch using an electronic form of text communication, send a good old hand-crafted email to

        <script language=Javascript type=text/javascript>
          <!--
          document.write('<a style="color: #fff;" href="mai');
          document.write('lto');
          document.write(':&#109;&#97;&#116;&#116;');
          document.write('@');
          document.write('&#111;&#98;&#115;&#99;&#117;&#114;&#101;&#108;&#111;&#103;&#105;&#99;&#46;&#99;&#111;&#109;">');
          document.write('&#109;&#97;&#116;&#116;');
          document.write('@');
          document.write('&#111;&#98;&#115;&#99;&#117;&#114;&#101;&#108;&#111;&#103;&#105;&#99;&#46;&#99;&#111;&#109;<\/a>');
          // -->
          </script>
          <noscript>&#109;&#97;&#116;&#116; at &#111;&#98;&#115;&#99;&#117;&#114;&#101;&#108;&#111;&#103;&#105;&#99; dot &#99;&#111;&#109;</noscript>.
          </p>
    </div>
</section>

<section id="footer" class="text-center clearfix">
    <p>Built with Laravel | Served by Nginx | Hosted @ <a href="https://www.digitalocean.com/?refcode=3d4103ddd02f" target="_blank">DigitalOcean</a> | <a href="https://github.com/oblogic7/portfolio" target="blank">Source on Github!</a> <br/><br/>
        <small class="col-sm-6 col-sm-offset-3"><em>* Asterisk means the site was built while I was employed as a developer for a third party.  I claim no rights to the work or the design. I am only listing the projects here to demonstrate my skills as a developer.</em></small>
    </p>
</section>

<div class="top-link">
    <a data-scroll-goto="0"><i class="glyphicon glyphicon-arrow-up"> </i> Back to Top</a>
</div>

<script id="portfolio-item-template" type="text/x-handlebars-template">
    @include('_partials.portfolio-item')
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.11.0.js"><\/script>')</script>

<script src="/_templates/assets/js/min/main-ck.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X');
    ga('send', 'pageview');
</script>
</body>
</html>
