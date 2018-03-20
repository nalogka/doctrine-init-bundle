<?php
/**
 * @copyright  2018 Nalogka
 * @author     Anton Tyutin <anton@tyutin.ru>
 * @license    http://opensource.org/licenses/MIT
 */

namespace Nalogka\DoctrineConnectionInit\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('nalogka_connection_init')
            ->fixXmlConfig('initial_sql')
            ->children()
                ->arrayNode('initial_sqls')
                    ->defaultValue([])
                    ->prototype('scalar')->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
