<?php
$pageTitle = 'Contact Us';
include("inc/header.php");
?>
<!-- this is a fix for the wufoo form so that it is responsive. The maincontent section has to be a % not a fixed px width to work -->
<style>
#mainContent {
    width:70%;
}
</style>

    <div id="body" style="margin:5px 0 0 0">
      <div style="margin:25px 0px 0 40px;" class="filler">
      </div>
    </div>

<div id="wufoo-xph151o06ya4kt">
Fill out my <a href="https://adamwohlberg.wufoo.com/forms/xph151o06ya4kt">online form</a>.
</div>
<script type="text/javascript">var xph151o06ya4kt;(function(d, t) {
var s = d.createElement(t), options = {
'userName':'adamwohlberg', 
'formHash':'xph151o06ya4kt', 
'autoResize':true,
'height':'511',
'async':true,
'host':'wufoo.com',
'header':'show', 
'ssl':true};
s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'wufoo.com/scripts/embed/form.js';
s.onload = s.onreadystatechange = function() {
var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
try { xph151o06ya4kt = new WufooForm();xph151o06ya4kt.initialize(options);xph151o06ya4kt.display(); } catch (e) {}};
var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
})(document, 'script');</script>


<!-- <h1>Contact</h1>
<p>We&rsquo;d love to hear from you! Complete the form to send me an email.</p> 
 -->
<!-- 	<form method="post">

		<table>
			<tr>
				<th>
					<label for="name">Name</label>
				</th>
				<td>
					<input type="text" name="name" id="name">
				</td>
			</tr>
			<tr>
				<th>
					<label for="email">Email</label>
				</th>
				<td>
					<input type="text" name="email" id="email">
				</td>
			</tr>
			<tr>
				<th>
					<label for="message">Message</label>
				</th>
				<td>
					<textarea name="message" id="message"></textarea>
				</td>
			</tr>
		</table>
		<input type="submit" value="send">

	</form> -->

<?php include('inc/footer.php'); ?>