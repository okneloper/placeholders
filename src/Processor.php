<?php

namespace Okneloper\Placeholders;

/**
 */
class Processor
{
    /**
     * @var Parser
     */
    protected $parser;

    /**
     * @var Translator
     */
    private $translator;

    /**
     * Processor constructor.
     * @param Parser $parser
     * @param Translator $translator
     */
    public function __construct(Translator $translator, Parser $parser = null)
    {
        $this->parser = $parser ?: new Parser();
        $this->translator = $translator;
    }

    public function process($content)
    {
        $placeholders = $this->parser->extractPlaceholders($content);

        if ($placeholders->count() === 0) {
            return $content;
        }

        $replacements = $this->translator->translate($placeholders);

        $content = str_replace(array_keys($replacements), array_values($replacements), $content);

        return $content;
    }
}
