<?php
include "./partials/header.php";
include "./partials/navbar.php";
// include "./partials/carousel.php";
?>
<html>

<head>
    <style>
    /* 
    Author: Vijay Thapa;
    Theme: Restaurant Food Order;
    version: 1.0;
*/

    /* CSS for All */
    * {
        margin: 0 0;
        padding: 0 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        padding: 1%;
    }

    .img-responsive {
        width: 100%;
    }

    .img-curve {
        border-radius: 15px;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .text-left {
        text-align: left;
    }

    .text-white {
        color: white;
    }

    .clearfix {
        clear: both;
        float: none;
    }

    a {
        color: #ff6b81;
        text-decoration: none;
    }

    a:hover {
        color: #ff4757;
    }

    .btn {
        padding: 1%;
        border: none;
        font-size: 1rem;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #ff6b81;
        color: white;
        cursor: pointer;
    }

    .btn-primary:hover {
        color: white;
        background-color: #ff4757;
    }

    h2 {
        color: #2f3542;
        font-size: 2rem;
        margin-bottom: 2%;
    }

    h3 {
        font-size: 1.5rem;
    }

    .float-container {
        position: relative;
    }

    .float-text {
        position: absolute;
        bottom: 50px;
        left: 40%;
    }

    fieldset {
        border: 1px solid white;
        margin: 5%;
        padding: 3%;
        border-radius: 5px;
    }


    /* CSSS for navbar section */

    .logo {
        width: 10%;
        float: left;
    }

    .menu {
        line-height: 60px;
    }

    .menu ul {
        list-style-type: none;
    }

    .menu ul li {
        display: inline;
        padding: 1%;
        font-weight: bold;
    }


    /* CSS for Food SEarch Section */

    .food-search {
        background-image: url(../images/bg.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        padding: 7% 0;
    }

    .food-search input[type="search"] {
        width: 50%;
        padding: 1%;
        font-size: 1rem;
        border: none;
        border-radius: 5px;
    }


    /* CSS for Categories */
    .categories {
        padding: 4% 0;
    }

    .box-3 {
        width: 28%;
        float: left;
        margin: 2%;
    }


    /* CSS for Food Menu */
    .food-menu {
        background-color: #ececec;
        padding: 4% 0;
    }

    .food-menu-box {
        width: 43%;
        margin: 1%;
        padding: 2%;
        float: left;
        background-color: white;
        border-radius: 15px;
    }

    .food-menu-img {
        width: 20%;
        float: left;
    }

    .food-menu-desc {
        width: 70%;
        float: left;
        margin-left: 8%;
    }

    .food-price {
        font-size: 1.2rem;
        margin: 2% 0;
    }

    .food-detail {
        font-size: 1rem;
        color: #747d8c;
    }


    /* CSS for Social */
    .social ul {
        list-style-type: none;
    }

    .social ul li {
        display: inline;
        padding: 1%;
    }

    /* for Order Section */
    .order {
        width: 50%;
        margin: 0 auto;
    }

    .input-responsive {
        width: 96%;
        padding: 1%;
        margin-bottom: 3%;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
    }

    .order-label {
        margin-bottom: 1%;
        font-weight: bold;
    }



    /* CSS for Mobile Size or Smaller Screen */

    @media only screen and (max-width:768px) {
        .logo {
            width: 80%;
            float: none;
            margin: 1% auto;
        }

        .menu ul {
            text-align: center;
        }

        .food-search input[type="search"] {
            width: 90%;
            padding: 2%;
            margin-bottom: 3%;
        }

        .btn {
            width: 91%;
            padding: 2%;
        }

        .food-search {
            padding: 10% 0;
        }

        .categories {
            padding: 20% 0;
        }

        h2 {
            margin-bottom: 10%;
        }

        .box-3 {
            width: 100%;
            margin: 4% auto;
        }

        .food-menu {
            padding: 20% 0;
        }

        .food-menu-box {
            width: 90%;
            padding: 5%;
            margin-bottom: 5%;
        }

        .social {
            padding: 5% 0;
        }

        .order {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <!-- <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./images//bg.jpg" alt="...">

        </div>
        <div class="carousel-item active">
            <img src="./images//bg.jpg" alt="...">

        </div>
        <div class="carousel-item active">
            <img src="./images//bg.jpg" alt="...">

        </div>




    </div> -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Smoky Burger</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Burger" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Nice Burger</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>


                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>


                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>


                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-momo.jpg" alt="Chicke Hawain Momo" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Chicken Steam Momo</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>


                </div>
            </div>


            <div class="clearfix"></div>



        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->

    <!-- social Section Ends Here -->
    <?php require "./partials/footer.php" ?>
</body>

</html>