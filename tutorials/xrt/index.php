<!-- Written P.A.Higgins/P.Gallagher 1-August-2007 -->
<!-- Edited P.A.Higgins 29-December-2008 -->
<!-- Edited P.A.Higgins 14-January-2009 -->

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <title>ARG/TCD IDL Objects | Hinode/XRT</title>
  <meta name="Description" content="XRT Objects">
  <meta name="Keywords" content="IDL, XRT, hinode , sockets, objects">

<?php
include 'http://grian.phy.tcd.ie/solarmonitor/objects/include_header.php'
?>

<font face="Arial, Helvetica, sans-serif"  >

<h1 style="margin: 0.0px 0.0px 16.0px 0.0px; text-align: center; font: 36.0px
Arial"><b>Hinode/XRT IDL Object Tutorial</b></h1>

<h3 style="margin: 0.0px 0.0px 14.0px 0.0px; text-align: center; font: 18.0px
	Arial"><b>Paul Higgins (<a href=http://www.physics.tcd.ie/astrophysics/>ARG</a>/TCD), Peter Gallagher (<a href=http://www.physics.tcd.ie/astrophysics>ARG</a>/TCD)</b></h3>

<center>
<b>
Last updated: January 14th, 2009
</b>
</center>
<br>
<br>
<p class="p3"><img src="images/XRT_logo.jpg" width="300"></p><br><br>
<p class="p4"><br></p>
<p class="p5">IDL objects in <a href=http://www.lmsal.com/solarsoft>SolarSoft</a> allow one to easily and efficiently analyze extensive data sets with a few simple commands. An object is a dynamic data consruct, which includes a number of methods (functions and procedures) to operate. Objects use the -&gt; operator to call their methods. The object is merely a means to dynamically manage data and settings. The object's methods do all of the work.</p>
<br>
<p class="p5">This IDL object may be used to download, read into IDL, plot,
print out or make a movie of <a href=http://xrt.cfa.harvard.edu/>Hinode/XRT</a> image data. Like other objects, the XRT
object uses sockets to retrieve data. The object has been tested on IDL version 7.0.</p>
<br>

<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 18.0px
Arial"><b><i>Getting Started</i></b></h4>

<br>
If you do not already have the Hinode/XRT branch in your SolarSoft tree, you must first run the following:

<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> ssw_upgrade, /xrt, /spawn, /loud </span>
</font>
<br>
<br>

<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
	Arial">
<b>Sample IDL Session</b>
</h4>
<br>

Start by creating the XRT object.
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt = obj_new( 'xrt' )</span>
</font>
<br>
<br>
<a href="#list">List</a> two day's worth of files.
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> flist = xrt -> list( timerange = ['05-Nov-2008', '06-Nov-2008'] )</span><br>
<span class="Apple-tab-span">	IDL> help, flist</span><br><br>
	&lt; Expression &gt;    STRING    = Array[2]<br><br>
</font>
<a href="#copy">Copy</a> the files to the local directory. This will take some time (~minutes) as each file is approximately 4MB.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt -> copy, filelist = flist</span><br><br>
</font>
<a href="#read">Read</a> the files into the XRT object.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt -> read, filelist = flist</span><br><br>
</font>
<a href="#plot">Plot</a> the first file in the series. (Figure 1.)<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt -> plot, filelist = flist[0]</span><br><br>
</font>
<center><br><img src="images/xrt-plot-2-jun-2007.jpg" width="300"><br><br><b><i>Figure 1: Simply ploting the data.</i></b></center><br><br><br>
Use <a href="#plotman">PLOTMAN</a> to plot the file. (Figure 2.)<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt -> plotman, filelist = flist[0]</span><br><br>
</font>
<br><center><img src="images/xrt_plotman.jpg" height="400"><br><br><b><i>Figure 2: Using the Plot Manager tool.</i></b></center><br><br><br>
Create a <a href="#movie">movie</a> of the files listed. (Figure 3.)<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt -> movie, filelist = flist</span><br><br>
</font>
<br><center><img src="images/xrt_movie.jpg" height="300"><br><br><b><i>Figure 3: Creating a movie of the data.</i></b></center><br><br><br>
Clean up the object and reallocate all memory.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> obj_destroy, xrt</span><br><br>
</font>
An alternative sample session could be as follows:<br>
Initiate a new XRT object.
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt = obj_new( 'xrt' )</span><br><br>
</font>
Set the time.<br><Br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt -> set, time = '05-Nov-2008 16:00' </span><br><br>
</font>
This will find the XRT image taken closest to the set time.<br>
<br>
Now get the data. 
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> image = xrt -> getdata() </span><br><br>
</font>
The XRT object searches the remote archive and downloads the data using IDL sockets.
<br>
The data can then be plotted:
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt -> plot ;(Figure 4.) </span><br><br>
</font>
or
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt -> plot, center = [ -200, 200 ], fov = 7 ;(Figure 6.) </span><br><br>
	</font>
