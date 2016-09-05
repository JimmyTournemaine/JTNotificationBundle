<?php

namespace JT\NotificationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use JT\NotificationBundle\Entity\Notification;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jt_notification');

        $rootNode
            ->children()
                ->scalarNode('class')->defaultValue(Notification::class)->end()
                ->integerNode('limit')->defaultValue(5)->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
