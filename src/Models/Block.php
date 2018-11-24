<?php

namespace Cms_Framework_Seed\Block\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Cms_Framework_Seed\Database\Model as Model;
use Cms_Framework_Seed\Database\Traits\Slugger;
use Cms_Framework_Seed\Filer\Traits\Filer;
use Cms_Framework_Seed\Hashids\Traits\Hashids;
use Cms_Framework_Seed\Repository\Traits\PresentableTrait;
use Cms_Framework_Seed\Activities\Traits\LogsActivity;
use Cms_Framework_Seed\Trans\Traits\Translatable;
use Cms_Framework_Seed\User\Traits\User as UserModel;

class Block extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, LogsActivity, PresentableTrait, UserModel;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'cms_framework_seed.block.block';

    /**
     * The blog_categories that belong to the blog.
     */
    public function category()
    {

        return $this->belongsTo('Cms_Framework_Seed\Block\Models\Category', 'category_id');
    }

    public function user()
    {

        return $this->belongsTo('App\User', 'user_id');
    }


}
