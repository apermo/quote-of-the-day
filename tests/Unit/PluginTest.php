<?php

declare(strict_types=1);

namespace Apermo\QuoteOfTheDay\Tests\Unit;

use Apermo\QuoteOfTheDay\Plugin;
use PHPUnit\Framework\TestCase;

/**
 * Tests for the Plugin class.
 */
class PluginTest extends TestCase {

	/**
	 * Verify the Plugin class has an init method.
	 *
	 * @return void
	 */
	public function test_init_method_exists(): void {
		$this->assertTrue( method_exists( Plugin::class, 'init' ) );
	}

	/**
	 * Verify the quotes list is not empty.
	 *
	 * @return void
	 */
	public function test_quotes_list_is_not_empty(): void {
		$this->assertNotEmpty( Plugin::get_quotes() );
	}

	/**
	 * Verify each quote has the required keys.
	 *
	 * @return void
	 */
	public function test_each_quote_has_text_and_author(): void {
		foreach ( Plugin::get_quotes() as $quote ) {
			$this->assertArrayHasKey( 'text', $quote );
			$this->assertArrayHasKey( 'author', $quote );
			$this->assertNotEmpty( $quote['text'] );
			$this->assertNotEmpty( $quote['author'] );
		}
	}

	/**
	 * Verify the same date always returns the same quote.
	 *
	 * @return void
	 */
	public function test_same_date_returns_same_quote(): void {
		$quote_a = Plugin::get_quote_for_date( '2025-06-15' );
		$quote_b = Plugin::get_quote_for_date( '2025-06-15' );

		$this->assertSame( $quote_a, $quote_b );
	}

	/**
	 * Verify different dates produce varying quotes over a month.
	 *
	 * @return void
	 */
	public function test_different_dates_can_return_different_quotes(): void {
		$seen = [];
		for ( $i = 1; $i <= 30; $i++ ) {
			$date  = sprintf( '2025-01-%02d', $i );
			$quote = Plugin::get_quote_for_date( $date );

			$seen[ $quote['text'] ] = true;
		}

		$this->assertGreaterThan( 1, count( $seen ) );
	}

	/**
	 * Verify the quote index stays within bounds for a full year.
	 *
	 * @return void
	 */
	public function test_quote_index_stays_within_bounds(): void {
		for ( $i = 0; $i < 365; $i++ ) {
			$date  = gmdate( 'Y-m-d', strtotime( "2025-01-01 +{$i} days" ) );
			$quote = Plugin::get_quote_for_date( $date );

			$this->assertArrayHasKey( 'text', $quote );
			$this->assertArrayHasKey( 'author', $quote );
		}
	}
}
