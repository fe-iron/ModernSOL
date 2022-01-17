<?php include_once 'inc/head.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>services Language</title>
    <link rel="stylesheet" href="css/services.css" />
</head>

<body>

    <?php include_once 'inc/header.php'; ?>
    <?php include_once 'inc/navbar.php'; ?>

    <section class="services-banner">
        <div class="container">
            <div class="row services_inner_content">
                <div class="col-md">
                    <h2>Language Level Test</h2>
                    <p>At Modern School of Languages, Our aim is to provide you with the best possible learning environment at our school</p>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="international">
        <div class="container">
            <h2 class="mb-1 text-center mb-3">International language exams </h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card"> <img src="images/dele logo.png" alt=""></div>
                </div>
                <div class="col-md-3">
                    <div class="card"><img src="images/delf.png" alt=""></div>
                </div>
                <div class="col-md-3">
                    <div class="card"><img src="images/geothe.png" alt=""></div>
                </div>
                <div class="col-md-3">
                    <div class="card"><img src="images/siele.jfif" alt=""></div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- <section class="why_learn_services">
        <div class="container">
            <h2 class="text-center mb-4">Language Level Test</h2>
            <div class="row">
                <div class="col-md">
                    <div class="why-learn-services-content">
                        <p>All our language courses are aligned with CEFR levels, so once you know your level, we can suggest you your level to get your progress going immediately. If you are not sure about your level, you can Fill Enquiry Form to take our CEFR level test. </p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="welcome">
        <div class="container">
            <div class="row">
                <div class="col-md mb-3">
                    <h4 class="mb-1">Language Level Test</h4>
                    <p>All our language courses are aligned with CEFR levels, so once you know your level, we can suggest you your level to get your progress going immediately. If you are not sure about your level, you can Fill Enquiry Form to take our CEFR level test. </p>
                </div>
                <div class="col-md">
                    <h4 class="mb-3">Fill Enquiry Form</h4>
                    <form>
                        <div class="form-row">
                            <div class="col mb-3">
                                <input type="text" class="form-control name" placeholder="Enter Your Name *" required="" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col mb-3">
                                <input type="tel" class="form-control phone" placeholder="Enter Phone Number *" required="" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col mb-3">
                                <input type="email" class="form-control email" placeholder="Enter Email Id *" required="" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col mb-3">
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="showDiv(this)">
                                    <option selected>Select Course</option>
                                    <option value="1">German</option>
                                    <option value="2">French</option>
                                    <option value="3">Spanish</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row" id="german" style="display:none;">
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">

                                <option selected="selected">Select Germen Level</option>
                                <option>German - A1 (Beginner)</option>
                                <option>German - A2 (Elementary)</option>
                                <option>German - B1 (Intermediate)</option>
                                <option>German – B2 (Upper intermediate)</option>
                                <option>German- A1+A2 (Internship Oriented)</option>
                                <option>German B1+B2 (Job Oriented)</option>
                                <option>German A1+A2+B1+B2</option>
                                <option>Intensive Advanced Diploma</option>
                                <option>German Spoken Course </option>
                                <option>Zertifikat Deutsch Preparation Course</option>

                            </select>
                        </div>

                        <div class="form-row" id="french" style="display:none;">
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">

                                <option selected="selected">Select Germen Level</option>
                                <option>French - A1 (Beginner)</option>
                                <option>French - A2 (Elementary)</option>
                                <option>French - B1 (Intermediate)</option>
                                <option>French – B2 (Upper intermediate)</option>
                                <option>French- A1+A2 (Internship Oriented)</option>
                                <option>French B1+B2 (Job Oriented)</option>
                                <option>French A1+A2+B1+B2</option>
                                <option>Intensive Advanced Diploma</option>
                                <option>French Spoken Course </option>
                                <option>DELF Preparation Course</option>

                            </select>
                        </div>

                        <div class="form-row" id="spanish" style="display:none;">
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">

                                <option selected="selected">Select Spanish Level</option>
                                <option>Spanish - A1 (Beginner)</option>
                                <option>Spanish - A2 (Elementary)</option>
                                <option>Spanish - B1 (Intermediate)</option>
                                <option>Spanish – B2 (Upper intermediate)</option>
                                <option>Spanish- A1+A2 (Internship Oriented)</option>
                                <option>Spanish B1+B2 (Job Oriented)</option>
                                <option>Spanish A1+A2+B1+B2</option>
                                <option>Intensive Advanced Diploma</option>
                                <option>Spanish Spoken Course </option>
                                <option>DELE Preparation Course</option>
                                <option>SIELE Preparation Course </option>

                            </select>
                        </div>

                        <div class="form-row">
                            <div class="col mb-2">
                                <input type="submit" name="submit" value="Submit" class="btn btn-info text-white btn-block">
                            </div>
                        </div>
                    </form>
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

    <script type="text/javascript">
        function showDiv(select) {
            if (select.value == 1) {
                document.getElementById('german').style.display = "block";
            } else {
                document.getElementById('german').style.display = "none";
            }



            if (select.value == 2) {
                document.getElementById('french').style.display = "block";
            } else {
                document.getElementById('french').style.display = "none";
            }


            if (select.value == 3) {
                document.getElementById('spanish').style.display = "block";
            } else {
                document.getElementById('spanish').style.display = "none";
            }

        }
    </script>

</body>

</html>