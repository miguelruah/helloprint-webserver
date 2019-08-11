This file contains some quick notes, by topic.
To improve readability, please find the installation instructions in install.txt (same folder as this one).



1) Distributed architecture
As requested, this mini project is composed of 3 modules, to be installed in different servers.

webserver - this is the frontend module and it should be installed in a server visible to anyone through the Hello Print domain.

producer - this is the inteligent module, located in an inner server, and it's firewall should be set to allow only the webserver and those special clients (if any) that have direct access to our APIs.

consumer - this module accesses the database and it should be installed on a very restricted server, visible exclusively to inner servers.

mailer - this is an additional server, not requested, but still useful. It is called by the consumer API but, if you wish to install it in one of the other servers, just configure the mailer domain in consumer's config.php as 'webserver' or 'producer' (this point is easier to understand if you read the config.php file in the consumer API). The reason to add this server is that, when contacting an SMTP server to send mail with PHPMailer and XAMPP, waiting for a response can exceed the PHP timeout limit. By sending an async request to this server, the consumer API is immediately released. In real life, sending this mail would be a much simpler task by running a mail cron job.



2) database and PHP versions
This test was generated in XAMPP 7.2.7, which includes 10.1.34-MariaDB and PHP 7.2.7.



3) frontend styling
As the focus of the project was the distributed architecture, focus on styling was low, including the intentional absence of responsive layout.



4) webserver SSL
As the webserver is accepting login credentials, an SSL key should have been generated, which would have made the installation instructions much more complex.
This is a fairly simple task that can be done later, so the decision was to KISS (keep it simple...)



5) producer
we chose to use jSON instead of XML to increase human readability of the params during debug.
we also chose to use PHP curl instead of Ajax as it is a fairly simple and easily debugged way to interact with APIs.
If requested, the webserver can be adapted by adding some simple functions to /js/scripts.js.



6) consumer
PDO was chosen as a safe and easy class to access the database



7) database login credentials
User and password access to the database was set in consumer's config.php file.
This is known to be a risk, especially with versioning control, when test code is sent to production.
Again, the decision was to KISS (keep it simple...) and focus on the distributed architecture as I'm sure there are already solutions in place in Hello Print's production.
Nevertheless, upon request with different guidelines, I can implement different approaches.