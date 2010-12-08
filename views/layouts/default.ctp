<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<title><?php echo $title_for_layout;?></title>
<link href="http://code.google.com/apis/maps/documentation/javascript/examples/standard.css" rel="stylesheet" type="text/css" /> 
<?php 
echo $html->meta('favicon');
echo $html->css('reset') . "\n";
echo $html->css('base') . "\n";
echo $html->css('fonts') . "\n";
echo $html->css('style') . "\n";
if (isset($javascript)) {
echo $javascript->link('prototype');
echo $scripts_for_layout;
}
?>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script type="text/javascript" src="http://static.ak.fbcdn.net/connect.php/js/FB.Share"></script>
</head>
<body>
	<div id="headerWrapper">
		<div id="header">
			<div id="headerlogo"><?php echo $html->image('simba.png');?> | share the love</div>
			<div id="menu"><a href="<?php echo $html->url('/organizations/register/');?>">register</a> | <a href="#">login</a></div>
		</div>		
	</div>
	<div id="navWrapper">
		<div id="nav">
			<ul>
				<li><a href="<?php echo $html->url('/');?>">Home</a>
					<ul>
						<li></li>
					</ul>
				</li>
				<li><a href="<?php echo $html->url('/requests/create/');?>">Create Request</a></li>
				<li><a href="<?php echo $html->url('/organizations/detail/4cfae4cb-c96c-4cb1-9e30-0d10897623dc');?>">Requests List</a></li>
				<li><a href="<?php echo $html->url('/organizations/listInMap/');?>">Maps</a>
					<!--
					<ul>
						<li><a href="<?php echo $html->url('/organizations/listInMap/');?>">All</a></li>
						<li><a href="#">Shelters</a></li>
						<li><a href="<?php echo $html->url('/organizations/listInMap/');?>">Organizations</a></li>
					</ul>
					-->
				</li>
				<li><a href="<?php echo $html->url('/requests/statistics/');?>">Sumarry</a>
					<ul>
						<li></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div id="contentWrapper">
		<div id="search">
			the search lies here
		</div>
			
		<div id="content">
			<? echo $content_for_layout;?>
		</div>
			
		<div id="highlight">
			the highlight lies here
		</div>		
	</div>
	<div id="footerWrapper">
		<div id="footerlogo"><?php echo $html->image('simba2.png');?> &copy; 2010</div>
		<div id="social">We're Social
			<div><a href="http://www.twitter.com/thesimbaproject">Follow us on Twitter</a></div>
			<div><a href="http://www.facebook.com/pages/Simba-Project/181412968539342?ref=mf">Become a Fan on Facebook</a></div>
		</div>
		<div id="contact">Contact Us
			<div>sigitdewanto11[at]yahoo.co.uk</div>
			<div>chiell_36jo[at]yahoo.com</div>
			<div>cius.the.draco[at]gmail.com</div>
			<div>welldanb[at]gmail.com</div>
		</div>
	</div>
</body>
</html>