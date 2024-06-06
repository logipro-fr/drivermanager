<?php

namespace Container8jOUTnm;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getErrorControllerService extends DriveManager_Infrastructure_Shared_Symfony_KernelTestContainer
{
    /*
     * Gets the public 'error_controller' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\ErrorController
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['error_controller'] = new \Symfony\Component\HttpKernel\Controller\ErrorController(($container->services['http_kernel'] ?? self::getHttpKernelService($container)), 'error_controller', ($container->privates['error_handler.error_renderer.html'] ?? $container->load('getErrorHandler_ErrorRenderer_HtmlService')));
    }
}
