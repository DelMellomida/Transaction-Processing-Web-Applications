<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Header</title>

    <!-- Include Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>Admin Panel</h2>
        <nav>
            <ul>
                <li><a href="/admin" class="button"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                <li><a href="/addproduct" class="button" id = "btnaddprod" ><i class="fas fa-plus-circle"></i> Add Product</a></li>
                <li><a href="/allproduct" class="button"><i class="fas fa-box"></i> All Products</a></li>
                <li><a href="/logout" class="button"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
    </aside>
    
    <div class="main-content">
    <header id = "header">
            <h1>Welcome, Admin</h1>
            <p>Please be mindful of what you process.</p>
        </header>


        <div id="options" style="display:block;">
            <ul>
                <li><i class="fas fa-tachometer-alt"></i> Home</a></li> <br><br>
                <li><i class="fas fa-plus-circle"></i> Add Product</a></li> <br><br>
                <li><i class="fas fa-box"></i> All Products</a></li> <br><br>
            </ul>
        </div>
        
    </div>

    <script>
        const addProductBtn = document.getElementById("btnaddprod");
        const addProductForm = document.getElementById("options");
        const header = document.getElementById("header");

        addProductBtn.addEventListener("click", function () {
            if (addProductForm.style.display === "block") {
                addProductForm.style.display = "none"; 
                header.style.visibility = "hidden";
            } else {
                addProductForm.style.display = "block"; 
                header.style.visibility = "visible";
            }
        });
    </script>
</body>



</html>
