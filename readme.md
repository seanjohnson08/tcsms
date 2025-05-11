## Installation Steps

1. Set up LAMP stack (PHP 8.2 is recommended)

2. Deploy files to your localhost

3. Run DB Creation Script.sql to install required tables

4. Update database name and password in the following files:

	* settings.php
	* botapi.php
	* component/admin/adm_webhook.php
	* component/admin/adm_lastcommentsframe.php

5. Change any hardcoded instances of "https://www.mfgg.net/" to your localhost

## Authors

- Retriever II - Original author of TCSMS
- VinnyVideo - Updated TCSMS to run in PHP 8.2
- Hypernova - Added a lot of upgrades in the early 2020's
- Mors - md5 fixes and other upgrades in the early 2020's
- HylianDev, Char, Guinea, Techokami, Kritter, probably other people I'm forgetting - Other contributions
- wtl420 - Creator of the repo