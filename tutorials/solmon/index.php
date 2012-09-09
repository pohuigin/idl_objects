<!-- Written P.A.Higgins 29-December-2008 -->
<!-- Edited P.A.Higgins 14-January-2009 -->

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <title>ARG/TCD IDL Objects | SOLMON</title>
  <meta name="Description" content="SOLMON IDL documentation">
  <meta name="Keywords" content="IDL, SOLMON, solar monitor, solarmonitor , sockets, objects">

<?php
include 'http://grian.phy.tcd.ie/solarmonitor/objects/include_header.php'
?>

<font face="Arial, Helvetica, sans-serif" size="3">

<h1 style="margin: 0.0px 0.0px 16.0px 0.0px; text-align: center; font: 36.0px
Arial"><b>SOLMON IDL Object Tutorial</b></h1>

<h3 style="margin: 0.0px 0.0px 14.0px 0.0px; text-align: center; font: 18.0px
Arial"><b>Paul Higgins (<a href=http://www.physics.tcd.ie/astrophysics/>ARG</a>/TCD), Peter Gallagher (ARG/TCD)</b></h3>

<p class="p3"><img src="images/multiinst.png" width="800"></p>
<p class="p4"><br></p>
<p class="p4"><br></p>
<p class="p5">IDL objects in <a href="http://www.lmsal.com/solarsoft/" target="_blank">SolarSoft</a> 
allow one to easily and efficiently analyze extensive 
data sets with a few simple commands. An object is a dynamic data consruct, which 
includes a number of methods (functions and procedures) to operate. Objects use 
the -&gt; operator to call their methods. The object it self is merely a means 
to dynamically manage data and settings. The object's methods do all of the work.</p>
<br>
<p class="p5">This IDL object may be used to download, read into IDL, plot,
print out or make a movie of data supported by the Solar Monitor website. Like other objects, the 
<a href=solmon_object.zip>SOLMON</a>
object uses sockets to retrieve data. The SOLMON data is provided by <a
href="http://solarmonitor.org">Solar Monitor</a>. The object has been
tested on IDL version 6.3.</p><br>

<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 18.0px
Arial"><b><i>Get Started</i></b></h4>
<br>The SOLMON object should have its own committed directory which should contain the files in 
<a href="solmon_object.zip" target="_blank">this ZIP file</a>. The object automatically copies 
files into the local directory as needed.<br><br>

<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b>IDL</b></h4>
<br>Start by creating the SOLMON object.
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL&gt; solmon = obj_new( 'solmon' )</span><br><br>
</font>
<a href="#set">Set</a> the SOLMON instrument.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL&gt; solmon -&gt; set, instrument = 'eit' </span><br><br>
</font>
<a href="#list">List</a> a day's worth of files.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL&gt; flist = solmon -&gt; list( timerange = '10-june-2007' )</span><br><br>
<span class="Apple-tab-span">	IDL&gt; help,flist</span><br><br>
	&lt; Expression &gt;    STRING    = Array[11]<br><br>
</font>
<a href="#copy">Copy</a> the files to the local directory.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL&gt; solmon -&gt; copy,filelist=flist</span><br><br>
</font>
<a href="#read">Read</a> the files into the SOLMON object.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL&gt; solmon -&gt; read,filelist=flist</span><br><br>
</font>
<a href="#plot">Plot</a> the first file in the series.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL&gt; solmon -&gt; plot,filelist=flist[0]</span><br><br>
</font>

<center><img src='images/solmon_tut_1.png' height=300></center><br>

Use <a href="#plotman">PLOTMAN</a> to plot the file.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL&gt; solmon -&gt; plotman,filelist=flist[0]</span><br><br>
</font>

<center><img src='images/solmon_tut_2.png' height=300></center><br>

Create a <a href="#movie">movie</a> of the files listed.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL&gt; solmon -&gt; movie,filelist=flist</span><br><br>
</font>

