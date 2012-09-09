<!-- Written P.A.Higgins/P.Gallagher 14-January-2009 -->

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <title>ARG/TCD IDL Objects | Proba2/SWAP</title>
  <meta name="Description" content="SWAP Object">
  <meta name="Keywords" content="IDL, SWAP, proba2 , sockets, objects">

<?php
include 'http://grian.phy.tcd.ie/solarmonitor/objects/include_header.php'
?>

<font face="Arial, Helvetica, sans-serif"  >

<h1 style="margin: 0.0px 0.0px 16.0px 0.0px; text-align: center; font: 36.0px
Arial"><b>Proba2/SWAP IDL Object Tutorial</b></h1>

<h3 style="margin: 0.0px 0.0px 14.0px 0.0px; text-align: center; font: 18.0px
	Arial"><b>Paul Higgins (<a href=http://www.physics.tcd.ie/astrophysics/>ARG</a>/TCD), Peter Gallagher (<a href=http://www.physics.tcd.ie/astrophysics>ARG</a>/TCD)</b></h3>

<center>
<b>
Last updated: January 14th, 2009
</b>
</center>
<br>
<br>
<p class="p3"><img src="images/swap_logo.png" height="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/proba2.jpg" height="200"></p><br><br>
<p class="p4"><br></p>
<p class="p5">IDL objects in <a href=http://www.lmsal.com/solarsoft>SolarSoft</a> allow one to easily and efficiently analyze extensive data sets with a few simple commands. An object is a dynamic data consruct, which includes a number of methods (functions and procedures) to operate. Objects use the -&gt; operator to call their methods. The object is merely a means to dynamically manage data and settings. The object's methods do all of the work.</p>
<br>
<p class="p5">This IDL object may be used to search for, download, read into IDL, display, or make a movie of <a href=http://swap.sidc.be/>Proba2/SWAP</a> image data. Like other objects, SWAP
Object uses sockets to retrieve data. Also, it is part of the SYNIMON family of objects (more information at <a href='http://solarmonitor.org/objects'>http://solarmonitor.org/objects</a>). As such, it inherits <a href='http://solarmonitor.org/objects/synimon'>SYNIMON</a> (SYNoptic IMage Object) and may take advantage of SYNIMON's useful methods. The object has been tested on IDL version 7.0.</p>
<br>

<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 18.0px
Arial"><b><i>Getting Started</i></b></h4>

<br>
At this time, the SWAP object points at a dummy archive located at <a href='http://solarmonitor.org/swap/'>http://solarmonitor.org/swap/</a>. The data are created from modified EIT 171&#8491; images, and have the (expected) field of view and header information of SWAP. The archive is populated with <b>1 minute data ranging from 1-Jan-2010 to 1-Feb-2010</b>. Thus, when testing the SWAP object, dates in this range must be given. Keep in mind that there are about 1400 images for each day. <br><br>Swap is set to be launched in 2009.
<br><br>
If you do not already have the Proba2/SWAP branch in your SolarSoft tree, you must first run the following:

<br><br>
<font face="Courier"  >
<< PLACE HOLDER - No SWAP branch yet... For now, download the object here: <a href='http://solarmonitor.org/objects/swap/swap__define.pro'>http://solarmonitor.org/objects/swap/swap__define.pro</a>>> <br><br><span class="Apple-tab-span">	IDL> ssw_upgrade, /swap, /spawn, /loud </span>
</font>
<br>
<br>

<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
	Arial">
<b>Sample IDL Session</b>
</h4>
<br>

Start by creating the SWAP object.
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap = obj_new( 'swap' )</span>
</font>
<br>
<br>
<a href="#list">List</a> an hour's worth of files.
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> flist = swap -> list( timerange = ['03-Jan-2010 05:00:00', '03-Jan-2010 06:00:00'] )</span><br>
<span class="Apple-tab-span">	IDL> help, flist</span><br><br>
	&lt; Expression &gt;    STRING    = Array[60]<br><br>
</font>
<a href="#copy">Copy</a> the files to the local directory. <!--This will take some time (~minutes) as each file is approximately 4MB.--><br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap -> copy, filelist = flist[[0,5,10,15,20]]</span><br><br>
</font>
<a href="#read">Read</a> the files into the SWAP object.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap -> read, filelist = flist[[0,5,10,15,20]]</span><br><br>
</font>
<a href="#plot">Plot</a> the first file in the series. (Figure 1.)<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap -> plot, filelist = flist[0]</span><br><br>
</font>
<center><br><img src="images/swap01.png" width="300"><br><br><b><i>Figure 1: Simply ploting the data.</i></b></center><br><br><br>
Use <a href="#plotman">PLOTMAN</a> to plot the file. (Figure 2.)<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap -> plotman, filelist = flist[0]</span><br><br>
</font>
<br><center><img src="images/swap02.png" height="400"><br><br><b><i>Figure 2: Using the Plot Manager tool.</i></b></center><br><br><br>
Create a <a href="#movie">movie</a> of the files listed. (Figure 3.)<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap -> movie, filelist = flist[[0,5,10,15,20]]</span><br><br>
</font>
<br><center><img src="images/swap03.png" height="300"><br><br><b><i>Figure 3: Creating a movie of the data.</i></b></center><br><br><br>
Clean up the object and reallocate all memory.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> obj_destroy, swap</span><br><br>
</font>
An alternative sample session could be as follows:<br>
Initiate a new SWAP object.
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap = obj_new( 'swap' )</span><br><br>
</font>
Set the time.<br><Br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap -> set, time = '10-Jan-2010 16:00' </span><br><br>
</font>
This will find the SWAP image closest to the set time.<br>
<br>
Now get the data. 
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> image = swap -> getdata() </span><br><br>
</font>
The SWAP object searches the remote archive and downloads the data using IDL sockets.
<br>
The data can then be plotted:
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap -> plot ;(Figure 4.) </span><br><br>
</font>
or
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap -> plot, center = [ 500, -100 ], fov = 10 ;(Figure 6.) </span><br><br>
	</font>
or
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap -> plot, xrange = [ 200, 800 ], yrange = [ -400, 100 ] ;(Figure 5.) </span><br><br>
</font>
<br>
<table><tr>
	<td><center><img src="images/swap04.png" height="300"><font color="FFFFFF">.....</font><font size=2><br><br><b><i>Figure 4: Simple plot.</i></b></font></center></td>
	<td><center><img src="images/swap05.png" height="300"><font color="FFFFFF">.....</font><font size=2><br><br><b><i>Figure 5: Zoom to a specific region.</i></b></font></center></td>
	<td><center><img src="images/swap06.png" height="300"><br><br><font size=2><b><i>Figure 6: Change the viewing angle and recenter.</i></b></font></center></td>
</tr></table><br>
<br>
Now check control parameters:
<br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> print, swap -> get( /time ) </span><br><br>
</font>
or
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> print, swap -> get( /center ) </span><br><br>
</font>
or
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> print, swap -> get( /obs )</span><br><br>
</font>
Contouring and plotting multiple images in the same window is also built into the SWAP object.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap -> plot, timerange=['05-Jan-10'], drange=[6,50], /limb, grid=30, fov=33 ;(Figure 7.) <br>
</font><br>
<br><p class="p3"><img src="images/swap07.png" width=300><br><br><b><i>Figure 7: Changing various plotting properties.</i></b></center></p><br>
<br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap -> multiplot, timerange=['05-Jan-10 02:00:00','05-Jan-10 02:04:00'], fov=20, center=[-200,50], pmulti=[0,2,2], charsize=.8 ;(Figure 8.) <br>
</font>
<br>
<br><p class="p3"><img src="images/swap08.png" width="600"><br><br><b><i>Figure 8: Plotting multiple data sets.</i></b></center></p><br>
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> swap -> swap -> plot, /latest,fov=20,center=[-300,0]<br>
<span class="Apple-tab-span">	IDL> swap -> plot, levels=10, smooth=10, /over ;(Figure 9.) <br>
<span class="Apple-tab-span">	IDL> swap -> restoreplot
</font>
<br>
<br><p class="p3"><img src="images/swap09.png" height="300"><br><br><b><i>Figure 9: Contour the data.</i></b></center></p><br><br>
</font>


<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 18.0px
Arial"><b><i>Method Specifics</i></b></h4>
<br>
<font face="Arial, Helvetica, sans-serif"  >
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="list">List</a></b></h4><br>
<font face="Courier"  >
Description: Returns a list of full-path file names from the specified time range.<br>
Syntax: IDL> flist = swap -> list( timerange=timerange )<br>
Keywords: timerange<br>
<br>
timerange: A string array of one or two elements, using the syntax, 'day-month-year', which specifies the time stamps of the desired data files.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="copy">Copy</a></b></h4><br>
<font face="Courier"  >
Description: Copies the listed files to the local directory.<br>
Syntax: IDL> swap -> copy, filelist=filelist<br>
Keywords: filelist<br>
<br>
filelist: A string array contaning the full-path file names of the desired data files.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="read">Read</a></b></h4><br>
<font face="Courier"  >
Description: Loads the specified files into the SWAP object.<br>
Syntax: IDL> swap -> read, filelist=filelist<br>
Keywords: filelist, timerange<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="plot">Plot</a></b></h4><br>
<font face="Courier"  >
Description: Plots the desired data file.<br>
Syntax: IDL> swap -> plot, filelist=filelist<br>
Keywords: filelist, timerange, (any plot_map keyword), /latest<br>
<br>
plot_map keywords: xrange, yrange, contour, overlay, smooth_width, border, fov, grid_spacing, center, tail, log_scale, notitle, title, lcolor, window, noaxes, nolabels, xsize, ysize, new, levels, missing, dmin, dmax, top, quiet, square_scale, trans, positive_only, negative_only, dimensions, offset, bottom, ctyle, cthick, date_only, nodate, last_scale, composite, interlace, average, ncolors, drange, limb_plot, roll, rcenter, truncate, duration, bthick, bcolor, drotate, multi, noerase, clabel, margin, status, xshift, yshift<br>
/latest: Plots SWAP's latest available data.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="latest">Latest</a></b></h4><br>
<font face="Courier"  >
Description: Reads the latest available data into the SWAP object.<br>
Syntax: IDL> swap -> latest<br>
Keywords: N/A<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="plotman">Plotman</a></b></h4><br>
<font face="Courier"  >
Description: Calls the PLOTMAN object to plot the desired data.<br>
Syntax: IDL> swap -> plotman, filelist=filelist<br>
Keywords: Same as <a href="#plot">PLOT</a>.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="movie">Movie</a></b></h4><br>
<font face="Courier"  >
Description: Calls the MOVIE_MAP widget, and animates the desired data files.<br>
Syntax: IDL> swap -> movie, filelist=filelist<br>
Keywords: filelist, timerange, rate, xsize, ysize, (most plot_map keywords).<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="set">Set</a></b></h4><br>
<font face="Courier"  >
Description: Sets the specified object property.<br>
Syntax: IDL> swap -> set, timerange=timerange<br>
Keywords: timerange, (any plot_map keyword).<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="get">Get</a></b></h4><br>
<font face="Courier"  >
Description: Retrieves the specified object property.<br>
Syntax: IDL> property = swap -> get( /timerange )<br>
Keywords: /timerange, /filelist, /filescopied, /filesread, /obs, /ut, /header, /(any plot_map keyword).<br><br>
/filelist: Returns the full-path remote file names.<br>
/filescopied: Returns the most recently copied local file names. <br>
/filesread: Returns the local file names of the data currently stored in the Object.<br>
/obs: Returns the FITS file id string.<br>
/ut: Returns the FITS file's time stamp string.<br>
/header: Returns a string array containing the entire FITS header.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="getdata">Getdata</a></b></h4><br>
<font face="Courier"  >
Description: Retrieves an array containing all of the data contained in the SWAP object.<br>
Syntax: IDL> data = swap -> getdata( filelist=filelist )<br>
Keywords: timerange, filelist.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="getmap">Getmap</a></b></h4><br>
<font face="Courier"  >
Description: Retrieves an array of all of the data contained in the SWAP object in the form of MAP structures.<br>
Syntax: IDL> maparray = swap -> getmap( headers, filenames, filelist=filelist )<br>
Outputs: headers, filenames<br>
Keywords: timerange, filelist.<br><br>
headers: An array of all of the headers of the data contained in the SWAP object.<br>
filenames: An array of the file names of all of the data contained in the SWAP object.<br><br>

<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
	Arial"><b><a name="getmap">RestorePlot</a></b></h4><br>
<font face="Courier"  >
	Description: Restore plots to default settings.<br>
	Syntax: IDL> swap -> restoreplot<br><br>
	
</font>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="getmap">Multiplot</a></b></h4><br>
<font face="Courier"  >
Description: Plots multiple images in a single window.<br>
Syntax: IDL> swap -> multiplot, timerange=timerange<br>
Keywords: pmulti, same as plot.<br><br>
pmulti: An array with the same form as that which would be specified for !P.multi=[position,columns,rows].<br><br><br><br>
</font>

<?php
include 'http://grian.phy.tcd.ie/solarmonitor/objects/include_footer.php'
?>

<!--<br><hr>
Contact: <br>
Peter Gallagher<br>
Email: peter.gallagher {at} tcd {dot} ie<br><br>
Paul Higgins<br>
Email: pohuigin {at} gmail {dot} com<br><br>
<br><br>
-->



</font>
<!-- </td>

<td>
</td>
</tr>
</table> -->

</body>
</html>
