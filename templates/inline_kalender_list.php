<?php
/*
	Scoutnet Kalender Template: WIDGET-EVENTS (default)

	Dir stehen hier alle Inhalte des Kalenders in einem Array zur Verf�gung.
	Z.B.:
	    <?php echo date('d. m. Y', $event->Start); ?>
		<?php echo $event->Title; ?>
		<?php echo $event->Author->get_full_name(); ?>
		<?php var_dump($event); ?>


	ACHTUNG!
		Dieses Template bindet auch Remote-HTML-Code ein, wenn das
		jemand in den Kalender eingetragen hat.

*/

// Deutsche Zeit
date_default_timezone_set('Europe/Berlin');

foreach($events as $event) { /* @var $event SN_Model_Event */
?>
	<h2><?php echo $event->getStartDate()->format("d.m.Y"); ?></span>: <?php echo $event->getTitle(); ?></h2>

	<p>
		<?php echo $event->getDescription(); ?>
		<br />
		eingetragen von: <?php echo $event->getAuthor()->getFullName(); ?>
		<br />
		<?php
		// Zeigt den Link nur an, wenn das Feld gef�llt ist
		if (trim($event->getURL())!="") {
			// Zeigt den Link_Text (mit Link) nur an, wenn das Feld gef�llt ist
			if (trim($event->getURLText())!="") { ?>
				Link: <a href="<?php echo $event->getURL(); ?>"><?php echo $event->getURLText(); ?></a>
			<?php }
				else { ?>
				Link: <a href="<?php echo $event->getURL(); ?>"><?php echo $event->getTitle(); ?></a>
			<?php	}
		}
		?>
	</p>
	<br />
<?php } ?>
