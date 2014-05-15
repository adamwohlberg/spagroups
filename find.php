<?php
$pageTitle = 'Find a Group';
include("inc/header.php");
include("inc/products.php");
?>
    
    <div id="body" style="margin:5px 0 0 0">
      <div style="margin:15px 20px 0 20px; font-size:1.8em; color:#111; display:inline;"> Save Up to <span style="color:#ff68fd; font-size:1.4em">50%</span> on Upcoming Groups: </div>
<!--       <div style="margin:10px 685px 0 30px; font-size:38px; color:#111; display:inline-block;"> Find A Group</div> -->
      <div style="margin:25px 0px 0 20px;" class="filler">

        <div style="width: 96%">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="searchresults">
        <thead>
            <tr>
                <th>Arrival</th>
                <th>Spa</th>
                <th>Group Leader</th>
                <th>Group Name</th>
                <th>Privacy</th>
                <th>Price</th>
                <th>Min. Nights</th>
                <th>Status</th>
                <th>Expires In</th>
<!--                 <th>Facebook&trade;</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach($groups as $group_id => $group) { ?>
            <tr onmouseover="ChangeColor(this, true);" onmouseout="ChangeColor(this, false);" onclick="DoNav('group.php?id=<?php echo $group_id; ?>' )"> 
                    <td><?php 
                    $arrival = strftime($group["arrival"]);
                    echo $arrival ."\n";
                    echo date('l', strtotime($arrival));
                    ?></td>
                    <td><?php echo $group["spa"]; ?></td>
                    <td><?php echo $group["leader"]; ?></td>
                    <td><?php echo $group["name"]; ?></td>
                    <td><?php echo $group["privacy"]; ?></td>
                    <td><?php echo $group["price"]; ?></td>
                    <td><?php echo $group["nights"]; ?></td>
                    <td><?php 
                    if  (($group["groupRatesAt"]-$group["registered"])>"0") {
                    echo ($group["groupRatesAt"]-$group["registered"]) . " to activate";
                    } else {
                    echo ("activated"); }
                    ?></td>
                    <td><?php
                         $now = time(); // or your date as well
                         $arrivalDate = strtotime($group["arrival"]);
                         $datediff = abs($now - $arrivalDate);
                         echo floor($datediff/(60*60*24)) . " days";
                    ?></td>
<!--                     <td><?php echo $group["facebookgroup"]; ?></td> -->
            </tr>
            <?php } ?>
         </tbody>
    </table>
    </div>
      </div>
      <!-- facebook facepile -->
    <div style="margin: 40px 0px 0px 0px"> </div>
<div class="fb-facepile" data-href="https://spagroups.com/find.php" data-max-rows="1" data-colorscheme="light" data-size="medium" data-show-count="true"></div>
<!-- Facebook share butt -->
﻿<!-- <div class="fb-share-button" data-href="https://spagroups.com/find.php" data-width="1000" data-type="button"></div> -->
<a href="#" onclick="fbs_click('https://www.facebook.com/share.php?u=https://spagroups.com/find.php');" class="fb-share-button" data-width="1000" data-type="button" id="facebookShareButtonGroup"><img src="https://spagroups.com/images/share-on-facebook-nonhover.png" onmouseover="this.setAttribute('src','https://spagroups.com/images/share-on-facebook-hover.png');" onmouseout="this.setAttribute('src','https://spagroups.com/images/share-on-facebook-nonhover.png');"/></a> 

    </div>
    <div style="margin: 0px 0px 60px 0px"> </div>
<!-- //make the search bar pink -->
<script> $.fn.dataTableExt.oStdClasses["sFilter"] = "searchbarDataTables"; </script>
<!-- //make the search bar pink -->
<?php include('inc/footer.php'); ?>
