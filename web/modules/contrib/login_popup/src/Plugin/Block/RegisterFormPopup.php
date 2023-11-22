<?php

namespace Drupal\login_popup\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormBuilderInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Render\Renderer;
use Drupal\Core\Session\AccountProxy;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Provides a 'RegisterFormPopup' block.
 *
 * @Block(
 *  id = "register_form_popup",
 *  admin_label = @Translation("Register Form Popup"),
 * )
 */
class RegisterFormPopup extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The form_builder service.
   *
   * @var \Drupal\Core\Form\FormBuilderInterface
   */
  protected $formBuilder;

  /**
   * The current_user service.
   *
   * @var \Drupal\Core\Session\AccountProxy
   */
  protected $currentUser;

  /**
   * The renderer service.
   *
   * @var \Drupal\Core\Render\Renderer
   */
  protected $renderer;

  /**
   * The request stack.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * Constructs a new WelcomeUserNameBlock.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Form\FormBuilderInterface $form_builder
   *   The form_builder service.
   * @param \Drupal\Core\Session\AccountProxy $currentUser
   *   The current_user service.
   * @param \Drupal\Core\Render\Renderer $renderer
   *   The renderer service.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The request stack.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, FormBuilderInterface $form_builder, AccountProxy $currentUser, Renderer $renderer, RequestStack $request_stack) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->formBuilder = $form_builder;
    $this->currentUser = $currentUser;
    $this->renderer = $renderer;
    $this->requestStack = $request_stack;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('form_builder'),
      $container->get('current_user'),
      $container->get('renderer'),
      $container->get('request_stack')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return ['show_logout_link' => FALSE];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();
    $form['show_logout_link'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show Logout Link'),
      '#default_value' => !empty($config['show_logout_link']) ? $config['show_logout_link'] : FALSE,
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('show_logout_link', $form_state->getValue('show_logout_link'));
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $base_url = $this->requestStack->getCurrentRequest()->getSchemeAndHttpHost();
    $url = Url::fromRoute('user.register');
    $config = $this->getConfiguration();
    $link_options = [
      'attributes' => [
        'class' => [
          'use-ajax',
          'register-popup-form',
          'disabled'
        ],
        'data-dialog-type' => 'modal',
      ],
    ];
    $url->setOptions($link_options);
    $link = Link::fromTextAndUrl($this->t('Create an account'), $url)->toString();
    $build = [];
    if ($this->currentUser->isAnonymous()) {
      $build['register_popup_block']['#markup'] = '<div class="Register-popup-link">' . $link . '</div>';
    }
    else {
      if ($config['show_logout_link']) {
        $build['login_register_popup_block']['#markup'] = '<div class="Login-Register-popup-link"><span><a href=" ' . $base_url . '/user/logout">Log out</a></div>';
      }
    }
    $build['register_popup_block']['#attached']['library'][] = 'core/drupal.dialog.ajax';

    return $build;
  }

}
