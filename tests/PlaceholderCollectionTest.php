<?php

/**
 */
class PlaceholderCollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Make sure the internal collection is initialized to prevent errors
     */
    public function testInitialzesCollection()
    {
        $collection = new \Okneloper\Placeholders\PlaceholderCollection();
        $this->assertAttributeSame([], 'collection', $collection);
    }
}
