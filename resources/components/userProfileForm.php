<form action="" method="POST" enctype="multipart/form-data">
    <div class="main-prof-container">
        <div class="profile-container">
            <div class="profile-header">
                <img src="/assets/ch1.jpg" alt="User Profile Picture">
                <h1 style="font-weight: bold;">UNBOX SURPRISE</h1>
                <p style="font-weight: bold;">Status: <?= !empty($user) ? htmlspecialchars($user['role']) : '' ?></p>
                <!--whahah di ko alam ano maganda dito or remove nalang-->
            </div>
            <div class="profile-details">
                <h6>Profile Details</h6>
                <form action="" method="POST" enctype="multipart/form-data">
                    <ul>
                        <li>
                            <label for="name">Name:</label>
                            <input type="text" id="fullname" name="fullname"
                                value="<?= !empty($user) ? htmlspecialchars($user['fullname']) : '' ?>">
                        </li>
                        <li>
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address"
                                value="<?= !empty($user) ? htmlspecialchars($user['address']) : '' ?>">
                        </li>
                        <li>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email"
                                value="<?= !empty($user) ? htmlspecialchars($user['email']) : '' ?>">
                        </li>
                    </ul>
                    <div class="no-space-div">
                        <button type="submit" name="action" value="update" class="submit-btn">
                            <?= !empty($user) ? 'Update User' : '' ?>
                        </button><br><br>

                        <?php if (!empty($user)): ?>
                            <button type="submit" name="action" value="delete" class="submit-btn">Delete</button>
                        <?php endif; ?>
                    </div>
                </form>

            </div>
        </div>

    </div>



</form>