<?php

namespace Container8jOUTnm;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTest_ServiceContainerService extends DriveManager_Infrastructure_Shared_Symfony_KernelTestContainer
{
    /*
     * Gets the public 'test.service_container' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Test\TestContainer
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['test.service_container'] = new \Symfony\Bundle\FrameworkBundle\Test\TestContainer(($container->services['kernel'] ?? $container->get('kernel', 1)), 'test.private_services_locator', ['DriveManager\\Domain\\Model\\File\\FileRepositoryInterface' => 'drivemanager.repository', 'Psr\\Cache\\CacheItemPoolInterface' => 'cache.app', 'Psr\\Container\\ContainerInterface $parameterBag' => 'parameter_bag', 'Psr\\EventDispatcher\\EventDispatcherInterface' => 'event_dispatcher', 'Psr\\Log\\LoggerInterface' => 'logger', 'Symfony\\Component\\DependencyInjection\\ParameterBag\\ContainerBagInterface' => 'parameter_bag', 'Symfony\\Component\\DependencyInjection\\ParameterBag\\ParameterBagInterface' => 'parameter_bag', 'Symfony\\Component\\ErrorHandler\\ErrorRenderer\\FileLinkFormatter' => 'debug.file_link_formatter', 'Symfony\\Component\\EventDispatcher\\EventDispatcherInterface' => 'event_dispatcher', 'Symfony\\Component\\Filesystem\\Filesystem' => 'filesystem', 'Symfony\\Component\\HttpFoundation\\RequestStack' => 'request_stack', 'Symfony\\Component\\HttpKernel\\Config\\FileLocator' => 'file_locator', 'Symfony\\Component\\HttpKernel\\HttpKernelInterface' => 'http_kernel', 'Symfony\\Component\\HttpKernel\\KernelInterface' => 'kernel', 'Symfony\\Component\\Routing\\Generator\\UrlGeneratorInterface' => 'router', 'Symfony\\Component\\Routing\\Matcher\\UrlMatcherInterface' => 'router', 'Symfony\\Component\\Routing\\RequestContext' => 'router.request_context', 'Symfony\\Component\\Routing\\RequestContextAwareInterface' => 'router', 'Symfony\\Component\\Routing\\RouterInterface' => 'router', 'Symfony\\Contracts\\Cache\\CacheInterface' => 'cache.app', 'Symfony\\Contracts\\Cache\\TagAwareCacheInterface' => 'cache.app.taggable', 'Symfony\\Contracts\\EventDispatcher\\EventDispatcherInterface' => 'event_dispatcher', 'argument_resolver.controller_locator' => '.service_locator.E3E44PV', 'cache.default_clearer' => 'cache.app_clearer', 'error_renderer' => 'error_handler.error_renderer.html', 'error_renderer.html' => 'error_handler.error_renderer.html', 'router.default' => 'router', 'DriveManager\\Infrastructure\\Shared\\Symfony\\Kernel' => 'kernel']);
    }
}
