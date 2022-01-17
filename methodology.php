<?php include_once 'inc/head.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="css/about.css" />
</head>

<body>

    <?php include_once 'inc/header.php'; ?>
    <?php include_once 'inc/navbar.php'; ?>

    <section class="about-banner">
        <div class="container">
            <div class="row banner_inner_content">
                <div class="col-md">
                    <h2>Our Methodology</h2>
                    <p>Our methodology of teaching Spanish follows the Common European Framework of Reference for Languages (CEFR) and focuses on learning through action and a communicative approach.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="methodology">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Our Teaching Methodology</h2>
                    <p>At Modern School of Languages, in addition to teaching grammar and vocabulary, we focus on useful conversational topics that will be applicable to students’ career, everyday lives and their interest. This allows learners of all levels to quickly apply what they learn during classes to real life situations. We tend to ensure that each sentence, activity and topic builds towards fluency.</p>
                    <p>Our students become fluent in particular language while discovering their culture, lifestyles, history and traditions, as well as new perspectives. Join us for a unique and personalized Spanish learning journey that will inspire you.</p>
                    <p>All our language courses are aligned with CEFR levels, so once you know your level, we can suggest you your level to get your progress going immediately. If you are not sure about your level, you can <a href="contact.php">contact us</a> to take our CEFR level test. </p>
                </div>
                <div class="col-md-6">
                    <img src="images/methodology-1.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="language_proficiency">
        <div class="container">
            <h2 class="mb-4 text-center">CEFR language proficiency levels</h2>
            <div class="row">
                <div class="col-md">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">A1 – Absolute beginner</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Can introduce </strong>yourself and others, as well as ask and answer personal questions.</p>
                            <p><strong>Can understand </strong>and use familiar everyday expressions and very basic sentences.</p>
                            <p><strong>Can interact </strong>in a simple way with a slow-speaking conversation partner.</p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">A2 - Beginner</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Can understand </strong>sentences and frequently used expressions related to familiar topics.</p>
                            <p><strong>Can communicate </strong>in simple and routine tasks and exchange familiar matters, but struggle to keep the conversation going <span class="text-danger">on</span></p>
                            <p><strong>Can describe </strong>the aspects of your background and immediate environment in simple terms.</p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">B1 - Intermediate</h4>
                        </div>
                        <div class="card-body">

                            <p><strong>Can understand </strong>the familiar matters like work, school, leisure, etc.</p>
                            <p><strong>Can deal </strong>with most situations likely to arise whilst travelling in an area where the language is spoken.</p>
                            <p><strong>Can write </strong>simple connected text on familiar topics which are familiar or of personal interest.</p>

                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">B2 - Upper-intermediate</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Can understand </strong>main ideas of complex text on both general and specific topics. This includes technical discussions in your field of specialization.</p>
                            <p><strong>Can communicate </strong>with native speakers, easily understand them and express yourself without strain.</p>
                            <p><strong>Can write </strong>clear, elaborate text and explain viewpoints on a particular topic by giving pros and cons.</p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">C1 - Advanced</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Can write </strong>clear, well-structured, detailed and complicated texts on complex subjects. </p>
                            <p><strong>Can express </strong>yourself fluently without thinking about language. </p>
                            <p><strong>Can use </strong>language effectively for social, academic and professional purposes</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">C2 - Advanced</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Can understand </strong>with ease virtually everything heard or read.</p>
                            <p><strong>Can express </strong>yourself fluently, precisely and spontaneously even in more complex situations.</p>
                            <p><strong>Can summarize </strong>information and arguments from different sources and reconstruct them. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include_once 'inc/footer.php'; ?>


    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="owl-carousel/owl.carousel.min.js"></script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>

</body>

</html>