<center><img src='images/solmon_tut_3.png' height=300></center><br>

Clean up the object and reallocate all memory.<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL&gt; obj_destroy,solmon</span><br><br>
</font>
<br>
An alternative sample session could be as follows:

<br><br>
Initiate a new SOLMON object:
<br>
<font face="Courier"  >
	<span class="Apple-tab-span">   IDL&gt; solmon = obj_new( 'solmon' )</span><br><br>
</font>
Set the time:
<font face="Courier"  >
	<span class="Apple-tab-span">   IDL&gt; solmon -&gt; set, time = '2-Jun-2007 16:00' </span><br><br>
</font>
This will find the SOLMON image taken closest to the set time.<br>

<br>
Now get the data. 
<br>
<font face="Courier"  >
	<span class="Apple-tab-span">   IDL&gt; image = solmon -&gt; getdata() </span><br><br>
</font>
The SOLMON object searches the remote archive and downloads the data using IDL sockets.
<br>
The data can then be plotted:
<br>
<font face="Courier"  >
	<span class="Apple-tab-span">   IDL&gt; solmon -&gt; plot </span><br><br>
</font>

<center><img src='images/solmon_tut_4.png' height=300></center><br>

or
<font face="Courier"  >
	<span class="Apple-tab-span">   IDL&gt; solmon -&gt; plot, xrange = [ -400, 0 ], yrange = [ -400, 0 ] </span><br><br>
</font>

<center><img src='images/solmon_tut_6.png' height=300></center><br>

or
<font face="Courier"  >
	<span class="Apple-tab-span">   IDL&gt; solmon -&gt; plot, center = [ -200, 200 ], fov = 7 </span><br><br>
	</font>

<center><img src='images/solmon_tut_5.png' height=300></center><br>

<br>
Now check control parameters:
<br>
<font face="Courier"  >
	<span class="Apple-tab-span">   IDL&gt; print, solmon -&gt; get( /time ) </span><br><br>
</font>
or
<font face="Courier"  >
	<span class="Apple-tab-span">   IDL&gt; print, solmon -&gt; get( /center ) </span><br><br>
</font>
or
<font face="Courier"  >
	<span class="Apple-tab-span">   IDL&gt; print, solmon -&gt; get( /obs )</span><br><br>
	</font>

Scroll down for <a href=#moreex>more examples</a>.<br><br>








</font>

