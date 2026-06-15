<?php
/**
 * WordPress template snippets for Rider's Cafe & Diner 玉の風.
 *
 * Paste the needed blocks into a WordPress theme template file.
 * Images are loaded from the active theme directory.
 */
?>

<?php
$service_06 = array(
  'number' => '06',
  'title' => get_theme_mod('service_06_title', '今月のサービス'),
  'description' => get_theme_mod(
    'service_06_description',
    '月ごとにおすすめのサービスをご用意しています。内容は季節に合わせて変わるため、ご来店時にお気軽にご確認ください。'
  ),
  'image' => get_theme_mod('service_06_image', get_template_directory_uri() . '/images/06.jpg'),
);
?>

<div class="service-item service-item--reverse animate-on-scroll">
  <div class="service-item-img service-item-img--fit">
    <img src="<?php echo esc_url($service_06['image']); ?>" alt="<?php echo esc_attr($service_06['title']); ?>" loading="lazy">
  </div>
  <div class="service-item-text">
    <div class="service-item-number"><?php echo esc_html($service_06['number']); ?></div>
    <h3 class="service-item-title"><?php echo esc_html($service_06['title']); ?></h3>
    <p class="service-item-desc"><?php echo esc_html($service_06['description']); ?></p>
  </div>
</div>

<?php
$ride_events = array(
  array(
    'image' => get_theme_mod('camp_event_image', get_template_directory_uri() . '/images/event/camp.jpg'),
    'alt' => 'キャンプイベント',
    'icon' => 'fas fa-campground',
    'tag' => get_theme_mod('camp_event_tag', '毎年9月開催'),
    'title' => get_theme_mod('camp_event_title', 'キャンプイベント'),
    'text' => get_theme_mod(
      'camp_event_text',
      '玉の風の一大イベント。全国からライダーが集結し、焚き火を囲んでバイク談義に花を咲かせます。参加確認・集客はInstagramで随時発信中。'
    ),
  ),
  array(
    'image' => get_theme_mod('touring_event_image', get_template_directory_uri() . '/images/event/bbq.jpg'),
    'alt' => 'ツーリングイベント',
    'icon' => 'fas fa-road',
    'tag' => get_theme_mod('touring_event_tag', '定期開催'),
    'title' => get_theme_mod('touring_event_title', 'ツーリングイベント'),
    'text' => get_theme_mod(
      'touring_event_text',
      '季節ごとに開催されるツーリングイベント。玉の風に集合して、仲間と一緒に走りに出かけましょう。初心者からベテランまで大歓迎。'
    ),
  ),
);
?>

<div class="event-grid">
  <?php foreach ($ride_events as $event) : ?>
    <div class="event-card animate-on-scroll">
      <div class="event-card-img">
        <img src="<?php echo esc_url($event['image']); ?>" alt="<?php echo esc_attr($event['alt']); ?>" loading="lazy">
      </div>
      <div class="event-card-body">
        <span class="event-card-tag"><i class="<?php echo esc_attr($event['icon']); ?>"></i> <?php echo esc_html($event['tag']); ?></span>
        <h3 class="event-card-title"><?php echo esc_html($event['title']); ?></h3>
        <p class="event-card-text"><?php echo esc_html($event['text']); ?></p>
      </div>
    </div>
  <?php endforeach; ?>
</div>
