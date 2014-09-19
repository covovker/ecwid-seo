<?php

class TestRoot extends PHPUnit_Framework_TestCase
{
    public function testRoot()
    {
        $_GET['_escaped_fragment_'] = '';

        include __DIR__ . '/common_includes.php';

        $index = <<<HTML
<div class="ecwid_catalog_category_name">
    <a href="http://www.example.com/?#!/Test2/c/2532936">Test2</a>
</div>
<div class="ecwid_catalog_category_name">
    <a href="http://www.example.com/?#!/Test/c/2532935">Test</a>
</div>
<div class="ecwid_catalog_category_name">
    <a href="http://www.example.com/?#!/Fruit/c/82006">Fruit</a>
</div>
<div class="ecwid_catalog_category_name">
    <a href="http://www.example.com/?#!/Vegetables1/c/82007">Vegetables1</a>
</div>
<div>
    <span class="ecwid_product_name">
        <a href="http://www.example.com/?#!/orphan/p/29268100">orphan</a>
    </span>
    <span class="ecwid_product_price">150 USD</span>
</div>
HTML;
        $this->assertEquals(trim($index), trim($ecwid_html_index), 'check root content');
    }
}
