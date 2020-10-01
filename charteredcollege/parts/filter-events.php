<?php
/**
 * Filter Events
 *
 * Controls the AJAX filtering of events in archive templates. Uses FacetWP.
 *
 * @package TAC Framework
 * @since TAC Framework 1.0
 */

?>

<nav id="filter" class="filter">
	<div class="row">
		<div class="s12 col">
			<div class="filter__search">
			
				<?php
				echo facetwp_display( 'facet', 'search' ); ?>

			</div>
		</div>
		<div class="s12 col">
			<!-- Start tab controls. -->
			<ul id="tabs" class="js-reveal filter__tabs">
				<li data-reveal="region"><span class="sub-title">Region</span></li>
				<li data-reveal="topic"><span class="sub-title">Theme</span></li>
				<li data-reveal="organiser"><span class="sub-title">Organiser</span></li>
				<li><span class="sub-title color-red" onclick="FWP.reset()">Reset</span></li>
			</ul><!-- /#tabs. -->
		</div>
	</div>
</nav>

<!-- Start phase filters. -->
<div id="region" class="reveal-content hidden">
	<div class="row">
		<div class="s12 col">
			<div class="reveal-content__inner">

				<?php
				echo facetwp_display( 'facet', 'region' ); ?>

			</div>	
		</div>
	</div>
</div><!-- /#phase. -->

<!-- Start subject filters. -->
<div id="topic" class="reveal-content hidden">
	<div class="row">
		<div class="s12 col">
			<div class="reveal-content__inner">

				<?php
				echo facetwp_display( 'facet', 'theme' ); ?>

			</div>
		</div>
	</div>
</div><!-- /#subject. -->

<!-- Start interest filters. -->
<div id="organiser" class="reveal-content hidden">
	<div class="row">
		<div class="s12 col">
			<div class="reveal-content__inner">

				<?php
				echo facetwp_display( 'facet', 'organiser' ); ?>

			</div>
		</div>
	</div>
</div><!-- /#interest. -->
