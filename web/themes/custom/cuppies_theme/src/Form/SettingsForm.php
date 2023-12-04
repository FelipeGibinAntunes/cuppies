<?php
 
namespace Drupal\cuppies_theme\Form;
 
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
 
class SettingsForm extends FormBase {
 public function getFormId() {
   return 'settings_form';
 }
 
 public function buildForm(array $form, FormStateInterface $form_state, $username = NULL) {
  $node = \Drupal::routeMatch()->getParameter('node');
  $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
  $settings1 = $user->get('field_settings_1')->getValue();
  $settings2 = $user->get('field_settings_2')->getValue();
  $settings3 = $user->get('field_settings_3')->getValue();
  $settings4 = $user->get('field_settings_4')->getValue();

  $form['notifications'] = [
    '#type' => 'fieldset',
    '#tree' => true,
    '#attributes' => [
      'id' => 'block-cuppies-theme-notificationsblock',
      'class' => 'notifications-block',
    ]
  ];

  $form['notifications']['title'] = [
    '#markup' => '<h2>notifications</h2>'
  ];

  $form['notifications']['group'] = [
    '#type' => 'fieldset',
    '#tree' => true,
    '#attributes' => [
      'class' => 'notifications-fields',
    ]
  ];
  
  $form['notifications']['group'][1] = [
    '#title' => t('news and updates'),
    '#tree' => true,
    '#type' => 'checkbox',
    '#default_value' => $settings1[0]['value'],
  ];

  //$dump($user->get('field_settings_1'));

  $form['notifications']['group'][2] = [
    '#title' => t('coupons and discounts'),
    '#tree' => true,
    '#type' => 'checkbox',
    '#default_value' => $settings2[0]['value'],
  ];

  $form['notifications']['group'][3] = [
    '#title' => t('receive emails'),
    '#tree' => true,
    '#type' => 'checkbox',
    '#default_value' => $settings3[0]['value'],
  ];

  $form['notifications']['group'][4] = [
    '#title' => t('receive messages'),
    '#tree' => true,
    '#type' => 'checkbox',
    '#default_value' => $settings4[0]['value'],
  ];
  
  $form['submit'] = [
    '#type' => 'submit',
    '#value' => $this->t('Save Changes'),
    '#attributes' => ['class' => ['submit-settings']],
  ];    

   return $form;
 }
 
 public function submitForm(array &$form, FormStateInterface $form_state) {
  $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
  $user->set('field_settings_1', $form_state->getValue(['notifications', 'group', 1]));
  $user->set('field_settings_2', $form_state->getValue(['notifications', 'group', 2]));
  $user->set('field_settings_3', $form_state->getValue(['notifications', 'group', 3]));
  $user->set('field_settings_4', $form_state->getValue(['notifications', 'group', 4]));
  $user->save();
  \Drupal::messenger()->addMessage('Settings updated successfully');
}
}