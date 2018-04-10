<?php
namespace Datlv\Menu\Contracts;
/**
 * Interface Root
 *
 * @package Datlv\Menu\Contracts
 */
interface Root
{
    /**
     * Render menu HTML theo menu $options
     *
     * @param array $options
     *
     * @return string
     */
    public function html($options = []);

    /**
     * @return bool
     */
    public function isEditable();
}