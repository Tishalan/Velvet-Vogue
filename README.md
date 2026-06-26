<div align="center">

# Velvet Vogue – E-Commerce Web Application

**A multi-page clothing store website built with HTML, CSS, JavaScript, PHP and MySQL. Features product browsing with filters, shopping cart, checkout, order tracking, customer inquiries, and a full admin dashboard to manage products, orders and customer messages.**

![PHP](https://img.shields.io/badge/PHP-8.3.14-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-9.1.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-3.x-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![Apache](https://img.shields.io/badge/Apache-2.4.62-D22128?style=for-the-badge&logo=apache&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

</div>

---

## What is Velvet Vogue?

Velvet Vogue is a fully functional e-commerce platform built from scratch for a clothing store that specialises in trendy casual wear and formal wear for young adults. The system covers the complete shopping flow from browsing and filtering products, adding items to cart, completing checkout, to tracking orders alongside a dedicated admin panel for full backend control of the store.

---

## Tech Stack

| Layer | Technology | Version | Role in the Project |
|---|---|---|---|
| Structure | HTML5 | Latest | Semantic page structure for all pages |
| Styling | CSS3 / SCSS | Latest | Custom styling, animations, responsive layout |
| Interactivity | JavaScript | ES6 | Dynamic filtering, live price updates, cart logic, form validation |
| UI Framework | Bootstrap | 3.x | Responsive grid system, buttons, tables, dropdowns |
| Backend | PHP | 8.3.14 | Server-side logic, session management, authentication, all CRUD operations |
| Database | MySQL | 9.1.0 | Stores users, products, cart items, orders, shipping details, and inquiries |
| Web Server | Apache | 2.4.62 | Serves the application locally via XAMPP or WAMP |
| Editor | Visual Studio Code | Latest | Code editing, debugging, Git integration, live preview |

---

## Core Features

**Customer Side**
- Role-based login redirects customers to the home page and admins to the dashboard
- Product browsing with multi-filter support: category, size, colour, price sort, and price range
- Product detail page with size and colour validation before adding to cart
- Related products section on every product detail page
- Shopping cart with item management and live total calculation
- Checkout with automatic total price update when quantities change
- Multiple payment methods: Credit Card and Cash on Delivery
- Real-time order status tracking (Pending, In Process, Delivered)
- Customer inquiry submission with admin reply history
- Profile management with shipping address update

**Admin Side**
- Dedicated admin dashboard with navigation to all management sections
- Full product CRUD: add, edit, delete, and filter products by category
- Image upload support for product listings
- Order management with status update that instantly reflects on the customer's Track Order page
- Inquiry management with reply system that updates on the customer's inquiry history

---

## Pages

### Customer Side

**Login Page**

<img width="1920" height="912" alt="image" src="https://github.com/user-attachments/assets/4494cff9-b1db-4bed-a91f-36889df2a54c" />



The entry point of the system. Accepts a username and password, validates credentials against the database, and redirects users based on their role. Customers go to the home page; admins go to the dashboard. Includes a Forgot Password link and a Sign Up Here link for new users.

**Sign Up Page**

<img width="1920" height="912" alt="image" src="https://github.com/user-attachments/assets/995ad0bb-9802-4dfc-99e5-d79db6ccc634" />



Registration form that collects the user's full name, email address, phone number, and password. Input is validated before storing in the `users` table. After successful registration the user is prompted to sign in.

**Home Page**

<img width="1920" height="3681" alt="image" src="https://github.com/user-attachments/assets/f23a5233-0bf6-4aea-bc9f-2ad0cf9ddfce" />





The main landing page after login. Features a promotional banner slider with a Shop Now button, a search bar, product cards grouped by Men, Women, and Kids categories, a New Arrivals section, and an Exclusive Items section. The footer displays store services, navigation links, contact details, and social media icons. Clicking Browse All Products navigates to the product categories page.

**Product Categories Page**


<img width="1920" height="3986" alt="image" src="https://github.com/user-attachments/assets/88cb6a58-9e65-4ced-b590-e99caace1126" />




Lists the full product catalogue with a dynamic filter bar at the top. Customers can filter simultaneously by Category, Price sort (high to low or low to high), Colour, Size, and Price Range (0-1000, 1001-2000, 2001-3000, 3001-5000, 5001+ LKR). Each product card shows the image, name, original price, discounted price, and availability status. Hovering over a card reveals the Add to Cart button.

**Product Detail Page**

<img width="1920" height="2206" alt="image" src="https://github.com/user-attachments/assets/8153ae77-e69a-49d0-b6f6-719b4f2494f0" />





Opened when a customer clicks on any product. Displays the full product image, name, price, description, available sizes (S, M, L, XL), available colours as colour swatches, stock availability, and category. Selecting more than one size or colour at once triggers a validation alert. Attempting to add to cart without selecting size and colour also triggers an alert. After valid selection, Add to Cart saves the item and redirects to the cart page. A Related Products carousel below suggests other items from the same category.

**My Cart Page**

<img width="1920" height="1660" alt="image" src="https://github.com/user-attachments/assets/02ab47cf-29aa-4409-9de8-ff50274b961f" />



A table listing all products added to cart, showing product image, product name, selected size, unit price, and line total. Each row has a Delete button for removing unwanted items. The cart total is displayed below the table. A Proceed to Checkout button moves the customer forward in the flow.

**Checkout Page**

<img width="1920" height="1768" alt="image" src="https://github.com/user-attachments/assets/b0be1852-8787-42e6-8682-d1f6b6ed7aeb" />




Summarises the full order with product image, name, price, editable quantity field, and line total. The total price recalculates automatically using JavaScript when any quantity is changed. Customers select their payment method from a dropdown (Credit Card or Cash on Delivery) and click Complete Purchase to place the order. A Track Your Order button appears after the order is confirmed.

**Track Order Page**

<img width="1535" height="876" alt="image" src="https://github.com/user-attachments/assets/5f8dc304-90ac-4cc2-8176-3889c13e70da" />




Displays the customer's order history as a list of order cards. Each entry shows the product image, product name, unit price, quantity, order date, and current status. The status is set and updated by the admin from the Manage Orders panel and reflects here in real time. Customers can remove entries from their history using the Remove button.

**Inquiry Page**

<img width="1920" height="2400" alt="image" src="https://github.com/user-attachments/assets/34394d14-ea8d-484d-92fe-57cfb56b8c5b" />






A support form where customers can submit concerns about their orders or any other issues. Fields include Email, Phone Number, Address, and a Description text area. Submitted inquiries appear in a history table below the form, alongside the admin's reply. Customers can also delete their own inquiry records.

**My Profile Page**

<img width="1920" height="2507" alt="image" src="https://github.com/user-attachments/assets/f4b842e9-3a2b-4054-be19-6fd86729ac1f" />





Shows the logged-in customer's registered details (username, email, phone number) pulled from the database. Below that, a shipping details form lets customers enter or update their delivery address. All changes are saved with the Update Profile and Shipping Details button.

---

### Admin Side

**Admin Dashboard**

<img width="1920" height="1367" alt="image" src="https://github.com/user-attachments/assets/bfbbacd4-4a68-4c1c-bd84-e8bdc9b31296" />



The control centre for store administrators. After admin login, this page greets the admin with a Welcome Back Admin banner and provides quick-access buttons for Manage Product, Manage Order, Reports, and Log Out. The top navigation bar mirrors the same options.

**Admin Manage Products**

<img width="1920" height="2760" alt="image" src="https://github.com/user-attachments/assets/e7c3f605-3c13-4519-b97b-821035086bab" />




Provides the full product management interface. The top section is a form for adding new products with fields for Product ID, Category, Product Name, Description, Price, Discount Price (optional), Availability status, Sizes (checkboxes for S, M, L, XL), Available Colours (colour pickers), and an image file upload. Submit saves to the database; Clear resets the form. Below the form, a product table shows all existing products with all their details. A Category filter dropdown narrows the table. Each row has an Edit button (opens a pre-filled update form) and a Delete button (removes the product from the database).

**Admin Manage Orders**

<img width="1920" height="912" alt="image" src="https://github.com/user-attachments/assets/941737fd-98a5-40df-94bc-680d9ddecc3b" />


Displays every customer order in a table with Order ID, User ID, product image, Product Name, Price, Quantity, Total Price, current Status, and an Update button. The admin selects a new status from the dropdown (Pending, On Process, Delivered) and clicks Update to save. The change immediately appears on the customer's Track Order page, keeping the customer informed without any manual notification.

**Admin Manage Reports (Inquiries)**

![Uploading image.png…]()




Lists all inquiries submitted by customers, showing their Email, Phone Number, Address, and the full Description of their issue. Each row has a reply text area where the admin types a response and an Update Reply button to save it. Once submitted, the reply appears on the customer's Inquiry history page under the matching inquiry entry.

---

## Database Schema

| Table | Key Columns | Description |
|---|---|---|
| `users` | id, username, email, phone, password, role | Stores both customer and admin accounts; role field controls access |
| `products` | product_id, category, name, description, price, discount_price, available, sizes, colors, image | Full product catalogue with all display and filter attributes |
| `cart` | id, user_id, product_id, size, price | Tracks which products each user has added to their cart |
| `shipping_address` | id, user_id, address fields | Stores delivery details linked to each customer account |
| `contact_us` | id, email, phone, address, description, admin_reply | Customer inquiries and the admin's response |

---

## Project Structure

```
Velvet_Vogue/
    Addcart.php                     # Handles add-to-cart POST requests and saves to cart table
    Admindb/
        Admindb.php                 # Full admin panel: dashboard, product CRUD, order management, inquiry replies
        delete.php                  # Handles product delete requests from the admin manage products table
        css/
            style.css               # Admin panel custom styles
            theme-color/            # Ten pre-built colour theme variants for the admin UI
        fonts/                      # FontAwesome and Glyphicons icon font files
        img/                        # Admin panel image assets
    .vscode/
        launch.json                 # VS Code PHP debug configuration
```

---

## Setup and Installation

**Requirements**
- XAMPP or WAMP installed on your machine
- PHP 8.3+
- MySQL 9.1+
- A modern web browser (Chrome, Firefox, Edge, Safari)

**Steps**

1. Download and install [XAMPP](https://www.apachefriends.org/) or [WAMP](https://www.wampserver.com/).
2. Clone or extract this repository and place the `Velvet_Vogue` folder into:
   - XAMPP: `C:/xampp/htdocs/`
   - WAMP: `C:/wamp64/www/`
3. Open phpMyAdmin at `http://localhost/phpmyadmin` and create a new database named `velvet_vogue`.
4. Create the tables from the schema above or import the SQL dump if provided.
5. Open the PHP files and update the database connection block with your credentials:
   ```php
   $host = "localhost";
   $user = "root";
   $password = "";
   $database = "velvet_vogue";
   ```
6. Start Apache and MySQL from the XAMPP or WAMP control panel.
7. Open your browser and go to `http://localhost/Velvet_Vogue/`.

---

## Responsive Design

The website is fully responsive and tested across multiple screen sizes:
- Desktop (1920x1080 and standard widescreen)
- iPad Pro (1024x1366)
- Samsung Galaxy S20 Ultra (412x915)

Bootstrap's grid system combined with custom CSS media queries handles layout adjustments across all breakpoints without breaking the UI or functionality.

---

## Security Features

- Password field is masked and submitted securely via POST
- PHP session management controls access to customer and admin pages
- Role-based routing prevents customers from accessing admin routes
- Input fields are validated on both client side (JavaScript) and server side (PHP)
- SSL/TLS encryption recommended for production deployment
- PCI-DSS compliant payment flow through third-party gateways (Stripe or PayPal)

---

## Academic Details

| Field | Details |
|---|---|
| Programme | HND in Computing, Software Engineering |
| Module | Unit 13: Web Design and Development |
| Assignment Title | Web Application for Velvet Vogue Clothing Store |
| Student Name | Satkunam Tishalan |
| Registration ID | E225097 |
| Institution | ESOFT Metro Campus |
| Assessor | Mrs. T. Ushamini |
| Submission Date | 04 April 2025 |
