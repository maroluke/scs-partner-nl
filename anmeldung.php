<?php
// define variable name to catch from GET
$get_param = 'ds';

// define valid parameters
$ds_valids['inconet'] = array('inconet','Newsletter_Inconet','inconet-logo.svg','Inconet Technology GmbH');
$ds_valids['netfon'] = array('netfon','Newsletter_Netfon','netfon-logo.svg','Netfon Solutions AG');
$ds_valids['swisspro'] = array('swisspro','Newsletter_Swisspro','swisspro-logo.svg','swisspro AG');

?>

<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Anmeldung zum Newsletter</title>
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

		<?php
		if(!$_GET[$get_param] || !array_key_exists($_GET[$get_param],$ds_valids))
		{
			// do something if $get_param is not provided or not in $ds_valids
		?>

		<h1>Anmeldung zum Newsletter</h1>

		<!-- If parameter error -->
		<p id="paramError">
			Die Anmeldung zum Partnernews Newsletter ist nur für ausgewählte Partner erlaubt.
			<br /><br />
			Vielen Dank für das Verständnis.<br />
			Freundliche Grüsse
		</p>

		<?php
		}
		else
		{
			// $get_param is provided and is in $ds_valids
			// pick relevant $ds_valids for further processing
			$partner = $ds_valids[$_GET[$get_param]];
			// go for it!
		?>
		<!-- Partner Logo -->
		<div class="partner-logo"><img src="img/<?php echo $partner[2]; ?>" alt="<?php echo $partner[3]; ?>"></div>

		<!-- Title -->
		<h1>Anmeldung zum Newsletter</h1>

		<!-- Subscription Form -->
		<form id="form" name="onlineForm">
			<input type="hidden" name="ac" value="reg">
			<input type="hidden" name="clientCode" value="d6Rctu5q4fyLqgaTfU">
			<input type="hidden" name="doubleOptin" value="1">
			<input type="hidden" name="trackId" value="null">
			<input type="hidden" name="data_source" value="<?php echo $partner[0];?>">
			<input type="hidden" name="<?php echo $partner[1];?>" value="1">

			<input type="hidden" name="xp_sendBackParams" value="0">
			<!-- Werte von xp_sendBackParams
			value = 0   does not return registration parameters to client's Url
			value = 1   returns registration parameters to client's Url if success
			value = 2   returns registration parameters to client's Url if error
			value = 3   always returns registration parameters to client's Url
			-->

			<!--
			Mit diesem Parameter kann das Redirekt zur Folgeseite unterdrückt werden
			HTTP Response Code 200, wenn die Registrierung erfolgreich durchgeführt wurde
			HTTP Response Code 400, wenn das Profil bereits existiert und kein Update ist erlaubt
			HTTP Response Code 500, wenn die Registrierung aufgrund eines Fehlers nicht beendet wurde
			-->
			<input type="hidden" name="xp_redirectLP" value="0">

			<fieldset>
				<div class="radio-field">
					<input type="radio" value="female_alias" id="female_alias" name="sex_alias">
					<label for="female_alias">Frau</label>
					<div class="check"></div>
				</div>

				<div class="radio-field">
					<input type="radio" value="male_alias" id="male_alias" name="sex_alias">
					<label for="male_alias">Herr</label>
					<div class="check"></div>
				</div>
			</fieldset>

			<div class="text-field">
				<label for="first_name">Vorname</label>
				<input type="text" id="first_name" name="first_name" />
			</div>

			<div class="text-field">
				<label for="last_name">Nachname</label>
				<input type="text" id="last_name" name="last_name" />
			</div>

			<div class="text-field">
				<label for="sys_email">E-Mail</label>
				<input type="email" id="sys_email" name="sys_email" />
			</div>

			<p class="legal">Ja, ich möchte den Newsletter von <?php echo $partner[3]; ?> erhalten. Ihre Daten werden streng vertraulich behandelt und nicht an Dritte verkauft und auch nicht weiter gegeben. Diese Einwilligung kann jederzeit widerrufen werden.</p>
			
			<input type="submit" id="submit" value="Anmelden" />
		</form>

		<!-- If submit was successful, hide form and show text -->
		<p id="onSuccess">
			Wir haben Ihnen eben eine E-Mail gesendet. Bitte öffnen Sie den darin enthaltenen Link, um Ihre Anmeldung zu bestätigen.
			<br /><br />
			Freundliche Grüsse<br />
			<?php echo $partner[3];?>
		</p>
		<?php } ?>

		<!-- Scripts -->
		<script src="js/vendor/modernizr-3.6.0.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
		<script src="js/vendor/jquery.validate.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>