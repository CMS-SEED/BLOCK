This is a Cms_Framework_Seed 5 package that provides block management facility for cms_framework_seed framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `cms_framework_seed/block`.

    "cms_framework_seed/block": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Cms_Framework_Seed\Block\Providers\BlockServiceProvider::class,

```

And also add it to alias

```php
'Block'  => Cms_Framework_Seed\Block\Facades\Block::class,
```

Use the below commands for publishing

Configuration

    php artisan vendor:publish --provider="Cms_Framework_Seed\Block\Providers\BlockServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Cms_Framework_Seed\Block\Providers\BlockServiceProvider" --tag="lang"

Views files

    php artisan vendor:publish --provider="Cms_Framework_Seed\Block\Providers\BlockServiceProvider" --tag="view"

Public folders
   
	php artisan vendor:publish --provider="Cms_Framework_Seed\Block\Providers\BlockServiceProvider" --tag="public"


## Usage


