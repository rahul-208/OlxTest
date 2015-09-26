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
        
//        $request = new FacebookRequest(
//        $session,
//        'GET',
//        '/{user-id}/likes'
//        );
//        $response = $request->execute();
//        $graphObject = $response->getGraphObject();

        // User is logged in with a long-lived access token.
        // You can redirect them to a members-only page.
        //header('Location: https://example.com/members.php');
        $this->render('list',array('data'=>array()));
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
//        if ($fbUser) {
//            
//        } else {
            $loginUrl = $facebook->getLoginUrl(
                    array(
                        'redirect_uri' => "http://localhost/olx/index.php?r=/social/listing",
                        'cancel_uri'   => '',
                        'scope'        => 'email'
                    )
            );
            $this->redirect($loginUrl);
            die();
       // }
        $this->render('login',array('data'=>array('facebook' => $facebook)));
    }
}