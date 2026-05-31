<?php
namespace dwi\core\form;

use dwi\core\Model;

abstract class BaseField
{
    public Model $model;
    public string $attribute;

    public function __construct(Model $model, string $attribute)
    {
        $this->model     = $model;
        $this->attribute = $attribute;
    }

    abstract public function renderInput(): string;

    public function __toString()
    {
        return sprintf(
            '<div class="form-group mb-3">
                <label>%s</label>
                %s
                <div class="invalid-feedback text-end">
                    <i>%s</i>
                </div>
            </div>',
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute) ?? ''
        );
    }
}
