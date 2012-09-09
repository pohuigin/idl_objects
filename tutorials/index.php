<HTML>
<title>ARG/TCD IDL Objects and Tutorials</title>
<head>
<link rel="stylesheet" type="text/css" href="http://grian.phy.tcd.ie/solarmonitor/common_files/arm-style.css" />
</head>
<body>

<?php
echo '<table border=0 cellpadding=0 cellspacing=0>';
echo '<tr>';
echo '<td width=100% align=left valign=center>';
echo '<font face=arial size=3>';
echo '<a class=mail2 href="http://grian.phy.tcd.ie/">Astrophysics Research Group</a>, <a class=mail2 href="http://tcd.ie">Trinity College Dublin</a> <br><br>';
echo '</font>';
echo '</td>';
echo '<td align=right>';
echo '<a href="http://grian.phy.tcd.ie/"><img src="http://grian.phy.tcd.ie/solarmonitor/objects/images/arg_logo_small.png" align=right border=0 height=70></a></td><td>&nbsp;&nbsp;&nbsp</td>';
echo '<td><a href="http://www.tcd.ie/"><img src="http://grian.phy.tcd.ie/solarmonitor/common_files/tcd_crest.png" align=right border=0 height=70></a>';
echo '</td>';
echo '</tr>';
echo '</table>';
echo '';
echo '<hr color=#CCCCCC>';
echo '<br>';
?>

<center><h2><a class=mail2 href="http://www.tcd.ie/Physics/Astrophysics/">ARG</a>/<a class=mail2 href="http://www.tcd.ie">TCD</a> IDL Objects and Tutorials</h2></center>

<font face='courier'>
<a class=mail2 href='http://grian.phy.tcd.ie/solarmonitor/'> &larr Back to SolarMonitor</a><br><br>

These IDL objects are written for use with <a class=mail2 href='http://www.lmsal.com/solarsoft/' target=_blank>
SolarSoft (SSW)</a>. They inherit Andre Csillaghy's <a class=mail2 href='http://www.hessi.ethz.ch/software/hessi_oo_concept.html' target=_blank>
framework object</a>, making them very efficient at handling data. Dominic Zarro's 
<a class=mail2 href='http://beauty.nascom.nasa.gov/~zarro/idl/maps/maps.html' target=_blank>IDL maps</a> are used to store the data within each object. 
Also, useful procedures, such as the <a class=mail2 href='http://sohowww.nascom.nasa.gov/solarsoft/gen/idl/maps/movie_map.pro' target=_blank>MOVIE_MAP</a>
widget and <a class=mail2 href='http://sohowww.nascom.nasa.gov/solarsoft/gen/idl/plotman/plotman__define.pro' target=_blank>PLOTMAN</a> 
object may be called from within.<br><br>
For tutorials on using the objects, click the object's title.<br>
Below are the newest versions of this software. It has been tested on IDL Version 7.0.

<br><br>
<hr>
<b>PLOT_PROP</b> - Auxiliary Plotting Properies Object <br><br>
This is a completely general object which is called in the backend of the other objects. It allows 
them to save the user's plotting preferences. For instance, the user might set XRANGE=[-100,100] and YRANGE=[-300,-100]. The user could plot a series of images and not have to set the custom XRANGE and YRANGE each time.<br><br>
&nbsp&nbsp&nbsp<a class=mail2 href=plot_prop/plot_prop__define.pro>plot_prop__define.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=plot_prop/plot_prop_control.pro>plot_prop_control.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=plot_prop/plot_prop_control__define.pro>plot_prop_control__define.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=plot_prop/plot_prop_info__define.pro>plot_prop_info__define.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=plot_prop/plot_prop_object.zip>Zip File</a>
<hr>
<a class=mail2 href=synimon/><b>SYNIMON</b></a> - Synoptic Image Object (Calls PLOT_PROP.)<br>
&nbsp&nbsp&nbsp<a class=mail2 href=synimon/synimon__define.pro>synimon__define.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=synimon/synimon_control.pro>synimon_control.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=synimon/synimon_control__define.pro>synimon_control__define.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=synimon/synimon_info__define.pro>synimon_info__define.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=synimon/synimon_object.zip>Zip File</a>
<hr>
<a class=mail2 href=solmon/><b>SOLMON</b></a> - Solar Monitor Object (Inherits SYNIMON.)<br>
&nbsp&nbsp&nbsp<a class=mail2 href=solmon/solmon__define.pro>solmon__define.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=solmon/solmon_config__define.pro>solmon_config__define.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=solmon/solmon_object.zip>Zip File</a>
<hr>
<a class=mail2 href=xrt/><b>XRT</b></a> - Hinode/XRT Object (Calls PLOT_PROP.)<br>
&nbsp&nbsp&nbsp<a class=mail2 href=xrt/xrt__define.pro>xrt__define.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=xrt/xrt_control.pro>xrt_control.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=xrt/xrt_control__define.pro>xrt_control__define.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=xrt/xrt_info__define.pro>xrt_info__define.pro</a><br>
&nbsp&nbsp&nbsp<a class=mail2 href=xrt/xrt_object.zip>Zip File</a>
<hr>
<a class=mail2 href=swap/><b>SWAP</b></a> - Proba2/SWAP Object (Inherits SYNIMON.)<br>
&nbsp&nbsp&nbsp<a class=mail2 href=swap/swap__define.pro>swap__define.pro</a>
<hr>

</font>

<?php 
include 'http://grian.phy.tcd.ie/solarmonitor/objects/include_footer.php';
?>

<!--<br><br>
<hr color=#CCCCCC>

<table border=0 cellpadding=0 cellspacing=0>
<tr>
<td width=100% align=left>
<font size=2>
Contact:<br>
Paul A. Higgins - pohuigin {at} gmail {dot} com<br>
Peter T. Gallagher - p.gallagher {at} tcd {dot} ie<br><br>
Update: January 12, 2009. Astrophysics Research Group, Trinity College Dublin
</font>
</td>
<td align=right>
<a href="http://www.tcd.ie/"><img src="../common_files/tcd_crest.png" align=right border=0 width=55></a>
</td>
</tr>
</table>

<br><br><br>-->

<body>
<HTML>