<?php
/**
 * Newspack Style 4 Theme: Typography
 *
 * @package Newspack Style 4
 */

/**
 * Generate the CSS for custom typography.
 */
function newspack_style_4_custom_typography_css() {
	$font_body   = newspack_font_stack( get_theme_mod( 'font_body', '' ), get_theme_mod( 'font_body_stack', 'serif' ) );
	$font_header = newspack_font_stack( get_theme_mod( 'font_header', '' ), get_theme_mod( 'font_header_stack', 'serif' ) );

	$css_blocks        = '';
	$editor_css_blocks = '';

	if ( get_theme_mod( 'font_header', '' ) ) {
		$css_blocks .= "
		.site-description,
		.has-drop-cap:not(:focus)::first-letter,
		.taxonomy-description,
		.entry .entry-content blockquote, .entry .entry-content blockquote cite, .entry .entry-content .wp-block-pullquote cite {
			font-family: $font_header;
		}
		";

		$editor_css_blocks .= "
		.editor-block-list__layout .editor-block-list__block.wp-block[data-type='core/pullquote'] blockquote > .block-library-pullquote__content .editor-rich-text__tinymce[data-is-empty='true']::before,
		.editor-block-list__layout .editor-block-list__block.wp-block[data-type='core/pullquote'] blockquote > .editor-rich-text p,
		.editor-block-list__layout .editor-block-list__block.wp-block[data-type='core/pullquote'] p,
		.editor-block-list__layout .editor-block-list__block.wp-block[data-type='core/pullquote'] .wp-block-pullquote__citation,
		.editor-block-list__layout .editor-block-list__block .entry-meta {
			font-family: $font_header;
		}";
	}

	if ( true === get_theme_mod( 'accent_allcaps', true ) ) {
		$css_blocks        .= '
			.accent-header,
			.article-section-title {
				text-transform: uppercase;
			}
		';

		$editor_css_blocks .= '
			.accent-header,
			.article-section-title {
				text-transform: uppercase;
			}
		';
	}

	if ( '' !== $css_blocks ) {
		$theme_css = $css_blocks;
	} else {
		$theme_css = '';
	}

	if ( '' !== $editor_css_blocks ) {
		$editor_css = $editor_css_blocks;
	} else {
		$editor_css = '';
	}

	if ( function_exists( 'register_block_type' ) && is_admin() ) {
		$theme_css = $editor_css;
	}

	return $theme_css;
}
