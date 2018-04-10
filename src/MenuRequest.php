<?php

namespace Datlv\Menu;

use Datlv\Kit\Extensions\Request;

/**
 * Class MenuRequest
 *
 * @package Datlv\Menu
 */
class MenuRequest extends Request
{
    public $trans_prefix = 'menu::common';

    public $rules = [
        'name' => 'required|max:100',
        'label' => 'required|max:100',
        'type' => 'required|max:100',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->rules;
    }
}
