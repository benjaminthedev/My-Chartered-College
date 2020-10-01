<?php
/**
 * Filter Posts
 *
 * Controls the AJAX filtering of posts in archive templates. Uses FacetWP.
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
				<li data-reveal="phase"><span class="sub-title">Phase</span></li>
				<li data-reveal="subject"><span class="sub-title">Subject</span></li>
				<li data-reveal="interest"><span class="sub-title">Interest</span></li>
				<li><span class="sub-title color-red" onclick="FWP.reset()">Reset</span></li>
			</ul><!-- /#tabs. -->
		</div>
	</div>
</nav>

<!-- Start phase filters. -->
<div id="phase" class="reveal-content hidden">
	<div class="row">
		<div class="s12 col">
			<div class="reveal-content__inner">

				<?php
				echo facetwp_display( 'facet', 'phase' ); ?>

			</div>	
		</div>
	</div>
</div><!-- /#phase. -->

<!-- Start subject filters. -->
<div id="subject" class="reveal-content hidden">
	<div class="row">
		<div class="s12 col">
			<div class="reveal-content__inner">

				<?php
				echo facetwp_display( 'facet', 'subject' ); ?>

			</div>
		</div>
	</div>
</div><!-- /#subject. -->

<!-- Start interest filters. -->
<div id="interest" class="reveal-content hidden">
	<div class="row">
		<div class="s12 col">
			<div class="reveal-content__inner">

				<?php
				echo facetwp_display( 'facet', 'interest' ); ?>

			</div>
		</div>
	</div>
</div><!-- /#interest. -->