<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 18.0px
Arial"><b><i>Method Specifics</i></b></h4>
<br>
<font face="Arial, Helvetica, sans-serif"  >
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="list">List</a></b></h4><br>
<font face="Courier"  >
Description: Returns a list of full-path file names from the specified time range.<br>
Syntax: IDL&gt; flist = solmon -&gt; list( timerange=timerange )<br>
Keywords: timerange<br>
<br>
timerange: A string array of one or two elements, using the syntax, 'day-month-year', which specifies the time stamps of the desired data files.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="copy">Copy</a></b></h4><br>
<font face="Courier"  >
Description: Copies the listed files to the local directory.<br>
Syntax: IDL-&gt; solmon -&gt; copy, filelist=filelist<br>
Keywords: filelist<br>
<br>
filelist: A string array contaning the full-path file names of the desired data files.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="read">Read</a></b></h4><br>
<font face="Courier"  >
Description: Loads the specified files into the SOLMON object.<br>
Syntax: IDL&gt; solmon -&gt; read, filelist=filelist<br>
Keywords: filelist, timerange<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="plot">Plot</a></b></h4><br>
<font face="Courier"  >
Description: Plots the desired data file.<br>
Syntax: IDL&gt; solmon -&gt; plot, filelist=filelist<br>
Keywords: filelist, timerange, (any plot_map keyword), /latest<br>
<br>
plot_map keywords: xrange, yrange, contour, overlay, smooth_width, border, fov, grid_spacing, center, tail, log_scale, notitle, title, lcolor, window, noaxes, nolabels, xsize, ysize, new, levels, missing, dmin, dmax, top, quiet, square_scale, trans, positive_only, negative_only, dimensions, offset, bottom, ctyle, cthick, date_only, nodate, last_scale, composite, interlace, average, ncolors, drange, limb_plot, roll, rcenter, truncate, duration, bthick, bcolor, drotate, multi, noerase, clabel, margin, status, xshift, yshift<br>
/latest: Plots SOLMON's latest available data.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="latest">Latest</a></b></h4><br>
<font face="Courier"  >
Description: Reads the latest available data into the SOLMON object.<br>
Syntax: IDL&gt; solmon -&gt; latest<br>
Keywords: N/A<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="plotman">Plotman</a></b></h4><br>
<font face="Courier"  >
Description: Calls the PLOTMAN object to plot the desired data.<br>
Syntax: IDL&gt; solmon -&gt; plotman, filelist=filelist<br>
Keywords: Same as <a href="#plot">PLOT</a>.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="movie">Movie</a></b></h4><br>
<font face="Courier"  >
Description: Calls the XMOVIE widget, and animates the desired data files.<br>
Syntax: IDL&gt; solmon -&gt; movie, filelist=filelist<br>
Keywords: filelist,timerange.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="set">Set</a></b></h4><br>
<font face="Courier"  >
Description: Sets the specified object property.<br>
Syntax: IDL&gt; solmon -&gt; set, timerange=timerange<br>
Keywords: timerange, instrument, filter, use_config, (any plot_map keyword).<br><br>
instrument: Sets the SOLMON data instrument to analyze. The currently supported instruments are listed <a href="#instlist">below</a>.<br>
filter: Sets the desired instrument filter. Some of SOLMON's instruments take images using various filters. All of the filters are listed in their respective instrument <a href="#instlist">below</a>.
</font>
<br><br>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="get">Get</a></b></h4><br>
<font face="Courier"  >
Description: Retrieves the specified object property.<br>
Syntax: IDL&gt; property = solmon -&gt; get( /timerange )<br>
Keywords: /timerange, /instrument, /filter, /obs, /ut, /header, /(any plot_map keyword).<br><br>
/obs: Returns the FITS file id string.<br>
/ut: Returns the FITS file's time stamp string.<br>
/header: Returns a string array containing the entire FITS header.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="getdata">Getdata</a></b></h4><br>
<font face="Courier"  >
Description: Retrieves an array containing all of the data contained in the SOLMON object.<br>
Syntax: IDL&gt; data = solmon -&gt; getdata( filelist=filelist )<br>
Keywords: timerange, filelist.<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="getmap">Getmap</a></b></h4><br>
<font face="Courier"  >
Description: Retrieves an array of all of the data contained in the SOLMON object in the form of MAP structures.<br>
Syntax: IDL&gt; maparray = solmon -&gt; getmap( headers, filenames, filelist=filelist )<br>
Outputs: headers, filenames<br>
Keywords: timerange, filelist.<br><br>
headers: An array of all of the headers of the data contained in the SOLMON object.<br>
filenames: An array of the file names of all of the data contained in the SOLMON object.<br><br>
</font>
<h4 style="margin: 0px; text-align: left; font-family: Arial; font-style: normal; font-variant: normal; font-weight: normal; font-size: 16px; line-height: normal; font-size-adjust: none; font-stretch: normal;"><b><a name="restoreplot">RestorePlot</a></b></h4><br>
<font face="Courier"  >
	Description: Restore plots to default settings.<br>
	Syntax: IDL&gt; solmon -&gt; restoreplot<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="multiplot">Multiplot</a></b></h4><br>
