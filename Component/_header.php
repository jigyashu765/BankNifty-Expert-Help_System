<header>
    <nav>
        <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
        
        if ($currentPage !== 'index.php') {
            echo '<a href="index.php" class="button" target="_blank" rel="noopener noreferrer">Home</a>';
        }
        if ($currentPage !== 'advertisement.php') {
            echo '<a href="advertisement.php" class="button" target="_blank" rel="noopener noreferrer">Advertisement</a>';
        }
        if ($currentPage !== 'message.php') {
            echo '<a href="message.php" class="button" target="_blank" rel="noopener noreferrer">Message</a>';
        }
        if ($currentPage !== 'P&Llist.php') {
            echo '<a href="P&Llist.php" class="button" target="_blank" rel="noopener noreferrer">P&L List</a>';
        }
        if ($currentPage !== 'paidstock.php') {
            echo '<a href="paidstock.php" class="button" target="_blank" rel="noopener noreferrer">Paid Stock</a>';
        }
        ?>
    </nav>
</header>

<h1>BankNifty Expert <span>|</span> <?php echo $PageTitle ?></h1>
