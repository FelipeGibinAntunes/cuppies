<?php

use Drupal\Tests\UnitTestCase;

/**
 * Tests the elements.js behavior.
 *
 * @group mymodule
 */
class elements extends UnitTestCase {

  /**
   * Test removeClassName behavior.
   */
  public function testRemoveClassNameBehavior() {
    $context = $this->getMockBuilder('Drupal\Core\Render\Placeholder\Context')
      ->disableOriginalConstructor()
      ->getMock();

    $file_path = 'web\themes\custom\cuppies_theme\js\elements.js';
    require_once $file_path;

    $behavior = new \Drupal\cuppies_theme\Plugin\cuppies_theme\behaviors\removeClassName();

    $selector = '.login-popup-form';
    $class_to_remove = 'disabled';

    $element = $this->getMockBuilder('DOMElement')
      ->disableOriginalConstructor()
      ->getMock();

    $element->expects($this->once())
      ->method('getAttribute')
      ->with('class')
      ->willReturn($class_to_remove);

    $behavior->attach($element, $context);

    $this->assertEquals('', $element->getAttribute('class'));
  }

   /**
   * Test changeQuantity behavior.
   */
  public function testChangeQuantityBehavior()
  {
      $jQueryMock = $this->getMockBuilder('jQuery')
          ->setMethods(['on', 'closest', 'find', 'siblings'])
          ->getMock();

      $drupalMock = $this->getMockBuilder('Drupal')
          ->setMethods(['behaviors'])
          ->getMock();

      $drupalSettingsMock = $this->getMockBuilder('drupalSettings')
          ->getMock();

      // Mock the context and settings
      $contextMock = $this->createMock('ContextClass');
      $settingsMock = $this->createMock('SettingsClass');

      // Inject the mocks into the function
      $changeQuantity = new Drupal\behaviors\ChangeQuantity();
      $oldQuantity = $changeQuantity->quantity;
      $changeQuantity->attach($contextMock, $settingsMock, $jQueryMock, $drupalMock, $drupalSettingsMock);

      // Perform assertions based on the expected behavior
      // Use assertions to check the expected behavior of the function
      // For example, check if certain methods are called on the mocked objects
      $jQueryMock->expects($this->once())
          ->method('on');

      $jQueryMock->expects($this->once())
          ->method('closest');

       // Assert that the class has been removed.
       $this->assertNotEquals($oldQuantity, $changeQuantity->quantity);
  }

   /**
   * Test updateOnChange behavior.
   */
  public function testUpdateOnChangeBehavior () {
    $updateOnChange = new \Drupal\behaviors\UpdateOnChange();
    $updateOnChange->attach($contextMock, $settingsMock, $jQueryMock);
    $oldQuantity = $currentQuantity->quantity;
    $currentQuantity = $updateOnChange->getCurrentQuantity();
    $totalSum = $updateOnChange->getTotalSum();

    $contextMock = $this->getMockBuilder('Drupal\Core\Render\Element\RenderElement')
        ->disableOriginalConstructor()
        ->getMock();

    $settingsMock = $this->getMockBuilder('Drupal\Core\Render\Element\RenderElement')
        ->disableOriginalConstructor()
        ->getMock();

    $jQueryMock = $this->getMockBuilder('jQuery')
        ->setMethods(['on', 'closest', 'find', 'siblings', 'attr', 'text', 'each'])
        ->getMock();

    $jQueryMock->expects($this->once())
        ->method('on')
        ->with('change', $this->isType('callable'));

    $jQueryMock->expects($this->any())
        ->method('each')
        ->willReturnCallback(function ($callback) {
            $callback($this->getMockBuilder('jQuery')->getMock());
        });

    $updateOnChange = new \Drupal\behaviors\UpdateOnChange();
    $updateOnChange->attach($contextMock, $settingsMock, $jQueryMock);

    $this->assertNotEquals($oldQuantity, $currentQuantity->quantity);
}

 /**
 * Test showOverlay behavior.
 */
public function testShowOverlay() {
  $contextMock = $this->getMockBuilder('Drupal\Core\Render\Element\RenderElement')
  ->disableOriginalConstructor()
  ->getMock();

$settingsMock = $this->getMockBuilder('Drupal\Core\Render\Element\RenderElement')
  ->disableOriginalConstructor()
  ->getMock();

  $jQueryMock = $this->getMockBuilder('jQuery')
      ->setMethods(['on', 'show'])
      ->getMock();

  $jQueryMock->expects($this->once())
      ->method('on')
      ->with('click', $this->isType('callable'));

  $jQueryMock->expects($this->once())
      ->method('show');

  $showOverlay = new \Drupal\behaviors\ShowOverlay();
  $showOverlay->attach($contextMock, $settingsMock, $jQueryMock);

  $overlayVisible = $showOverlay->isOverlayVisible();

  $this->assertTrue($overlayVisible); 
}

 /**
 * Test hideOverlay behavior.
 */
public function testHideOverlay() {

  $contextMock = $this->getMockBuilder('Drupal\Core\Render\Element\RenderElement')
  ->disableOriginalConstructor()
  ->getMock();

$settingsMock = $this->getMockBuilder('Drupal\Core\Render\Element\RenderElement')
  ->disableOriginalConstructor()
  ->getMock();

  $jQueryMock = $this->getMockBuilder('jQuery')
      ->setMethods(['on', 'hide'])
      ->getMock();

  $jQueryMock->expects($this->exactly(2))
      ->method('on')
      ->withConsecutive(['click', $this->isType('callable')], ['click', $this->isType('callable')]);

  $jQueryMock->expects($this->exactly(2))
      ->method('hide');

  $hideOverlay = new \Drupal\behaviors\HideOverlay();
  $hideOverlay->attach($contextMock, $settingsMock, $jQueryMock);

  $overlayHidden = $hideOverlay->isOverlayHidden();

  $this->assertTrue($overlayHidden); 
}

 /**
 * Test hideMessage behavior.
 */
public function testhideMessageBehavior() {
  $contextMock = $this->getMockBuilder('Drupal\Core\Render\Element\RenderElement')
  ->disableOriginalConstructor()
  ->getMock();

$settingsMock = $this->getMockBuilder('Drupal\Core\Render\Element\RenderElement')
  ->disableOriginalConstructor()
  ->getMock();

  $jQueryMock = $this->getMockBuilder('jQuery')
      ->setMethods(['on', 'hide'])
      ->getMock();

  $jQueryMock->expects($this->once())
      ->method('on')
      ->with('click', $this->isType('callable'));

  $jQueryMock->expects($this->once())
      ->method('hide');

  $hideMessage = new \Drupal\behaviors\HideMessage();
  $hideMessage->attach($contextMock, $settingsMock, $jQueryMock);

  $messagesHidden = $hideMessage->areMessagesHidden();

  $this->assertTrue($messagesHidden); 
}
}
