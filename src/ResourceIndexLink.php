<?php

namespace Causelabs\ResourceIndexLink;

use Laravel\Nova\Fields\Text;
use Config;

class ResourceIndexLink extends Text
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'resource-index-link';

    /**
     * Sets the link to open in a new tab
     *
     * @return void
     */
    public function newTab()
    {
        return $this->withMeta(['newTab' => true]);
    }

    /**
     * Overriding the base method in order to grab the model ID.
     *
     * @param mixed  $resource  The resource class
     * @param string $attribute The attribute of the resource
     *
     * @return mixed
     */
    protected function resolveAttribute($resource, $attribute)
    {
        $this->setResourceId(data_get($resource, 'id'));

        return parent::resolveAttribute($resource, $attribute);
    }

    /**
     * Sets the
     *
     * @param mixed $id The ID of the resource model. Also sets the base URL based on the Nova config
     *
     * @return void
     */
    protected function setResourceId($id)
    {
        $path = Config::get('nova.path');
        // If the path is the site route, prevent a double-slash
        if ('/' === $path) {
            $path = '';
        }
        return $this->withMeta(['id' => $id, 'nova_path' => $path]);
    }
}
