<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'fos_user.resetting.controller' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/dependency-injection/ContainerAwareInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/dependency-injection/ContainerAwareTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/ControllerTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/Controller.php';
include_once $this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Controller/ResettingController.php';
include_once $this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Form/Factory/FactoryInterface.php';
include_once $this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Form/Factory/FormFactory.php';
include_once $this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Util/TokenGeneratorInterface.php';
include_once $this->targetDirs[3].'/vendor/friendsofsymfony/user-bundle/Util/TokenGenerator.php';

$this->services['fos_user.resetting.controller'] = $instance = new \FOS\UserBundle\Controller\ResettingController(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), new \FOS\UserBundle\Form\Factory\FormFactory(($this->services['form.factory'] ?? $this->load('getForm_FactoryService.php')), 'fos_user_resetting_form', 'FOS\\UserBundle\\Form\\Type\\ResettingFormType', $this->parameters['fos_user.resetting.form.validation_groups']), ($this->services['fos_user.user_manager'] ?? $this->load('getFosUser_UserManagerService.php')), ($this->privates['fos_user.util.token_generator.default'] ?? ($this->privates['fos_user.util.token_generator.default'] = new \FOS\UserBundle\Util\TokenGenerator())), ($this->privates['fos_user.mailer.default'] ?? $this->load('getFosUser_Mailer_DefaultService.php')), 7200);

$instance->setContainer($this);

return $instance;
