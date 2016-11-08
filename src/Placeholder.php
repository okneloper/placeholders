<?php

namespace Okneloper\Placeholders;

/**
 * Placeholder. Represents placeholder details.
 * @package Okneloper\Parser
 */
class Placeholder
{
    /**
     * Full placeholder string
     * @var string
     */
    public $placeholder;

    /**
     * Content key
     * @var string
     */
    public $key;

    /**
     * @var array|string
     */
    public $filters;
    
    public function __construct($placeholder, $key, $filters)
    {
        $this->placeholder = $placeholder;
        $this->key = $key;
        $this->filters = $this->parseFilters($filters);
    }

    /**
     * Parses filters string into array of clean filter names.
     * @param $filters
     * @return array
     */
    public function parseFilters($filters)
    {
        $filters = trim($filters, ' |');
        $filters = explode('|', $filters);
        $filters = array_map('trim', $filters);
        return $filters;
    }

    /**
     * Returns true if a given filter exists in the placeholder's filters.
     * @param $name
     * @return bool
     */
    public function hasFilter($name)
    {
        return in_array($name, $this->filters);
    }
}
