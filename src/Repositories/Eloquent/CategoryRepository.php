<?php

namespace Cms_Framework_Seed\Block\Repositories\Eloquent;

use Cms_Framework_Seed\Block\Interfaces\CategoryRepositoryInterface;
use Cms_Framework_Seed\Repository\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->pushCriteria(app('Cms_Framework_Seed\Repository\Criteria\RequestCriteria'));
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        $this->fieldSearchable = config('cms_framework_seed.block.category.search');
        return config('cms_framework_seed.block.category.model');
    }
}
