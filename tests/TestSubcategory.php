<?php

class TestSubcategory extends PHPUnit_Framework_TestCase
{
    public function testSubcategory()
    {
        $_GET['_escaped_fragment_'] = '/Fruit/c/82006';

        include __DIR__ . '/common_includes.php';

        $index = <<<HTML
<h2>Fruit</h2>
<div></div>
<div>
    <span class="ecwid_product_name">
        <a href="http://www.example.com/?#!/Cherry/p/148024">Cherry</a>
    </span>
    <span class="ecwid_product_price">5.99 USD</span>
</div>
<div>
    <span class="ecwid_product_name">
        <a href="http://www.example.com/?#!/Apple/p/148020">Apple</a>
    </span>
    <span class="ecwid_product_price">1.99 USD</span>
</div>
<div>
    <span class="ecwid_product_name">
        <a href="http://www.example.com/?#!/Peach/p/148027">Peach</a>
    </span>
    <span class="ecwid_product_price">8.99 USD</span>
</div>
<div>
    <span class="ecwid_product_name">
        <a href="http://www.example.com/?#!/Pear/p/148028">Pear</a>
    </span>
    <span class="ecwid_product_price">2.49 USD</span>
</div>
<div>
    <span class="ecwid_product_name">
        <a href="http://www.example.com/?#!/Strawberry/p/148025">Strawberry</a>
    </span>
    <span class="ecwid_product_price">1.99 USD</span>
</div>
<div>
    <span class="ecwid_product_name">
        <a href="http://www.example.com/?#!/Orange/p/148026">Orange</a>
    </span>
    <span class="ecwid_product_price">2.99 USD</span>
</div>
<script type="text/javascript"> 
if (!document.location.hash) {
  document.location.hash = '!/Fruit/c/82006';
}
</script>
HTML;

        $this->assertEquals(trim($index), trim($ecwid_html_index), 'check subcategory content');
    }
}
