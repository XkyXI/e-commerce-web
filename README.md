# Bookeater

Bookeater is a website that sells used books. [Click here](http://centaurus-4.ics.uci.edu:1027)

Manage database [here](http://centaurus-4.ics.uci.edu:1027/phpMyAdmin)
- Username: root
- Password: UuINyEpOccooeTn1

For checking php errors:
```
sudo tail -n 10 /etc/httpd/logs/error_log
```

Requirements:
1. Updated to use php to dynamically webpages.
	- header.php generates the header by querying the different categories in the database
	- category.php generates products of different categories dynamically
	- serach.php generates the products of the searched keyword
	- detail.php generates the detail of the product dynamically
2. When a user submits the form, first validated in the client side in formScript.js, and validated again in the server side in order.php, once finished, used PDO prepare to prevent sql injection, and stored in the database Product, table OrderInfo.
3. After storing the order detail, order.php will generate order details dynamically.
4. The following function implements Ajax
	- The search bar uses Ajax to provide search suggestion base on the available products in the database.
	- As users enter the form in the zip code, the city and state will automatically filled if the zip code is recognized with the entries in the database.
