<?php

namespace Drupal\cuppies_theme\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\node\Entity\Node;

/**
 * Implements the CartForm form.
 */
class CartForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
      return 'cart_form';
    }
  
    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
      // Get the current user.
      $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      // Get the users cart products.
      $cartProducts  = $user->get('field_cart_products')->getValue();
  
      $totalPrice = 0;

      foreach ($cartProducts as $key => $productId) {
        // Load the node.
        $node = Node::load($productId['target_id']);
  
        // Check if the node exists and is published.
        if ($node && $node->isPublished()) {
          $nodeId = $node->id();
          $quantity = isset($form_state->get('input')['product'][$nodeId]['quantity']) ?
            $form_state->get('input')['product'][$nodeId]['quantity'] :
            1;
  
          if (!isset($form['product'][$nodeId])) {
            $form['product'][$nodeId] = [
              '#type' => 'fieldset',
              '#title' => $node->getTitle(),
            ];
  
            $form['product'][$nodeId]['image'] = [
              '#theme' => 'image',
              '#uri' => $node->get('field_image')->entity->getFileUri(),
              '#alt' => $node->getTitle(),
            ];

            $form['product'][$nodeId]['groupValue'] = [
              '#prefix' => '<div class="groupValue">',
              '#suffix' => '</div>',
            ];

            $form['product'][$nodeId]['groupValue']['price'] = [
              '#markup' => '<p class="update-price" data='.$node->get('field_price')->value.'>$' .($this->getProductQuantity($nodeId) * $node->get('field_price')->value) . '</p>',
            ];
  
            $form['product'][$nodeId]['groupValue']['quantity'] = array(
              '#prefix' => '<div class="group-wrapper">',
              '#suffix' => '</div>',
            );
            
            // Add minus button.
            $form['product'][$nodeId]['groupValue']['quantity']['minus'] = array(
              '#type' => 'button',
              '#value' => '-',
              '#allowed_tags' => ['input'],
              '#data' => $nodeId,
              '#attributes' => array(
                'class' => array('quantity-button quantity-minus'),
              ),
              '#ajax' => [
                'callback' => '::submitFormAjaxMinus',
                'event' => 'click',
                'wrapper' => 'trash'
              ],
            );
        
            // Textfield form element.
            $form['product'][$nodeId]['groupValue']['quantity']['product_quantity'] = array(
              '#type' => 'textfield',
              '#default_value' => $this->getProductQuantity($nodeId),
              '#prefix' => '<div class="quantity-wrapper">',
              '#suffix' => '</div>',
              '#attributes' => array(
                'class' => array('quantity-input'),
                'min' => 1,
                'max' => 99,
              ),
            );
        
            // Add plus button.
            $form['product'][$nodeId]['groupValue']['quantity']['plus'] = array(
              '#type' => 'button',
              '#value' => '+',
              '#allowed_tags' => ['input'],
              '#data' => $nodeId,
              '#attributes' => array(
                'class' => array('quantity-button quantity-plus'),
              ),
              '#ajax' => [
                'callback' => '::submitFormAjaxPlus',
                'event' => 'click',
                'wrapper' => 'trash'
              ],
            );
            
          }
  
          // Update total price.
          $totalPrice += $node->get('field_price')->value * $quantity;
        }
      }
      
      $addresses = [];
      foreach ($user->get('field_address')->getValue() as $address) {
        $addresses[] = $address;
      }
      $form['address'] = [
        '#type' => 'select',
        '#title' => $this->t('Address'),
        '#options' => [
          $addresses[0]['value'],
          $addresses[1]['value'],
          $addresses[2]['value'],
        ],
      ];

      $payments = [];
      foreach ($user->get('field_payment')->getValue() as $payment) {
        $payments[] = $payment;
      }
      $form['payment'] = [
        '#type' => 'select',
        '#title' => $this->t('Payment'),
        '#options' => [
          $payments[0]['value'],
          $payments[1]['value'],
          $payments[2]['value'],
        ],
      ];

      // Display the total price.
      $form['total_price'] = [
        '#markup' => '<p class="total-price">Total Price: $' . $totalPrice . '</p>',
      ];
  

      // Add a submit button for clearing the cart.
      $form['clear_cart'] = [
        '#type' => 'submit',
        '#value' => $this->t('Clear Cart'),
        '#submit' => ['::clearCartSubmit'],
        '#attributes' => ['class' => ['clear-cart']],
      ];
        
      // Add a submit button for the entire form.
      $form['submit'] = [
        '#type' => 'submit',
        '#value' => $this->t('Proceed to Checkout'),
        '#attributes' => ['class' => ['submit-cart']],
      ];

      $form['trash'] = [
        '#markup' => '<div id="trash"></div>',
      ];
      
      $form['total-price-fr'] = $totalPrice;
      return $form;
    }
  
    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
      $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      $currentCart = $user->get('field_cart_products')->getValue();
      $addressNumber = $form_state->getValue('address');
      $paymentNumber = $form_state->getValue('payment');
      foreach ($currentCart as $key => $value) {
        $newOrder['field_item'][] = $value;
      }
      $new_node = Node::create([
        'type' => 'order',
        'title' => REQUEST_TIME, 
        'field_total_value' => $form['total-price-fr'],
        'field_status' => 'payment pending',
        'field_payment' => $user->get('field_payment')->getValue()[$paymentNumber],
        'field_address' => $user->get('field_address')->getValue()[$addressNumber],
        'field_timestamp' => REQUEST_TIME,
        'field_item' => $currentCart,
      ]);
      $new_node->save();
      $orders = $user->get('field_order_products')->getValue();
      $orders[] = $new_node;
      $user->set('field_order_products', $orders);
      $user->set('field_cart_products', []);
      $user->save();
    }
  
    /**
     * Custom submit handler for "Clear Cart" button.
     */
    public function clearCartSubmit(array &$form, FormStateInterface $form_state) {
      $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      $user->set('field_cart_products', []);
      $user->save();
    }

    public function getProductQuantity(int $nodeId) {
      $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      $currentCart = $user->get('field_cart_products')->getValue();
      $count = 0;
      foreach ($currentCart as $item) {
        if ($item['target_id'] == $nodeId) {
          $count++;
        }
      }
      return $count;
    }


  /**
   * Ajax callback for the form submission.
   */
  public function submitFormAjaxMinus(array &$form, FormStateInterface $form_state) {
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    $currentCart = $user->get('field_cart_products')->getValue();
    $nid = $form_state->getTriggeringElement()['#data'];
    $flag = true;
    $newCart = [];
    foreach ($currentCart as $item) {
      if ($flag && $item['target_id'] == $nid) {
        $flag = false;
        continue;
      }
      $newCart[] = $item;
    }
    $user->set('field_cart_products', $newCart);
    $user->save();
    return ['#markup' => '<div id="trash">'.$test.'</div>'];
  }

  public function submitFormAjaxPlus(array &$form, FormStateInterface $form_state) {
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    $currentCart = $user->get('field_cart_products')->getValue();
    $nid = $form_state->getTriggeringElement()['#data'];
    $newCart = $currentCart;
    $cartLength = count($newCart);
    $newCart[$cartLength] = ["target_id" => $nid];
    $user->set('field_cart_products', $newCart);
    $user->save();
    return ['#markup' => '<div id="trash"></div>'];
  }











  }