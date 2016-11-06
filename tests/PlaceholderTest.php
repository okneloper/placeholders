<?php

/**
 * @covers \Okneloper\Placeholders\Placeholder
 */
class PlaceholderTest extends PHPUnit_Framework_TestCase
{
    public function testCleansFilters()
    {
        $placeholder = new \Okneloper\Placeholders\Placeholder('', '', '');

        $filters = $placeholder->parseFilters('|html');
        $this->assertEquals(['html'], $filters);

        $filters = $placeholder->parseFilters(' | html | raw');
        $this->assertEquals(['html', 'raw'], $filters);
    }

    public function testCleansFilterInConstructor()
    {
        $placeholder = new \Okneloper\Placeholders\Placeholder('test', 'test', '|html');
        $this->assertEquals(['html'], $placeholder->filters);

        $placeholder = new \Okneloper\Placeholders\Placeholder('test', 'test', ' | html | raw');
        $this->assertEquals(['html', 'raw'], $placeholder->filters);
    }
}
