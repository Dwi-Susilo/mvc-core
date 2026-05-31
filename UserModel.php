<?php
namespace dwi\core;

use dwi\core\db\DbModel;

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;

}
