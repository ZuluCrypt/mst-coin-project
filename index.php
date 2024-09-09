<?php include("db_connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X_UA_Compatible" content="ie-edge">
    <title>MST COIN</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Young Serif' rel='stylesheet'>
    <link rel="icon" href="images/logo2.png" type="image/x-icon">
    <script defer src="JS_index.js"></script>
</head>

<body>
    <header>
        <nav>
            <img src="images/logo.png" alt="MST COIN">
            <ul>
                <li><a href="#top">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#benefits">Benefits</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#contact">Contact</a></li>
                <!-- <li class="topnav-left"><a href="#">&#9776;</a> -->
            </ul>
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <li><a href="#top">Home</a></li>
                <li><a href="#benefits">Benefits</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#contact">Contact</a></li>
            </div>

            <!-- Use any element to open the sidenav -->
            <div class="menu-icon">
                <span onclick="openNav()">&#9776;</span>
            </div>

        </nav>
        <h1>Welcome to <div class="bouncing-text"><div class="m">M</div><div class="s">S</div><div class="t">T</div><div class="shadow"></div><div class="shadow-two"></div></div> <span>Coin</span></h1>
        <p>Empowering varsity students with a revolutionary cryptocurrency.</p>
        <a href="signup.php" class="cta">Get Started</a>
    </header>
    <main>
        <button onclick="topFunction()" id="myBtn" title="Go to top">&#8383;</button>
        <!-- <section id="benefits">
            <h2>Benefits of MST Coin</h2>
            <ul>
                <li>Financial empowerment for students</li>
                <li>Flexible and profitable investment opportunities</li>
                <li>Supporting student life expenses</li>
                <li>Exclusive offers and incentives</li>
            </ul>
        </section> -->

        <section id="benefits">
            <h2>Benefits of MST Coin</h2>
            <div class="benefit">
                <img src="images/benefit 1.jpeg" alt="benefit 1">
                <h3>Financial empowerment for students</h3>
                <p>Reduces financial stress for students.<br>
                    Promotes financial literacy and responsibility.<br>
                    Helps students work towards long-term financial goals.</p>
            </div>
            <div class="benefit">
                <img src="images/benefit 2.jpeg" alt="benefit 1">
                <h3>Flexible and profitable investment opportunities</h3>
                <p>Offers high returns of 50% to 100%.<br>
                    Allows short-term investment with a minimum holding period.<br>
                    Encourages diversification of investment portfolios.</p>
            </div>
            <div class="benefit">
                <img src="images/benefit 3.jpeg" alt="benefit 1">
                <h3>Supporting student life expenses</h3>
                <p>Covers tuition, textbooks, and everyday living expenses.<br>
                    Reduces reliance on loans and debt accumulation.</p>
            </div>
            <!-- <div class="benefit">
                <img src="images/benefit 4.jpeg" alt="benefit 1">
                <h3>Exclusive offers and incentives</h3>
                <p>Potential partnerships with educational institutions.<br>
                    Provides exclusive rewards, bonuses, and community engagement.<br>
                    Offers financial education resources and workshops for students.</p>
            </div> -->
        </section>

        <section id="about">
            <h2>About Us</h2>
            <p>At MST Coin, we are driven by a shared passion to revolutionize the way university students manage their
                finances and navigate the challenges of academic life. Founded by a dedicated team of three individuals
                who understand the unique financial struggles faced by students, our company is committed to making a
                positive impact on the lives of young scholars.</p>

            </head>

            <body>
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 8</div>
                        <img src="images/logo.png" style="width:100%">
                        <div class="text">Virtual Coin Auctions:

                            MST Coin provides a platform for university students to participate in virtual coin
                            auctions.
                            Students can purchase MST Coins during these auctions.</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 8</div>
                        <img src="images/back10.jpg" style="width:100%">
                        <div class="text"><strong>Profitable Investments:</strong>

                            MST Coin offers a profitable investment opportunity, allowing students to earn returns of
                            50% to 150% in just 10 days when they sell their coins in subsequent auctions.</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 8</div>
                        <img src="images/back8.jpg" style="width:100%">
                        <div class="text"><strong>Flexible Investment Duration:</strong>

                            Students can choose to hold their MST Coins for a minimum of 10 to 20 days, providing
                            flexibility to their investment strategy.</div>
                    </div>
                    <div class="mySlides fade">
                        <div class="numbertext">4 / 8</div>
                        <img src="images/back7.jpg" style="width:100%">
                        <div class="text"><strong>Financial Empowerment:</strong>

                            MST Coin empowers students by reducing financial stress and supporting their financial
                            well-being during their university years.</div>
                    </div>
                    <div class="mySlides fade">
                        <div class="numbertext">5 / 8</div>
                        <img src="images/back5.jpeg" style="width:100%">
                        <div class="text"><strong>Financial Literacy Promotion:</strong>

                            The platform encourages financial literacy among students, providing them with valuable
                            insights into investments and financial management.</div>
                    </div>
                    <div class="mySlides fade">
                        <div class="numbertext">6 / 8</div>
                        <img src="images/back12.jpg" style="width:100%">
                        <div class="text"><strong>Support for Student Expenses:
                            </strong>
                            MST Coin funds can be used to cover various student expenses, including tuition fees,
                            textbooks, rent, groceries, and more.</div>
                    </div>
                    <div class="mySlides fade">
                        <div class="numbertext">7 / 8</div>
                        <img src="images/hero.jpeg" style="width:100%">
                        <div class="text"><strong>Exclusive Rewards and Incentives:
                            </strong>
                            MST Coin offers exclusive rewards and bonuses to students, fostering a sense of community
                            and engagement.
                        </div>
                    </div>
                    <div class="mySlides fade">
                        <div class="numbertext">8 / 8</div>
                        <img src="images/back9.jpg" style="width:100%">
                        <div class="text"><strong>Partnerships with Educational Institutions:</strong>

                            MST Coin can partner with educational institutions to provide additional benefits and
                            incentives to students from partner schools, creating a mutually beneficial relationship.
                        </div>
                    </div>

                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>




        </section>
        <section id="team">

            <h2>The Co-Founders</h2>
            <p>MST Coin is led by a dynamic team of three individuals who bring a wealth of expertise in finance,
                technology, and education. Our combined experience allows us to navigate the complex landscape of
                student financial services while maintaining a student-centric approach. We are dedicated to ensuring
                the utmost transparency, security, and reliability in our operations.</p>
            <div class="card-container">
                <div class="card">
                    <img src="images/manzi.png" alt="benefit 1">
                    <h3>CEO</h3>
                    <p>Manzezulu Mazibuko is foreign exchange trading expect with skills in computer science and
                        blockchain
                        maintainance...</p>
                </div>
                <div class="card">
                    <img src="images/sangw.png" alt="benefit 1">
                    <h3>CTO </h3>
                    <p>Sange Mqayi brings in years of experience in computer science and information technology...</p>
                </div>
                <div class="card">
                    <img src="images/mageba.png" alt="benefit 1">
                    <h3>CCO</h3>
                    <p>Thandokuhle Zulu brings in years of experience in computer science with Networks and security...
                    </p>
                </div>
            </div>
        </section>
        <section id="contact">
            <h2>Get in Touch</h2>
            <p>If you have any questions or would like to discuss partnership opportunities, please feel free to contact
                us:</p>
            <form method="post" action="process_contact_form.php">
                <label for="name">Your name:</label>
                <input type="text" id="name" name="name" required>
                <?php if (isset($errors["name"])) { ?>
                    <p class="error">
                        <?php echo $errors["name"]; ?>
                    </p>
                <?php } ?>

                <label for="email">Your email:</label>
                <input type="email" id="email" name="email" required>
                <?php if (isset($errors["email"])) { ?>
                    <p class="error">
                        <?php echo $errors["email"]; ?>
                    </p>
                <?php } ?>

                <label for="message">Your message:</label>
                <textarea id="message" name="message" required></textarea>
                <?php if (isset($errors["message"])) { ?>
                    <p class="error">
                        <?php echo $errors["message"]; ?>
                    </p>
                <?php } ?>

                <button type="submit">Submit</button>
            </form>
        </section>


    </main>
    <footer class="footer">
        <div class="footer__str">
            <!-- Service section -->
            <section class="footer__str-cell _one-quarter">
                <h4 class="footer__list-title">Services</h4>
                <ul class="footer__list">
                    <li>
                        <a target="_blank" class="footer__list-link" href="#">Contact Us</a>
                    </li>
                    <li>
                        <a class="footer__list-link" href="javascript:void(0);" onclick="toggleFAQ()">FAQ</a>
                        <div id="faq-container" class="faq-container">
                            <!-- FAQ items -->
                            <div class="faq-item">
                                <h3 class="question">1. What is MST Coin?</h3>
                                <div class="answer">MST Coin is a revolutionary cryptocurrency designed to empower
                                    university students. It offers a financial solution tailored to the unique needs of
                                    students, aiming to reduce financial stress and support their financial goals.</div>
                            </div>
                            <div class="faq-item">
                                <h3 class="question">How does MST Coin work?</h3>
                                <div class="answer">MST Coin operates on a blockchain technology platform, providing
                                    students with flexible and profitable investment opportunities. Students can invest
                                    in MST Coin, earn returns, and use it to cover tuition, living expenses, and more.
                                </div>
                            </div>
                            <div class="faq-item">
                                <h3 class="question">What are the benefits of using MST Coin?</h3>
                                <div class="answer">Financial Empowerment <br>
                                    Investment Opportunities <br>
                                    Support for Student Expenses <br>
                                    Exclusive Offers</div>
                            </div>
                            <div class="faq-item">
                                <h3 class="question">Who are the co-founders of MST Coin?</h3>
                                <div class="answer">MST Coin is led by a dynamic team of co-founders with expertise in
                                    finance, technology, and education. The co-founders include Manzezulu Mazibuko
                                    (CEO), Sange Mqayi (CTO), and Thandokuhle Zulu (CCO).</div>
                            </div>
                            <div class="faq-item">
                                <h3 class="question">How can I get in touch with MST Coin?</h3>
                                <div class="answer">If you have any questions or want to explore partnership
                                    opportunities, please feel free to contact us through our website or email us at
                                    [contact@email.com]. We are here to assist you.</div>
                            </div>
                            <div class="faq-item">
                                <h3 class="question">Is MST Coin available for all students?</h3>
                                <div class="answer">Yes, MST Coin is available to university students worldwide. We aim
                                    to provide financial empowerment to students from various educational backgrounds.
                                </div>
                            </div>
                            <div class="faq-item">
                                <h3 class="question">Can I use MST Coin for everyday transactions?</h3>
                                <div class="answer">MST Coin can be used for various transactions, including paying for
                                    education-related expenses, making investments, and participating in exclusive
                                    offers and incentives..</div>
                            </div>
                            <div class="faq-item">
                                <h3 class="question">What security measures does MST Coin have in place?</h3>
                                <div class="answer">MST Coin prioritizes security and employs blockchain technology to
                                    ensure transparency and reliability in its operations. Additionally, stringent
                                    security protocols are implemented to safeguard users' investments and personal
                                    information.</div>
                            </div>
                            <div class="faq-item">
                                <h3 class="question">How do I sign up for MST Coin?</h3>
                                <div class="answer">You can sign up for MST Coin by visiting our website and following
                                    the registration process. We provide a user-friendly platform to get you started on
                                    your journey to financial empowerment.</div>
                            </div>

                            <!-- Add more FAQ items as needed -->
                        </div>
                    </li>

                    <!-- Add more service links as needed -->
                </ul>
            </section>

            <!-- Offers section -->
            <section class="footer__str-cell _one-quarter">
                <h4 class="footer__list-title">Offers</h4>
                <ul class="footer__list">
                    <li>
                        <a target="_blank" class="footer__list-link" href="#">Special Offers</a>
                    </li>
                    <li>
                        <a target="_blank" class="footer__list-link" href="#">Promotions</a>
                    </li>
                    <!-- Add more offer links as needed -->
                </ul>
            </section>

            <!-- Legal information section -->
            <section class="footer__str-cell _one-quarter">
                <h4 class="footer__list-title">Legal Information</h4>
                <ul class="footer__list">
                    <li>
                        <a target="_blank" class="footer__list-link" href="#">Terms of Service</a>
                    </li>
                    <li>
                        <a target="_blank" class="footer__list-link" href="#">Privacy Policy</a>
                    </li>
                    <!-- Add more legal links as needed -->
                </ul>
            </section>

            <!-- Social and Personal Area section -->
            <section class="footer__str-cell _one-quarter _social">
                <h4 class="footer__list-title">Social Media</h4>
                <ul class="footer__list _social">
                    <li>
                        <a href="#" target="_blank" rel="noopener" class="footer__list-link">
                            <svg class="footer__social-icon _facebook">
                                <a href="#" class="fa fa-facebook"></a>
                            </svg> Facebook
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" rel="noopener" class="footer__list-link">
                            <svg class="footer__social-icon _twitter">

                                <a href="#" class="fa fa-twitter"></a>
                            </svg> Twitter
                        </a>
                    </li>
                    <!-- Add more social media links as needed -->
                </ul>
            </section>
        </div>

        <!-- Copyright section -->
        <div class="footer__str">
            <section class="footer__str-cell _full">
                <div class="footer__text-block _grey">
                    <div>
                        <p>&copy; 2023 MST. All rights reserved.</p>
                    </div>
                </div>
            </section>
        </div>
    </footer>

</body>

</html>