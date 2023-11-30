<?php

namespace Drupal\cuppies_theme\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\node\Entity\Node;

/**
 * Provides a form for displaying user orders.
 */
class OrdersForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'orders_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
  // Get the current user.
  $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
// Get the users cart products.
$orders  = $user->get('field_order_products')->getValue();

foreach ($orders as $key => $order) {
  // Load the node.
  $node = Node::load($order['target_id']);

  // Check if the node exists and is published.
  if ($node && $node->isPublished()) {
    $nodeId = $node->id();
    // Load the node fields.
    $timestamp = $node->get('field_timestamp')->value;
    $totalValue = $node->get('field_total_value')->value;
    $status = $node->get('field_status')->value;

    // Format the timestamp.
    $formattedTimestamp = \Drupal::service('date.formatter')->format($timestamp, 'custom', 'Y-m-d H:i:s');

    // Add a field for timestamp.
    $form[$key]['timestamp'] = [
      '#markup' => '<p>' . $this->t('Timestamp: @timestamp', ['@timestamp' => $formattedTimestamp]) . '</p>',
    ];

    // Add a field for total value.
    $form[$key]['total_value'] = [
      '#markup' => '<p>' . $this->t('Total Value: $@total_value', ['@total_value' => $totalValue]) . '</p>',
    ];

    // Add a field for status.
    $form[$key]['status'] = [
      '#markup' => '<p>' . $this->t('Status: @status', ['@status' => $status]) . '</p>',
    ];

    $items = $node->get('field_item')->referencedEntities();
    $nodeList = [];
    foreach ($items as $itemkey => $item){
      $itemTitle = $item->getTitle();
      if (key_exists($itemTitle, $nodeList)) {
        $nodeList[$itemTitle] = $nodeList[$itemTitle] + 1;
        $form[$key]['items'][$itemTitle]['quantity'] = [
          '#markup' => '<p>quantity:' . $nodeList[$itemTitle] . '</p>',
        ];
        continue;
      }
      $nodeList[$itemTitle] = 1;
      $form[$key]['items'][$itemTitle] = [
        '#type' => 'fieldset',
        '#title' => $itemTitle,
      ];
      $form[$key]['items'][$itemTitle]['image'] = [
        '#theme' => 'image',
        '#uri' => $item->get('field_image')->entity->getFileUri(),
        '#alt' => $itemTitle,
      ];
      $form[$key]['items'][$itemTitle]['price'] = [
        '#markup' => '<p>$' . $item->get('field_price')->value . '</p>',
      ];
      $form[$key]['items'][$itemTitle]['quantity'] = [
        '#markup' => '<p>quantity:' . $nodeList[$itemTitle] . '</p>',
      ];
    }
  }
}
return $form;
}
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Submit logic, if needed.
  }

  public function getProductQuantity(int $nodeId) {
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    $currentCart = $user->get('field_order_product')->getValue();
    $count = 0;
    foreach ($currentCart as $item) {
      if ($item['target_id'] == $nodeId) {
        $count++;
      }
    }
    return $count;
  }

}
