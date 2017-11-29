<?php
/**
 * Created by PhpStorm.
 * User: xiaowu
 * Date: 17-11-27
 * Time: 下午3:30
 */
namespace app\administators\controller;

use app\administators\model\admintstatorsModel;
use starter\interfaceClass\appInterface\controller;
use starter\Http\requestRealization;

class administatorsController implements controller\controllerInterface
{
    public function test(requestRealization $request)
    {

        $admintstatorsModel = new admintstatorsModel();
        $admintstatorsModel->setName();
        return $request->input('m');
    }
}