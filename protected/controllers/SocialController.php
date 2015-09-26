<?php

class SocialController extends Controller
{

    /**
     * this action is used for listing ads 
     */
    public function actionListing()
    {
        require_once Yii::app()->basePath . '/vendor/facebook-php-sdk/src/facebook.php';
        $fb = new Facebook(array(
            'appId'  => '894567207287021',
            'secret' => 'cf43d6c081acaed16c908cac9d49bc07',
        ));
        $model = new FacebookModel();
        $customer = $model->setCustomer($fb);
        $getLikes = $model->getLikes($fb);
        $this->render('list',array('data'=>array('customer' => $customer, 'getLikes' => $getLikes)));
    }
    
    /**
     * Facebook login 
     */
    public function actionlogin()
    {
        require_once Yii::app()->basePath . '/vendor/facebook-php-sdk/src/facebook.php';
        $facebook = new Facebook(array(
            'appId'  => '894567207287021',
            'secret' => 'cf43d6c081acaed16c908cac9d49bc07',
        ));
        $fbUser = $facebook->getUser();
        $loginUrl = $facebook->getLoginUrl(
            array(
                'redirect_uri' => "http://localhost/olx/index.php?r=/social/listing",
                'cancel_uri'   => '',
                'scope'        => 'email,user_likes'
            )
        );
        $this->redirect($loginUrl);
        die();
        $this->render('login',array('data'=>array('facebook' => $facebook)));
    }
}