or
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt -> plot, xrange = [ -400, 0 ], yrange = [ -400, 0 ] ;(Figure 5.) </span><br><br>
</font>
<br>
<table><tr>
	<td><center><img src="images/xrt_example_01.jpg" height="300"><font color="FFFFFF">.....</font><font size=2><br><br><b><i>Figure 4: Simple plot.</i></b></font></center></td>
	<td><center><img src="images/xrt_example_02.jpg" height="300"><font color="FFFFFF">.....</font><font size=2><br><br><b><i>Figure 5: Zoom to a specific region.</i></b></font></center></td>
	<td><center><img src="images/xrt_example_03.jpg" height="300"><br><br><font size=2><b><i>Figure 6: Change the viewing angle and recenter.</i></b></font></center></td>
</tr></table><br>
<br>
Now check control parameters:
<br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> print, xrt -> get( /time ) </span><br><br>
</font>
or
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> print, xrt -> get( /center ) </span><br><br>
</font>
or
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> print, xrt -> get( /obs )</span><br><br>
</font>
Contouring and plotting multiple images in the same window are also built into the XRT object.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt -> plot, timerange=['05-Nov-08'], fov=20, center=[-200,50] ;(Figure 7.) <br>
</font><br>
<br><p class="p3"><img src="images/xrtfov5.png" width=300><br><br><b><i>Figure 7: Changing the view angle and centering.</i></b></center></p><br>
<br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt -> multiplot, timerange=['05-Nov-08','07-Nov-08'], fov=20, center=[-200,50] ;(Figure 8.) <br>
</font>
<br>
<br><p class="p3"><img src="images/xrtmulti.png" width="600"><br><br><b><i>Figure 8: Plotting multiple data sets.</i></b></center></p><br>
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> xrt -> plot, /latest<br>
<span class="Apple-tab-span">	IDL> xrt -> plot, levels=10, smooth=10, /over ;(Figure 9.) <br>
<span class="Apple-tab-span">	IDL> xrt -> restoreplot
</font>
<br>
<br><p class="p3"><img src="images/xrtcontour.png" height="300"><br><br><b><i>Figure 9: Contour the data.</i></b></center></p><br><br>
</font>


