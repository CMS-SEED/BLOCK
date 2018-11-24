<?php

namespace Cms_Framework_Seed\Block\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class CategoryItemTransformer extends TransformerAbstract
{
    public function transform(\Cms_Framework_Seed\Block\Models\Category $category)
    {
        return [
            'id'     => $category->getRouteKey(),
            'name'   => $category->name,
            'status' => $category->status,
        ];
    }
}
