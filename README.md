# ZWA-2019-2020
Documentation of source codes for semestral project.
short summary:
(for more exact explanations, see comments in source codes)

CSS_files:
  *login page uses login.css
  *everything else uses homepage.css
  *print.css is used on homepage, removes everything except the shopping list for printing
  
JS_files:
  *add_item.js - user trying to add whitespace as an item results in form not being sent and a red border around the input
  *login.js - user trying to log in without entering username and password or entering whitespaces results in form not being sent and a    red border around boxes that weren't in compliance
  
photos:
  *has all the photos used in the semestral project, namely a shopping basket for the login page(full size) and 200x200px thumbnails for     online discount fliers
  
php files:
  *about.php - always visible
  *contact.php - only visible to logged-in users, contains link which opens email app and fills out recipient's email and subject
  *db.php - resets all items in userdata.json, creates one static item
  *db2.php - gets data from userdata.json, includes functions to add and remove items from userdata.json
  *homepage.php - main page of project, different content shown for not logged-in, logged-in and admin
    *not logged-in only sees a notice to log in and a link     
    *logged-in users see discount fliers on the sides with their specific shopping list and a box for adding items, can also see contact
    *admin sees all items in userdata.json + the ID's of the users who added said items
  *login.php - login page, uses functions in users.php for username/password validation
  *logout.php - removes session to log out of page
  *users.php - static array of users with hashed passwords, includes functions to get users by username and ID
  
userdata.json:
  *json encoded file functioning as a sort of database for the project, all items get added into the array together with the user's ID and   a unique ID for item removal
