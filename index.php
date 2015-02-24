<?php 
		session_start();

		/**
		 * Include SDK
		 */
		require "facebook-php-sdk-v4-4.0-dev/autoload.php"; // facebook SDK

		/**
		 * Specify what do you want to use
		 */
		use Facebook\FacebookSession;
		use Facebook\FacebookRequest;
		use Facebook\FacebookRequestException;
		use Facebook\FacebookRedirectLoginHelper;

		/**
		 * Represents a Facebook Session, which is used when making requests to the Graph API.
		 * Set Class Configuration Parameters
		 * Find more : https://developers.facebook.com/docs/php/FacebookSession/4.0.0
		 */
		FacebookSession::setDefaultApplication('APP_ID', 'APP_SECRET');

		/**
		 * Create Redirect Login Helper Object
		 * Find more : https://developers.facebook.com/docs/php/FacebookRedirectLoginHelper/4.0.0
		 */
		$helper = new FacebookRedirectLoginHelper("YOUR_CALLBACK_URL_HERE");
		
		try {

			/**
			 * Processes the redirect data from Facebook, if present. Returns a FacebookSession or null.
			 */
			$session = $helper->getSessionFromRedirect();

		} catch(FacebookRequestException $ex) {
			// When Facebook returns an error
			exit("Facebook request error");
			
		} catch(\Exception $ex) {
			// When validation fails or other local issues
			exit("Some other error");
		}

		if (isset($session)) {
			try {

				/**
				 * Create Facebook Request Object. Represents a request that will be made against the Graph API.
				 * Find more : https://developers.facebook.com/docs/php/FacebookRequest/4.0.0
				 */
				$response = (new FacebookRequest(
						$session, 'POST', '/me/feed', array(
							'link' => 'www.agileinfoways.com',
							'message' => 'Posting about Agile Infoways! :)'
							)
						)
					)->execute()->getGraphObject();

				echo "Posted with id: " . $response->getProperty('id') ."<br><a href='https://facebook.com'>Click here to go to facebook.com</a>";

			} catch(FacebookRequestException $e) {

				echo "Exception occured, code: " . $e->getCode();
				echo " with message: " . $e->getMessage();

			}
		} else {

			/**
			 * Add permission scopes to our request
			 * We are adding `publish_action` scope
			 * Find more : https://developers.facebook.com/docs/facebook-login/permissions/v2.2
			 */
			$scope = array('publish_actions');
			$loginUrl = $helper->getLoginUrl($scope);
			
			echo "<a href='".$loginUrl."'><button>Click here to login with Facebook.</button></a>";
		}
		?>