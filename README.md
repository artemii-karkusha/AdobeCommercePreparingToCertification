# Preparing To Certification the AD0-E717 (Adobe Commerce Professional)

## General Information


> Code examples are based on questions from certification the [Adobe Certified Professional - Adobe Commerce Developer with Cloud Add-on](https://express.adobe.com/page/N9ImQqutQZ4eO/).

**Author is [Artemii Karkusha](https://www.linkedin.com/in/artemiy-karkusha/).**


## Exam Objectives and Scope. Topics. 


### Section 1: Working with Admin (5.2%)

 1. Describe how the ACL works with roles and resources.   
 Example in Code:  
 [acl.xml](etc/acl.xml?plain=1#L9)  
 [menu.xml](etc/adminhtml/menu.xml?plain=1#L13)  
 [Controller](Controller/Adminhtml/View/Index.php?plain=1#L19)  
 [Block Restrictions](view/adminhtml/layout/preparingtocertification_view_index.xml?plain=1#L13)    
 [Restrict web API access](etc/webapi.xml?plain=1#L11)  
 [Ui component Restrictions](view/adminhtml/ui_component/delivery_service_listing.xml?plain=1#L33)  
 [system.xml restriction](etc/adminhtml/system.xml?plain=1#L14)
 Adobe docs:  
 [Create an access control list (ACL) rule](https://developer.adobe.com/commerce/php/tutorials/backend/create-access-control-list-rule/#step-1-define-the-custom-resources)
 2. Identify the components to use when creating or modifying the admin grid/form  
 Example in Code:  
 [Create layout with ui_component](view/adminhtml/layout/delivery_service_deliveryservice_index.xml?plain=1#L8)  
 [Create ui_component the listing](view/adminhtml/ui_component/delivery_service_listing.xml?plain=1#L7)  
 [Create ui_component the form](view/adminhtml/ui_component/delivery_service_form.xml?plain=1#L6)  
 Adobe docs:  
 [Introduction to UI components](https://developer.adobe.com/commerce/frontend-core/ui-components/)  
 [Form component](https://developer.adobe.com/commerce/frontend-core/ui-components/components/form/)  
 [Listing (grid) component](https://developer.adobe.com/commerce/frontend-core/ui-components/components/listing-grid/)  
 [Add an Admin grid](https://developer.adobe.com/commerce/php/development/components/add-admin-grid/)

 3. Identify the files to use when creating a store/admin config and menu items
 Example in Code:  
 [system.xml](etc/adminhtml/system.xml)  
 [menu.xml](etc/adminhtml/menu.xml)  
 [dependsOnConfig](etc/adminhtml/menu.xml?plain=1#L29) *It is very helpful attribute which helps to control visibility of menu item with config.*  
 **Adobe docs**:  
 [system.xml](https://experienceleague.adobe.com/docs/commerce-operations/configuration-guide/files/config-reference-systemxml.html)

### Section 2: Architecture (28.6%)

 1. Describe Magento file structure  
 2. Describe Magento CLI commands  
 3. Describe cron functionality  
 4. Given a scenario, describe usage of the di.xml  
 5. Given a scenario, create controllers  
 6. Describe module structure  
 7. Describe index functionality  
 8. Describe localization  
 9. Describe plugin, preference, event observers, and interceptors  
 10. Describe custom module routes  
 11. Describe URL rewrites  
 12. Describe the Magento caching system  
 13. Describe stores, websites, and store views (basic understanding)  

### Section 3: EAV/Database(13.0%)

 1. Given a scenario, change/add/remove attribute sets and/or attributes  
 2. Describe different types of attributes  
 3. Given a scenario, use a DB schema to alter a database table  
 4. Describe models, resource models, and collections  
 5. Describe basics of Entity Attribute Value (EAV)  

### Section 4: Layout/UI (14.3%)

 1. Apply changes to existing product types and create new ones  
 2. Modify and extend existing Catalog entities  
 3. Demonstrate the ability to manage Indexes and customize price output  
 4. Explain how multi-source inventory impacts stock (program level)  

### Section 5: Checkout and Sales (7.8%)

 1. Describe cart components  
 2. Describe a cart promo rule  
 3. Given a scenario, describe basic checkout modifications  
 4. Given a scenario, describe basic usage of quote data  
 5. Given a scenario, configure the payment and shipping methods  
 6. Given a scenario, configure tax rules, currencies, cart, and/or checkout  

### Section 6: Catalog (7.8%)

 1. Identify the basics of category management and products management  
 2. Describe product types  
 3. Describe price rules  
 4. Describe price types  

### Section 7: Adobe Commerce Cloud architecture (11.7%)

 1. Define Adobe Commerce architecture/environment workflow  
 2. Describe cloud project files, permission, and structure  
 3. List services available on Adobe Commerce on Cloud  
 4. Describe how to access different types of logs  
 5. Describe steps for applying patches (Identify which folder to put patches in)  
 6. Describe how to Maintain and upgrade ECE tools  
 7. Identify when to call support *Yaml files and limitations (DIY vs Support tickets)  

### Section 8: Setup/Configuring Adobe Commerce Cloud (3.9%)

 1. Identify how to setup/configure Adobe Commerce Cloud  
 2. Define Basic Cloud troubleshooting (Hierarchy of web UI and variables, configurations precedence)  
 3. Recognize basic knowledge of cloud user management and onboarding UI  
 4. Describe environment Management using UI  
 5. Describe branching using UI  
 6. Identify Adobe commerce Cloud Plan capabilities  

### Section 9: Commerce Cloud CLI tool (Managing part) (6%)

 1. Describe exclusive features of Adobe Commerce Cloud CLI tool (CLI exclusive features: activate emails, rebase environments, snapshot, db dump, local environment setup)  
 2. Describe branching using the Adobe Commerce Cloud CLI tool  
 3. Identify ways to connect to cloud services? (My SQL, Redis, tunnel:info)  



