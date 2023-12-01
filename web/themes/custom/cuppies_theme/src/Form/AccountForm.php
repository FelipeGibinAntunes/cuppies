<?php
 
namespace Drupal\cuppies_theme\Form;
 
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
 
class AccountForm extends FormBase {
 public function getFormId() {
   return 'account_form';
 }
 
 public function buildForm(array $form, FormStateInterface $form_state, $username = NULL) {
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    $currentPayments = $user->get('field_payment')->getValue();
    $currentAddresses = $user->get('field_address')->getValue();

    $form['payment-title'] = [
        '#markup' => '<h2 class="payment-title">Payment</h2>',
      ];
    foreach ($currentPayments as $paykey =>$payment) {
            // Textfield form element.
            $form['payment'.$paykey] = array(
              '#type' => 'textfield',
              '#default_value' => $payment,
              '#attributes' => array(
                'class' => array('payment-field'),
              ),
            );
    }
    $form['address-title'] = [
        '#markup' => '<h2 class="address-title">Address</h2>',
      ];

    foreach ($currentAddresses as $addkey =>$address) {
        // Textfield form element.
        $form['address'.$addkey] = array(
          '#type' => 'textfield',
          '#default_value' => $address,
          '#attributes' => array(
            'class' => array('address-field'),
          ),
        );
    }

    $form['submit'] = [
        '#type' => 'submit',
        '#value' => $this->t('Save Changes'),
        '#attributes' => ['class' => ['submit-account']],
      ];    

   return $form;
 }
 
 public function submitForm(array &$form, FormStateInterface $form_state) {
  $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
  $newPayment = [];
  $newPayment[0] = ['value' => $form_state->getValue('payment0')];
  $newPayment[1] = ['value' => $form_state->getValue('payment1')];
  $newPayment[2] = ['value' => $form_state->getValue('payment2')];
  $newAddress = [];
  $newAddress[0] = ['value' => $form_state->getValue('address0')];
  $newAddress[1] = ['value' => $form_state->getValue('address1')];
  $newAddress[2] = ['value' => $form_state->getValue('address2')];
  $user->set('field_payment', $newPayment);
  $user->set('field_address', $newAddress);
  $user->save();
  \Drupal::messenger()->addMessage('Information updated successfully');
}

}