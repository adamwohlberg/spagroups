<?php ob_start(); ?>
<?php
$pageTitle = 'All-Inclusive Spa Resort Discounts';
include("inc/header.php");
include("inc/products_demo.php");
// confirm_logged_in();
?>
    <div id="body" style="margin:5px 0 0 0">
      <div class="upcomingGroupsText"> Save Up to <span style="color:#ff68fd; font-size:32px">50%</span> On These Upcoming Groups </div>    
      <div id="sortButtons" style="display:inline-block; vertical-align:text-bottom">
      <button class="button" style="display:inline-block" title="click to view all groups" alt="click to view all spa groups">All</button>
      <button class="button2" style="display:inline-block" title="click to view groups expiring soon" alt="click to view spa groups expiring soon">Expiring Soon</button>
      <button class="button3" style="display:inline-block" title="click to view only active deals" alt="click to view only active deals">Active Deals</button>
      </div>   
      <div style="margin:5px 35px 0 20px">
      <div class="ads" id="right" style="float:right;" >
        <div style="height:240px; width:217px">
          <div style="padding:0px 0 0 0px; margin:-20px 0px 0px 0px; color: grey; font-weight:1.2em">Inspired Yoga & Spa Apparel:</div>
          <div><a href="http://www.beloveapparel.com/women/"><img id="ad1" src="images/belove2.png" height="200px" width="217px" border="1px" float="left"></a></div>
        </div>
        <div style="height:240px; width:217px">
          <div style="padding:12px 0 0 0px; margin:-20px 10px 0px 0px; color: grey; font-weight:1.2em"></div>
          <div><a href="http://www.beloveapparel.com/women/"><img id="ad2" src="images/belove.png" height="200px" width="217px" border="1px" float="left"></a></div>
        </div>
          <div style="width:202px; height:272px; background-color:#FFF; border:solid 1px #FFF; margin:10px 0; padding:10px 5px 0px 0px;">
            <div id="slider" class="nivoSlider"> <img src="images/review1.png" alt="" /> <img src="images/review2.png" alt="" /> <img src="images/review3.png" alt="quotes" /> </div>
          </div>
        <div style="height:240px; width:111px; margin: -10px 0px 0px 0px;">
          <div><img src="images/iSpaColorMember.jpg" id="ad4" height="156px" width="89px" border="0px" float="left"/></div>
          <img id="iatan" src="images/IATAN.jpg" height="111px" width="111px"></img>
        </div>
<!--         <div style="height:300px; width:217px; margin: -10px 0px 0px 0px;">
          <div style="padding:0px 0 10px 0px; margin: 0px 0px 0px 0px; color: grey; font-weight:1.2em">We Recommend:</div>
          <div style="padding:12px 0 0 0px; margin:-20px 10px 0px 0px; color: grey; font-weight:1.2em"></div>
          <div><a href="http://www.yourpurpose.com"><img src="images/baeth_ad.jpg" id="ad3" height="200px" width="217px" border="1px" float="left"></a></div>
        </div> -->

      </div>
      <div style="float:none;">
        <div class="demo upcomingGroups">
<!--           removed style="list-style-type: none;" from line below -->
            <ul id="every" class="thumbs">
              <?php foreach($groups as $group_id => $group) { ?>
              <?php
              $now = time(); // or your date as well
              $counter = ($group["groupRatesAt"]-$group["registered"]);
              $arrivalDate = strtotime($group["arrival"]);
              $createdDate = strtotime($group["created"]);
              $dateDiff = abs($now - $arrivalDate);
              $dateDiff2 = floor($dateDiff/(60*60*24));
              $createdDateDiff = abs($now - $createdDate);
              $createdDateDiff2 = floor($createdDateDiff/(60*60*24));
              if ($counter<1) {
              $class = "active";
              } elseif ($dateDiff2<60) {
              $class = "expiring";
              } elseif ($createdDateDiff2<30) {
              $class = "new";
              } else {
              $class = "plain";
              }
              ?>
              <?php 
              echo "<li data-id='$group_id' class='$class all'>"; 
              ?>
              <a href="group.php?id=<?php echo $group_id; ?>">
              <div class="roundedImage" style="height:263px; width:419px; float:left; background-image:url('<?php echo $group["image"]; ?>'); cursor:normal">                     
                <?php 
                $counter = ($group["groupRatesAt"]-$group["registered"]); 
                if ($counter <= 0) {
                $counter = 0;
                } else {
                $counter = ($group["groupRatesAt"]-$group["registered"]);
                } 
                ?>
                <div><img class="counterFlag" src="<?php echo 'images/banner-' .$counter.'.png'; ?>" /></div>
                <div class="btnJoin"><a href="group.php?id=<?php echo $group_id; ?>" style="text-decoration:none; color:white; display:block; height:100%; width:100%">View Details</a></div>
                <div class="roundedBottom" style="margin:83px 0 0 0; background-image:url(images/blackbottom.png); height:66px; width:420px; color:#FFF; font-size:22px; cursor:default">
                  <div style="float:left; margin:9px 0 0 10px;" class="links"><a href="group.php?id=<?php echo $group_id; ?>"><?php echo $group["spa"]; ?></a><br />
                    <span style="font-size:16px; color:#CCC"><?php echo $group["citystate"]; ?></span></div>
                  <div style="float:right; margin:9px 10px 0 0px; text-align:right"><span style="font-size:11px; color:#CCC">Arrival:</span> <span class="links"><a href="group.php?id=<?php echo $group_id; ?>"><?php echo $group["arrival"]; ?></a><br  />
                    <span style="font-size:11px; margin:-5px 0 0 0; color:#CCC">Expires in: <span style="font-size:16px; color:#ff68fd">
                    <?php
                     $now = time(); // or your date as well
                     $arrivalDate = strtotime($group["arrival"]);
                     $datediff = abs($now - $arrivalDate);
                     echo floor($datediff/(60*60*24)) . " days";
                    ?>
                  </div>
                </div>
              </div>
              </a>
                <?php echo "</li>"; ?>
                <?php } ?>
            </ul>

