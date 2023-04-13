<header>
            <div class="popup">
            <a href="index.php">Мяса</a>    
            <?php if ($user_id): ?>
            <a id="show_add_photo" href="#">Матюки</a>
            <?php endif; ?> 
            <a href="#">Убийства</a>
            <a href="User.php">И голие сиски</a>
            </div>
            <div class="mobile_icon">
                <img src="free-icon-menu-bar-2311552.png" alt="">
            </div>
            <?php if ($user_id): ?>
                <a href="logout.php">Уйти с аккаунта</a>
                <?php endif; ?> 
        </header>