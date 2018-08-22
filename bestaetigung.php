<?php
// define variable name to catch from GET
$get_param = 'ds';

// define valid parameters
$ds_valids['inconet'] = array('inconet','Newsletter_Inconet','inconet-logo.svg','Inconet Technology GmbH');
$ds_valids['netfon'] = array('netfon','Newsletter_Netfon','netfon-logo.svg','Netfon Solutions AG');
$ds_valids['swisspro'] = array('swisspro','Newsletter_Swisspro','swisspro-logo.svg','swisspro AG');
	
if(!$_GET[$get_param] || !array_key_exists($_GET[$get_param],$ds_valids))
{
	// do something if $get_param is not provided or not in $ds_valids
	die("parameter not provided or incorrect!");
}
else
{
	// $get_param is provided and is in $ds_valids
	// pick relevant $ds_valids for further processing
	$partner = $ds_valids[$_GET[$get_param]];
	// go for it!

?>

<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Bestätigung zur Newsletteranmeldung</title>
		<!-- <script type="text/javascript">function onSubmit() { document.onlineForm.submit(); }</script> -->
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
		<![endif]-->

		<!-- Partner Logo -->
		<div class="partner-logo"><img src="img/<?php echo $partner[2]; ?>" alt="<?php echo $partner[3]; ?>"></div>

		<!-- Title -->
		<h1>Ihre Anmeldung zum Newsletter ist bestätigt.</h1>

		<p>
			Künftig erhalten Sie unsere News mit interessanten Beiträgen zu ICT-Themen und attraktiven Angeboten.
			Viel Spass bei der Lektüre!
			<br /><br />
			Freundliche Grüsse<br />
			<?php echo $partner[3];?>
		</p>

		<!-- Scripts -->
		<script src="js/vendor/modernizr-3.6.0.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
	</body>
</html>

<?php } ?>