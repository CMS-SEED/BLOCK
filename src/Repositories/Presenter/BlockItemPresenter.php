<?php

namespace Cms_Framework_Seed\Block\Repositories\Presenter;

use Cms_Framework_Seed\Repository\Presenter\FractalPresenter;

class BlockItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlockItemTransformer();
    }
}