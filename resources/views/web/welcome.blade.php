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
<body class="myhobbyexpo" data-bs-spy="scroll" data-bs-target="#header" data-bs-offset="51">

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
                    <li class="nav-item"><a class="nav-link" href="#about" data-click="scroll-to-target">ABOUT US</a></li>
                    <li class="nav-item"><a class="nav-link" href="#stats" data-click="scroll-to-target">STATS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layout" data-click="scroll-to-target">LAYOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq" data-click="scroll-to-target">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact" data-click="scroll-to-target">CONTACT</a></li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="btn btn-primary mb-4px" href="{{ route('preregister') }}" target="_blank">Pre Register</a>
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


    <div id="milestone" class="content bg-black-darker has-bg" data-scrollview="true" style="height: 100vh;">
        {{--<div class="content-bg" style="background-image: url({{ asset('assets/images/about-us-bg@4x.png') }}); background-position:top; background-size:cover;"></div>--}}

        <div class="container">
            <div class="row">
                <div class="col-md-4">

                </div>
            </div>
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


    <div id="work" class="content" data-scrollview="true">

        <div class="container" data-animation="true" data-animation-type="animate__fadeInDown">
            <h2 class="content-title">Our Latest Work</h2>
            <p class="content-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br/>
                sed bibendum turpis luctus eget
            </p>

            <div class="row row-space-10">

                <div class="col-lg-3 col-md-4">

                    <div class="work">
                        <div class="image">
                            <a href="#"><img src="../assets/img/work/work-img-1.jpg" alt="Work 1" /></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title">Aliquam molestie</span>
                            <span class="desc-text">Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>

                </div>


                <div class="col-lg-3 col-md-4">

                    <div class="work">
                        <div class="image">
                            <a href="#"><img src="../assets/img/work/work-img-2.jpg" alt="Work 2" /></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title">Quisque at pulvinar lacus</span>
                            <span class="desc-text">Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>

                </div>


                <div class="col-lg-3 col-md-4">

                    <div class="work">
                        <div class="image">
                            <a href="#"><img src="../assets/img/work/work-img-3.jpg" alt="Work 3" /></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title">Vestibulum et erat ornare</span>
                            <span class="desc-text">Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>

                </div>


                <div class="col-lg-3 col-md-4">

                    <div class="work">
                        <div class="image">
                            <a href="#"><img src="../assets/img/work/work-img-4.jpg" alt="Work 4" /></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title">Sed vitae mollis magna</span>
                            <span class="desc-text">Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>

                </div>


                <div class="col-lg-3 col-md-4">

                    <div class="work">
                        <div class="image">
                            <a href="#"><img src="../assets/img/work/work-img-5.jpg" alt="Work 5" /></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title">Suspendisse at mattis odio</span>
                            <span class="desc-text">Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>

                </div>


                <div class="col-lg-3 col-md-4">

                    <div class="work">
                        <div class="image">
                            <a href="#"><img src="../assets/img/work/work-img-6.jpg" alt="Work 6" /></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title">Aliquam vitae commodo diam</span>
                            <span class="desc-text">Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>

                </div>


                <div class="col-lg-3 col-md-4">

                    <div class="work">
                        <div class="image">
                            <a href="#"><img src="../assets/img/work/work-img-7.jpg" alt="Work 7" /></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title">Phasellus eu vehicula lorem</span>
                            <span class="desc-text">Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>

                </div>


                <div class="col-lg-3 col-md-4">

                    <div class="work">
                        <div class="image">
                            <a href="#"><img src="../assets/img/work/work-img-8.jpg" alt="Work 8" /></a>
                        </div>
                        <div class="desc">
                            <span class="desc-title">Morbi bibendum pellentesque</span>
                            <span class="desc-text">Lorem ipsum dolor sit amet</span>
                        </div>
                    </div>

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

    </div>


    <div id="contact" class="content bg-light" data-scrollview="true">

        <div class="container">
            <h2 class="content-title">Contact Us</h2>
            <p class="content-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br/>
                sed bibendum turpis luctus eget
            </p>

            <div class="row">

                <div class="col-lg-6" data-animation="true" data-animation-type="animate__fadeInLeft">
                    <h3>If you have a project you would like to discuss, get in touch with us.</h3>
                    <p>
                        Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus.
                    </p>
                    <p>
                        <strong>SeanTheme Studio, Inc</strong><br/>
                        795 Folsom Ave, Suite 600<br/>
                        San Francisco, CA 94107<br/>
                        P: (123) 456-7890<br/>
                    </p>
                    <p>
                        <span class="phone">+11 (0) 123 456 78</span><br/>
                        <a href="../../../cdn-cgi/l/email-protection.html#f39b969f9f9cb3969e929a9f92979781968080dd909c9e" class="text-theme"><span class="__cf_email__" data-cfemail="730016121d071b161e160033000603031c01075d101c1e">[email&#160;protected]</span></a>
                    </p>
                </div>


                <div class="col-lg-6 form-col" data-animation="true" data-animation-type="animate__fadeInRight">
                    <form class="form-horizontal">
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3 text-lg-right">Name <span class="text-theme">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3 text-lg-right">Email <span class="text-theme">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3 text-lg-right">Message <span class="text-theme">*</span></label>
                            <div class="col-lg-9">
                                <textarea class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-form-label col-lg-3 text-lg-right"></label>
                            <div class="col-lg-9 text-left">
                                <button type="submit" class="btn btn-theme btn-primary btn-block">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>--}}


    <div id="footer" class="footer">
        <div class="container">
            <div class="footer-brand">
                {{--<div class="footer-brand-logo"></div>
                Color Admin--}}
                <img src="{{ asset('assets/images/logo-nav.png') }}" alt="" class="img-fluid">
            </div>
            <p>
                &copy; Copyright of Malaysia Hobby Expo {{ date('Y') }} <br/>
                {{--An admin & front end theme with serious impact. Created by <a href="#">Ardia Nexus Sdn. Bhd.--}}</a>
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

</body>
</html>
