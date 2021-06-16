# Module Learning Customform

    `Learning_Customform`
    
## Main Functionalities
To create a custom form on the frontend and save the data and get the data in the frontend of some other page and show the data in a  custom Ui grid in admin

## Instructions
- Create a directory as app/code/Learning/Customform
- Extract the zip in the form.
- Enable the module by running `php bin/magento module:enable Learning_Customform`
- Apply database updates by running `php bin/magento setup:upgrade`\*
- Flush the cache by running `php bin/magento cache:flush`
- Opening the form on the route `customform`
- View the saved data on `customform/index/view`
- View the saved data in admin by navigating the menu `Learning-> CustomForm`