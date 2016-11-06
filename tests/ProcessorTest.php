<?php

require_once __DIR__ . '/TestWithSampleContent.php';

/**
 * Class ProcessorTest
 * @covers \Okneloper\Placeholders\Processor
 */
class ProcessorTest extends TestWithSampleContent
{
    public function testProcesses()
    {
        $translator = Mockery::mock(\Okneloper\Placeholders\Translator::class)
            ->shouldReceive('translate')->andReturnUsing(function (\Okneloper\Placeholders\PlaceholderCollection $placeholders) {
                $results = [
                    ':#:home.h1 | plain:#:' => 'H1 Content',
                    ':#:home.h2 | plain | html:#:' => 'H2 Content',
                    ':#:home.h3|plain:#:' => 'h3',
                    ':#:home.h4|plain|html:#:' => 'h3/4',
                    ':#:home.h5:#:' => 'Sample h5',
                    ':#:home.h2:#:' => 'same key, different placeholder',
                ];

                return $results;
            })
            ->getMock();

        $processor = new \Okneloper\Placeholders\Processor($translator);

        $content = $processor->process($this->getSampleContent());

        $this->assertEquals($this->getExpectedParsedContent(), $content);
    }

    private function getExpectedParsedContent()
    {
        return '<div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>H1 Content</h1>
                        <h1>H2 Content</h1>
                        <h3>h3</h3>
                        <h3>h3/4</h3>
                        <h3>Sample h5</h3>
                        
                        <h3>same key, different placeholder</h3><!-- same key, different placeholder-->
                        <h1>H1 Content</h1><!-- same key, same placeholder-->
                        
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            {{--
                            <li>
                                <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                            </li>
                            <li>
                                <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                            </li>
                            --}}
                            <li>
                                <a href="{{ url(\'/test/new\') }}" class="btn btn-default btn-lg"><i class="fa fa-stethoscope fa-fw"></i> <span class="network-name">Пройти тест</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>';
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
