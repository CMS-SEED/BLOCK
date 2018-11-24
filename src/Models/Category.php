<?php

namespace Cms_Framework_Seed\Block\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Cms_Framework_Seed\Database\Model;
use Cms_Framework_Seed\Database\Traits\Slugger;
use Cms_Framework_Seed\Filer\Traits\Filer;
use Cms_Framework_Seed\Hashids\Traits\Hashids;
use Cms_Framework_Seed\Repository\Traits\PresentableTrait;
use Cms_Framework_Seed\Activities\Traits\LogsActivity;
use Cms_Framework_Seed\Trans\Traits\Translatable;
use Cms_Framework_Seed\User\Traits\User as UserModel;

class Category extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, LogsActivity, PresentableTrait, UserModel;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'cms_framework_seed.block.category';
    /**
     * The blog_categories that belong to the blog.
     */
    public function blocks()
    {
        return $this->hasMany('Cms_Framework_Seed\Block\Models\Block', 'category_id');
    }

}
