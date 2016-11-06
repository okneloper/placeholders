<?php

namespace Okneloper\Placeholders;

/**
 * Parser Placeholders
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
     *
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
}
