<?php ob_start(); ?>
<?php include("inc/products.php");
require_once("inc/functions.php");

$product_id = $_GET["id"]; 
$product = $groups[$product_id];

$section = "groups";
$pageTitle = $product["name"];
include('inc/header.php');
confirm_logged_in();
?>


<h1 id="groupTitle"> Group Details: <?php echo $product["name"]; ?> at <?php echo $product["spa"]; ?> </h1>
<!-- my attempt to pull from index -->

<div class="demo thumbs" style="list-style-type: none;">

              <?php echo "<li>"; ?>
              <div style="height:263px; width:419px; float:left; background-image:url('<?php echo $product["image"]; ?>'); margin:0 10px 10px 0; cursor:normal">                     
                <?php 
                $counter = ($product["groupRatesAt"]-$product["registered"]); 
                if ($counter <= 0) {
                $counter = 0;
                } else {
                $counter = ($product["groupRatesAt"]-$product["registered"]);
                } 
                ?>
                <div><img src="<?php echo 'images/banner-' .$counter.'.png'; ?>" /></div>
<!--                 <div class="btnJoin" style="float:right; margin:45px 0px 0 0"><a href="group.php?id=<?php echo $product_id; ?>" style="display:block; height:100%; width:100%"></a></div> -->
                <div style="margin:88px 0 0 0; background-image:url(images/blackbottom.png); height:66px; width:420px; color:#FFF; font-size:22px; cursor:default">
                  <div style="float:left; margin:9px 0 0 10px;" class="links"><a href="group.php?id=<?php echo $product_id; ?>"><?php echo $product["spa"]; ?></a><br />
                    <span style="font-size:16px; color:#CCC"><?php echo $product["citystate"]; ?></span></div>
                  <div style="float:right; margin:9px 10px 0 0px; text-align:right"><span style="font-size:11px; color:#CCC">Arrival:</span> <span class="links"><a href="group.php?id=<?php echo $product_id; ?>"><?php echo $product["arrival"]; ?></a><br  />
                    <span style="font-size:11px; margin:-5px 0 0 0; color:#CCC">Expires in: <span style="font-size:16px; color:#ff68fd">
                    <?php
                     $now = time(); // or your date as well
                     $arrivalDate = strtotime($product["arrival"]);
                     $datediff = abs($now - $arrivalDate);
                     echo floor($datediff/(60*60*24)) . " days";
                    ?>
                  </div>
                </div>
              </div>
          <?php echo "</li>"; ?>
 </div>


<h2 class="groupDetails"><?php
	echo "Arrival:  " . $product["arrival"] . "<br>";
	// echo "Spa:  " . $product["spa"] . "<br>";
	echo "Group Leader:  " . $product["leader"] . "<br>";
  echo "Facebook Group: " . $product["facebookgroup"] . "<br>";
	echo "Description:  " . $product["description"] . "<br>";
	// echo "name: " . $product["name"] . "<br>";
	// echo "privacy: " . $product["privacy"] . "<br>";
	// echo "price: " . $product["price"] . "<br>";
	// echo "nights: " . $product["nights"] . "<br>";
	// echo "status: " . $product["status"] . "<br>";
	// echo "expiration: " . $product["expiration"] . "<br>";
?></h2>
<h2>Share This Group on Facebook: </h2><!-- <div class="fb-share-button" data-href="https://spagroups.com/group.php?id=<?php echo $_GET['id']; ?>" data-width="1000" data-type="button"></div> -->
<!-- <a href="http://www.facebook.com/sharer.php?s=100&p[title]=YOUR TITLE&p[url]=YOUR URL&p[images][0]=YOUR IMAGE URL" class="facebook">Share on Facebook</a> -->
<!-- <img src="images/share-on-facebook.png" class="fb-share-button" data-href="https://spagroups.com/group.php?id=<?php echo $_GET['id']; ?>" data-width="1000" data-type="button"></img> -->
<!-- this is the facebook sharing widget -->
<!-- <div class="facebook" class="fb-share-button" data-href="https://spagroups.com/group.php?id=<?php echo $_GET['id']; ?>" data-width="1000" data-type="button"></div> -->
<div class="fb-share-button" data-href="https://spagroups.com/group.php?id=<?php echo $_GET['id']; ?>" data-width="1000" data-type="button"></div>
<br/>
<br/>

<!-- this is the eventbrite form: -->
	<div style="width:90%; text-align:left; margin: 0px 0px 0px 30px;" ><iframe  src="http://www.eventbrite.com/tickets-external?eid=<?php echo $product["eventbrite"]; ?>"  frameborder="0" height="398" width="100%" vspace="0" hspace="0" marginheight="5" marginwidth="5" scrolling="auto" allowtransparency="true"></iframe>
		<div style="font-family:Helvetica, Arial; font-size:10px; padding:10px 0 10px 0px; margin:2px; width:100%; text-align:left;" >
		</div></div>

</div>
<br>
<!-- this is the facebook code for logi that isn't working -->
<style>
$(document).ready(function() {
  $.ajaxSetup({ cache: true });
  $.getScript('//connect.facebook.net/en_UK/all.js', function(){
    FB.init({
      appId: '200759190112200',
    });     
    $('#loginbutton,#feedbutton').removeAttr('disabled');
    FB.getLoginStatus(updateStatusCallback);
  });
});
</style>
</body>
<?php include('inc/footer.php'); ?>



