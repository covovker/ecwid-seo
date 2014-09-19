<?php
/* vim: set ts=2 sw=2 et: */

include 'ecwid_catalog.php';
include 'ecwid_product_api.php';
include 'ecwid_platform.php';

function main() {
  global $ecwid_html_index, $ecwid_title, $ecwid_description, $ecwid_store_id;
  $ecwid_html_index = $ecwid_title = '';

  if (isset($_GET['_escaped_fragment_'])) {
    $catalog = new EcwidCatalog($ecwid_store_id, ecwid_page_url());

    $params = $catalog->parse_escaped_fragment($_GET['_escaped_fragment_']);

    if (isset($params['mode']) && in_array($params['mode'], array('product', 'category'))) {
      if ($params['mode'] == 'product') {
        $ecwid_html_index = $catalog->get_product($params['id']);
        $ecwid_title = $catalog->get_product_name($params['id']);
        $ecwid_description = $catalog->get_product_description($params['id']);

      } elseif ($params['mode'] == 'category') {
        $ecwid_html_index = $catalog->get_category($params['id']);
        $ecwid_default_category_str = ',"defaultCategoryId=' . $params['id'] . '"';
        $ecwid_title = $catalog->get_category_name($params['id']);
        $ecwid_description = $catalog->get_category_description($params['id']);
      }

      $ecwid_html_index .= <<<HTML
<script type="text/javascript"> 
if (!document.location.hash) {
  document.location.hash = '!$_GET[_escaped_fragment_]';
}
</script>
HTML;

      $ecwid_description = ecwid_prepare_meta_description($ecwid_description);
    } else {
      $ecwid_html_index = $catalog->get_category(0);
    }
  }
}

function ecwid_page_url () {

  $port = ($_SERVER['SERVER_PORT'] ==  80 ?  "http://" : "https://");

  $parts = parse_url($_SERVER['REQUEST_URI']);

  $queryParams = array();
  parse_str($parts['query'], $queryParams);
  unset($queryParams['_escaped_fragment_']);

  $queryString = http_build_query($queryParams);
  $url = $parts['path'] . '?' . $queryString;

  return $port . $_SERVER['HTTP_HOST'] . $url;
}

function ecwid_prepare_meta_description($description) {
  if (empty($description)) {
    return "empty";
  }

  $description = strip_tags($description);
  $description = html_entity_decode($description, ENT_NOQUOTES, 'UTF-8');
  $description = preg_replace("![\\s]+!", " ", $description);
  $description = trim($description, " \t\xA0\n\r"); // Space, tab, non-breaking space, newline, carriage return  
  $description = mb_substr($description, 0, 160);
  $description = htmlspecialchars($description, ENT_COMPAT | ENT_HTML401, 'UTF-8');

  return $description;
}

main();
