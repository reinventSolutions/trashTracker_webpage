  _____              _       _____          _             
 |_   __ __ __ _ ___| |__   |_   ___ _  ___| | _____ _ __ 
   | || '__/ _` / __| '_ \    | |/ _` |/ __| |/ / _ | '__|
   | || | | (_| \__ | | | |   | | (_| | (__|   |  __| |   
   |_||_|  \__,_|___|_| |_|   |_|\__,_|\___|_|\_\___|_|   
                                                                                                          

LINKS--
TRASH TRACKER’S PROGRAMMER’S MANUAL
https://docs.google.com/document/d/e/2PACX-1vTo6IW0DdvbCoL4rgMd28L5B2XQo6aZ5quHuuUkV-F1-8gyq9eqb69Yisn3KqWRVi4aLDakBKQHp0Oi/pub

---------------------------------------------------------
WEB APPLICATION OVERVIEW AND RELATED FILES
---------------------------------------------------------
Database Credentials
FILENAME: dbinfo.php
dbinfo.php: /var/www/html/TrashTracker/DB/dbinfo.php

OVERVIEW: Database Credentials for connection
PURPOSE: Include this page at the top of php pages, or where needed for db connection.

---------------------------------------------------------
PHP Mailer
PHP Mailer - Open Source class for sending email through PHP
Github: https://github.com/PHPMailer/PHPMailer

• The PHPMailer files must be stored in a include_path directory that is specified in the PHP configuration file.
• In this case PHPMailer files are in the
  • /usr/share/php folder.
  • /var/www/html/TrashTracker/vendor/
In order to use PHPMailer the use and require statements must be used at the beginning of the PHP statement.
PHPMailer is used in the register, updateSettings, passwordUpdate, and forgotPasswordUpdate PHP files.
You may change the email used in the PHP files to whatever you wish, but know that you must disable two-factor authentication and may need to disable other security options for the provider you choose.
Current email account sending emails to users is:
Email: reinv3nt.solutions@gmail.com
PW: helloworld18
---------------------------------------------------------

---------------------------------------------------------
Log In
FILENAME: index.php

index.php: /var/www/html/TrashTracker/php/index.php
OVERVIEW: Login page for Trash Tracker.
PURPOSE: Users to log in, sign up, or retreive password.
• On index.php New Users button calls users/signup.php
• On index.php Forgot Password button calls users/forgotPassword.php
• On index.php Login button calls users/login.php

---------------------------------------------------------
FILENAME: signup.php
signup.php:/var/www/html/TrashTracker/php/users/signup.php
OVERVIEW: PHP page for Trash Tracker's new users.
PURPOSE: Will allow users to input ID token, name, email and password. If ID token is in the database and  sign up is successful redirect to index.php. If not will display error. Update and Return button calls register.php to validate ID token.
• On signup.php Update and Return calls register.php to validate ID token.

---------------------------------------------------------
FILENAME: register.php
register.php:/var/www/html/TrashTracker/php/users/register.php
OVERVIEW: PHP page for Trash Tracker's new users.
PURPOSE: Will validate user's input ID token. If ID token is in the database will allow user to sign up, and redirect to index.php. Also sends out an email to the users email that they have just registered. If not will display error and stay on signup.php.
---------------------------------------------------------


FILENAME: forgetPassword.php
forgotPassword.php: /var/www/html/TrashTracker/php/users/forgotPassword.php
OVERVIEW: PHP page for Trash Tracker's user's retrieve their password.
PURPOSE: Will allow users to input email related to their account to set a new password. An email will be sent to their account with a token password.
• On forgetPassword.php Send Recovery Email button calls forgotPasswordUpdate.php

---------------------------------------------------------
FILENAME: login.php
login.php: /var/www/html/TrashTracker/php/users/login.php
OVERVIEW: PHP page for Trash Tracker login credentials.
PURPOSE: Will check users email and password and direct to account.php if credentials are in the database, if not will display error.

---------------------------------------------------------
Account Page
---------------------------------------------------------
FILENAME: account.php
account.php: /var/www/html/TrashTracker/php/account.php
OVERVIEW: PHP page for Trash Tracker main page.
PURPOSE: Data visualization for User Portal. Calls in different PHP pages with itself. Includes: historicalComp.php , normalComp.php, and game.php and other graph data/ratio PHP pages.


---------------------------------------------------------
Profile Management
---------------------------------------------------------
FILENAME: generalInfo.php
updateSettings.php: /var/www/html/TrashTracker/php/temp/generalInfo.php
OVERVIEW: Displays relative user info, bin ifo, and next pick up date.
PURPOSE: User informative.

---------------------------------------------------------
Update Name/Email/Password
FILENAME: settings.php
settings.php: /var/www/html/TrashTracker/php/users/setting.php
OVERVIEW: PHP page to gather inputs for profile settings.
PURPOSE: Update button calls updateSettings.php

---------------------------------------------------------
FILENAME: updateSettings.php
updateSettings.php: /var/www/html/TrashTracker/php/users/updateSetting.php
OVERVIEW: PHP to update user profile settings.
PURPOSE: Updates user information in the database. Sends an email to the user.

---------------------------------------------------------
Log out
---------------------------------------------------------
FILENAME: logout.php
logout.php: /var/www/html/TrashTracker/php/users/logout.php
OVERVIEW: PHP to logout.
PURPOSE: PHP page for logging out, destroys session and get redirected back to index.php.

---------------------------------------------------------
Historical Self Comparison
---------------------------------------------------------
Button Functionality
FILENAME: button.php
button.php: /var/www/html/TrashTracker/js/button.php
OVERVIEW: JS/Jquery button handling for historical comparison.
PURPOSE: Button functionality for all graph views.
---------------------------------------------------------


FILENAME: historicalComp.php
historicalComp.php: /var/www/html/TrashTracker/php/temps/historicalComp.php
OVERVIEW: Displays Weekly, Monthly, &Yearly View
PURPOSE: Gets called in account.php

---------------------------------------------------------
Weekly Tab
FILENAME: graph1.php
graph1.php: /var/www/html/TrashTracker/php/graph1.php
OVERVIEW: Displays Weekly
PURPOSE: Draws the chart on initial page load and pulls data using sessions for historicalComp.php weekly view.

---------------------------------------------------------
FILENAME: graph2.php
graph1.php: /var/www/html/TrashTracker/php/graph2.php
OVERVIEW: Displays Weekly
PURPOSE: Updates data on jquery asynchronously for historicalComp.php weekly view.

---------------------------------------------------------
Monthly Tab
---------------------------------------------------------

FILENAME: monthlyGraph.php
monthlyGraph.php: /var/www/html/TrashTracker/php/monthlyGraph.php
OVERVIEW: Displays Monthly
PURPOSE: Pulls data on page load using sessions for historicalComp.php monthly view.

---------------------------------------------------------
FILENAME: monthlyGraph2.php
monthlyGraph2.php: /var/www/html/TrashTracker/php/monthlyGraph2.php
OVERVIEW: Displays Monthly
PURPOSE: Updates data on jquery asynchronously for historicalComp.php monthly view.

---------------------------------------------------------
Yearly Tab
---------------------------------------------------------
FILENAME: annualGraph.php
annualGraph.php: /var/www/html/TrashTracker/php/annualGraph.php
OVERVIEW: Displays Yearly
PURPOSE: Works in conjunction with Jquery to update the graphy. Updates the google charts by pulling updated data from DB.


---------------------------------------------------------
Comparison with Others
---------------------------------------------------------
FILENAME: closest.php
normalComp.php: /var/www/html/TrashTracker/php/temps/normalComp.php
OVERVIEW: Displays Normal Comparison
PURPOSE:  Closest neighbors, neighborhood, and city comparison.

---------------------------------------------------------
Closest Tab
---------------------------------------------------------
FILENAME: closest.php
game.php: /var/www/html/TrashTracker/php/comparison.php
OVERVIEW: PHP for 5 closest neighborhood
PURPOSE:  Passes db info to closest.php for closest ratio.
PHP page for 5 closest neighbor comparison..
/var/www/html/TrashTracker/php/temps/closest.php

---------------------------------------------------------
Neighborhood Tab
---------------------------------------------------------
FILENAME: routeavg.php
game.php: /var/www/html/TrashTracker/php/temps/routeavg.php
OVERVIEW: Neighborhood comparison
PURPOSE: PHP page that gets database information neighborhood comparison.
/var/www/html/TrashTracker/php/temps/routeavg.php

---------------------------------------------------------
City Tab
---------------------------------------------------------
FILENAME: cityAvg.php
cityAvg.php: /var/www/html/TrashTracker/php/cityAvg.php
OVERVIEW: City comparison
PURPOSE:  PHP page that gets database information city comparison.

---------------------------------------------------------
Trash Tracker Game
---------------------------------------------------------
FILENAME: game.php
game.php: /var/www/html/TrashTracker/php/temps/game.php
OVERVIEW: Displays Trash Tracker Game
PURPOSE:  Drag and drop game.


