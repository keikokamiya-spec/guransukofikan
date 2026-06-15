<?php
get_header();
$page_id = function_exists('riders_get_acf_page_id') ? riders_get_acf_page_id() : get_the_ID();
?>
<main>

  <!-- ========== HERO ========== -->
  <section id="hero" class="hero">
    <div class="hero-bg">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero-bg.jpg" alt="玉の風 ヒーロー背景"
        class="hero-bg-img">
      <div class="hero-overlay"></div>
    </div>
    <div class="hero-particles" id="hero-particles"></div>
    <div class="hero-content">
      <div class="hero-logo-wrap fade-in">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.jpg"
          alt="ライダースカフェ＆ダイナー 玉の風 ロゴ" class="hero-logo-img">
      </div>
      <p class="hero-catchcopy fade-in delay-1">風の通り道で、おいしいひとときを。</p>
      <div class="hero-cta fade-in delay-2">
        <a href="#menu" class="btn btn-primary">MENU</a>
        <a href="#access" class="btn btn-outline">ACCESS</a>
      </div>
    </div>
    <div class="hero-scroll-indicator">
      <span>SCROLL</span>
      <div class="scroll-line"></div>
    </div>
  </section>

  <!-- ========== CONCEPT ========== -->
  <section id="concept" class="section section-concept">
    <div class="container">
      <div class="section-header animate-on-scroll">
        <span class="section-label">CONCEPT</span>
        <h2 class="section-title">誰もが自由なスタイルで<br>集える場所</h2>
        <div class="section-divider"></div>
      </div>

      <div class="concept-story animate-on-scroll">
        <div class="concept-story-img">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/storefront.jpg" alt="玉の風 外観"
            loading="lazy">
        </div>
        <div class="concept-story-text">
          <p>2017年に立ち上げ、2020年より本格始動。<br>
            車種・年齢・性別を問わず、心地よい風に吹かれるように「おいしいひととき」を過ごせる空間。</p>
          <p>全国から集まるバイク乗りたちが垣根なく語らい、新しい繋がりが生まれる「風の通り道」を目指しています。</p>
          <p class="concept-since"><span>Since</span> 2017</p>
        </div>
      </div>

      <div class="concept-features">
        <div class="concept-card animate-on-scroll">
          <div class="concept-card-icon">
            <i class="fas fa-motorcycle"></i>
          </div>
          <h3 class="concept-card-title">ライダーが主役の店</h3>
          <p class="concept-card-text">「バイクも来られる店」ではなく「ライダーが主役の店」。オーナー自身がライダーであり、実体験に基づいた設備とサービスを提供します。</p>
        </div>
        <div class="concept-card animate-on-scroll">
          <div class="concept-card-icon">
            <i class="fas fa-wrench"></i>
          </div>
          <h3 class="concept-card-title">飲食 × メンテ × 交流</h3>
          <p class="concept-card-text">食事・洗車・工具貸出が一体化した複合型サポート。満足感のある定食を味わいながら、愛車の手入れもできるワンストップ拠点。</p>
        </div>
        <div class="concept-card animate-on-scroll">
          <div class="concept-card-icon">
            <i class="fas fa-users"></i>
          </div>
          <h3 class="concept-card-title">秘密基地コミュニティ</h3>
          <p class="concept-card-text">初対面でも会話が生まれるアットホームな空間。カウンター越しに、バイクの話や旅の思い出で盛り上がれる「秘密基地」です。</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== MENU ========== -->
  <section id="menu" class="section section-menu">
    <div class="container">
      <div class="section-header animate-on-scroll">
        <span class="section-label">MENU</span>
        <h2 class="section-title">FOOD & DRINK</h2>
        <div class="section-divider"></div>
        <p class="section-subtitle">
          <?php
          echo esc_html(
            riders_get_acf_value(
              'food_drink_section_description',
              $page_id,
              'ライダーのお腹を満たす、ボリューム満点の定食メニュー'
            )
          );
          ?>
        </p>
      </div>

      <?php
      // ① FOOD & DRINK
      $menu_defaults = array(
        array('file' => 'karaage.jpg', 'alt' => '唐揚げランチ', 'name' => '唐揚げランチ', 'desc' => 'サラダ・ライス・スープ・デザート付'),
        array('file' => 'curry.jpg', 'alt' => 'カレーランチ', 'name' => 'カレーランチ', 'desc' => 'じっくり煮込んだ自慢のカレー'),
        array('file' => 'hayashi.jpg', 'alt' => 'ハヤシランチ', 'name' => 'ハヤシランチ', 'desc' => 'サラダ・ライス・スープ・デザート付'),
        array('file' => 'napolitan.jpg', 'alt' => 'ナポリタンランチ', 'name' => 'ナポリタンランチ', 'desc' => '昔ながらの喫茶店ナポリタン'),
        array('file' => 'french-toast.jpg', 'alt' => 'フレンチトースト', 'name' => 'フレンチトースト', 'desc' => 'アイス添え・メープルシロップ付'),
        array('file' => 'waffle.jpg', 'alt' => 'ベルギーワッフル', 'name' => 'ベルギーワッフル', 'desc' => 'サクッとした食感の本格ワッフル'),
        array('file' => 'yakiniku.jpg', 'alt' => '焼肉丼ランチ', 'name' => '焼肉丼ランチ', 'desc' => '食欲をそそるボリューム丼'),
        array('file' => 'saba.jpg', 'alt' => 'さば or ホッケランチ', 'name' => 'さば or ホッケランチ', 'desc' => '焼き魚を楽しめる和定食'),
        array('file' => 'reimen.jpg', 'alt' => '盛岡冷麺', 'name' => '盛岡冷麺', 'desc' => 'さっぱり食べられる人気メニュー'),
        array('file' => 'tuna-sand.jpg', 'alt' => 'ツナサンド', 'name' => 'ツナサンド', 'desc' => '軽食にもぴったりの定番サンド'),
        array('file' => 'pizza-sand.jpg', 'alt' => 'ピザサンド', 'name' => 'ピザサンド', 'desc' => '香ばしく焼き上げたホットサンド'),
        array('file' => 'agepan.jpg', 'alt' => '揚げパン', 'name' => '揚げパン', 'desc' => 'どこか懐かしい甘い一品'),
      );
      // 旧Repeaterに保存済みの値がある場合の互換用です。
      $menu_items = function_exists('get_field') ? get_field('menu_items', $page_id) : array();
      $menu_items = is_array($menu_items) ? $menu_items : array();
      ?>
      <div class="menu-slider animate-on-scroll" id="menu-slider" aria-label="メニュースライドショー">
        <button class="menu-slider-btn menu-slider-btn--prev" type="button" aria-label="前のメニュー画像へ">
          <i class="fas fa-chevron-left"></i>
        </button>
        <div class="menu-slider-viewport">
          <div class="menu-grid menu-slider-track">
            <?php foreach ($menu_defaults as $index => $menu_default): ?>
              <?php
              $img = array(
                'url' => get_template_directory_uri() . '/assets/images/menu/' . $menu_default['file'],
                'alt' => $menu_default['alt'],
              );
              $menu_field_name = 'menu_image_' . sprintf('%02d', $index + 1);
              $acf_img = function_exists('get_field') ? get_field($menu_field_name, $page_id) : array();

              if ((!is_array($acf_img) || empty($acf_img['url'])) && isset($menu_items[$index]['menu_image'])) {
                $acf_img = $menu_items[$index]['menu_image'];
              }

              if (is_array($acf_img) && !empty($acf_img['url'])) {
                $img['url'] = $acf_img['url'];
                $img['alt'] = !empty($acf_img['alt']) ? $acf_img['alt'] : $menu_default['alt'];
              }
              ?>
              <div class="menu-card">
                <div class="menu-card-img">
                  <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" loading="lazy">
                </div>
                <div class="menu-card-body">
                  <h3 class="menu-card-name"><?php echo esc_html($menu_default['name']); ?></h3>
                  <p class="menu-card-desc"><?php echo esc_html($menu_default['desc']); ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <button class="menu-slider-btn menu-slider-btn--next" type="button" aria-label="次のメニュー画像へ">
          <i class="fas fa-chevron-right"></i>
        </button>
        <div class="menu-slider-dots" aria-label="メニュースライド位置"></div>
      </div>

      <div class="menu-extra animate-on-scroll">
        <p>フードはランチから軽食、デザートまで幅広くご用意しています。</p>
        <div class="menu-drink-info">
          <span><i class="fas fa-coffee"></i> コーヒー ¥500</span>
          <span><i class="fas fa-glass-water"></i> ソフトドリンク ¥400</span>
          <span><i class="fas fa-ice-cream"></i> デザート ¥500</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== SERVICE ========== -->
  <section id="service" class="section section-service">
    <div class="container">
      <div class="section-header animate-on-scroll">
        <span class="section-label">SERVICE</span>
        <h2 class="section-title">MAINTENANCE SUPPORT</h2>
        <div class="section-divider"></div>
        <p class="section-subtitle">食事だけじゃない。愛車のケアもここで完結。</p>
      </div>

      <div class="service-list">
        <div class="service-item animate-on-scroll">
          <div class="service-item-img">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/service/wash.jpg"
              alt="バイク専用洗車スペース" loading="lazy">
          </div>
          <div class="service-item-text">
            <div class="service-item-number">01</div>
            <h3 class="service-item-title">バイク専用洗車スペース</h3>
            <p class="service-item-desc">店舗併設の洗車スペースで、ツーリング帰りの汚れもスッキリ。水道・スペース完備で気軽に愛車を磨けます。</p>
          </div>
        </div>

        <div class="service-item service-item--reverse animate-on-scroll">
          <div class="service-item-img">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/service/chemical.jpg"
              alt="ケミカル用品販売" loading="lazy">
          </div>
          <div class="service-item-text">
            <div class="service-item-number">02</div>
            <h3 class="service-item-title">ケミカル用品販売</h3>
            <p class="service-item-desc">WAKO'Sをはじめとする高品質なケミカル用品を店頭販売。メンテナンスに必要なアイテムが揃います。</p>
          </div>
        </div>

        <div class="service-item animate-on-scroll">
          <div class="service-item-img service-item-img--maint service-item-img--no-crop">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/03.jpg" alt="工具無料貸出 & 簡易メンテ"
              loading="lazy">
          </div>
          <div class="service-item-text">
            <div class="service-item-number">03</div>
            <h3 class="service-item-title">工具無料貸出 & 簡易メンテ</h3>
            <p class="service-item-desc">手ぶらで来ても愛車の手入れが可能。工具の無料貸し出しに加え、オイル交換など簡単なメンテナンスにも対応します。</p>
          </div>
        </div>

        <div class="service-item service-item--reverse animate-on-scroll">
          <div class="service-item-img service-item-img--fit service-item-img--square">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/super-rich-quattro-coating.png" alt="Super Rich Quattro Coating"
              loading="lazy">
          </div>
          <div class="service-item-text">
            <div class="service-item-number">04</div>
            <h3 class="service-item-title">Super Rich Quattro Coating & ガラスコーティング</h3>
            <p class="service-item-desc">愛車の美しさを長く保つガラスコーティングにも対応。ツヤと保護性能を高め、日々のケアをサポートします。</p>
          </div>
        </div>

        <div class="service-item animate-on-scroll">
          <div class="service-item-img service-item-img--maint service-item-img--contain">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/05_1.jpeg" alt="05のサービス 1"
              class="maint-img maint-img--1" loading="lazy">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/05_2.jpeg" alt="05のサービス 2"
              class="maint-img maint-img--2" loading="lazy">
          </div>
          <div class="service-item-text">
            <div class="service-item-number">05</div>
            <h3 class="service-item-title">ボディーメンテナンス（鏡面磨）</h3>
            <p class="service-item-desc">細かな洗車キズやくすみを丁寧に磨き上げ、塗装本来の深いツヤを引き出します。愛車を美しく保ちたい方におすすめのボディーメンテナンスです。</p>
          </div>
        </div>

        <?php
        // ② MAINTENANCE SUPPORT 06
        $maintenance_06_title = riders_get_acf_value(
          array('maintenance_06_title', 'service_title', 'service_06_title'),
          $page_id,
          '今月のサービス'
        );
        $maintenance_06_description = riders_get_acf_value(
          array('maintenance_06_description', 'service_class_description', 'service_text', 'service_06_text'),
          $page_id,
          '月ごとにおすすめのサービスをご用意しています。内容は季節に合わせて変わるため、ご来店時にお気軽にご確認ください。'
        );
        $img = riders_get_acf_image_data(
          array('maintenance_06_image', 'service_class_image', 'service_image', 'service_06_image'),
          $page_id,
          get_template_directory_uri() . '/assets/images/hitokuchi-shot-ice-hot.jpg',
          $maintenance_06_title
        );
        ?>
        <div class="service-item service-item--reverse animate-on-scroll">
          <div class="service-item-img service-item-img--fit service-item-img--poster">
            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>"
              loading="lazy">
          </div>
          <div class="service-item-text">
            <div class="service-item-number">06</div>
            <h3 class="service-item-title">
              <?php echo esc_html($maintenance_06_title); ?>
            </h3>
            <p class="service-item-desc">
              <?php echo nl2br(esc_html($maintenance_06_description)); ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== EVENT ========== -->
  <section id="event" class="section section-event">
    <div class="container">
      <div class="section-header animate-on-scroll">
        <span class="section-label">EVENT</span>
        <h2 class="section-title">RIDE & CAMP</h2>
        <div class="section-divider"></div>
        <p class="section-subtitle">
          <?php
          echo esc_html(
            riders_get_acf_value(
              'ride_camp_section_description',
              $page_id,
              '仲間と走り、語り、笑い合う。'
            )
          );
          ?>
        </p>
      </div>

      <?php
      // ③ RIDE & CAMP
      $ride_camp_image_1 = riders_get_acf_image_data(
        array('ride_camp_image_1', 'event_image_1', 'camp_event_image', 'campevent_image'),
        $page_id,
        get_template_directory_uri() . '/assets/images/event/camp.jpg',
        'キャンプイベント'
      );
      $ride_camp_image_2 = riders_get_acf_image_data(
        array('ride_camp_image_2', 'event_image_2', 'touring_event_image', 'touringevent_image'),
        $page_id,
        get_template_directory_uri() . '/assets/images/event/bbq.jpg',
        'ツーリングイベント'
      );

      $camp_event_tag = riders_get_acf_value(
        array('ride_camp_tag_1', 'camp_event_tag', 'campevent_tag'),
        $page_id,
        '毎年9月開催'
      );
      $camp_event_title = riders_get_acf_value(
        array('ride_camp_title_1', 'camp_event_title', 'campevent_title'),
        $page_id,
        'キャンプイベント'
      );
      $camp_event_text = riders_get_acf_value(
        array('ride_camp_description_1', 'camp_event_text', 'campevent_text', 'event_text_1'),
        $page_id,
        '玉の風の一大イベント。全国からライダーが集結し、焚き火を囲んでバイク談義に花を咲かせます。参加確認・集客はInstagramで随時発信中。'
      );
      $touring_event_tag = riders_get_acf_value(
        array('ride_camp_tag_2', 'touring_event_tag', 'touringevent_tag'),
        $page_id,
        '定期開催'
      );
      $touring_event_title = riders_get_acf_value(
        array('ride_camp_title_2', 'touring_event_title', 'touringevent_title'),
        $page_id,
        'ツーリングイベント'
      );
      $touring_event_text = riders_get_acf_value(
        array('ride_camp_description_2', 'touring_event_text', 'touringevent_text', 'event_text_2'),
        $page_id,
        '季節ごとに開催されるツーリングイベント。玉の風に集合して、仲間と一緒に走りに出かけましょう。初心者からベテランまで大歓迎。'
      );
      ?>
      <div class="event-grid">
        <div class="event-card animate-on-scroll">
          <div class="event-card-img">
            <img src="<?php echo esc_url($ride_camp_image_1['url']); ?>" alt="<?php echo esc_attr($ride_camp_image_1['alt']); ?>"
              loading="lazy">
          </div>
          <div class="event-card-body">
            <span class="event-card-tag"><i class="fas fa-campground"></i>
              <?php echo esc_html($camp_event_tag); ?>
            </span>
            <h3 class="event-card-title"><?php echo esc_html($camp_event_title); ?></h3>
            <p class="event-card-text"><?php echo nl2br(esc_html($camp_event_text)); ?></p>
          </div>
        </div>
        <div class="event-card animate-on-scroll">
          <div class="event-card-img">
            <img src="<?php echo esc_url($ride_camp_image_2['url']); ?>" alt="<?php echo esc_attr($ride_camp_image_2['alt']); ?>"
              loading="lazy">
          </div>
          <div class="event-card-body">
            <span class="event-card-tag"><i class="fas fa-road"></i>
              <?php echo esc_html($touring_event_tag); ?>
            </span>
            <h3 class="event-card-title"><?php echo esc_html($touring_event_title); ?></h3>
            <p class="event-card-text"><?php echo nl2br(esc_html($touring_event_text)); ?></p>
          </div>
        </div>
      </div>

      <div class="event-sns-cta animate-on-scroll">
        <p>イベントの最新情報はSNSで配信中</p>
        <div class="event-sns-links">
          <a href="https://www.instagram.com/riders_cafe_tamanokaze/" target="_blank" rel="noopener noreferrer"
            class="btn btn-sns btn-instagram"><i class="fab fa-instagram"></i> Instagram</a>
          <a href="https://www.facebook.com/tamanokaze/?locale=ja_JP" target="_blank" rel="noopener noreferrer"
            class="btn btn-sns btn-facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
          <a href="https://x.com/cafe_tamanokaze" target="_blank" rel="noopener noreferrer" class="btn btn-sns btn-x"><i
              class="fab fa-x-twitter"></i> X</a>
        </div>
      </div>

      <div class="partner-shops animate-on-scroll">
        <p class="partner-shops-label">お付き合いのある店舗</p>
        <div class="partner-shops-grid">
          <div class="partner-shop-card partner-shop-card--single partner-shop-card--tamanoya">
            <span class="partner-shop-content">
              <span class="partner-shop-name">居酒屋カラオケ玉の家</span>
              <span class="partner-shop-link">SNSを見る</span>
            </span>
            <span class="partner-shop-sns">
              <a href="https://www.instagram.com/tamayama_junko?igsh=MXU4d2I1OWV1ZjZzYw%3D%3D" target="_blank"
                rel="noopener noreferrer" class="partner-shop-icon" aria-label="居酒屋カラオケ玉の家 Instagram">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="https://www.facebook.com/people/%E7%8E%89%E5%B1%B1%E6%B7%B3%E5%AD%90/pfbid02vMv9cETtZuitdUz6MR5EL3qooTzwy1vMg7GuDURsZxyAeB5p1j9wuregycrcBt8cl/?mibextid=wwXIfr&rdid=Ecj8PAn80vf4yGu2&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F18QpBhmXwy%2F%3Fmibextid%3DwwXIfr"
                target="_blank" rel="noopener noreferrer" class="partner-shop-icon" aria-label="居酒屋カラオケ玉の家 Facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
            </span>
          </div>
          <div class="partner-shop-card partner-shop-card--single partner-shop-card--griff">
            <span class="partner-shop-content">
              <span class="partner-shop-name">タイヤショップグリフ</span>
              <span class="partner-shop-link">Instagramを見る</span>
            </span>
            <span class="partner-shop-sns">
              <a href="https://www.instagram.com/grifftire?igsh=MWxxZzl1MDV6YWk3MQ==" target="_blank"
                rel="noopener noreferrer" class="partner-shop-icon" aria-label="タイヤショップグリフ Instagram">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="https://grifftire.jp/" target="_blank" rel="noopener noreferrer" class="partner-shop-icon"
                aria-label="タイヤショップグリフ 公式HP">
                <i class="fas fa-arrow-up-right-from-square"></i>
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== GALLERY ========== -->
  <section id="gallery" class="section section-gallery">
    <div class="container">
      <?php
      $scenes_section_description = riders_get_acf_value(
        'scenes_section_description',
        $page_id,
        '店内は、初めての方でも気軽に立ち寄れる落ち着いた雰囲気を大切にしています。'
      );
      ?>
      <div class="section-header animate-on-scroll">
        <span class="section-label">GALLERY</span>
        <h2 class="section-title">SCENES</h2>
        <div class="section-divider"></div>
        <p class="section-subtitle"><?php echo esc_html($scenes_section_description); ?></p>
      </div>

      <?php
      // ④ SCENES
      $scenes_defaults = array(
        array('path' => '/assets/images/scenes-main-interior.jpg', 'alt' => '店内のシーン', 'modifier' => 'gallery-item--tall'),
        array('path' => '/assets/images/gallery/gallery-01.jpg', 'alt' => 'ギャラリー', 'modifier' => ''),
        array('path' => '/assets/images/gallery/gallery-02.jpg', 'alt' => 'ギャラリー', 'modifier' => 'gallery-item--tall'),
        array('path' => '/assets/images/gallery/gallery-03.jpg', 'alt' => 'ギャラリー', 'modifier' => ''),
        array('path' => '/assets/images/gallery/gallery-04.jpg', 'alt' => 'ギャラリー', 'modifier' => ''),
        array('path' => '/assets/images/gallery/gallery-05.jpg', 'alt' => 'ギャラリー', 'modifier' => 'gallery-item--wide'),
        array('path' => '/assets/images/gallery/gallery-06.jpg', 'alt' => 'ギャラリー', 'modifier' => ''),
        array('path' => '/assets/images/gallery/gallery-07.jpg', 'alt' => 'ギャラリー', 'modifier' => ''),
        array('path' => '/assets/images/gallery/gallery-08.jpg', 'alt' => 'ギャラリー', 'modifier' => 'gallery-item--tall'),
        array('path' => '/assets/images/gallery/gallery-09.jpg', 'alt' => 'ギャラリー', 'modifier' => ''),
        array('path' => '/assets/images/gallery/gallery-10.jpg', 'alt' => 'ギャラリー', 'modifier' => ''),
        array('path' => '/assets/images/gallery/gallery-11.jpg', 'alt' => 'ギャラリー', 'modifier' => 'gallery-item--wide'),
        array('path' => '/assets/images/gallery/gallery-12.jpg', 'alt' => 'ギャラリー', 'modifier' => ''),
      );
      // 旧Repeaterに保存済みの値がある場合の互換用です。
      $scenes_images = function_exists('get_field') ? get_field('scenes_images', $page_id) : array();
      $scenes_images = is_array($scenes_images) ? $scenes_images : array();
      ?>
      <div class="gallery-slider animate-on-scroll" id="gallery-slider" aria-label="ギャラリースライドショー">
        <button class="gallery-slider-btn gallery-slider-btn--prev" type="button" aria-label="前のギャラリー画像へ">
          <i class="fas fa-chevron-left"></i>
        </button>
        <div class="gallery-slider-viewport">
          <div class="gallery-grid gallery-slider-track" id="gallery-grid">
            <?php foreach ($scenes_defaults as $index => $scene_default): ?>
              <?php
              $img = array(
                'url' => get_template_directory_uri() . $scene_default['path'],
                'alt' => $scene_default['alt'],
              );
              $scene_row = isset($scenes_images[$index]) && is_array($scenes_images[$index])
                ? $scenes_images[$index]
                : array();
              $scene_number = sprintf('%02d', $index + 1);
              $scene_image_field = 'scene_image_' . $scene_number;
              $scene_modifier_field = 'scene_modifier_class_' . $scene_number;
              $acf_img = function_exists('get_field') ? get_field($scene_image_field, $page_id) : array();

              if ((!is_array($acf_img) || empty($acf_img['url'])) && isset($scene_row['scene_image'])) {
                $acf_img = $scene_row['scene_image'];
              }

              if (function_exists('metadata_exists') && metadata_exists('post', $page_id, $scene_modifier_field)) {
                $modifier_class = (string) get_field($scene_modifier_field, $page_id);
              } elseif (array_key_exists('scene_modifier_class', $scene_row)) {
                $modifier_class = (string) $scene_row['scene_modifier_class'];
              } else {
                $modifier_class = $scene_default['modifier'];
              }

              if (is_array($acf_img) && !empty($acf_img['url'])) {
                $img['url'] = $acf_img['url'];
                $img['alt'] = !empty($acf_img['alt']) ? $acf_img['alt'] : $scene_default['alt'];
              }
              ?>
              <div class="gallery-item<?php echo $modifier_class !== '' ? ' ' . esc_attr($modifier_class) : ''; ?>"
                data-src="<?php echo esc_url($img['url']); ?>">
                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" loading="lazy">
                <div class="gallery-overlay"><i class="fas fa-expand"></i></div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <button class="gallery-slider-btn gallery-slider-btn--next" type="button" aria-label="次のギャラリー画像へ">
          <i class="fas fa-chevron-right"></i>
        </button>
        <div class="gallery-slider-dots" aria-label="ギャラリースライド位置"></div>
      </div>
    </div>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
      <button class="lightbox-close" id="lightbox-close" aria-label="閉じる"><i class="fas fa-times"></i></button>
      <button class="lightbox-prev" id="lightbox-prev" aria-label="前へ"><i class="fas fa-chevron-left"></i></button>
      <button class="lightbox-next" id="lightbox-next" aria-label="次へ"><i class="fas fa-chevron-right"></i></button>
      <div class="lightbox-content">
        <img src="" alt="" id="lightbox-img" class="lightbox-img">
      </div>
    </div>
  </section>

  <!-- ========== ACCESS ========== -->
  <section id="access" class="section section-access">
    <div class="container">
      <div class="section-header animate-on-scroll">
        <span class="section-label">ACCESS</span>
        <h2 class="section-title">SHOP INFO</h2>
        <div class="section-divider"></div>
      </div>

      <div class="access-content">
        <div class="access-map animate-on-scroll">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3246.2450887621067!2d139.62042707578178!3d35.54764877263066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60185fb670b6b963%3A0xbc8fb6f2844ca93e!2z44Op44Kk44OA44O844K544Kr44OV44Kn77yG44OA44Kk44OK44O8IOeOieOBrumiqA!5e0!3m2!1sja!2sjp!4v1776166247801!5m2!1sja!2sjp"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
          <div class="access-map-routes">
            <h3 class="info-title"><i class="fas fa-route"></i> アクセス</h3>
            <div class="access-routes">
              <div class="access-route">
                <div class="route-icon"><i class="fas fa-train"></i></div>
                <div class="route-detail">
                  <strong>電車</strong>
                  <p>横浜市営地下鉄グリーンライン<br>「高田駅」徒歩10分</p>
                </div>
              </div>
              <div class="access-route">
                <div class="route-icon"><i class="fas fa-car"></i></div>
                <div class="route-detail">
                  <strong>お車・バイク</strong>
                  <p>第三京浜「都筑インター」出口より<br>2.4km（約10分）</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="access-info animate-on-scroll">
          <div class="info-block">
            <h3 class="info-title"><i class="fas fa-store"></i> 店舗情報</h3>
            <dl class="info-list">
              <dt>店名</dt>
              <dd>ライダースカフェ＆ダイナー 玉の風</dd>
              <dt>住所</dt>
              <dd>〒223-0065 神奈川県横浜市港北区高田東４丁目１１−１６</dd>
              <dt>電話</dt>
              <dd><a href="tel:09070672673" class="info-link">090-7067-2673</a></dd>
              <dt>メール</dt>
              <dd><a href="mailto:tamatama4357@gmail.com" class="info-link">tamatama4357@gmail.com</a></dd>
            </dl>
          </div>

          <div class="info-block">
            <h3 class="info-title info-title--hours">
              <span><i class="fas fa-clock"></i> 営業時間</span>
              <span class="hours-sns">
                <span>詳細はSNS</span>
                <a href="https://www.instagram.com/riders_cafe_tamanokaze/" target="_blank" rel="noopener noreferrer"
                  aria-label="Instagram">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/tamanokaze/?locale=ja_JP" target="_blank" rel="noopener noreferrer"
                  aria-label="Facebook">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://x.com/cafe_tamanokaze" target="_blank" rel="noopener noreferrer" aria-label="X">
                  <i class="fab fa-x-twitter"></i>
                </a>
              </span>
            </h3>
            <table class="hours-table">
              <tbody>
                <tr>
                  <td>月曜日</td>
                  <td class="closed">定休日<span class="hours-note">※祝日は営業</span></td>
                </tr>
                <tr>
                  <td>火曜日</td>
                  <td class="closed">定休日</td>
                </tr>
                <tr class="open">
                  <td>水曜日</td>
                  <td>11:00 〜 18:00<span class="hours-note">※祝日も営業(時間変更の可能性あり)</span></td>
                </tr>
                <tr>
                  <td>木曜日</td>
                  <td class="closed">定休日</td>
                </tr>
                <tr class="open">
                  <td>金曜日</td>
                  <td>11:00 〜 18:00<span class="hours-note">※祝日も営業(時間変更の可能性あり)</span></td>
                </tr>
                <tr class="open">
                  <td>土曜日</td>
                  <td>11:00 〜 18:00<span class="hours-note">※祝日も営業(時間変更の可能性あり)</span></td>
                </tr>
                <tr class="open">
                  <td>日曜日</td>
                  <td>11:00 〜 18:00<span class="hours-note">※祝日も営業(時間変更の可能性あり)</span></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="info-block info-block--note">
            <p><i class="fas fa-ban-smoking"></i> 店内禁煙・喫煙スペース有り</p>
            <p><i class="fas fa-chair"></i> 席数 12席</p>
            <p><i class="fas fa-square-parking"></i> バイク駐車場 約8台〜10台可能</p>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>
