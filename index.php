<?php
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/header.php';
?>
<div class="A_background">
    <div class="slideshow-contrainer">
        <div class="Slides fade">
            <div class="numbertext">1 / 5</div>
            <img src="images/img1.png" style="width:100%">
        </div>  
        <div class="Slides fade">
            <div class="numbertext">2 / 5</div>
            <img src="images/img2.png" style="width:100%">
        </div>  
        <div class="Slides fade">
            <div class="numbertext">3 / 5</div>
            <img src="images/img3.png" style="width:100%">
        </div>  
        <div class="Slides fade">
            <div class="numbertext">4 / 5</div>
            <img src="images/img4.png" style="width:100%">
        </div> 
        <div class="Slides fade">
            <div class="numbertext">5 / 5</div>
            <img src="images/img5.png" style="width:100%">
        </div>  
        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>  

    <div class="welcome">
        <fieldset class="intro">
            <legend align="center" class="intro_legend">Welcome to Randeni Hotel</legend>
            <p class="intro_parah">The finest star-class hotel in Sri Lanka, offering the finest dining, lodging, and entertainment options. This 200-room gem overlooks the Indian Ocean's foaming ripples and is still considered one of Sri Lanka's top hotels. Step inside to be surrounded by supernatural foods, cozy hideaways, heavenly surroundings, and the greatest of services that other Sri Lankan hotels could not match. Randeni Hotel Sri Lanka, one of Sri Lanka's finest hotels, is not only the greatest location to rest, eat, and indulge, but also to celebrate. Come! In the heart of Negombo, delight and breathe the air of luxury.</p>
        </fieldset>
    </div>

    <table>
        <tr>
            <th>
                <img class="h_image" src="images/wed_deco_.jpg">
            </th>
            <th>
                <div class="h_desc">
                    <h5>Randeni Grand Hotel</h5>
                    <h1>"WEDDINGS & EVENTS"</h1>
                    <p>When you organize your next major event with us, you can expect world-class service and a dash of Sri Lankan hospitality. We provide a variety of locations, including a 900-person ballroom, for everything from beautiful weddings to thorough conference management. Our staff is committed to making sure that every detail of your event is properly planned and performed.</p>
                </div>
            </th>
        </tr>
    </table>

    <table class="h_table">
        <tr>
            <th>
                <div class="h_desc">
                    <h5>Randeni Grand Hotel</h5>
                    <h1>"RESTAURANT"</h1>
                    <p>"Set your senses on a gastronomic experience with a variety of themed dining options created specifically for you. Our gourmet choices will take you on an adventurous vacation across the globe, with delicious local treats, savory East Asian delicacies, and epicurean masterpieces from the West."</p>
                </div>
            </th>
            <th>
                <img class="h_image" src="images/food_.jpg">
            </th>
        </tr>
    </table>

    <div class="offer_wrapper">
        <div class="offer_">
            <h1><center>Special Offers</center>
            <hr class="A_hr">
            </h1>
            

            <table class="offer_t">
                <tr>
                    <th>
                        <img class="offer_img" src="images/offer_1.jpg">
                    </th>
                    <th>
                        <h2>Recommended Offers</h2>
                        <div class="offer_desc">
                            
                            <?php	
                                $sql = "select o_description, o_expDate from Offer where o_startDate <= current_timestamp and current_timestamp <= o_expDate" ;
                                $result = $database->query($sql);
                                if ($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc()) 
                                    {
                                        ?>
                                        <br/><?=$row["o_description"] ?? ""?> <br/>Expired on <?=$row["o_expDate"] ?? ""?><br/><br/>
                                    <?php }
                                }
                                else{ echo "no results"; }
                            ?>
                               
                        </div>
                    </th>
                </tr>
            </table>
        </div>

    </div>
</div>



<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("Slides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for(i=0; i<dots.length; i++){
            dots[i].className=dots[i].className.replace(" active_1","");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className +=" active_1";
        setTimeout(showSlides, 4000); // Change image every 4 seconds
    }
</script>

<?php
    //page counter
    $handle = fopen("counter.txt", "r"); 
    if(!$handle){ 
        echo "could not open the file" ;
    } 
    else { 
        $counter = (int ) fread($handle,20); 
        fclose ($handle); $counter++; 
        $handle = fopen("counter.txt", "w" );
        fwrite($handle,$counter) ; 
        fclose ($handle) ;
    } 
        
?>

<?php
    include 'includes/footer.php';
?>