<?php
    /**
     * 密码加密
     * @param $password
     * @return bool|string
     */
    function createPassword($password)
    {
        if(!$password)
        {
            return false;
        }
        return md5(md5($password) . 'IMOOC');
    }

    /**
     * 消息提示
     * @param int $type 1:成功 2:失败
     * @param null $msg
     * @param null $url
     */
    function msg($type, $msg = null, $url = null)
    {
        $toUrl = "Location:msg.php?type={$type}";
        //当msg为空时 url不写入
        $toUrl .= $msg ? "&msg={$msg}" : '';
        //当url为空 toUrl不写入
        $toUrl .= $url ? "&url={$url}" : '';
        header($toUrl);
        exit;
    }
    /**
     * 检查用户是否登录
     *
     */
    function checkLogin()
    {
        //开启session
        session_start();
        //用户未登录
        if(!isset($_SESSION['user']) || empty($_SESSION['user']))
        {
            return false;
        }
        return true;
    }

    /**
     * 获取当前url
     * @return string
     */
    function getUrl()
    {
        $url = '';
        $url .= $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';
        $url .= $_SERVER['HTTP_HOST'];
        $url .= $_SERVER['REQUEST_URI'];
        return $url;
    }
?>