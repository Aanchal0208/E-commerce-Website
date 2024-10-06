Installation-----------------------------------------------------------------------------------------------

Clone the repository:

git clone  https://github.com/Aanchal0208/E-commerce-Website

Save folder into C:/xampp/htdocs

Open XAMPP and start the Apache Server and MySql databases.

Created Database as acme_project_ecommerce.

Make 4 tables in that database user, products, cart and orders which I give in screenshot as well.

----------------------------------------------------------------------------------------------------------

Vendor Role:

1.Product Management: Vendors can add, update, and delete products.

2.Product Details: Manage images, descriptions, and pricing of products.

Customer Role:
1.Product Browsing: Customers can view all available products.

2.Cart Functionality: Add products to a cart for later purchase.

3.Order Placement: Customers can purchase products and track their orders.

Admin Role:
1.Platform Management: Admin can oversee all activities on the platform.

2.Order Tracking: Admin monitors the order statuses and can mark them as delivered.

Order Flow:
1.Processing: When a customer places an order, it enters a processing state.

2.Vendor Notification: The order is sent to the corresponding vendor.

3.Shipping: Vendors mark the order as shipped.

4.Admin Review: Admin can update the order status to delivered or not.

--------------------------------------------------------------------------------------------------------------
>>All the project images are in acmegrade_project_image.

>>Database: user, product, orders, cart

---user: userid, username, password, usertype, craeted_date

---product: pid, name, price, detail, impath, owner, created_date

---orders: orderid, name, address, email, number, products, price, payment, status, orderdate

---cart: cartid, userid, pid, created_date

>>Every page of project contain creater information