<!-- test for quicksand. this is a duplicate foreach loop (same as one above) but with a different ul data tage and display: none-->
            <ul id="data" style="display: none;" class="thumbs">
              <?php foreach($groups as $group_id => $group) { ?>
              <?php
              $now = time(); // or your date as well
              $counter = ($group["groupRatesAt"]-$group["registered"]);
              $arrivalDate = strtotime($group["arrival"]);
              $createdDate = strtotime($group["created"]);
              $dateDiff = abs($now - $arrivalDate);
              $dateDiff2 = floor($dateDiff/(60*60*24));
              $createdDateDiff = abs($now - $createdDate);
              $createdDateDiff2 = floor($createdDateDiff/(60*60*24));
              if ($counter<1) {
              $class = "active";
              } elseif ($dateDiff2<60) {
              $class = "expiring";
              } elseif ($createdDateDiff2<30) {
              $class = "new";
              } else {
              $class = "all2";
              }
              ?>
              <?php 
              echo "<li data-id='$group_id' class='$class all'>"; 
              ?>
              <a href="group.php?id=<?php echo $group_id; ?>">
              <div class="roundedImage" style="height:263px; width:419px; float:left; background-image:url('<?php echo $group["image"]; ?>'); cursor:normal">                     
                <?php 
                $counter = ($group["groupRatesAt"]-$group["registered"]); 
                if ($counter <= 0) {
                $counter = 0;
                } else {
                $counter = ($group["groupRatesAt"]-$group["registered"]);
                } 
                ?>
                <div><img class="counterFlag" src="<?php echo 'images/banner-' .$counter.'.png'; ?>" /></div>
                <div class="btnJoin"><a href="group.php?id=<?php echo $group_id; ?>" style="text-decoration: none; color: white; display:block; height:100%; width:100%">View Details</a></div>
                <div class="roundedBottom" style="margin:83px 0 0 0; background-image:url(images/blackbottom.png); height:66px; width:420px; color:#FFF; font-size:22px; cursor:default">
                  <div style="float:left; margin:9px 0 0 10px;" class="links"><a href="group.php?id=<?php echo $group_id; ?>"><?php echo $group["spa"]; ?></a><br />
                    <span style="font-size:16px; color:#CCC"><?php echo $group["citystate"]; ?></span></div>
                  <div style="float:right; margin:9px 10px 0 0px; text-align:right"><span style="font-size:11px; color:#CCC">Arrival:</span> <span class="links"><a href="group.php?id=<?php echo $group_id; ?>"><?php echo $group["arrival"]; ?></a><br  />
                    <span style="font-size:11px; margin:-5px 0 0 0; color:#CCC">Expires in: <span style="font-size:16px; color:#ff68fd">
                    <?php
                     $now = time(); // or your date as well
                     $arrivalDate = strtotime($group["arrival"]);
                     $datediff = abs($now - $arrivalDate);
                     echo floor($datediff/(60*60*24)) . " days";
                    ?>
                  </div>
                </div>
              </div>
              </a>
                <?php echo "</li>"; ?>
                <?php } ?>
            </ul>

          </div>
        </div>
<br class="clearfloat" />
  </div>


<!--     <div id="disclaimer">
        <p> <strong>Notice of Non-Affiliation: </strong>Although spagroups provides <span style="font-weight: bold;">all-inclusive spa resort discounts</span> to our members, we are not affiliated with any particular spa resort or destination spa. We want you to have the best <span style="font-weight: bold;">healthy spa vacation</span> at the destination spa or resort of your choice.  If a group member chooses to create a group at Miraval Spa Resort&trade;, Rancho La Puerta&trade;, The Oaks at Ojai&trade;, Lake Austin Resort and Spa&trade; or any other all-inclusive spa resort, we will list the name of the all-inclusive resort or destination spa; however we are in no way affiliated with that particular resort.  Yes, you may obtain Rancho La Puerta&trade; discounts, Miraval&trade; discounts, etc. based on each spa resort's group discount guidelines; however, we have no affiliation and do not set rates at hotels - we simply help our members get the best rates possible by joining and starting groups to leverage group buying power.  We may provide links to the group's Facebook&trade; page, but we are in no way affiliated with Facebook&trade;. Facebook&trade; is a licensed trademark of Facebook&trade;, Miraval Resort & Spa&trade; is a licensed trademark of Miraval Resorts&trade;, Rancho La Puerta&trade; is a licensed trademark of Rancho La Puerta&trade;, The Oaks at Ojai&trade; is a licensed trademark of The Oaks at Ojai&trade;, The Ranch at Live Oak Malibu&trade; is a licensed trademark of The Ranch at Live Oak Malibu&trade; and our SpaGroups members are awesome!</p>
    </div>  -->
</div>

</div>

  <?php include('inc/footer.php'); ?>





