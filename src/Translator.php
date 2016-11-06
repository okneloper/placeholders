<?php

namespace Okneloper\Placeholders;

interface Translator
{
    /**
     * @param PlaceholderCollection $placeholders
     * @return array
     */
    public function translate($placeholders);
}