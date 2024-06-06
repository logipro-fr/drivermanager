<?php

namespace Container8jOUTnm;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDrivemanager_RepositoryService extends DriveManager_Infrastructure_Shared_Symfony_KernelTestContainer
{
    /*
     * Gets the public 'drivemanager.repository' shared autowired service.
     *
     * @return \DriveManager\Infrastructure\Persistence\FileRepositoryInMemory
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['drivemanager.repository'] = new \DriveManager\Infrastructure\Persistence\FileRepositoryInMemory();
    }
}