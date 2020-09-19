<html>
<head>
    <title>Cart</title>
    <style>
        tabble{
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        nav {
            margin: 27px auto 0;

            position: relative;
            width: 590px;
            height: 50px;
            background-color: #34495e;
            border-radius: 8px;
            font-size: 0;
        }
        nav a {
            line-height: 50px;
            height: 100%;
            font-size: 15px;
            display: inline-block;
            position: relative;
            z-index: 1;
            text-decoration: none;
            text-transform: uppercase;
            text-align: center;
            color: white;
            cursor: pointer;
        }
        nav .animation {
            position: absolute;
            height: 100%;
            top: 0;
            z-index: 0;
            transition: all .5s ease 0s;
            border-radius: 8px;
        }
        a:nth-child(1) {
            width: 100px;
        }
        a:nth-child(2) {
            width: 110px;
        }
        a:nth-child(3) {
            width: 100px;
        }
        a:nth-child(4) {
            width: 160px;
        }
        a:nth-child(5) {
            width: 120px;
        }
        nav .start-home, a:nth-child(1):hover~.animation {
            width: 100px;
            left: 0;
            background-color: #1abc9c;
        }
        nav .start-about, a:nth-child(2):hover~.animation {
            width: 110px;
            left: 100px;
            background-color: #e74c3c;
        }
        nav .start-blog, a:nth-child(3):hover~.animation {
            width: 100px;
            left: 210px;
            background-color: #3498db;
        }
        nav .start-portefolio, a:nth-child(4):hover~.animation {
            width: 160px;
            left: 310px;
            background-color: #9b59b6;
        }
        nav .start-contact, a:nth-child(5):hover~.animation {
            width: 120px;
            left: 470px;
            background-color: #e67e22;
        }

        body {
            font-size: 12px;
            font-family: sans-serif;
            /*background: #2c3e50;*/
        }
        h1 {
            text-align: center;
            margin: 40px 0 40px;
            text-align: center;
            font-size: 30px;
            color: #ecf0f1;
            text-shadow: 2px 2px 4px #000000;
            font-family: 'Cherry Swash', cursive;
        }

        p {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: #ecf0f1;
            font-family: 'Cherry Swash',cursive;
            font-size: 16px;
        }

        span {
            color: #2BD6B4;
        }
        a:visited{
            background-color: #03e9f4;
        }

    </style>
</head>
<body>
<nav id="navlist">
    <a href="../game/index.php">Home</a>
    <a href="../game/cart.php" class="active">Cart</a>
    <a href="#">Blog</a>
    <!--<a href="#">Portefolio</a>-->
    <a href="#">About us</a>
    <a href="#">Contact</a>
    <div class="animation start-home"></div>
</nav>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <table cellspacing="0" border="1" style="text-align: center">
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Delete</th>
        </tr>
        <?php
            $total = 0;

            if(isset($_SESSION['cart']))
            {
                foreach($_SESSION['cart'] as $value) {
        ?>
        <tr>
            <td><?php echo $value->title ?></td>
            <td><?php echo $value->price ?></td>
            <td><input type='text' name='quantity[<?php echo $value->id;?>]' id='soluong' value='<?php echo $value->quantity;?>' /></td>
            <td><?php echo number_format($value->gia*$value->quantity,3);?>000 VND</td>
        </tr>
        <?php
            $tong = number_format($value->quanity*$value->price,3);
            $total += $tong;
                }
            }
        ?>
        <tr>
            <?php
            echo "<input type='submit' name='update' value='Update Cart' />";

            ?>
        </tr>
    </table>
</form>
</body>
</html>