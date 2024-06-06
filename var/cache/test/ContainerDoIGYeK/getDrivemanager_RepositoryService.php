<?php

namespace ContainerDoIGYeK;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDrivemanager_RepositoryService extends DriveManager_Infrastructure_Shared_Symfony_KernelTestDebugContainer
{
    /**
     * Gets the public 'drivemanager.repository' shared autowired service.
     *
     * @return \DriveManager\Infrastructure\Persistence\FileRepositoryInMemory
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Domain/Model/File/FileRepositoryInterface.php';
        include_once \dirname(__DIR__, 4).'/src/Infrastructure/Persistence/FileRepositoryInMemory.php';

        return $container->services['drivemanager.repository'] = new \DriveManager\Infrastructure\Persistence\FileRepositoryInMemory();
    }
}