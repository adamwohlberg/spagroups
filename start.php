<?php ob_start(); ?>
<?php
$pageTitle = 'Start a Group';
include("inc/header.php");
// confirm_logged_in();
?>
<!-- this is a fix for the wufoo form so that it is responsive. The maincontent section has to be a % not a fixed px width to work -->
<style>
#mainContent {
	width:70%;
}
/* Largest ----------- */
@media only screen and (max-width: 1500px) {

#mainContent {
	width: 80%;
}
#header {
	height:94px;
}
.upcomingGroups {
float:left;
}
#tagline {
	display: none;
}
.btnStart {
	display: none;
}
.btnFind {
	display: none;
}


@media only screen and (max-width: 995px) {

/*.btnStart {
	display: none;
}
.btnFind {
	display: none;
}*/
}
@media only screen and (max-width: 560px) {
#mainContent {
	width: 95%;
	padding: 0px 10px 0px 20px;
}

}

</style>

    <div id="body" style="margin:5px 0 0 0">
      <div style="margin:25px 0px 0 40px;" class="filler">
      </div>
    </div>

<!--     The Wuofoo Form -->
<div id="wufoo-pu9fu0j0se2lzc">
Fill out my <a href="https://adamwohlberg.wufoo.com/forms/pu9fu0j0se2lzc">online form</a>.
</div>
<script type="text/javascript">var pu9fu0j0se2lzc;(function(d, t) {
var s = d.createElement(t), options = {
'userName':'adamwohlberg', 
'formHash':'pu9fu0j0se2lzc', 
'autoResize':true,
'height':'847',
'async':true,
'host':'wufoo.com',
'header':'show', 
'ssl':true};
s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'wufoo.com/scripts/embed/form.js';
s.onload = s.onreadystatechange = function() {
var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
try { pu9fu0j0se2lzc = new WufooForm();pu9fu0j0se2lzc.initialize(options);pu9fu0j0se2lzc.display(); } catch (e) {}};
var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
})(document, 'script');</script>

<!--     The Wuofoo Form --> 
<?php 
include('inc/footer.php'); 
?>
