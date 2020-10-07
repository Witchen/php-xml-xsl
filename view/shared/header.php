<?php
$path = $_SERVER['DOCUMENT_ROOT'];

$navbarXml = new DOMDocument;
// $navbarXml->load('../shared/navbar/navbar.xml');
$navbarXml->load($path . '/view/shared/navbar/navbar.xml');

$navbarXsl = new DOMDocument;
$navbarXsl->load($path . '/view/shared/navbar/navbar.xsl');

$proc = new XSLTProcessor;
$proc->importStyleSheet($navbarXsl);
$transformedNavbarXml = $proc->transformToXML($navbarXml);
?>

<header class="ecom-header py-2">
  <div class="row flex-nowrap justify-content-between align-items-center">
    <div class="col-4 pt-1">
      <img src="/assets/image/logo.jpg" alt="Smiley face" width="50" height="50" />
    </div>
    <div class="col-4 text-center">
      <a class="ecom-header-logo text-dark" href="#">Laxada</a>
    </div>
    <div class="col-4 d-flex justify-content-end align-items-center">
      <a class="text-muted" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3">
          <circle cx="10.5" cy="10.5" r="7.5"></circle>
          <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
        </svg>
      </a>
      <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
    </div>
  </div>
</header>

<?php echo $transformedNavbarXml; ?>