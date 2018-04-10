<?php
namespace Datlv\Menu\Contracts;
/**
 * Interface Presenter
 *
 * @package Datlv\Menu\Contracts
 */
interface Presenter
{
    /**
     * Render menu HTML theo menu $options
     *
     * @param \Datlv\Menu\Contracts\Root $root
     * @param array $options
     *
     * @return string
     */
    public function html($root, $options = []);
}