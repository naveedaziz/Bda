<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />
<meta name="name" content="<?php if(isset($_SESSION['site_meta']->seo_title)){ echo $_SESSION['site_meta']->seo_title; } ?>" />
<meta name="description" content="<?php if(isset($_SESSION['site_meta']->seo_description)){ echo $_SESSION['site_meta']->seo_description; } ?>" />
<meta name="author" content="<?php if(isset($_SESSION['site_meta']->seo_title)){ echo $_SESSION['site_meta']->seo_title; } ?>" />
<meta property="og:image" content="<?php if(isset($_SESSION['site_meta']->images)){ echo $_SESSION['site_meta']->images; } ?>" />
<meta property="og:title" content="<?php if(isset($_SESSION['site_meta']->seo_title)){ echo $_SESSION['site_meta']->seo_title; } ?>" />
<meta property="og:site_name" content="<?php if(isset($_SESSION['site_meta']->seo_title)){ echo $_SESSION['site_meta']->seo_title; } ?>" />
<meta property="twitter:card" content="summary" />
<meta property="twitter:title" content="<?php if(isset($_SESSION['site_meta']->seo_title)){ echo $_SESSION['site_meta']->seo_title; } ?>" />
<meta property="twitter:description" content="<?php if(isset($_SESSION['site_meta']->seo_description)){ echo $_SESSION['site_meta']->seo_description; } ?>" />
<meta property="og:image" content="" />
<meta property="twitter:site" content="<?php if(isset($_SESSION['site_meta']->seo_title)){ echo $_SESSION['site_meta']->seo_title; } ?>" />
<title><?php if(isset($_SESSION['site_meta']->seo_title)){ echo $_SESSION['site_meta']->seo_title; } ?></title>
