<?php

namespace Cms_Framework_Seed\Block\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Cms_Framework_Seed\Block\Interfaces\BlockRepositoryInterface;
use Cms_Framework_Seed\Block\Interfaces\CategoryRepositoryInterface;

class BlockController extends BaseController
{

    /**
     * Constructor.
     *
     * @param type \Cms_Framework_Seed\Block\Interfaces\BlockRepositoryInterface $block
     *
     * @return type
     */
    public function __construct(
        BlockRepositoryInterface    $block,
        CategoryRepositoryInterface $category
    ) {
        $this->setupTheme();
        $this->repository = $block;
        $this->category   = $category;
        parent::__construct();
    }

    /**
     * Show block's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {

        $blocks = $this->repository
            ->pushCriteria(new \Cms_Framework_Seed\Block\Repositories\Criteria\BlockPublicCriteria())
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->all();
        $categories = $this->category->pushCriteria(new \Cms_Framework_Seed\Block\Repositories\Criteria\CategoryPublicCriteria())
            ->scopeQuery(function ($query) {
                return $query->orderBy('name', 'Asc');
            })->all();

        return $this->theme->of('block::block.index', compact('blocks', 'categories'))->render();
    }

    /**
     * Show block.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $block = $this->repository->scopeQuery(function ($query) use ($slug) {
            return $query->whereSlug($slug);
        })->first(['*']);
        $categories = $this->category->pushCriteria(new \Cms_Framework_Seed\Block\Repositories\Criteria\CategoryPublicCriteria())
            ->scopeQuery(function ($query) {
                return $query->orderBy('name', 'Asc');
            })->all();

        return $this->theme->of('block::block.show', compact('block', 'categories'))->render();
    }

    /**
     * show category
     * @param type $category
     * @return type
     */
    protected function category($slug)
    {

        $category = $this->category
            ->scopeQuery(function ($query) use ($slug) {
                return $query->with('block')->orderBy('name', 'Asc')->whereSlug($slug);
            })->first(['*']);
        $categories = $this->category->pushCriteria(new \Cms_Framework_Seed\Block\Repositories\Criteria\CategoryPublicCriteria())
            ->scopeQuery(function ($query) {
                return $query->orderBy('name', 'Asc');
            })->all();
        return $this->theme->of('block::block.category', compact('category', 'categories'))->render();
    }
}
