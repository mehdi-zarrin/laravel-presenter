<?php
namespace Zarrin\Presenter\Traits;
use Zarrin\Presenter\Exceptions\PresentClassNotFound;

trait Presentable
{
    protected $presenterInstance;
    public function present()
    {
        if($this->presenterInstance) {
            return $this->presenterInstance;
        }

        if(! property_exists($this, 'presenter') || ! class_exists($this->presenter)) {
            throw new PresentClassNotFound(
                'Please Specify the full path to your presenter class in your model as a property'
            );
        }
        $this->presenterInstance = new $this->presenter($this);
        return $this->presenterInstance;
    }

}