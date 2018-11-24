<?php

namespace Cms_Framework_Seed\Block\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class BlockItemTransformer extends TransformerAbstract
{
    public function transform(\Cms_Framework_Seed\Block\Models\Block $block)
    {
        return [
            'id'          => $block->getRouteKey(),
            'category_id' => $block->block_categories->name,
            'name'        => $block->name,
            'url'         => $block->url,
            'description' => $block->description,
            'status'      => $block->status,
            'image'       => $block->image,
            'images'      => $block->images,
        ];
    }
}
