<?php


namespace core;

/**
 *Basic class for controllers
 */
class Controller
{

    public function isPost(){
        if ($_SERVER['REQUEST_METHOD']=="POST")
            return true;
        else
            return false;
    }
    public function isGet()
    {
        if ($_SERVER['REQUEST_METHOD']=="GET")
            return true;
        else
            return false;
    }

    public function postFilter($fields)
    {
        return Utils::ArrayFilter($_POST,$fields);
    }

    public function render($viewName, $localParams = null, $globalParams = null){
        $tmp = new Template();
        if (is_array($localParams))
            $tmp->setParams($localParams);
        if (!is_array($globalParams))
            $globalParams = [];
        $moduleName = strtolower((new \ReflectionClass($this))->getShortName());
        $globalParams['PageContent'] = $tmp->render("views/{$moduleName}/{$viewName}.php");
        return $globalParams;
    }

    public function renderMessage($type,$message, $localParams = null, $globalParams = null )
    {

        $tmp = new Template();
        if (is_array($localParams))
            $tmp->setParams($localParams);
        $tmp->setParam('MessageText', $message);
        switch ($type){
            case 'ok':
                $tmp->setParam('MessageClass','success');
                break;
            case 'error':
                $tmp->setParam('MessageClass','error');
                break;
            case 'info':
                $tmp->setParam('MessageClass','info');
                break;
        }

        if (!is_array($globalParams))
            $globalParams = [];
        $globalParams['PageContent'] = $tmp->render("views/layout/message.php");
        return $globalParams;

    }
}