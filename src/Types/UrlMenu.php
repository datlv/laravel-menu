<?php

namespace Datlv\Menu\Types;

use Datlv\Menu\Contracts\Type;

/**
 * Class UrlMenu
 *
 * @package Datlv\Menu\Types
 */
class UrlMenu extends MenuType
{
    /**
     * @param \Datlv\Menu\Menu $menu
     *
     * @return string
     */
    public function buildUrl($menu)
    {
        return $menu->params['url'];
    }

    /**
     * @return string
     */
    protected function formView()
    {
        return 'menu::type.url_form';
    }

    /**
     * @return array
     */
    protected function paramsAttributes()
    {
        return [
            ['name' => 'url', 'title' => trans('menu::type.url.url'), 'rule' => 'required', 'default' => '#'],
        ];
    }
}