<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 18.0px
Arial"><b><i>Method Specifics</i></b></h4>
<br>
<font face="Arial, Helvetica, sans-serif"  >
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="list">List</a></b></h4><br>
<font face="Courier"  >
Description: Returns a list of full-path file names from the specified time range.<br>
Syntax: IDL> flist = xrt -> list( timerange=timerange )<br>
Keywords: timerange<br>
<br>
timerange: A string array of one or two elements, using the syntax, 'day-month-year', which specifies the time stamps of the desired data files.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="copy">Copy</a></b></h4><br>
<font face="Courier"  >
Description: Copies the listed files to the local directory.<br>
Syntax: IDL> xrt -> copy, filelist=filelist<br>
Keywords: filelist<br>
<br>
filelist: A string array contaning the full-path file names of the desired data files.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="read">Read</a></b></h4><br>
<font face="Courier"  >
Description: Loads the specified files into the XRT object.<br>
Syntax: IDL> xrt -> read, filelist=filelist<br>
Keywords: filelist, timerange<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="plot">Plot</a></b></h4><br>
<font face="Courier"  >
Description: Plots the desired data file.<br>
Syntax: IDL> xrt -> plot, filelist=filelist<br>
Keywords: filelist, timerange, (any plot_map keyword), /latest<br>
<br>
plot_map keywords: xrange, yrange, contour, overlay, smooth_width, border, fov, grid_spacing, center, tail, log_scale, notitle, title, lcolor, window, noaxes, nolabels, xsize, ysize, new, levels, missing, dmin, dmax, top, quiet, square_scale, trans, positive_only, negative_only, dimensions, offset, bottom, ctyle, cthick, date_only, nodate, last_scale, composite, interlace, average, ncolors, drange, limb_plot, roll, rcenter, truncate, duration, bthick, bcolor, drotate, multi, noerase, clabel, margin, status, xshift, yshift<br>
/latest: Plots XRT's latest available data.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="latest">Latest</a></b></h4><br>
<font face="Courier"  >
Description: Reads the latest available data into the XRT object.<br>
Syntax: IDL> xrt -> latest<br>
Keywords: N/A<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="plotman">Plotman</a></b></h4><br>
<font face="Courier"  >
Description: Calls the PLOTMAN object to plot the desired data.<br>
Syntax: IDL> xrt -> plotman, filelist=filelist<br>
Keywords: Same as <a href="#plot">PLOT</a>.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="movie">Movie</a></b></h4><br>
<font face="Courier"  >
Description: Calls the XMOVIE widget, and animates the desired data files.<br>
Syntax: IDL> xrt -> movie, filelist=filelist<br>
Keywords: filelist,timerange.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="set">Set</a></b></h4><br>
<font face="Courier"  >
Description: Sets the specified object property.<br>
Syntax: IDL> xrt -> set, timerange=timerange<br>
Keywords: timerange, (any plot_map keyword).<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="get">Get</a></b></h4><br>
<font face="Courier"  >
Description: Retrieves the specified object property.<br>
Syntax: IDL> property = xrt -> get( /timerange )<br>
Keywords: /timerange, /obs, /ut, /header, /(any plot_map keyword).<br><br>
/obs: Returns the FITS file id string.<br>
/ut: Returns the FITS file's time stamp string.<br>
/header: Returns a string array containing the entire FITS header.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="getdata">Getdata</a></b></h4><br>
<font face="Courier"  >
Description: Retrieves an array containing all of the data contained in the XRT object.<br>
Syntax: IDL> data = xrt -> getdata( filelist=filelist )<br>
Keywords: timerange, filelist.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="getmap">Getmap</a></b></h4><br>
<font face="Courier"  >
Description: Retrieves an array of all of the data contained in the XRT object in the form of MAP structures.<br>
Syntax: IDL> maparray = xrt -> getmap( headers, filenames, filelist=filelist )<br>
Outputs: headers, filenames<br>
Keywords: timerange, filelist.<br><br>
headers: An array of all of the headers of the data contained in the XRT object.<br>
filenames: An array of the file names of all of the data contained in the XRT object.<br><br>

<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
	Arial"><b><a name="getmap">RestorePlot</a></b></h4><br>
<font face="Courier"  >
	Description: Restore plots to default settings.<br>
	Syntax: IDL> xrt -> restoreplot<br><br>
	
</font>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="getmap">Multiplot</a></b></h4><br>
<font face="Courier"  >
Description: Plots multiple images in a single window.<br>
Syntax: IDL> xrt -> multiplot, timerange=timerange<br>
Keywords: pmulti, same as plot.<br><br>
pmulti: An array with the same form as that which would be specified for !P.multi=[position,columns,rows].<br><br><br><br>
</font>

<!--<br><hr>
Contact: <br>
Peter Gallagher<br>
Email: peter.gallagher {at} tcd {dot} ie<br><br>
Paul Higgins<br>
Email: pohuigin {at} gmail {dot} com<br><br>
<br><br>




</font>
-->

<?php
include 'http://grian.phy.tcd.ie/solarmonitor/objects/include_footer.php'
?>

</body>
</html>
