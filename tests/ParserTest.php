<?php

/**
 * Class ParserTest
 * @covers \Okneloper\Placeholders\Parser
 * @covers \Okneloper\Placeholders\PlaceholderCollection
 */
class ParserTest extends TestWithSampleContent
{
    public function testParses()
    {
        $placeholders = $this->getTestPlaceholders();

        $this->assertCount(7, $placeholders);

        $index = 0;

        $this->assertEquals(':#:home.h1 | plain:#:', $placeholders[$index]->placeholder);
        $this->assertEquals('home.h1', $placeholders[$index]->key);
        $this->assertEquals(['plain'], $placeholders[$index]->filters);

        $index = 1;
        $this->assertEquals(':#:home.h2 | plain | html:#:', $placeholders[$index]->placeholder);
        $this->assertEquals('home.h2', $placeholders[$index]->key);
        $this->assertEquals(['plain', 'html'], $placeholders[$index]->filters);

        $index = 3;
        $this->assertEquals(':#:home.h4|plain|html:#:', $placeholders[$index]->placeholder);
        $this->assertEquals('home.h4', $placeholders[$index]->key);
        $this->assertEquals(['plain', 'html'], $placeholders[$index]->filters);
    }

    public function testCollection()
    {
        $placeholders = $this->getTestPlaceholders();

        $this->assertEquals([
            'home.h1',
            'home.h2',
            'home.h3',
            'home.h4',
            'home.h5',
        ], $placeholders->keys());
    }

    /**
     * @return \Okneloper\Placeholders\PlaceholderCollection
     */
    protected function getTestPlaceholders()
    {
        $parser = new \Okneloper\Placeholders\Parser();

        $content = $this->getSampleContent();

        $placeholders = $parser->extractPlaceholders($content);

        return $placeholders;
    }
}
