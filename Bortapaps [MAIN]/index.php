<?php include 'components/connection.php';
session_start();


if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bortapaps Apparel</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./css/component-style.css">
  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <?php include 'components/header.php' ?>


  <main>
    <article>

      <!-- 
        - #HERO
      -->
 
      <section class="hero" id="hero">
        
          <video class="hero-banner" autoplay loop muted playsinline>
            <source src="resources/Jungkook2.mp4" type="video/mp4">
          </video>
        <div class="container home-setup">

          <!-- Video Banner -->
     
          <div class="text">    
          <h2 class="h1 hero-title">
           Best Collections
          </h2>

          <p class="hero-text">
            Competently expedite alternative benefits whereas leading-edge catalysts for change. Globally leverage
            existing an
            expanded array of leadership.
          </p>

          <button class="btn btn-primary">
            <span>Shop Now</span>

            <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
          </button>
        </div>
        </div>
      </section>
        </div>
      </section>



      <div class="container-new">
        <h4>End of Summer Sale</h4>
        <p>
          Get 30% off full price and sale items, with promo code SPORT30 through 9/3. Exclusions apply
          </p>
        <div class="button-container">
          <button class="button">Shop Shoe</button>
          <button class="button">Shop Apparel</button>
        
        </div>
      </div>

      <!-- 
        - #COLLECTION
      -->

      <section class="section collection">
        <div class="container">

          <ul class="collection-list has-scrollbar">

            <li>
              <div class="collection-card" style="background-image: url('pictures/collection-1.jpg')">
                <h3 class="h4 card-title">Men Collections</h3>

                <a href="#" class="btn btn-secondary">
                  <span>Explore All</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

            <li>
              <div class="collection-card" style="background-image: url('pictures/collection-2.jpg')">
                <h3 class="h4 card-title">Women Collections</h3>

                <a href="#" class="btn btn-secondary">
                  <span>Explore All</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

            <li>
              <div class="collection-card" style="background-image: url('pictures/collection-3.jpg')">
                <h3 class="h4 card-title">Sports Collections</h3>

                <a href="#" class="btn btn-secondary">
                  <span>Explore All</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

          </ul>

        </div>
      </section>




      <!-- 
        - #PRODUCT
      -->

      <section class="section product">
        <div class="container">

          <h2 class="h2 section-title">Bests Selling</h2>


          <ul class="product-list">

        <?php
          $getBestSelling = "SELECT * FROM products ORDER BY id DESC LIMIT 4";
          $result = mysqli_query($conn, $getBestSelling);

          while($row = mysqli_fetch_assoc($result)){

        ?>
            <li class="product-item">
              <div class="product-card" tabindex="0">

                <figure class="card-banner">
                  <img src="../products/<?=$row['path']?>" width="312" height="350" loading="lazy"
                    alt="Product Picture" class="image-contain">

                  <div class="card-badge">New</div>

                  <input type="button" value="QUICK VIEW" class="quick-view">

                  <ul class="card-action-list">

                      <li class="card-action-item">
                          <form method="post" id="item-form">
                            <input type="hidden" id="productId" value="<?=$row['id']?>">
                            <button class="card-action-btn toCartbtn" aria-labelledby="card-label-1">
                          </form>
                        
                          <ion-icon name="cart-outline"></ion-icon>
                        </button>

                        <div  class="card-action-tooltip" id="card-label-1">Add to Cart</div>
                      </li>

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-2">
                        <ion-icon name="heart-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-2">Add to Whishlist</div>
                    </li>

                    <!-- <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-3">
                        <ion-icon name="eye-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-3">Quick View</div>
                    </li> -->

                    <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-4">
                        <ion-icon name="repeat-outline"></ion-icon>
                      </button>

                      <div class="card-action-tooltip" id="card-label-4">Compare</div>
                    </li>

                  </ul>

                </figure>

                <div class="card-content">

                  <div class="card-cat">
                    <a href="#" class="card-cat-link"><?=$row['category']?></a>
                  </div>

                  <h3 class="h3 card-title">
                    <a href="#"><?=$row['name']?></a>
                  </h3>

                  <data class="card-price">$<?=$row['price']?></data>

                </div>

              </div>
            </li>
        <?php  } ?>
        </div>
      </section>


      <script>
        
      </script>


      <!-- 
        - #CTA
      -->

      <section class="section cta">
        <div class="container">

          <ul class="cta-list">

            <li>
              <div class="cta-card" style="background-image: url('pictures/cta-1\ \(1\).jpg')">
                <p class="card-subtitle">Bortapaps Collection</p>

                <h3 class="h2 card-title">The Summer Sale Off 50%</h3>

                <a href="#" class="btn btn-link">
                  <span>Shop Now</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

            <li>
              <div class="cta-card" style="background-image: url('pictures/collection-2.jpg')">
                <p class="card-subtitle">Bortapaps Accesories</p>

                <h3 class="h2 card-title">The Summer Sale Off 50%</h3>

                <a href="#" class="btn btn-link">
                  <span>Shop Now</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #SPECIAL
      -->

      <section class="section special">
        <div class="container">

          <div class="special-banner" style="background-image: url('./assets/images/special-banner.jpg')">
            <h2 class="h3 banner-title">New Trend Edition</h2>

            <a href="#" class="btn btn-link">
              <span>Explore All</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>

          <div class="special-product">

            <h2 class="h2 section-title">
              <span class="text">Footwears</span>

              <span class="line"></span>
            </h2>

            <ul class="has-scrollbar">

            <?php

            $sql = "SELECT * FROM products ORDER BY id desc LIMIT 10, 5";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){
            ?>

              <li class="product-item">
                <div class="product-card" tabindex="0">

                  <figure class="card-banner">
                    <img src="../products/<?=$row['path']?>" width="312" height="350" loading="lazy"
                      alt="Product image" class="image-contain">

                    <div class="card-badge">New</div>

                    <ul class="card-action-list">

                      <li class="card-action-item">
                          <form method="post" id="item-form">
                            <input type="hidden" id="productId" value="<?=$row['id']?>">
                            <button class="card-action-btn toCartbtn" aria-labelledby="card-label-1">
                          </form>
                        
                          <ion-icon name="cart-outline"></ion-icon>
                        </button>

                        <div  class="card-action-tooltip" id="card-label-1">Add to Cart</div>
                      </li>

                      <li class="card-action-item">
                        <button class="card-action-btn" aria-labelledby="card-label-2">
                          <ion-icon name="heart-outline"></ion-icon>
                        </button>

                        <div class="card-action-tooltip" id="card-label-2">Add to Whishlist</div>
                      </li>

                      <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-3">
                        <ion-icon name="eye-outline"></ion-icon>
                      </button>

                        <div class="card-action-tooltip" id="card-label-3">Quick View</div>
                      </li>

                      <li class="card-action-item">
                        <button class="card-action-btn" aria-labelledby="card-label-4">
                          <ion-icon name="repeat-outline"></ion-icon>
                        </button>

                        <div class="card-action-tooltip" id="card-label-4">Compare</div>
                      </li>

                    </ul>
                  </figure>

                  <div class="card-content">

                    <div class="card-cat">
                      <a href="#" class="card-cat-link"><?=$row['category']?></a>
                    </div>

                    <h3 class="h3 card-title">
                      <a href="#"><?=$row['name']?></a>
                    </h3>

                    <data class="card-price" value="180.85">$<?=$row['price']?></data>

                  </div>

                </div>
              </li>
            <?php } ?>
            </ul>

          </div>

        </div>
      </section>

      <!-- 
        - #SERVICE
      -->

      <section class="section service">
        <div class="container">

          <ul class="service-list">

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="pictures/service-1.png" width="53" height="28" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">Free Shiping</h3>

                  <p class="card-text">
                    All orders over <span>$150</span>
                  </p>
                </div>

              </div>
            </li>

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="pictures/service-2.png" width="43" height="35" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">Quick Payment</h3>

                  <p class="card-text">
                    100% secure payment
                  </p>
                </div>

              </div>
            </li>

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="pictures/service-3.png" width="40" height="40" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">Free Returns</h3>

                  <p class="card-text">
                    Money back in 30 days
                  </p>
                </div>

              </div>
            </li>

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="pictures/service-4.png" width="40" height="40" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">24/7 Support</h3>

                  <p class="card-text">
                    Get Quick Support
                  </p>
                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>






  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top section">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="./resources/BORTAPAPS2.png" width="160" height="50" alt="Footcap logo">
          </a>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-pinterest"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

        <div class="footer-link-box">

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Contact Us</p>
            </li>

            <li>
              <address class="footer-link">
                <ion-icon name="location"></ion-icon>

                <span class="footer-link-text">
                 1234  Sabang, Danao, Phillipines
                </span>
              </address>
            </li>

            <li>
              <a href="tel:+557343673257" class="footer-link">
                <ion-icon name="call"></ion-icon>

                <span class="footer-link-text">+557343673257</span>
              </a>
            </li>

            <li>
              <a href="mailto:footcap@help.com" class="footer-link">
                <ion-icon name="mail"></ion-icon>

                <span class="footer-link-text">Bortapaps.com</span>
              </a>
            </li>

          </ul>

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">My Account</p>
            </li>

            <li>
              <a href="#" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">My Account</span>
              </a>
            </li>

            <li>
              <a href="#" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">View Cart</span>
              </a>
            </li>

            <li>
              <a href="#" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">Wishlist</span>
              </a>
            </li>

            <li>
              <a href="#" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">Compare</span>
              </a>
            </li>

            <li>
              <a href="#" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">New Products</span>
              </a>
            </li>

          </ul>

          <div class="footer-list">

            <p class="footer-list-title">Costumer Service</p>

            <table class="footer-table">
              <tbody>

                <tr class="table-row">
                  <th class="table-head" scope="row">Payment Methods</th>
            
                <tr class="table-row">
                  <th class="table-head" scope="row">Money-back Guarantee!</th>
            
                <tr class="table-row">
                  <th class="table-head" scope="row">Custom Service</th>

                <tr class="table-row">
                  <th class="table-head" scope="row">Terms & Conditions</th>

              </tbody>
            </table>

          </div>

          <div class="footer-list">

            <p class="footer-list-title">Message Us!</p>

            <p class="newsletter-text">
              Let us know your thoughts on our products and services.-eme- 
            </p>

            <form action="" class="newsletter-form">
              <input type="email" name="email" required placeholder="Email Address" class="newsletter-input">

              <button type="submit" class="btn btn-primary">Subscribe</button>
            </form>

          </div>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2024 <a href="#" class="copyright-link">Bortapaps</a>. All Rights Reserved
        </p>

      </div>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top-btn" data-go-top>
    <ion-icon name="arrow-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
    <script src="js/script.js"></script>
  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>