<?php

/**
 * Facebook class.
 * This is the used for facebook related business calculation
 */
class FacebookModel
{
    public function setCustomer($fb){
        try {
            $fbUserInfo['id'] = $fb->getUser();
            //print_r($fb->getUser());die;
            $fbUserInfo['accessToken'] = $fb->getAccessToken();
        } catch (Exception $e) {
            echo 'Graph returned error';
            exit;
        }
        if ($fb->getAccessToken()) {
            $_SESSION['fb_access_token'] = $fbUserInfo;
            Yii::app()->session->add('customerId', $fbUserInfo['id']);
            Yii::app()->user->id = $fbUserInfo['id'];
        }
        
        try {
            $fb->setExtendedAccessToken();
            $extendedAccessToken = $fb->getAccessToken();
            $fbParam = 'id,email,first_name,last_name,gender'
                    . '&access_token='.$extendedAccessToken;
            
            $userInfo = $fb->api('/me?fields=' . $fbParam);
            Yii::app()->session->add('customer', $userInfo);
            
        } catch (FacebookApiException $e) {
            echo "error";
            exit;
        }
        
        return $fbUserInfo['id'];
    }
    
    public function getLikes($fb)
    {
        $userInfo = Yii::app()->session->get('customer');
            $fb->setExtendedAccessToken();
            $extendedAccessToken = $fb->getAccessToken();
            $userLikes = $fb->api('/'.$userInfo['id'].'/likes?access_token=' . $extendedAccessToken);
//            foreach ($userLikes['data'] as $like) {
//                print_r($like['name']);die;
//                
//            }
            return $userLikes;
            
    }
}
