<?php
require($_SERVER['DOCUMENT_ROOT'] . "/_include/config.php");

$file_id = 'home';
$info = array(
  'url' => '',
);
$seo = array(
  'title' => '',
  'description' => '',
  'keywords' => '',
  'canonical' => $info['url'] . '',
);

// $seo['title'] = $seo['title'] . ' | ' . $info['basetitle'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title><?php echo $seo['title']; ?></title>
  <meta name="robots" content="INDEX,FOLLOW" />
  <link rel="canonical" href="<?php echo $seo['canonical'] ?>" />
  <meta name="description" content="<?php echo $seo['description']; ?>" />
  <meta name="keywords" content="<?php echo $seo['keywords']; ?>" />
  <link href="/favicon.ico" rel="shortcut icon">
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <meta name="viewport" content="width=device-width">
  <?php if ( is_lt_IE8() ): ?>
    <link rel="stylesheet" href="/style.css" type="text/css" media="all" />
  <?php else: ?>
    <link rel="stylesheet" href="/style.css" type="text/css" media="screen and (min-width: 641px)" />
    <link rel="stylesheet" href="/sp.css" type="text/css" media="screen and (max-width:640px)" />
  <?php endif; ?>

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="/js/common.js"></script>
  <script type="text/javascript" src="/js/responsive.js"></script>
  <?php if ( is_sp() ): ?>
    <script type="text/javascript" src="/js/sp.js"></script>
  <?php endif; ?>
  <script type="text/javascript" src="/js/ga.js"></script>
</head>
<body>

</body>
</html>
