<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>MHX2023 EXHIBITOR | WELCOME</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content name="description" />
    <meta content name="author" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('assets/css/one-page-parallax/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/one-page-parallax/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

</head>
<body class="myhobbyexpo" data-bs-spy="scroll" data-bs-target="#header" data-bs-offset="120">

<div id="page-container" class="fade">

    <div id="header" class="header navbar navbar-transparent navbar-fixed-top navbar-expand-lg">
        <div class="container">

            <a href="{{ url('/') }}" class="navbar-brand py-3">
                <img src="{{ asset('assets/images/logo-nav.png') }}" alt="" class="img-fluid h-80px" style="max-height:500px;">
                {{--<span class="brand-logo"></span>--}}
                {{--<span class="brand-text">
                    <span class="text-theme">Color</span> Admin
                </span>--}}
            </a>

            <button type="button" class="navbar-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#header-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-end">
                    <li class="nav-item"><a class="nav-link" href="#home" data-click="scroll-to-target">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about" data-click="scroll-to-target">ABOUT US</a></li>
                    <li class="nav-item"><a class="nav-link" href="#stats" data-click="scroll-to-target">STATS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layout" data-click="scroll-to-target">LAYOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq" data-click="scroll-to-target">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact" data-click="scroll-to-target">CONTACT</a></li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="btn btn-indigo mb-4px" href="{{ route('preregister') }}" target="_blank">PRE-REGISTRATION</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div id="home" class="content has-bg home">
        {{--<div class="content-bg" style="background-image: url({{ asset('assets/images/bg-image.svg') }});" data-paroller="true" data-paroller-type="foreground" data-paroller-factor="-0.25">
        </div>--}}
        <div class="container home-content">
            <div class="row gx-3">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/left-image@4x.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/right-image@4x.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="content" data-scrollview="true">
        <div class="container py-5" data-animation="true" data-animation-type="animate__fadeInDown">
            <div class="row gx-5">
                <div class="col-lg-4">
                    <div class="about text-white">
                        <img src="{{ asset('assets/images/au-mission@2x.png') }}" alt="" class="img-fluid h-50px mb-10px">
                        <p>To invite youth in malaysia to enjoy the healthy and creative hobby instead of only socializing with social media. Helping to grow a very creative generations by involving in this kind of hobby scene.</p>
                        <p>Other than that, it is also motivated youth to startup a business that is so tiny in malaysia. What mhx can offer is a platform for malaysian to start entering new market of business which is hobby related!</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="about text-white">
                        <img src="{{ asset('assets/images/au-vission@2x.png') }}" alt="" class="img-fluid h-50px mb-10px">
                        <p>We believe that certain experiences help young people to develop fully and successfully from their passion of hobby. These include close relationships among friends, healthy competitions, engaging activities, opportunities to make a difference from creative mind, and continuity of support in every setting in which they live, work, and study.</p>
                        <p class="text-purple">“Hobby is not only about passion but, it is a part of enjoyment in life.”</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="about text-white">
                        <img src="{{ asset('assets/images/au-objective@2x.png') }}" alt="" class="img-fluid h-50px mb-10px">
                        <ul class="pl-1">
                            <li>To host our own much needed public hobby exhibition.</li>
                            <li>To build new connection between youth & senior under one roof</li>
                            <li>To gather all kind of hobbies and share knowledgeable art & inspiration</li>
                            <li>To explore the newest and most sought after manufacturers and products</li>
                            <li>To build brand recognition at an event entirely targeted towards hobby vendors and consumers</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div id="stats" class="content" data-scrollview="true">
        <div class="container py-5" data-animation="true" data-animation-type="animate__fadeInDown">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/prv-edition-portfolio@2x.png') }}" alt="" class="img-fluid mb-5">
                </div>
            </div>
            <div class="row row-space-10">
                <div class="col-lg-6 col-md-6">
                    <div class="work mb-30px">
                        <div class="image">
                            <a href="#"><img src="{{ asset('assets/img/work/work-img-1.jpg') }}" alt="Work 1" /></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title">EVENT DATE</span>
                            <span class="desc-text">30 & 31 July 2016</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="work mb-30px">
                        <div class="image">
                            <a href="#"><img src="{{ asset('assets/img/work/work-img-1.jpg') }}" alt="Work 1" /></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title">EVENT DATE</span>
                            <span class="desc-text">25 & 26 November 2017</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="work">
                        <div class="image">
                            <a href="#"><img src="{{ asset('assets/img/work/work-img-1.jpg') }}" alt="Work 1" /></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title">EVENT DATE</span>
                            <span class="desc-text">6 & 7 October 2018</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="work">
                        <div class="image">
                            <a href="#"><img src="{{ asset('assets/img/work/work-img-1.jpg') }}" alt="Work 1" /></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title">EVENT DATE</span>
                            <span class="desc-text">5 & 6 October 2019</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>--}}

    <div id="faq" class="content bg-light" data-scrollview="true">
        <div class="container py-5" data-animation="true" data-animation-type="animate__fadeInDown">

            <div class="mb-20px">
                <img src="{{ asset('assets/images/faq-exhibitor@2x.png') }}" alt="" class="img-fluid h-50px">
                <h4 class="h4 text-pink">FREQUENTLY ASK QUESTION</h4>
            </div>
            <ul class="custom-accordion mb-5">
                <li>
                    <a class="accordion-toggle" href=#>How many exhibitors can you accommodate?</a>
                    <p class="inner">
                        Well over 350 exhibitor with the space to expand if we need to as on 2019, we are moving to bigger hall @ 10,000m2.
                    </p>
                </li>

                <li>
                    <a class="accordion-toggle" href=#>What size spaces do you have available?</a>
                    <p class="inner">
                        We have a variety of different exhibition spaces available. Our smallest space starts at 2m x 2m all the way up to your request. We can also accommodate larger sizes on request. If you want more info on the spaces available, please request a copy of our exhibitor information pack and refer to the attached floor plan.
                    </p>
                </li>

                <li>
                    <a class="accordion-toggle" href=#>How much does it cost to exhibit?</a>
                    <p class="inner">
                        All of our stands are priced started from rm85 per 1m2.
                    </p>
                </li>

                <li>
                    <a class="accordion-toggle" href=#>Do you offer a shell scheme?</a>
                    <p class="inner">
                        Yes. Some of our smaller spaces from (3m x 3m) can be purchased as 'booth package’ including shell scheme and carpet.
                    </p>
                </li>

                <li>
                    <a class="accordion-toggle" href=#>Do you have sponsorship packages available?</a>
                    <p class="inner">
                        Yes we do have and we are seeking for a various type of sponsorship. Please contact us to know more about sponsorship matter.
                    </p>
                </li>

                <li>
                    <a class="accordion-toggle" href=#>Can we sponsor the event without exhibiting?</a>
                    <p class="inner">
                        Yes. We are aware that under certain circumstances it's not always ideal for you to exhibit but may well like to advertise your presence at the event. We have several advertising opportunities available please get in touch for more information.
                    </p>
                </li>

                <li>
                    <a class="accordion-toggle" href=#>Is there accommodation near by?</a>
                    <p class="inner">
                        There are a few hotels on site with many a short car ride away.
                    </p>
                </li>
            </ul>


            <div class="mb-20px">
                <img src="{{ asset('assets/images/faq-visitor@2x.png') }}" alt="" class="img-fluid h-50px">
                <h4 class="h4 text-pink">FREQUENTLY ASK QUESTION</h4>
            </div>
            <ul class="custom-accordion">
                <li>
                    <a href="#" class="accordion-toggle">What are the dates and times?</a>
                    <p class="inner">
                        The MHX2020 started on Saturday and Sunday (2nd & 3rd December 2023) from 10.00am - 10.00pm.
                    </p>
                </li>
                <li>
                    <a href="#" class="accordion-toggle">How much is admission fee?</a>
                    <p class="inner">
                        The admission are rm15.00 for 2 days for adults & rm5.00 per day for kids. Free admission for kids below 6 years old, oku & senior citizens. All visitors who are pay are entitled to get lucky draw number.
                    </p>
                </li>
                <li>
                    <a href="#" class="accordion-toggle">What companies are exhibiting?</a>
                    <p class="inner">
                        Please take a look at our exhibitor list by following a link in the header above. The exhibitor list is updated on a regular basis so please keep checking back for new additions.
                    </p>
                </li>
                <li>
                    <a href="#" class="accordion-toggle">Do I have to pay for car parking?</a>
                    <p class="inner">
                        Venue have more than 4,500 parking bays at outside area. There is no parking fees.
                    </p>
                </li>
                <li>
                    <a href="#" class="accordion-toggle">Will there be freebies and competitions?</a>
                    <p class="inner">
                        We can never guarantee what our exhibitors will choose to give away or when but it is likely that you will receive a lot of free samples and merchandise.
                    </p>
                </li>
                <li>
                    <a href="#" class="accordion-toggle">Are children allowed?</a>
                    <p class="inner">
                        Yes, of course! You can bring anyone especially you, your kids and family. Some zone are not for kids under 12 years old and school students.
                    </p>
                </li>
                <li>
                    <a href="#" class="accordion-toggle">Do you have disabled access?</a>
                    <p class="inner">
                        Yes, the venue site is accessible for the disabled by using elevator.
                    </p>
                </li>
            </ul>

        </div>
    </div>


    {{--<div id="team" class="content" data-scrollview="true">

        <div class="container">
            <h2 class="content-title">Our Team</h2>
            <p class="content-desc">
                Phasellus suscipit nisi hendrerit metus pharetra dignissim. Nullam nunc ante, viverra quis<br/>
                ex non, porttitor iaculis nisi.
            </p>

            <div class="row">

                <div class="col-lg-4">

                    <div class="team">
                        <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                            <img src="../assets/img/user/user-1.jpg" alt="Ryan Teller" />
                        </div>
                        <div class="info">
                            <h3 class="name">Ryan Teller</h3>
                            <div class="title text-theme">FOUNDER</div>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                            <div class="social">
                                <a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                <a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-lg-4">

                    <div class="team">
                        <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                            <img src="../assets/img/user/user-2.jpg" alt="Jonny Cash" />
                        </div>
                        <div class="info">
                            <h3 class="name">Johnny Cash</h3>
                            <div class="title text-theme">WEB DEVELOPER</div>
                            <p>Donec quam felis, ultricies nec, pellentesque eu sem. Nulla consequat massa vierra quis enim.</p>
                            <div class="social">
                                <a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                <a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-lg-4">

                    <div class="team">
                        <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                            <img src="../assets/img/user/user-3.jpg" alt="Mia Donovan" />
                        </div>
                        <div class="info">
                            <h3 class="name">Mia Donovan</h3>
                            <div class="title text-theme">WEB DESIGNER</div>
                            <p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean ligula imperdiet. </p>
                            <div class="social">
                                <a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                                <a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <div id="quote" class="content bg-black-darker has-bg" data-scrollview="true">

        <div class="content-bg" style="background-image: url(../assets/img/bg/bg-quote.jpg)" data-paroller-factor="0.5" data-paroller-factor-md="0.01" data-paroller-factor-xs="0.01">
        </div>


        <div class="container" data-animation="true" data-animation-type="animate__fadeInLeft">

            <div class="row">

                <div class="col-lg-12 quote">
                    <i class="fa fa-quote-left"></i> Passion leads to design, design leads to performance, <br/>
                    performance leads to <span class="text-theme">success</span>!
                    <i class="fa fa-quote-right"></i>
                    <small>Sean Themes, Developer Teams in Malaysia</small>
                </div>

            </div>

        </div>

    </div>


    <div id="service" class="content" data-scrollview="true">

        <div class="container">
            <h2 class="content-title">Our Services</h2>
            <p class="content-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br/>
                sed bibendum turpis luctus eget
            </p>

            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="service">
                        <div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-cog"></i></div>
                        <div class="info">
                            <h4 class="title">Easy to Customize</h4>
                            <p class="desc">Duis in lorem placerat, iaculis nisi vitae, ultrices tortor. Vestibulum molestie ipsum nulla. Maecenas nec hendrerit eros, sit amet maximus leo.</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="service">
                        <div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-paint-brush"></i></div>
                        <div class="info">
                            <h4 class="title">Clean & Careful Design</h4>
                            <p class="desc">Etiam nulla turpis, gravida et orci ac, viverra commodo ipsum. Donec nec mauris faucibus, congue nisi sit amet, lobortis arcu.</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="service">
                        <div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-file"></i></div>
                        <div class="info">
                            <h4 class="title">Well Documented</h4>
                            <p class="desc">Ut vel laoreet tortor. Donec venenatis ex velit, eget bibendum purus accumsan cursus. Curabitur pulvinar iaculis diam.</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="service">
                        <div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-code"></i></div>
                        <div class="info">
                            <h4 class="title">Re-usable Code</h4>
                            <p class="desc">Aenean et elementum dui. Aenean massa enim, suscipit ut molestie quis, pretium sed orci. Ut faucibus egestas mattis.</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="service">
                        <div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-shopping-cart"></i></div>
                        <div class="info">
                            <h4 class="title">Online Shop</h4>
                            <p class="desc">Quisque gravida metus in sollicitudin feugiat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="service">
                        <div class="icon" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-heart"></i></div>
                        <div class="info">
                            <h4 class="title">Free Support</h4>
                            <p class="desc">Integer consectetur, massa id mattis tincidunt, sapien erat malesuada turpis, nec vehicula lacus felis nec libero. Fusce non lorem nisl.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <div id="action-box" class="content has-bg" data-scrollview="true">

        <div class="content-bg" style="background-image: url(../assets/img/bg/bg-action.jpg)" data-paroller-factor="0.5" data-paroller-factor-md="0.01" data-paroller-factor-xs="0.01">
        </div>


        <div class="container" data-animation="true" data-animation-type="animate__fadeInRight">

            <div class="row action-box">

                <div class="col-lg-9">
                    <div class="icon-large text-theme">
                        <i class="fa fa-binoculars"></i>
                    </div>
                    <h3>CHECK OUT OUR ADMIN THEME!</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus faucibus magna eu lacinia eleifend.
                    </p>
                </div>


                <div class="col-lg-3">
                    <a href="#" class="btn btn-outline-white btn-theme btn-block">Live Preview</a>
                </div>

            </div>

        </div>

    </div>





    <div id="client" class="content has-bg bg-green" data-scrollview="true">

        <div class="content-bg" style="background-image: url(../assets/img/bg/bg-client.jpg)" data-paroller-factor="0.5" data-paroller-factor-md="0.01" data-paroller-factor-xs="0.01">
        </div>


        <div class="container" data-animation="true" data-animation-type="animate__fadeInUp">
            <h2 class="content-title">Our Client Testimonials</h2>

            <div class="carousel testimonials slide" data-ride="carousel" id="testimonials">

                <div class="carousel-inner text-center">

                    <div class="carousel-item active">
                        <blockquote>
                            <i class="fa fa-quote-left"></i>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra, nulla ut interdum fringilla,<br/>
                            urna massa cursus lectus, eget rutrum lectus neque non ex.
                            <i class="fa fa-quote-right"></i>
                        </blockquote>
                        <div class="name"> — <span class="text-theme">Mark Doe</span>, Designer</div>
                    </div>


                    <div class="carousel-item">
                        <blockquote>
                            <i class="fa fa-quote-left"></i>
                            Donec cursus ligula at ante vulputate laoreet. Nulla egestas sit amet lorem non bibendum.<br/>
                            Nulla eget risus velit. Pellentesque tincidunt velit vitae tincidunt finibus.
                            <i class="fa fa-quote-right"></i>
                        </blockquote>
                        <div class="name"> — <span class="text-theme">Joe Smith</span>, Developer</div>
                    </div>


                    <div class="carousel-item">
                        <blockquote>
                            <i class="fa fa-quote-left"></i>
                            Sed tincidunt quis est sed ultrices. Sed feugiat auctor ipsum, sit amet accumsan elit vestibulum<br/>
                            fringilla. In sollicitudin ac ligula eget vestibulum.
                            <i class="fa fa-quote-right"></i>
                        </blockquote>
                        <div class="name"> — <span class="text-theme">Linda Adams</span>, Programmer</div>
                    </div>

                </div>


                <ol class="carousel-indicators m-b-0">
                    <li data-bs-target="#testimonials" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#testimonials" data-bs-slide-to="1" class></li>
                    <li data-bs-target="#testimonials" data-bs-slide-to="2" class></li>
                </ol>

            </div>

        </div>

    </div>


    <div id="pricing" class="content" data-scrollview="true">

        <div class="container">
            <h2 class="content-title">Our Price</h2>
            <p class="content-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br/>
                sed bibendum turpis luctus eget
            </p>

            <ul class="pricing-table pricing-col-4">
                <li data-animation="true" data-animation-type="animate__fadeInUp">
                    <div class="pricing-container">
                        <h3>Starter</h3>
                        <div class="price">
                            <div class="price-figure">
                                <span class="price-number">FREE</span>
                            </div>
                        </div>
                        <ul class="features">
                            <li>1GB Storage</li>
                            <li>2 Clients</li>
                            <li>5 Active Projects</li>
                            <li>5 Colors</li>
                            <li>Free Goodies</li>
                            <li>24/7 Email support</li>
                        </ul>
                        <div class="footer">
                            <a href="#" class="btn btn-inverse btn-theme btn-block">Buy Now</a>
                        </div>
                    </div>
                </li>
                <li data-animation="true" data-animation-type="animate__fadeInUp">
                    <div class="pricing-container">
                        <h3>Basic</h3>
                        <div class="price">
                            <div class="price-figure">
                                <span class="price-number">$9.99</span>
                                <span class="price-tenure">per month</span>
                            </div>
                        </div>
                        <ul class="features">
                            <li>2GB Storage</li>
                            <li>5 Clients</li>
                            <li>10 Active Projects</li>
                            <li>10 Colors</li>
                            <li>Free Goodies</li>
                            <li>24/7 Email support</li>
                        </ul>
                        <div class="footer">
                            <a href="#" class="btn btn-inverse btn-theme btn-block">Buy Now</a>
                        </div>
                    </div>
                </li>
                <li class="highlight" data-animation="true" data-animation-type="animate__fadeInUp">
                    <div class="pricing-container">
                        <h3>Premium</h3>
                        <div class="price">
                            <div class="price-figure">
                                <span class="price-number">$19.99</span>
                                <span class="price-tenure">per month</span>
                            </div>
                        </div>
                        <ul class="features">
                            <li>5GB Storage</li>
                            <li>10 Clients</li>
                            <li>20 Active Projects</li>
                            <li>20 Colors</li>
                            <li>Free Goodies</li>
                            <li>24/7 Email support</li>
                        </ul>
                        <div class="footer">
                            <a href="#" class="btn btn-primary btn-theme btn-block">Buy Now</a>
                        </div>
                    </div>
                </li>
                <li data-animation="true" data-animation-type="animate__fadeInUp">
                    <div class="pricing-container">
                        <h3>Lifetime</h3>
                        <div class="price">
                            <div class="price-figure">
                                <span class="price-number">$999</span>
                            </div>
                        </div>
                        <ul class="features">
                            <li>Unlimited Storage</li>
                            <li>Unlimited Clients</li>
                            <li>Unlimited Projects</li>
                            <li>Unlimited Colors</li>
                            <li>Free Goodies</li>
                            <li>24/7 Email support</li>
                        </ul>
                        <div class="footer">
                            <a href="#" class="btn btn-inverse btn-theme btn-block">Buy Now</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </div>--}}


    <div id="contact" class="content" data-scrollview="true">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6 text-white" data-animation="true" data-animation-type="animate__fadeInLeft">
                    <img src="{{ asset('assets/images/contact-us@2x.png') }}" alt="" class="img-fluid h-100px mb-4">
                    {{--<h3>If you have a project you would like to discuss, get in touch with us.</h3>--}}
                    <p>If you need to get in contact with us you can do so in the following ways:</p>
                    <p>
                        <strong>MALAYSIA HOBBY EXPO SECRETARIAT</strong><br/>
                        <strong>SPECTA GROUP VENTURE</strong><br/>
                        39B, Jalan Kampar Sentul Selatan<br/>
                        51000 Kuala Lumpur<br/> <br>
                        Office: <a class="text-white" href="tel:+603-2387 0090">+603-2387 0090</a><br/>
                        Email: <a class="text-white" href="mailto:myhobbyexpo@gmail.com">myhobbyexpo@gmail.com</a><br/>
                    </p>
                    <p>
                        <strong>MHX2023 Overseas Secretariat &</strong> <br>
                        <strong>Sponsorship enquiry:</strong> <br>
                        Mr. Apis Azmi: <a class="text-white" href="tel:+6013-222 2310">+6013-222 2310</a> <br>
                        Mr. Faris: <a class="text-white" href="tel:">+6019-932 3137</a> <br>
                    </p>
                    <p>
                        <strong>MHX2023 Booking & Enquiry:</strong> <br>
                        Ms. Syaz: <a class="text-white" href="tel:+6011-7008 0331">+6011-7008 0331</a> <br>
                        Ms. leya: <a class="text-white" href="tel:+6011-7008 0332">+6011-7008 0332</a> <br>
                        Mrs: Nadia: <a href="tel:+616-347 7295" class="text-white">+616-347 7295</a> <br>
                    </p>
                </div>

                <div class="col-lg-6 form-col" data-animation="true" data-animation-type="animate__fadeInRight">
                    <form action="#" method="POST" class="form-horizontal">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3 text-lg-right text-white">Name <span class="text-indigo">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3 text-lg-right text-white">Email <span class="text-indigo">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3 text-lg-right text-white">Message <span class="text-indigo">*</span></label>
                            <div class="col-lg-9">
                                <textarea class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3 text-lg-right"></label>
                            <div class="col-lg-9 text-left">
                                <button type="submit" class="btn btn-indigo btn-primary btn-block">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="footer" class="footer">
        <div class="container">
            <div class="footer-brand">
                {{--<div class="footer-brand-logo"></div>
                Color Admin--}}
                <img src="{{ asset('assets/images/logo-nav.png') }}" alt="" class="img-fluid">
            </div>
            <p>
                &copy; Copyright of Malaysia Hobby Expo {{ date('Y') }} <br/>
                {{--An admin & front end theme with serious impact.--}} Powered and designed by <a class="text-indigo" href="#">Ardia Nexus Sdn. Bhd.</a>
            </p>
            {{--<p class="social-list">
                <a href="#"><i class="fab fa-facebook-f fa-fw"></i></a>
                <a href="#"><i class="fab fa-instagram fa-fw"></i></a>
                <a href="#"><i class="fab fa-twitter fa-fw"></i></a>
                <a href="#"><i class="fab fa-google-plus-g fa-fw"></i></a>
                <a href="#"><i class="fab fa-dribbble fa-fw"></i></a>
            </p>--}}
        </div>
    </div>

</div>


<script src="{{ asset('assets/js/one-page-parallax/vendor.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/one-page-parallax/app.min.js') }}" type="text/javascript"></script>

<script>
    $('.accordion-toggle').click(function(e) {
        e.preventDefault();

        let $this = $(this);

        if ($this.next().hasClass('show')) {
            $this.next().removeClass('show');
            $this.next().slideUp(350);
        } else {
            $this.parent().parent().find('li .inner').removeClass('show');
            $this.parent().parent().find('li .inner').slideUp(350);
            $this.next().toggleClass('show');
            $this.next().slideToggle(350);
        }
    });
</script>

</body>
</html>