<font face="Courier"  >
Description: Plots multiple images in a single window.<br>
Syntax: IDL> solmon -> multiplot, timerange=timerange<br>
Keywords: pmulti, same as plot.<br><br>
pmulti: An array with the same form as that which would be specified for !P.multi=[position,columns,rows].<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 16.0px
Arial"><b><a name="plot_compare">Plot_Compare</a></b></h4><br>
<font face="Courier"  >
Description: Plots images of several instruments and filters in a single window.<br>
Syntax: IDL> solmon -> plot_compare, timerange=timerange, instrument=['eit','mdi','mdi'], filter=['171','igram','mag'], pmulti=[0,1,3]<br>
Keywords: instrument, filter, pmulti, same as plot.<br><br>
instrument: An array of instrument names to plot.
filter: The corresponding filter names to the instruments specified. (If an instrument does not have a filter, use '' for its filter name.)
pmulti: An array with the same form as that which would be specified for !P.multi=[position,columns,rows].<br><br>
</font>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 18.0px
Arial"><b><i><a name="moreex">More Examples</a></i></b></h4>
<br>

<font face="Courier"  >
<span class="Apple-tab-span">	IDL> solmon -> plot, /latest <br>
</font><br>
<p class="p3"><img src="images/eit.png" width=300></p>
<br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> solmon -> plot, grid=5 <br>
</font>
<br>
<p class="p3"><img src="images/eitgrid5.png" width=300></p>
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> solmon -> plot, fov=10<br>
</font>
<br>
<p class="p3"><img src="images/eitfov10.png" width=300></p>
<br><br>
<font face="Courier"  >
<span class="Apple-tab-span">	IDL> solmon -> plot_compare, instrument=['eit', 'eit', 'eit', 'bbso'], filter=['195', '171' ,'304' ,''], pmulti=[0, 2, 2]<br>
</font>
<br>
<p class="p3"><img src="images/plotcompare.png" width=500></p>
<br><br>
<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 18.0px
Arial"><b><i>Configuration</i></b></h4>
<br>
<font face="Arial, Helvetica, sans-serif"  >
SOLMON's default plot settings may be altered using the <a href="#configuration">configuration file.</a>
it is also possible to add additional Solar Monitor supported instruments to the SOLMON object using this file. In order for SOLMON 
to use the file, open <font face="Courier"  >solmon_config__define.pro</font> in an editor. In the 
function, <font face="Courier"  >solmon_config::init</font>, change the value of 
<font face="Courier"  >*(self.use_config)</font> to be 1.
<br><br>
<font face="Courier"  >

<span class="Apple-tab-span">	FUNCTION solmon_config::INIT<br><br>

<span class="Apple-tab-span">	self.use_config = ptr_new(/allocate)<br><br>

<span class="Apple-tab-span">	;--&lt;&lt; CHANGE THIS VALUE TO 1 FOR THIS CONFIG FILE TO BE USED OR 0 TO TURN IT OFF. &gt;&gt;<br>
<span class="Apple-tab-span">	<font color="ff0000">*(self.use_config) = 1</font><br><br>

<span class="Apple-tab-span">	return,1<br>
<span class="Apple-tab-span">	end<br><br>
</font>
The following is the configuration for the EIT instrument:<br><br>
<font face="Courier"  >




<span class="Apple-tab-span">	;--&lt;&lt; EIT PROPERTIES &gt;&gt;<br><br>

<span class="Apple-tab-span">	if instrument eq 'eit' then begin<br>
<span class="Apple-tab-span">	filter_prop={f195:['8', '195', ''], f171:['1', '171', ''],f304:['3', '304', ''], f284:['8', '284', '']}<br><br>
	
<span class="Apple-tab-span">	sat_prop={explot:{log:1,grid:1,center:1}, $<br>
<span class="Apple-tab-span">		plot_prop:{log:1,grid:15,center:[0,0]}, $<br>
<span class="Apple-tab-span">		fspan:{url:'http://www.solarmonitor.org', $<br>
<span class="Apple-tab-span">		ftype:['*','insert', '*_fd_','*.fts*'], $<br>
<span class="Apple-tab-span">		path:['/data/','insert','/fits/seit']}, $<br>
<span class="Apple-tab-span">		xstd:1100, ystd:1100, loadct:0, hasfilter:1, def_filt:'195', unisize:0, arch_type:2}<br>
<span class="Apple-tab-span">	endif<br>

