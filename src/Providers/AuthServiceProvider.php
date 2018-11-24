<?php

namespace Cms_Framework_Seed\Block\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the package.
     *
     * @var array
     */
    protected $policies = [
        // Bind Category policy
        \Cms_Framework_Seed\Block\Models\Category::class => \Cms_Framework_Seed\Block\Policies\CategoryPolicy::class,
// Bind Block policy
        \Cms_Framework_Seed\Block\Models\Block::class    => \Cms_Framework_Seed\Block\Policies\BlockPolicy::class,
    ];

    /**
     * Register any package authentication / authorization services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);
    }
}
