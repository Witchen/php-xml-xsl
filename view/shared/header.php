<?php
$path = $_SERVER['DOCUMENT_ROOT'];

$navbarXml = new DOMDocument;
// $navbarXml->load('../shared/navbar/navbar.xml');
if(isset($_SESSION['role'])){
    if($_SESSION['role'] == 'seller'){
        $navbarXml->load($path . '/view/shared/navbar/sellerNavbar.xml');
    }else{
         $navbarXml->load($path . '/view/shared/navbar/navbar.xml');
    }
}else{
    $navbarXml->load($path . '/view/shared/navbar/navbar.xml');
}


$navbarXsl = new DOMDocument;
$navbarXsl->load($path . '/view/shared/navbar/navbar.xsl');

$proc = new XSLTProcessor;
$proc->importStyleSheet($navbarXsl);
$transformedNavbarXml = $proc->transformToXML($navbarXml);

$authenticationElement ='<a class="btn btn-sm btn-outline-secondary mr-2" href="/view/authentication/login.php" >Login</a><a class="btn btn-sm btn-outline-secondary" href="/view/authentication/registration.php">Sign up</a>';

if(isset($_SESSION['full_name'])){

    $authenticationElement = '<div class="dropdown">'.
            '<a>Welcome '.$_SESSION['full_name'].' !</a>'.
            '<div class="dropdown-content">
             <a href="/view/profile/profile.php">Profile</a>
             <a href="/view/authentication/logout.php">Logout</a>
             </div></div>';
}
?>

<header class="ecom-header py-2">
  <div class="row flex-nowrap justify-content-between align-items-center">
    <div class="col-4 pt-1">
      <img src="/assets/image/logo.jpg" alt="Smiley face" width="50" height="50" />
    </div>
    <div class="col-4 text-center">
      <a class="ecom-header-logo text-dark" href="/">Laxada</a>
    </div>
    <div class="col-4 d-flex justify-content-end align-items-center">

      <?php echo $authenticationElement; ?>

    </div>
  </div>
</header>

<?php echo $transformedNavbarXml; ?>