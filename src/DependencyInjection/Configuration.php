<?php


namespace Bytes\TwitchResponseBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('bytes_twitch_response');

        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('twitch')
                    ->children()
                        ->scalarNode('hub_secret')->end()
                    ->end()
                ->end() // twitch
            ->end();

        return $treeBuilder;
    }
}