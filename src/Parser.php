<?php

namespace Okneloper\Placeholders;

class Parser
{
    protected $delimiters = [':#:', ':#:'];

    /**
     * @param $content
     * @return PlaceholderCollection
     */
    public function extractPlaceholders($content)
    {
        $regex = sprintf('/%s([^ |]+)((?: *\| *(?:[^ ]+))*)%s/U', $this->delimiters[0], $this->delimiters[1]);
        #dd($regex);
        preg_match_all($regex, $content, $m);

        $placeholders = new PlaceholderCollection();
        for ($i = 0; $i < count($m[0]); $i++) {
            $placeholders->add(new Placeholder(...array_column($m, $i)));
        }

        return $placeholders;
    }
}
