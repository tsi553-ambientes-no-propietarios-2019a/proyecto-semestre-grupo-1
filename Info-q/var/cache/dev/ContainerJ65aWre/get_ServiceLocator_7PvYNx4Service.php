<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.7PvYNx4' shared service.

return $this->privates['.service_locator.7PvYNx4'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'complain' => ['privates', '.errored..service_locator.7PvYNx4.App\\Entity\\Complain', NULL, 'Cannot autowire service ".service_locator.7PvYNx4": it references class "App\\Entity\\Complain" but no such service exists.'],
], [
    'complain' => 'App\\Entity\\Complain',
]);
