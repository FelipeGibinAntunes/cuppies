<?php

use Drupal\Tests\UnitTestCase;

/**
 * Tests the removeClassName Drupal behavior.
 *
 * @group mymodule
 */
class elements extends UnitTestCase {

  /**
   * Test removeClassName behavior.
   */
  public function testRemoveClassNameBehavior() {
    // Create a new Drupal context.
    $context = $this->getMockBuilder('Drupal\Core\Render\Placeholder\Context')
      ->disableOriginalConstructor()
      ->getMock();

    // Replace this with your actual file path.
    $file_path = 'web\themes\custom\cuppies_theme\js\elements.js';
    require_once $file_path;

    // Create an instance of the behavior.
    $behavior = new \Drupal\cuppies_theme\Plugin\cuppies_theme\behaviors\removeClassName();

    // Replace this with your actual selector and class name.
    $selector = '.login-popup-form';
    $class_to_remove = 'disabled';

    // Create a new DOM element for testing.
    $element = $this->getMockBuilder('DOMElement')
      ->disableOriginalConstructor()
      ->getMock();

    // Set up the element to have the class you want to remove.
    $element->expects($this->once())
      ->method('getAttribute')
      ->with('class')
      ->willReturn($class_to_remove);

    // Attach the behavior to the element.
    $behavior->attach($element, $context);

    // Assert that the class has been removed.
    $this->assertEquals('', $element->getAttribute('class'));
  }

  public function testChangeQuantityBehavior()
  {
      // Mock the dependencies (e.g., jQuery, Drupal, drupalSettings)
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





















  
}
