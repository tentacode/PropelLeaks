<?php

/**
 * This file is part of the Propel package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    MIT License
 */

require_once 'PHPUnit/Framework.php';
require_once dirname(__FILE__) . '/../../../../generator/lib/model/PhpNameGenerator.php';

/**
 * Tests for PhpNamleGenerator
 *
 * @author     <a href="mailto:mpoeschl@marmot.at>Martin Poeschl</a>
 * @version    $Revision: 1834 $
 * @package    generator.model
 */
class PhpNameGeneratorTest extends PHPUnit_Framework_TestCase
{
	public static function testPhpnameMethodDataProvider()
	{
		return array(
			array('foo', 'Foo'),
			array('Foo', 'Foo'),
			array('FOO', 'FOO'),
			array('123', '123'),
			array('foo_bar', 'FooBar'),
			array('bar_1', 'Bar1'),
			array('bar_0', 'Bar0'),
			array('my_CLASS_name', 'MyCLASSName'),
		);
	}
	
	/**
	 * @dataProvider testPhpnameMethodDataProvider
	 */
	public function testPhpnameMethod($input, $output)
	{
		$generator = new TestablePhpNameGenerator();
		$this->assertEquals($output, $generator->phpnameMethod($input));
	}

}

class TestablePhpNameGenerator extends PhpNameGenerator
{
	public function phpnameMethod($schemaName)
	{
		return parent::phpnameMethod($schemaName);
	}
}