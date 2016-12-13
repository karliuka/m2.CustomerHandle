# Magento2 CustomerHandle
Add custom layout handles for frontend magento2 to add customer_logged_in and customer_logged_out handles.
## Install with Composer as you go

1. Go to Magento2 root folder

2. Enter following commands to install module:

    ```bash
    composer require faonni/module-customer-handle
    ```
   Wait while dependencies are updated.

3. Enter following commands to enable module:

    ```bash
	php bin/magento setup:upgrade
	php bin/magento setup:static-content:deploy
