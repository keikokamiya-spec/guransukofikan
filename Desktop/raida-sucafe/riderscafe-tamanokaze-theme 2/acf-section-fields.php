<?php
/**
 * ACF fields used by the front page.
 */

if (!defined('ABSPATH')) {
  exit;
}

function riders_build_acf_image_field($key, $label, $name, $instructions = '', $wrapper = array()) {
  return array(
    'key' => $key,
    'label' => $label,
    'name' => $name,
    'type' => 'image',
    'instructions' => $instructions,
    'required' => 0,
    'return_format' => 'array',
    'preview_size' => 'medium',
    'library' => 'all',
    'wrapper' => wp_parse_args($wrapper, array(
      'width' => '',
      'class' => '',
      'id' => '',
    )),
  );
}

function riders_register_acf_front_page_fields() {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  $fields = array();

  // ① FOOD & DRINK
  $fields[] = array(
    'key' => 'field_riders_menu_tab',
    'label' => 'FOOD & DRINK',
    'name' => '',
    'type' => 'tab',
    'placement' => 'top',
    'endpoint' => 0,
  );
  $fields[] = array(
    'key' => 'field_riders_food_drink_section_description',
    'label' => 'セクション説明文',
    'name' => 'food_drink_section_description',
    'type' => 'textarea',
    'instructions' => '未設定の場合はテーマ内の既存テキストを表示します。',
    'rows' => 2,
    'new_lines' => '',
  );

  $menu_labels = array(
    '唐揚げランチ',
    'カレーランチ',
    'ハヤシランチ',
    'ナポリタンランチ',
    'フレンチトースト',
    'ベルギーワッフル',
    '焼肉丼ランチ',
    'さば or ホッケランチ',
    '盛岡冷麺',
    'ツナサンド',
    'ピザサンド',
    '揚げパン',
  );

  foreach ($menu_labels as $index => $label) {
    $number = sprintf('%02d', $index + 1);
    $fields[] = riders_build_acf_image_field(
      'field_riders_menu_image_' . $number,
      $number . ' ' . $label . '画像',
      'menu_image_' . $number,
      '画像を選択・変更・削除できます。未設定の場合はテーマ内の既存画像を表示します。',
      array(
        'width' => '50',
        'class' => '',
        'id' => '',
      )
    );
  }

  // ② MAINTENANCE SUPPORT 06
  $fields[] = array(
    'key' => 'field_riders_maintenance_06_tab',
    'label' => '今月のサービス',
    'name' => '',
    'type' => 'tab',
    'placement' => 'top',
    'endpoint' => 0,
  );
  $fields[] = riders_build_acf_image_field(
    'field_riders_maintenance_06_image',
    'サービス画像',
    'maintenance_06_image',
    '画像を選択・変更・削除できます。未設定の場合は hitokuchi-shot-ice-hot.jpg を表示します。'
  );
  $fields[] = array(
    'key' => 'field_riders_maintenance_06_title',
    'label' => 'サービス見出し',
    'name' => 'maintenance_06_title',
    'type' => 'text',
    'placeholder' => '今月のサービス',
  );
  $fields[] = array(
    'key' => 'field_riders_maintenance_06_description',
    'label' => 'サービス説明文',
    'name' => 'maintenance_06_description',
    'type' => 'textarea',
    'rows' => 4,
    'new_lines' => '',
  );

  // ③ RIDE & CAMP
  $fields[] = array(
    'key' => 'field_riders_ride_camp_tab',
    'label' => 'RIDE & CAMP 画像',
    'name' => '',
    'type' => 'tab',
    'placement' => 'top',
    'endpoint' => 0,
  );
  $fields[] = array(
    'key' => 'field_riders_ride_camp_section_description',
    'label' => 'セクション説明文',
    'name' => 'ride_camp_section_description',
    'type' => 'textarea',
    'instructions' => '未設定の場合はテーマ内の既存テキストを表示します。',
    'rows' => 2,
    'new_lines' => '',
  );

  $ride_camp_fields = array(
    1 => array(
      'label' => 'キャンプイベント',
      'tag' => '毎年9月開催',
      'title' => 'キャンプイベント',
      'fallback' => 'event/camp.jpg',
    ),
    2 => array(
      'label' => 'ツーリングイベント',
      'tag' => '定期開催',
      'title' => 'ツーリングイベント',
      'fallback' => 'event/bbq.jpg',
    ),
  );

  foreach ($ride_camp_fields as $number => $event) {
    $fields[] = riders_build_acf_image_field(
      'field_riders_ride_camp_image_' . $number,
      $event['label'] . '画像',
      'ride_camp_image_' . $number,
      '画像を選択・変更・削除できます。未設定の場合は ' . $event['fallback'] . ' を表示します。'
    );
    $fields[] = array(
      'key' => 'field_riders_ride_camp_tag_' . $number,
      'label' => $event['label'] . 'タグ',
      'name' => 'ride_camp_tag_' . $number,
      'type' => 'text',
      'placeholder' => $event['tag'],
      'wrapper' => array('width' => '50', 'class' => '', 'id' => ''),
    );
    $fields[] = array(
      'key' => 'field_riders_ride_camp_title_' . $number,
      'label' => $event['label'] . '見出し',
      'name' => 'ride_camp_title_' . $number,
      'type' => 'text',
      'placeholder' => $event['title'],
      'wrapper' => array('width' => '50', 'class' => '', 'id' => ''),
    );
    $fields[] = array(
      'key' => 'field_riders_ride_camp_description_' . $number,
      'label' => $event['label'] . '説明文',
      'name' => 'ride_camp_description_' . $number,
      'type' => 'textarea',
      'rows' => 4,
      'new_lines' => '',
    );
  }

  // ④ SCENES
  $fields[] = array(
    'key' => 'field_riders_scenes_tab',
    'label' => 'SCENES',
    'name' => '',
    'type' => 'tab',
    'placement' => 'top',
    'endpoint' => 0,
  );
  $fields[] = array(
    'key' => 'field_riders_scenes_section_description',
    'label' => 'SCENES 説明文',
    'name' => 'scenes_section_description',
    'type' => 'textarea',
    'rows' => 3,
    'new_lines' => '',
  );

  $scene_modifiers = array(
    'gallery-item--tall',
    '',
    'gallery-item--tall',
    '',
    '',
    'gallery-item--wide',
    '',
    '',
    'gallery-item--tall',
    '',
    '',
    'gallery-item--wide',
    '',
  );

  foreach ($scene_modifiers as $index => $default_modifier) {
    $number = sprintf('%02d', $index + 1);
    $fields[] = riders_build_acf_image_field(
      'field_riders_scene_image_' . $number,
      'ギャラリー画像 ' . $number,
      'scene_image_' . $number,
      '画像を選択・変更・削除できます。未設定の場合はテーマ内の既存画像を表示します。',
      array(
        'width' => '70',
        'class' => '',
        'id' => '',
      )
    );
    $fields[] = array(
      'key' => 'field_riders_scene_modifier_class_' . $number,
      'label' => '表示サイズ ' . $number,
      'name' => 'scene_modifier_class_' . $number,
      'type' => 'select',
      'choices' => array(
        '' => '標準',
        'gallery-item--tall' => '縦長',
        'gallery-item--wide' => '横長',
      ),
      'default_value' => $default_modifier,
      'allow_null' => 0,
      'multiple' => 0,
      'ui' => 0,
      'return_format' => 'value',
      'wrapper' => array(
        'width' => '30',
        'class' => '',
        'id' => '',
      ),
    );
  }

  acf_add_local_field_group(array(
    'key' => 'group_riders_front_page_fields_v3',
    'title' => 'トップページ設定',
    'fields' => $fields,
    'location' => function_exists('riders_get_front_page_acf_location')
      ? riders_get_front_page_acf_location()
      : array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'page',
          ),
          array(
            'param' => 'page_type',
            'operator' => '==',
            'value' => 'front_page',
          ),
        ),
      ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'show_in_rest' => 0,
  ));
}
add_action('acf/init', 'riders_register_acf_front_page_fields');
