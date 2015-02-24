# Facebook PHP SDK v4.0.0 Implementation (with OAuth)

I have added example for posting content on user's wall.

## Requirements
	- PHP version 5.4+

## Application Set Up
	
Go to http://developers.facebook.com and Create a new app.

![Step One](http://i.imgur.com/OEtfpck.png "Step One")

Add your site url

![Step Two](http://i.imgur.com/JK0grCt.png "Step Two")

Go to developer dashboard

![Step Three](http://i.imgur.com/NxCsVSq.png "Step Three")

Get Your App Id And Secret

![Step Four](http://i.imgur.com/OIjtwxE.png "Step Four")

## Usage

Open up `index.php` Init class with your app id and app secret

	FacebookSession::setDefaultApplication('APP_ID', 'APP_SECRET');
	
Set your callback url containing your website domain in app settings
	
	$helper = new FacebookRedirectLoginHelper("YOUR_CALLBACK_URL_HERE");

In our case, we are handling callback in same file. Thats pretty much it! Let me know if any queries.

## Additional Notes
	- You will be able to test your app only with your account.
	- In order to test with other accounts you must submit your app for approval.
	- Only After approval you can make your app live.
