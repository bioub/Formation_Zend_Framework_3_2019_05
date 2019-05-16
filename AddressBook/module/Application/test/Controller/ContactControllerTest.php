<?php


namespace ApplicationTest\Controller;


use Application\Controller\ContactController;
use Application\Controller\IndexController;
use Application\Entity\Contact;
use Application\Service\ContactServiceInterface;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ContactControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();
    }

    public function testListActionCanBeAccessed()
    {
        $this->dispatch('/contacts', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('application');
        $this->assertControllerName(ContactController::class); // as specified in router's controller name alias
        $this->assertControllerClass('ContactController');
        $this->assertMatchedRouteName('contact');
    }

    public function testListActionContainsContactsWithDb()
    {
        $this->dispatch('/contacts', 'GET');
        $this->assertQueryCount('.table tr', 7);
    }

    public function testListActionContainsContactsWithoutDb()
    {
        $mock = $this->prophesize(ContactServiceInterface::class);

        $mock->getAll()->willReturn([
            (new Contact())->setId(1)->setPrenom('A')->setNom('B'),
            (new Contact())->setId(2)->setPrenom('C')->setNom('D'),
        ]);

        $contactService = $mock->reveal();

        /** @var ServiceManager $sm */
        $sm = $this->getApplication()->getServiceManager();
        $sm->setAllowOverride(true);

        $sm->setService(ContactServiceInterface::class, $contactService);

        $this->dispatch('/contacts', 'GET');
        $this->assertQueryCount('.table tr', 2);
    }
}