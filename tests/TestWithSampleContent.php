<?php

class TestWithSampleContent extends \PHPUnit_Framework_TestCase
{
    public function getSampleContent()
    {
        return '<div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>:#:home.h1 | plain:#:</h1>
                        <h1>:#:home.h2 | plain | html:#:</h1>
                        <h3>:#:home.h3|plain:#:</h3>
                        <h3>:#:home.h4|plain|html:#:</h3>
                        <h3>:#:home.h5:#:</h3>
                        
                        <h3>:#:home.h2:#:</h3><!-- same key, different placeholder-->
                        <h1>:#:home.h1 | plain:#:</h1><!-- same key, same placeholder-->
                        
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
}
