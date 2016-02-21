<?php

/**
 * @file
 * Contains \Drupal\leaflet\Plugin\Field\FieldFormatter\LeafletDefaultFormatter.
 */

namespace Drupal\leaflet\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'leaflet_default' formatter.
 *
 * @FieldFormatter(
 *   id = "leaflet_default",
 *   label = @Translation("Leaflet default formatter"),
 *   field_types = {
 *     "geofield"
 *   }
 * )
 */
class LeafletDefaultFormatter extends FormatterBase {
  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return array(
      // Implement default settings.
    ) + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    return array(
      // Implement settings form.
    ) + parent::settingsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    // Implement settings summary.

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];


    $features = leaflet_process_geofield($items);


    $map = leaflet_map_get_info()['OSM Mapnik'];





    $map_id = Html::getUniqueId('leaflet_map');
    $height = 400;

//    $settings[0] = array(
//      'mapId' => $map_id,
//      'map' => $map,
//      'features' => $features,
//    );

    //drupal_add_library('leaflet', 'leaflet-drupal');
    //drupal_add_js(array('leaflet' => array($settings)), 'setting');


    dsm($features[0]);


    $render = array(
      '#theme' => 'leaflet_map',
      '#map_id' => $map_id,
      '#height' => $height,
      '#attached' => array(
        'library' => array(
          'leaflet/leaflet',
        ),
        'drupalSettings' => array(
          'leaflet' => array(
            'mapId' => $map_id,
            'map' => $map,
            'test' => array('b' => 'c'),
            'features' => $features,
          ),
        ),
      ),
    );


//    dsm($render);

//    $render = leaflet_render_map($map, $features);
    $elements[0] = $render;



//    foreach ($items as $delta => $item) {
//      $elements[$delta] = array(
//        // We create a render array to produce the desired markup,
//        // "<p style="color: #hexcolor">The color code ... #hexcolor</p>".
//        // See theme_html_tag().
//        '#type' => 'html_tag',
//        '#tag' => 'p',
//        '#attached' => ['library' => ['leaflet']],
//        '#attributes' => array(
//          'style' => 'color: ' . '#33cccc',
//        ),
//        '#value' => $this->t('The color code in this field is @code', array('@code' => 'FFF')),
//      );
//    }



//    foreach ($items as $delta => $item) {
//      $elements[$delta] = ['#markup' => $this->viewValue($item)];
//    }

    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item) {


    $maps = leaflet_map_get_info();

//    dpr($maps);

    // dd($item);

//    dpr(array('11' => 'hashaghgh'));
//    dpr(array('11' => 'hashaghgh'));
//
//    dpr(array('11' => 'hashaghgh'));
//
//    dpr(array('11' => 'hashaghgh'));
//    kint($item->value);
//    dpr($item);
    return "JOSKE";
    // The text value has no text format assigned to it, so the user input
    // should equal the output, including newlines.

    return nl2br(Html::escape($item->value));
  }

}
