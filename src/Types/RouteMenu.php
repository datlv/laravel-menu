<?php

namespace Datlv\Menu\Types;

use Datlv\Kit\Support\HasRouteAttribute;
use Datlv\Menu\Contracts\Type;

/**
 * Class RouteMenu
 *
 * @package Datlv\Menu\Types
 */
class RouteMenu extends MenuType
{
    use HasRouteAttribute;

    public function formOptions()
    {
        return ['height' => 320] + parent::formOptions();
    }

    /**
     * @param \Datlv\Menu\Menu $menu
     *
     * @return string
     */
    public function buildUrl($menu)
    {
        return $this->getRouteUrl($menu->params['name']);
    }

    protected function formView()
    {
        return 'menu::type.route_form';
    }

    protected function paramsAttributes()
    {
        return [
            ['name' => 'name', 'title' => trans('menu::type.route.name'), 'rule' => 'required', 'default' => '#'],
        ];
    }
}