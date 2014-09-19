<?php

class EcwidTest extends PHPUnit_Framework_TestCase
{
    public function testProduct()
    {
        $_GET['_escaped_fragment_'] = '/Cherry/p/148024';

        include __DIR__ . '/common_includes.php';

        $index = <<<HTML
<div itemscope itemtype="http://schema.org/Product">
    <h2 class="ecwid_catalog_product_name" itemprop="name">Cherry</h2>
    <p class="ecwid_catalog_product_sku" itemprop="sku">00004</p>
    <div class="ecwid_catalog_product_image">
        <img itemprop="image" src="http://app.ecwid.com/default-store/00004-160.jpg" alt="Cherry 00004" />
    </div>
    <div class="ecwid_catalog_product_category">Fruit</div>
    <div class="ecwid_catalog_product_price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
        Price: <span itemprop="price">5.99</span>
        <span itemprop="priceCurrency">USD</span>
        <link itemprop="availability" href="http://schema.org/InStock" />In stock
    </div>
    <div class="ecwid_catalog_product_description" itemprop="description">
        <h5>Cherry</h5>
<p>The word cherry refers to a fleshy fruit (drupe) that contains a single stony seed. The cherry belongs to the family Rosaceae, genus Prunus, along with almonds, peaches, plums, apricots and bird cherries. The subgenus, Cerasus, is distinguished by having the flowers in small corymbs of several together (not singly, nor in racemes), and by having a smooth fruit with only a weak groove or none along one side. The subgenus is native to the temperate regions of the Northern Hemisphere, with two species in America, three in Europe, and the remainder in Asia.</p>
<p> </p>
<div style="padding: 24px 24px 24px 21px; display: block; background-color: #ececec;">From <a href="http://en.wikipedia.org" title="Wikipedia" style="color: #1e7ec8; text-decoration: underline;">Wikipedia</a>, the free encyclopedia</div>
    </div>
    <div class="ecwid_catalog_product_attribute">
        UPCcc:code value
    </div>
    <div class="ecwid_catalog_product_attribute">
        Brand123:<span itemprop="brand">brand value</span>
    </div>
    <div class="ecwid_catalog_product_attribute">
        size:size value
    </div>
    <div class="ecwid_catalog_product_attribute">
        some other attribute:some other attribute value
    </div>
    <div class="ecwid_catalog_product_options">
        <span>text field</span>
        <input type="text" size="40" name="text field">
    </div>
</div>
<script type="text/javascript"> 
if (!document.location.hash) {
  document.location.hash = '!/Cherry/p/148024';
}
</script>
HTML;

        $this->assertEquals(trim($index), trim($ecwid_html_index), 'check product content');
            
    }
}
