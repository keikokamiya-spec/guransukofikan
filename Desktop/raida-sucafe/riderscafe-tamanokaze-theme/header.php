<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ライダースカフェ＆ダイナー 玉の風 | 横浜・高田 ライダーが主役のカフェ＆ダイナー</title>
  <meta name="description"
    content="横浜市港北区高田東のライダースカフェ＆ダイナー玉の風。バイク専用洗車スペース・工具無料貸出・ケミカル販売。唐揚げランチやカレーなど満足の定食メニュー。ライダーが主役の秘密基地へようこそ。">
  <meta name="keywords" content="ライダースカフェ,バイクカフェ,横浜,港北区,高田,玉の風,ダイナー,バイク洗車,ツーリング,キャンプイベント">

  <!-- OGP -->
  <meta property="og:title" content="ライダースカフェ＆ダイナー 玉の風">
  <meta property="og:description" content="横浜・高田のライダーが主役のカフェ＆ダイナー。飲食・メンテナンス・交流が一体化した、バイク乗りの秘密基地。">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.jpg">
  <meta property="og:locale" content="ja_JP">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="ライダースカフェ＆ダイナー 玉の風">
  <meta name="twitter:description" content="横浜・高田のライダーが主役のカフェ＆ダイナー。飲食・メンテナンス・交流が一体化した、バイク乗りの秘密基地。">
  <meta name="twitter:image" content="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.jpg">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Noto+Sans+JP:wght@400;500;700;900&display=swap"
    rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Restaurant",
    "name": "ライダースカフェ＆ダイナー 玉の風",
    "alternateName": "Rider's Cafe & Diner TAMA NO KAZE",
    "image": "<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.jpg",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "高田東4-11-16",
      "addressLocality": "横浜市港北区",
      "addressRegion": "神奈川県",
      "postalCode": "",
      "addressCountry": "JP"
    },
    "telephone": "090-7067-2673",
    "email": "tamatama4357@gmail.com",
    "openingHoursSpecification": [
      { "@type": "OpeningHoursSpecification", "dayOfWeek": "Wednesday", "opens": "11:00", "closes": "18:00" },
      { "@type": "OpeningHoursSpecification", "dayOfWeek": "Friday", "opens": "11:00", "closes": "18:00" },
      { "@type": "OpeningHoursSpecification", "dayOfWeek": "Saturday", "opens": "11:00", "closes": "18:00" },
      { "@type": "OpeningHoursSpecification", "dayOfWeek": "Sunday", "opens": "11:00", "closes": "18:00" }
    ],
    "servesCuisine": "日本料理・カフェ",
    "priceRange": "¥1,000〜",
    "url": "",
    "description": "横浜市港北区高田東のライダースカフェ＆ダイナー。バイク専用洗車スペース・工具無料貸出・ケミカル販売。ライダーが主役の秘密基地。",
    "foundingDate": "2017"
  }
  </script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- ========== HEADER ========== -->
  <header id="header" class="header">
    <div class="header-inner">
      <a href="#hero" class="header-logo" id="header-logo">
        <span class="logo-text-en">RIDER'S CAFE & DINER</span>
        <span class="logo-text-jp">玉の風</span>
      </a>
      <nav class="header-nav" id="header-nav">
        <ul class="nav-list">
          <li><a href="#concept" class="nav-link">CONCEPT</a></li>
          <li><a href="#menu" class="nav-link">MENU</a></li>
          <li><a href="#service" class="nav-link">SERVICE</a></li>
          <li><a href="#event" class="nav-link">EVENT</a></li>
          <li><a href="#gallery" class="nav-link">GALLERY</a></li>
          <li><a href="#access" class="nav-link">ACCESS</a></li>
        </ul>
      </nav>
      <button class="menu-trigger" id="menu-trigger" aria-label="メニューを開く">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </header>

  <!-- Mobile Menu Modal -->
  <div class="modal-window" id="modal-window">
    <div class="modal-inner">
      <nav class="modal-nav">
        <ul class="modal-nav-list">
          <li><a href="#concept" class="modal-nav-link">CONCEPT</a></li>
          <li><a href="#menu" class="modal-nav-link">MENU</a></li>
          <li><a href="#service" class="modal-nav-link">SERVICE</a></li>
          <li><a href="#event" class="modal-nav-link">EVENT</a></li>
          <li><a href="#gallery" class="modal-nav-link">GALLERY</a></li>
          <li><a href="#access" class="modal-nav-link">ACCESS</a></li>
        </ul>
      </nav>
      <div class="modal-sns">
        <a href="https://www.instagram.com/riders_cafe_tamanokaze/" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i
            class="fab fa-instagram"></i></a>
        <a href="https://www.facebook.com/tamanokaze/?locale=ja_JP" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i
            class="fab fa-facebook-f"></i></a>
        <a href="https://x.com/cafe_tamanokaze" target="_blank" rel="noopener noreferrer" aria-label="X"><i
            class="fab fa-x-twitter"></i></a>
      </div>
    </div>
  </div>
  <div class="mask" id="mask"></div>

