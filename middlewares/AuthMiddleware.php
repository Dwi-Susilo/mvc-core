<?php
namespace dwi\core\middlewares;

use dwi\core\Application;
use dwi\core\exception\ForbiddenException;
use Override;

class AuthMiddleware extends BaseMiddleware
{
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    #[Override]
    public function execute()
    {
        if (Application::$app->isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}
