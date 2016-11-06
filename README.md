Batch replace placeholders in a (HTML) string.

It gives you the full list of placeholders to resolve before replacing. This is handy when you have a lot of placeholders and you want to only fetch those that you need.

For instance, if your data is stored in a database or returned by a remote API, generally you want to fetch all data in one query/request.

#Usage

```php
$content = '
<div class="intro-message">
    <h1>:#:home.h1:#:</h1>
    <h3>:#:home.h2:#:</h3>
</div>
';

$content = $processor->process($content);

echo $content;

/*
<div class="intro-message">
    <h1>Welcome to the site!</h1>
    <h3>Slogan goes here</h3>
</div>
*/
```

See the full example for details of implementation.

## Example

```php
/**
 * Define a placeholder translator by implementing Okneloper\Placeholders\Translator interface
 */
class ExamplePlaceholderTranslater implements Translator
{
    /**
     * @param PlaceholderCollection $placeholders
     * @return array
     */
    public function translate($placeholders)
    {
        $keys = $placeholders->keys();
        // fetch placeholders using keys from database
        // ...
        $data = [
            'home.h1' => 'Welcome to the site!',
            'home.h2' => 'Slogan goes here',
        ];

        $replacements = [];
        foreach ($placeholders as $placeholder) {
            $replacements[$placeholder->placeholder] = $data[$placeholder->key];
            // optionally apply filters found in $placeholder->filters
        }

        return $replacements;
    }
}

// Batch replace placeholders in a response
    /**
     * Handle the event.
     *
     * @param Request $request
     * @param Response $response
     */
    public function handle(Request $request, Response $response)
    {
        $content = $response->getContent();

        $processor = new Processor(new ExamplePlaceholderTranslater());

        $content = $processor->process($content);

        $response->setContent($content);
    }
```
