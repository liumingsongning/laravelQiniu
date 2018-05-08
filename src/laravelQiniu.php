<?php
namespace liuming\laravelQiniu;
use Illuminate\Session\SessionManager;
use Illuminate\Config\Repository;
use Qiniu\Storage\UploadManager;
use Qiniu\Auth;
class laravelQiniu
{
    /**
     * @var SessionManager
     */
    protected $session;
    /**
     * @var Repository
     */
    protected $config;
    /**
     * Packagetest constructor.
     * @param SessionManager $session
     * @param Repository $config
     */
    public function __construct(SessionManager $session, Repository $config)
    {
        $this->session = $session;
        $this->config = $config;
    }
    /**
     * @param string $msg
     * @return string
     */
    public function test_rtn($msg = ''){
        $config_arr = $this->config->get('packagetest.options.accessKey');
        return $this->session;
        return $msg.$config_arr.' <strong>from your custom develop package!</strong>>';
    }
    
    public function qiniuAuth(){
		//$accessKey = 'IXZpIZIiqxqOdvJcSLNdG6VnlTuWYX9Axicrewhj';
        //$secretKey = '_V5S7OLv1MtNqSDaiFS9y46VnunXJ61Rj_sCjFql';
		$accessKey =config('laravelQiniu.options.accessKey');
        $secretKey =config('laravelQiniu.options.secretKey');
        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);
		return $auth;
    }
	//生成七牛token
    public function qiniuToken()
    {
		$auth=$this->qiniuAuth();
        // 要上传的空间
        //$bucket = 'webstatic';
        $bucket =config('laravelQiniu.options.Bucket_Open');
        //生成上传 Token
        $token = $auth->uploadToken($bucket);
       
       
        return $token;
    }
}