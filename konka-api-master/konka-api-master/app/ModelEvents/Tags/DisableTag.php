<?php

namespace App\ModelEvents\Tags;

use App\Models\Tag;

class DisableTag
{
    /**
     * @var Tag
     */

    public $tagModel;

    /**
     * DisableTag constructor.
     * @param Tag $model
     */

    public function __construct(Tag $model)
    {
        $this->tagModel = $model;
    }
}
