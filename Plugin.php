<?php namespace PanatauSolusindo\BreakingNews;

use Backend;
use System\Classes\PluginBase;

/**
 * BreakingNews Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'BreakingNews',
            'description' => 'Membuat breaking news',
            'author'      => 'PanatauSolusindo',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'PanatauSolusindo\BreakingNews\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'panatausolusindo.breakingnews.crud' => [
                'tab' => 'BreakingNews',
                'label' => 'Mengelola breaking news'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'breakingnews' => [
                'label'       => 'Breaking News',
                'url'         => Backend::url('panatausolusindo/breakingnews/breakingnews'),
                'icon'        => 'icon-bullhorn',
                'permissions' => ['panatausolusindo.breakingnews.crud'],
                'order'       => 500,
            ],
        ];
    }
}
