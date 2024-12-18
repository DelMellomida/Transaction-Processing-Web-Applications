<?php

class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "eCommerce";
    private $conn;

    public function __construct()
    {
        try {
            // Step 1: Connect to MySQL server (without selecting a database)
            $this->conn = new PDO("mysql:host=$this->servername", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Step 2: Check if the database exists, and create it if not
            $this->createDatabase();

            // Step 3: Reconnect to the specific database
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Step 4: Check if the `users` table exists, and create it if not
            $this->createUsersTable();

            // Step 5: Create default admin account
            $this->createDefaultAdmin();

            // Step 6: Check if the `products` table exists, and create it if not
            $this->createProductTable();

            // Step 7: Check if the `products` table exists, and create it if not
            $this->createCartTable();

            $this->createDefaultProducts();
        } catch (PDOException $e) {
            $error_message = "Database Error: " . $e->getMessage() . " | Date/Time: " . date('Y-m-d H:i:s') . "\n";
            $log_file = '../logError/logs.txt';
            file_put_contents($log_file, $error_message, FILE_APPEND);
        }
    }

    private function createDatabase()
    {
        try {
            $sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
            $this->conn->exec($sql);
        } catch (PDOException $e) {
            throw new Exception("Failed to create database: " . $e->getMessage());
        }
    }

    private function createUsersTable()
    {
        try {
            $sql = "
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                fullname VARCHAR(100) NOT NULL,
                username VARCHAR(50) NOT NULL UNIQUE,
                email VARCHAR(100) NOT NULL UNIQUE,
                address TEXT,
                password VARCHAR(255) NOT NULL,
                role ENUM('admin', 'user', 'moderator') DEFAULT 'user',
                last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
            ";

            $this->conn->exec($sql);
        } catch (PDOException $e) {
            throw new Exception("Failed to create users table: " . $e->getMessage());
        }
    }

    private function createProductTable()
    {
        try {
            $sql = "
            CREATE TABLE IF NOT EXISTS products (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                description TEXT,
                price DECIMAL(10, 2) NOT NULL,
                stock INT NOT NULL DEFAULT 0,
                category VARCHAR(100),
                image_url VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            );
            ";

            $this->conn->exec($sql);
            // echo "Products table created successfully!";
        } catch (PDOException $e) {
            throw new Exception("Failed to create products table: " . $e->getMessage());
        }
    }

    private function createCartTable()
    {
        try {
            $sql = "
        CREATE TABLE IF NOT EXISTS cart (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            product_id INT NOT NULL,
            quantity INT NOT NULL DEFAULT 1,
            added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
        );
        ";

            $this->conn->exec($sql);
            // echo "Cart table created successfully!";
        } catch (PDOException $e) {
            throw new Exception("Failed to create cart table: " . $e->getMessage());
        }
    }


    private function createDefaultAdmin()
    {
        try {
            // Check if admin exists
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
            $stmt->execute(['username' => 'admin']);
            $exists = $stmt->fetchColumn() > 0;

            if (!$exists) {
                // Insert default admin
                $password = password_hash('admin123', PASSWORD_DEFAULT);
                $sql = "
                INSERT INTO users (fullname, username, email, password, role) 
                VALUES (:fullname, :username, :email, :password, :role)";

                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    'fullname' => 'Default Admin',
                    'username' => 'admin',
                    'email' => 'admin@example.com',
                    'password' => $password,
                    'role' => 'admin'
                ]);

                // echo "Default admin account created successfully.\n";
            } else {
                // echo "Admin account already exists.\n";
            }
        } catch (PDOException $e) {
            throw new Exception("Failed to create default admin: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    private function createDefaultProducts()
    {
        try {
            // Check if the products table is empty
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM products");
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count == 0) {
                // Insert default products
                $sql = '
            INSERT INTO products (name, description, price, stock, category, image_url) 
            VALUES 
                ("Artisanal Chocolates", 
                 "Handcrafted by small-scale chocolatiers who emphasize quality, unique flavors, and ethical sourcing using traditional methods.", 
                 50.00, 
                 100, 
                 "Indulgent Delights", 
                 "../assets/chocolates.png"),

                ("Special Coffee", 
                 "Specialty coffee: meticulously sourced, roasted, and brewed, offering unique flavors; 250 grams.", 
                 150.00, 
                 0, 
                 "Indulgent Delights", 
                 "../assets/coffee.png"), 

                ("Gourmet Snacks", 
                 "Gourmet snacks: handpicked ingredients, artisanal crafting, delivering exquisite taste; 150g of mixed nuts.", 
                 100.00, 
                 200, 
                 "Indulgent Delights", 
                 "../assets/snacks.png"), 

                ("Baked Goods", 
                 "Baked goods: Freshly baked pastries crafted with care, featuring a variety of flavors and textures.", 
                 120.00, 
                 150, 
                 "Indulgent Delights", 
                 "../assets/baked.png"), 

                ("Artisanal Jam", 
                 "Artisanal jam: Handmade with ripe, luscious fruits and natural ingredients, bursting with vibrant flavors.", 
                 90.00, 
                 120, 
                 "Indulgent Delights", 
                 "../assets/jam.png"), 

                ("Premium Alcohol", 
                 "Premium alcohol: Indulge in rich, complex flavors with our meticulously aged whiskey, perfect for savoring slowly.", 
                 500.00, 
                 50, 
                 "Indulgent Delights", 
                 "../assets/wine.png"),

                ("Handcrafted Candles", 
                 "Handcrafted candles: Premium soy wax, infused with essential oils, emitting calming fragrances.", 
                 120.00, 
                 50, 
                 "Handcrafted Luxuries", 
                 "../assets/candles.png"),

                ("Luxury Bath Products", 
                 "Luxury bath products: Handcrafted with nourishing ingredients, providing a lavish bathing experience.", 
                 280.00, 
                 30, 
                 "Handcrafted Luxuries", 
                 "../assets/bath.png"),

                ("Scented Soaps", 
                 "Scented soaps: Handcrafted with natural oils, leaving skin refreshed and delicately scented.", 
                 90.00, 
                 100, 
                 "Handcrafted Luxuries", 
                 "../assets/soap.png"),

                ("Miniature Succulents", 
                 "Miniature succulents: Handpicked varieties, perfect for small spaces, adding greenery to any room.", 
                 150.00, 
                 80, 
                 "Handcrafted Luxuries", 
                 "../assets/succulent.png"),

                ("Handmade Jewelry", 
                 "Handmade jewelry: Unique designs, crafted with attention to detail, making each piece special.", 
                 200.00, 
                 40, 
                 "Handcrafted Luxuries", 
                 "../assets/jewelry.png"),

                ("Organic Skincare", 
                 "Organic skincare: Handcrafted with natural ingredients, nurturing and rejuvenating skin.", 
                 180.00, 
                 60, 
                 "Handcrafted Luxuries", 
                 "../assets/skincare.png"),

                ("Handpoured Waxmelts", 
                 "Handpoured waxmelts: Aromatic blends, created to enhance ambiance and relaxation.", 
                 75.00, 
                 120, 
                 "Handcrafted Luxuries", 
                 "../assets/waxmelts.png"),

                ("Unique Planter", 
                 "Unique planter: Handcrafted designs, adding personality to indoor and outdoor spaces.", 
                 160.00, 
                 70, 
                 "Handcrafted Luxuries", 
                 "../assets/planter.png"),

                ("Personalized Notecards", 
                 "Custom designs, perfect for adding a personal touch to your messages.", 
                 50.00, 
                 100, 
                 "Personalized Treasures", 
                 "../assets/notecards.png"),

                ("Custom Stationary", 
                 "Personalized designs, ideal for expressing your unique style in writing.", 
                 80.00, 
                 80, 
                 "Personalized Treasures", 
                 "../assets/stationary.png"),

                ("Customized Mugs", 
                 "Personalized with your favorite photos or quotes, making your mornings brighter.", 
                 100.00, 
                 50, 
                 "Personalized Treasures", 
                 "../assets/mug.png"),

                ("Customized Phone Case", 
                 "Personalized protection for your device, reflecting your style and personality.", 
                 120.00, 
                 60, 
                 "Personalized Treasures", 
                 "../assets/case.png"),

                ("Photo Frame", 
                 "Elegant designs, perfect for displaying your cherished memories in style.", 
                 150.00, 
                 40, 
                 "Personalized Treasures", 
                 "../assets/frame.png"),

                ("Engraved Keychains", 
                 "Personalized with names or messages, perfect for adding a special touch to your keys.", 
                 70.00, 
                 120, 
                 "Personalized Treasures", 
                 "../assets/keychain.png");
            ';

                // Execute the SQL query to insert the default products
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();

                // echo "Default products added successfully.\n";
            } else {
                // echo "Products already exist.\n";
            }
        } catch (PDOException $e) {
            throw new Exception("Failed to insert default products: " . $e->getMessage());
        }
    }

}

?>