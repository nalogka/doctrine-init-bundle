<?php
/**
 * @copyright  2018 Nalogka
 * @author     Anton Tyutin <anton@tyutin.ru>
 * @license    http://opensource.org/licenses/MIT
 */

namespace Nalogka\DoctrineConnectionInit\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class NalogkaConnectionInitExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yaml');

        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('nalogka_connection_init.initial_sqls', $config['initial_sqls']);
    }
}
