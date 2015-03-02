/**
 * Core CSS
 * 
 * This file holds all the complicated/hacky stuff that you really
 * shouldn't touch or override unless you're sure you know what you're doing.
 * 
 * Provides classes that implement cross-browser support for the following features:
 *   * fluid-width content area that doesn't wrap around floats
 *   * menu's with separators
 *   * inline-block
 *   * horizontal menus
 *   * fluid gallery without using tables
 */

/* ***************************************
 * MENUS
 *
 * To add separators to a menu:
 * .elgg-menu-$menu > li:after {content: '|'; background: ...;}
 *************************************** */
/* Enabled nesting of dropdown/flyout menus */
.elgg-menu > li { position: relative; }

.elgg-menu > li:last-child::after {
	display: none;
}

/* Maximize click target */
.elgg-menu > li > a { display: block }

/* Horizontal menus w/ separator support */
.elgg-menu-hz > li,
.elgg-menu-hz > li:after,
.elgg-menu-hz > li > a,
.elgg-menu-hz > li > span {
	vertical-align: middle;
}

/* Allow inline image blocks in horizontal menus */
.elgg-menu-hz .elgg-body:after { content: '.'; }

/* Inline block */
.elgg-gallery > li,
.elgg-button,
.elgg-icon,
.elgg-menu-hz > li,
.elgg-menu-hz > li:after,
.elgg-menu-hz > li > a,
.elgg-menu-hz > li > span {
	/* Google says do this, but why? */
	position: relative;
	display: inline-block;
}
