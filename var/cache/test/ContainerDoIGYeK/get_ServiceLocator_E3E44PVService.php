<?php

namespace ContainerDoIGYeK;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_E3E44PVService extends DriveManager_Infrastructure_Shared_Symfony_KernelTestDebugContainer
{
    /**
     * Gets the private '.service_locator.E3E44PV' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.E3E44PV'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'DriveManager\\Infrastructure\\Shared\\Symfony\\Kernel::loadRoutes' => ['privates', '.service_locator.4wc4Ag1.kernel::loadRoutes()', 'get_ServiceLocator_4wc4Ag1_KernelloadRoutesService', true],
            'DriveManager\\Infrastructure\\Shared\\Symfony\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.4wc4Ag1.kernel::registerContainerConfiguration()', 'get_ServiceLocator_4wc4Ag1_KernelregisterContainerConfigurationService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.4wc4Ag1.kernel::loadRoutes()', 'get_ServiceLocator_4wc4Ag1_KernelloadRoutesService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.4wc4Ag1.kernel::registerContainerConfiguration()', 'get_ServiceLocator_4wc4Ag1_KernelregisterContainerConfigurationService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.4wc4Ag1.kernel::loadRoutes()', 'get_ServiceLocator_4wc4Ag1_KernelloadRoutesService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.4wc4Ag1.kernel::registerContainerConfiguration()', 'get_ServiceLocator_4wc4Ag1_KernelregisterContainerConfigurationService', true],
        ], [
            'DriveManager\\Infrastructure\\Shared\\Symfony\\Kernel::loadRoutes' => '?',
            'DriveManager\\Infrastructure\\Shared\\Symfony\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}