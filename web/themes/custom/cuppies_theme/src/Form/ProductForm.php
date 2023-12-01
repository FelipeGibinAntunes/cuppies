<?php
 
namespace Drupal\cuppies_theme\Form;
 
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
 
class ProductForm extends FormBase {
 public function getFormId() {
   return 'product_form';
 }
 
 public function buildForm(array $form, FormStateInterface $form_state, $username = NULL) {
  $node = \Drupal::routeMatch()->getParameter('node');

    $form['quantity'] = array(
      '#prefix' => '<div class="group-wrapper">',
      '#suffix' => '</div>',
    );
    
    // Add minus button.
    $form['quantity']['minus'] = array(
      '#markup' => '<div class="quantity-change"><input type="button" value="-" class="quantity-button quantity-minus">',
      '#allowed_tags' => ['input'],
    );

    // Textfield form element.
    $form['quantity']['product_quantity'] = array(
      '#type' => 'textfield',
      '#default_value' => 1,
      '#prefix' => '<div class="quantity-wrapper">',
      '#suffix' => '</div>',
      '#attributes' => array(
        'class' => array('quantity-input'),
        'min' => 1,
        'max' => 99,
      ),
    );

    // Add plus button.
    $form['quantity']['plus'] = array(
      '#markup' => '<input type="button" value="+" class="quantity-button quantity-plus"></div>',
      '#allowed_tags' => ['input'],
    );

   // Submit button.
   $form['actions']['submit'] = array(
     '#type' => 'submit',
     '#value' => '$'.($node->get('field_price')->value) ,
     '#button_type' => 'primary',
     '#attributes' => array(
      'class' => array('update-price'),
      'data' => $node->get('field_price')->value,
     ),
   );
   return $form;
 }

 public function validateForm(array &$form, FormStateInterface $form_state) {
   if (strlen($form_state->getValue('product_quantity')) < 1) {
     $form_state->setErrorByName('product_quantity', $this->t('Select a quantity.'));
   }
   if ($form_state->getValue('product_quantity') < 1 || $form_state->getValue('product_quantity') > 99) {
    $form_state->setErrorByName('product_quantity', $this->t('Select a valid quantity.'));
   }
 }
 
 public function submitForm(array &$form, FormStateInterface $form_state) {
  $node = \Drupal::routeMatch()->getParameter('node');
  $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
  $currentCart = $user->get('field_cart_products')->getValue();
  $newCart = $currentCart;
  $cartLength = count($newCart);
  $quantity = $form_state->getValue('product_quantity');
  for ($i = $cartLength; $i < $cartLength + $quantity; $i++) {
    $newCart[$i] = ["target_id" => $node->id()];
  }
  $user->set('field_cart_products', $newCart);
  $user->save();
  \Drupal::messenger()->addMessage('x'.$quantity." ".$node->get('title')->value." added to cart");
}

public function getProductQuantity() {
  $node = \Drupal::routeMatch()->getParameter('node');
  $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
  $currentCart = $user->get('field_cart_products')->getValue();
  $count = 0;
  foreach ($currentCart as $item) {
    if ($item['target_id'] == $node->id()) {
      $count++;
    }
  }
  return $count;
}
}