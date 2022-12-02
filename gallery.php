<?php
    require_once 'core/init.php';
    include 'includes/head.php';
    include 'includes/header.php';
?>
<div class="A_background">

  <div class="g_row">
    <div class="g_column">
      <img class="g_column img" src="images/g_img_1.jpg" onclick="myFunction(this);">
    </div>
    <div class="g_column">
      <img class="g_column img" src="images/g_img_2.jpg" onclick="myFunction(this);">
    </div>
    <div class="g_column">
      <img class="g_column img" src="images/g_img_3.jpg" onclick="myFunction(this);">
    </div>
    <div class="g_column">
      <img class="g_column img" src="images/g_img_4.jpg" onclick="myFunction(this);">
    </div>
    <div class="g_column">
      <img class="g_column img" src="images/g_img_5.jpg"  onclick="myFunction(this);">
    </div>
    <div class="g_column">
      <img class="g_column img" src="images/g_img_6.jpg" onclick="myFunction(this);">
    </div>
    <div class="g_column">
      <img class="g_column img" src="images/g_img_7.jpg" onclick="myFunction(this);">
    </div>
    <div class="g_column">
      <img class="g_column img" src="images/g_img_8.jpg" onclick="myFunction(this);">
    </div>
  </div>

  <div class="g_container">
    <span onclick="this.parentElement.style.display='none'" class="g_closebtn">&times;</span>
    <img id="expandedImg" style="width:100%">
    <div id="imgtext"></div>
  </div>



</div>

<script>
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>

<?php
    include 'includes/footer.php';
?>