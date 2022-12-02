<?php
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/header.php';
?>
<div class="A_background">
    <table>
        <tr>
            <th> 
                <div class="A_topic_design"><h1 class="A_topic">DISCOVER A HOTEL<br> THAT DEFINES <br>A NEW LIFE OF LUXURY.<hr class="A_hr"></h1></div>
                <p class="A_p1">Established in 2015,<br> as a little hotel with a banquet hall to fulfill a variety of specific needs of guests who anticipate <br> good meals and warm welcome. Over the years, we've earned a good reputation and public recognition. <br> Since then, we've been able to significantly improve the services we offer. Not only does it now have a larger  <br>Banquet hall appropriate for any type of gathering, but it also has other facilities such as a Swimming Pool,  <br>Auditorium,  restaurant and rooms, and adequate parking space. These characteristics  <br>simply demonstrate that we are the best and the most influential in the  <br>Hotel & Hospitality sector in Negombo.</p> 
            </th>
            <th class="">
                <div class="slideshow">
                    <div class="Slides fade">
                        <img class="slidshow_img" src="images/A_img1.jpg">
                    </div>  
                    <div class="Slides fade">
                        <img class="slidshow_img" src="images/img5.png">
                    </div>  
                    <div class="Slides fade">
                        <img class="slidshow_img" src="images/A_IMG3.jpg">
                    </div>  
                    <div class="Slides fade">
                        <img class="slidshow_img" src="images/A_IMG2.jpg">
                    </div> 
                    <div class="Slides fade">
                        <img class="slidshow_img" src="images/A_IMG4.jpg">
                    </div>
                        
                    <div class="A_dot">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
            </th>
        </tr>
    </table>

    <div class="A_backgroundColor">
        <table class="A_table2">
            <tr>
                <th class="A_about" ><img src="images/A_wedding1.png" ><h2 class="A_h2">Wedding Receptions</h2><p class="A_tabel_p">Imagine simply escaping into the <br>tranquility of a destination <br>wedding atmosphere..</p></th>
                <th class="A_about" ><img src="images/A_wedding2.png" ><h2 class="A_h2">Parties & Events </h2><p class="A_tabel_p">A memorable and happy moment. We <br>provide you with a top<br> deluxe banqueting <br>experience...</p></th>
                <th class="A_about" ><img src="images/A_wedding3.png" ><h2 class="A_h2">Dining </h2><p class="A_tabel_p">At the restaurant, you can sample a <br>variety of tasty Sri Lankan<br> and international <br>dishes..</p></th>
            </tr>
            <tr>
                <th class="A_about" ><img src="images/A_wedding4.png" ><h2 class="A_h2">Honeymoon</h2><p class="A_tabel_p"> Relax whilst getting pampered<br> with your partne..</p></th>
                <th class="A_about" ><img src="images/A_wedding5.png" ><h2 class="A_h2">Pool</h2><p class="A_tabel_p"> Beat the heat with enjoying<br> the beauty..</p></th>
                <th class="A_about" ><img src="images/A_wedding6.png" ><h2 class="A_h2">Filming Location</h2><p class="A_tabel_p"> Attractive location to film your <br>pre-shoot,<br> wedding shoot & etc..</p></th>
            </tr> 
        </table>
    </div>

    <table>
        <tr>
            <th><img class="A_havingIMG" src="images/A_img1.jpg" ></th>
            <th><h2 class="A_h2_paraTopic">Crystal Ball Room <hr class="A_hr"></h2><p class="A_para">The Crystal Ball Room perfect backdrop for a magnificent wedding celebration, Co-operate event in Negombo, setting the stage for the Golden luxurious gaze. This can be used up to 150 Guests</p>
        </tr>
    </table>    
    
    <table>    
        <tr>
            <th><img class="A_havingIMG" src="images/img5.png" ></th>
            <th><h2 class="A_h2_paraTopic">Pool-Area<hr class="A_hr"></h2><p class="A_para">Nothing beats a cool dip in our open infinity pool, after a day’s work or exploration. And Poolside can be used up to 50 guests.</p>
        </tr>
    </table>

    <table>    
        <tr>
            <th><img class="A_havingIMG" src="images/A_IMG2.jpg" ></th>
            <th><h2 class="A_h2_paraTopic">Golden Pearl Ball Room<hr class="A_hr"></h2><p class="A_para">The Golden Pearl Ball Room is a haven for couples who wish to capture their romantic spirit; imagine simply escaping into the tranquility of a destination wedding atmosphere. Weddings at Randeni Grand Hotel can range from the simplest ceremony through to the grandest celebration. This can be used up to 200 Guests.</p>
        </tr>
    </table>

    
    <table>    
        <tr>
            <th><img class="A_havingIMG" src="images/A_IMG3.jpg" ></th>
            <th><h2 class="A_h2_paraTopic">Open Hall<hr class="A_hr"></h2><p class="A_para">The Open Hall can be used for weddings with up to 250 guests inside the Open Hall. It is mainly used for events such as Special Wedding, social gatherings, cocktails, special events, theme parties and DJ nights.</p>
        </tr>
    </table>

    <table>    
        <tr>
            <th><img class="A_havingIMG" src="images/A_IMG4.jpg" ></th>
            <th><h2 class="A_h2_paraTopic">Golden Auditorium<hr class="A_hr"></h2><p class="A_para"> Including an auditorium with a maximum capacity for 200 people and a 7HD screen and dolby surround sound system.</p>
        </tr>
    </table>

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
        setTimeout(showSlides, 4000);
    }
</script>



<?php
    include 'includes/footer.php';
?>