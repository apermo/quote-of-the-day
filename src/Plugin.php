<?php

declare(strict_types=1);

namespace Apermo\QuoteOfTheDay;

/**
 * Main plugin class.
 */
class Plugin {

	private const QUOTES = [
		[
			'text'   => 'The only way to do great work is to love what you do.',
			'author' => 'Steve Jobs',
		],
		[
			'text'   => 'In the middle of difficulty lies opportunity.',
			'author' => 'Albert Einstein',
		],
		[
			'text'   => 'It does not matter how slowly you go as long as you do not stop.',
			'author' => 'Confucius',
		],
		[
			'text'   => 'The best time to plant a tree was 20 years ago. The second best time is now.',
			'author' => 'Chinese Proverb',
		],
		[
			'text'   => 'Simplicity is the ultimate sophistication.',
			'author' => 'Leonardo da Vinci',
		],
		[
			'text'   => 'Stay hungry, stay foolish.',
			'author' => 'Stewart Brand',
		],
		[
			'text'   => 'What we think, we become.',
			'author' => 'Buddha',
		],
		[
			'text'   => 'Well done is better than well said.',
			'author' => 'Benjamin Franklin',
		],
		[
			'text'   => 'The best revenge is massive success.',
			'author' => 'Frank Sinatra',
		],
		[
			'text'   => 'Not all those who wander are lost.',
			'author' => 'J.R.R. Tolkien',
		],
		[
			'text'   => 'The biggest adventure you can take is to live the life of your dreams.',
			'author' => 'Oprah Winfrey',
		],
		[
			'text'   => 'A person who never made a mistake never tried anything new.',
			'author' => 'Albert Einstein',
		],
	];

	/**
	 * Initialize the plugin.
	 *
	 * @return void
	 */
	public static function init(): void {
		add_shortcode( 'quote_of_the_day', [ self::class, 'render_shortcode' ] );
	}

	/**
	 * Render the [quote_of_the_day] shortcode.
	 *
	 * @return string
	 */
	public static function render_shortcode(): string {
		$quote = self::get_quote_for_date( gmdate( 'Y-m-d' ) );

		return sprintf(
			'<blockquote class="quote-of-the-day"><p>%s</p><cite>— %s</cite></blockquote>',
			esc_html( $quote['text'] ),
			esc_html( $quote['author'] ),
		);
	}

	/**
	 * Get the quote for a specific date.
	 *
	 * Uses a hash of the date to deterministically select a quote,
	 * ensuring the same quote is shown all day but varies day to day.
	 *
	 * @param string $date A date string (e.g. 'Y-m-d').
	 *
	 * @return array{text: string, author: string}
	 */
	public static function get_quote_for_date( string $date ): array {
		$index = crc32( $date ) % count( self::QUOTES );

		return self::QUOTES[ abs( $index ) ];
	}

	/**
	 * Get the full list of quotes.
	 *
	 * @return array<int, array{text: string, author: string}>
	 */
	public static function get_quotes(): array {
		return self::QUOTES;
	}
}
