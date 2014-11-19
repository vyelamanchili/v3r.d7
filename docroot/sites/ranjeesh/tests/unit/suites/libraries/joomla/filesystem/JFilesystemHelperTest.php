<?php
/**
 * @package     Joomla.UnitTest
 * @subpackage  Filesystem
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

/**
 * Test class for JFilesystemHelper.
 *
 * @package     Joomla.UnitTest
 * @subpackage  Event
 * @since       11.1
 */
class JFilesystemHelperTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var JFilesystemHelper
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->object = new JFilesystemHelper;
	}

	/**
	 * Test...
	 *
	 * @todo Implement testRemotefsize().
	 *
	 * @return void
	 */
	public function testRemotefsize()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * Test...
	 *
	 * @todo Implement testFtpChmod().
	 *
	 * @return void
	 */
	public function testFtpChmod()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * Test...
	 *
	 * @todo Implement testGetWriteModes().
	 *
	 * @return void
	 */
	public function testGetWriteModes()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * Test...
	 *
	 * @todo Implement testGetSupported().
	 *
	 * @return void
	 */
	public function testGetSupported()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * Test...
	 *
	 * @todo Implement testGetTransports().
	 *
	 * @return void
	 */
	public function testGetTransports()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * Test...
	 *
	 * @todo Implement testGetFilters().
	 *
	 * @return void
	 */
	public function testGetFilters()
	{
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete(
			'This test has not been implemented yet.'
		);
	}

	/**
	 * Test...
	 *
	 * @covers  JFilesystemHelper::getJStreams
	 *
	 * @return void
	 */
	public function testGetJStreams()
	{
		$streams = JFilesystemHelper::getJStreams();

		$this->assertEquals(
			array('string'),
			$streams
		);
	}

	/**
	 * Test...
	 *
	 * @covers  JFilesystemHelper::isJoomlaStream
	 *
	 * @return void
	 */
	public function testIsJoomlaStream()
	{
		$this->assertTrue(
			JFilesystemHelper::isJoomlaStream('string')
		);

		$this->assertFalse(
			JFilesystemHelper::isJoomlaStream('unknown')
		);
	}
}
