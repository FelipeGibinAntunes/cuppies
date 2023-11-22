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
  
            $form['product'][$nodeId]['price'] = [
              '#markup' => '<p>$' . $node->get('field_price')->value . '</p>',
            ];
  
            $form['product'][$nodeId]['quantity'] = [
              '#type' => 'number',
              '#title' => $this->t('Quantity'),
              '#default_value' => $quantity,
              '#min' => 1,
              '#max' => 99,
            ];
  
            $form['product'][$nodeId]['remove'] = [
              '#type' => 'submit',
              '#value' => $this->t('Remove from Cart'),
              '#submit' => ['::removeFromCartSubmit'],
              '#attributes' => ['class' => ['remove-cart']],
            ];
          } else {
            // Update quantity for existing product.
            $form['product'][$nodeId]['quantity']['#default_value'] += $quantity;
          }
  
          // Update total price.
          $totalPrice += $node->get('field_price')->value * $quantity;
        }
      }
  
      // Display the total price.
      $form['total_price'] = [
        '#markup' => '<p>Total Price: $' . $totalPrice . '</p>',
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
  
      return $form;
    }
  
    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
      // Handle the form submission.
      // You can add custom logic here.
    }
  
    /**
     * Custom submit handler for "Remove from Cart" button.
     */
    public function removeFromCartSubmit(array &$form, FormStateInterface $form_state) {
      // Handle the submission of the "Remove from Cart" button.
      // You can add custom logic here.
    }
  
    /**
     * Custom submit handler for "Clear Cart" button.
     */
    public function clearCartSubmit(array &$form, FormStateInterface $form_state) {
      // Handle the submission of the "Clear Cart" button.
      // You can add custom logic here.
    }
  }