</font>
</font>
<br>
<font face="Courier">filter_prop</font> is a structure which holds all of 
the necessary configuration for each of the instrument's filters. Each field is named 
fFILTER. For instance for EIT's 195 filter, there is a field called f195. The first 
element of the field is the LOADCT color table index. The second is the filter's 
keyword name. The third is the path from the main URL where the filter's data is held. 
For EIT all of the filters are in the same place, so the path is just ''.
<br>
<br>
<font face="Courier">sat_prop</font> is a structure which holds all of 
the necessary configuration for the instrument. 
<br><br>
The <font face="Courier">
explot</font> field holds all of the PLOT_MAP keywords which will be automatically 
included in the <a href="#plot">plot</a> call. For instance if the 
<font face="Courier">log:1</font> field was removed, the plotted SXI image would 
no longer be log-scale.
<br><br>
The <font face="Courier">plot_prop</font> field initializes the values of the specified 
keywords.
<br><br>
<font face="Courier">fspan</font> defines the public archive where the instrument's data 
is stored.
<br><br>
<font face="Courier">xstd</font> and <font face="Courier">ystd</font> are the 
largest dimensions, roughly, that an SXI image could be. This is merely to save memory when 
the data is loaded into the SOLMON object.
<br><br>
<font face="Courier">loadct</font> is the color table index that will be used to display 
the data.<br><br>
<font face="Courier">hasfilter</font> tells the program whether or not the instrument has 
filters.<br><br>
<font face="Courier">def_filt</font> is the name of the instrument's default filter.<br><br>
<font face="Courier">unisize</font> tells whether all of the instrument's images are the 
same size.<br><br>
<font face="Courier">arch_type</font> specifies which archive structure the data server 
uses.<br><br>
<span class="Apple-tab-span">	0: Local directory. Use this if you've already downloaded all of the data you need. <br>
<span class="Apple-tab-span"><span class="Apple-tab-span">	Make sure you change the URL field to '' and set the path to where ever the data is on your local drive.<br><br>
<span class="Apple-tab-span">	1: A simple remote directory. All of the data is in a single folder at a remote URL.<br><br>
<span class="Apple-tab-span">	2: Solar Monitor's date-based archive structure. Each day has a separate folder for data.<br><br>

<h4 style="margin: 0.0px 0.0px 0.0px 0.0px; text-align: left; font: 18.0px
Arial"><b><i><a name="instlist">Instruments</a></i></b></h4>
<font face="Arial, Helvetica, sans-serif"  >
XRT - <a href="http://solar-b.nao.ac.jp/xrt_e/">X-Ray Telescope</a>
<br>GONG - <a href="http://gong.nso.edu/">Global Oscillation Network Group</a>
<br>BBSO - <a href="http://www.bbso.njit.edu/">Big Bear Solar Observatory</a>
<br>SXI - <a href="http://sxi.ngdc.noaa.gov/">Solar X-Ray Imager</a>
<br>EIT - <a href="http://umbra.nascom.nasa.gov/eit/">Extreme ultraviolet Imaging Telescope</a>
<span class="Apple-tab-span">	Filters: 107, 195, 304
<br>MDI - <a href="http://soi.stanford.edu/">Michelson Doppler Imager</a>
<span class="Apple-tab-span">	Filters: MAGLC, IGRAM
<br>TRACE - <a href="http://trace.lmsal.com/">Transition Region and Coronal Explorer</a>
</font>

</p>

<?php
include 'http://grian.phy.tcd.ie/solarmonitor/objects/include_footer.php'
?>

</body>
</html>
