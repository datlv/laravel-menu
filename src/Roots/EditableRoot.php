<?php
namespace Datlv\Menu\Roots;

use Datlv\Kit\Traits\Presenter\NestablePresenter;
use MenuManager;
use Datlv\Menu\Contracts\Root;
use Datlv\Menu\Menu;

/**
 * Class EditableRoot
 * Root của Editable Root: menu lưu DB, chỉnh sửa được trong backend
 *
 * @package Datlv\Menu\Roots
 */
class EditableRoot implements Root
{
    use NestablePresenter;
    /**
     * Node gốc
     *
     * @var \Datlv\Menu\Menu
     */
    protected $node;

    /**
     * @var \Datlv\Menu\Contracts\Presenter
     */
    protected $presenter;
    /**
     * @var int
     */
    public $max_depth;

    /**
     * EditableRoot constructor.
     *
     * @param string $name
     * @param \Datlv\Menu\Contracts\Presenter $presenter
     * @param array $settings
     */
    public function __construct($name, $presenter, $settings)
    {
        $this->node = Menu::firstOrCreate(
            ['name' => $name, 'label' => $name],
            ['type' => '#', 'params' => '#', 'options' => json_encode(array_get($settings, 'options', []))]
        );
        $this->max_depth = array_get($settings, 'options.max_depth', config('menu.default_max_depth'));
        $this->presenter = $presenter;
    }

    /**
     * @return bool
     */
    public function isEditable()
    {
        return true;
    }

    /**
     * Render html theo định dạng của jquery nestable plugin
     *
     * @see https://github.com/dbushell/Nestable
     * @return string
     */
    public function nestable()
    {
        return $this->toNestable($this->node, $this->max_depth);
    }

    /**
     * Render html menu
     *
     * @param array $options
     *
     * @return string
     */
    public function html($options = [])
    {
        return $this->presenter->html($this, $options);
    }

    /**
     * @return array
     */
    public function types()
    {
        return MenuManager::types();
    }

    /**
     * @return array
     */
    public function typeParams()
    {
        return MenuManager::typeParams();
    }

    /**
     * @return array
     */
    public function titles()
    {
        return MenuManager::titles();
    }

    /**
     * @return string
     */
    public function title()
    {
        return MenuManager::titles($this->node->name);
    }

    /**
     * @return \Datlv\Menu\Menu
     */
    public function node()
    {
        return $this->node;
    }
}