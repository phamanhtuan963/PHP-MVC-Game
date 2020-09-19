<html>
<head>
    <title>Game Detail</title>
    <style>
        tabble{
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        tr, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
<h1>Game Detail</h1>
<?php
    /*echo 'Title: ' . $game->title . '<br/>';
    echo 'Price: ' . $game->price . '<br/>';
    echo 'Image: ' . $game->image . '<br/>';
    echo 'Producer: ' . $game->producer . '<br/>';*/
    if (mysqli_num_rows($game) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($game)) {
            echo 'Title: ' . $row['title'] . '<br/>';
            echo 'Price: ' . $row['price'] . ' VND' . '<br/>';
            /*echo 'Image: ' . '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"/>' . '<br/>';*/
            echo 'Image' . '<img src="images/'.$row['image'] .'"/>' . '<br/>' ;
            echo 'Producer: ' . $row['producer'] . '<br/>';
            echo 'Quantity: ' . $row['quantity'] . '<br/>';
            echo "<p><input type='submit' value='Buy' onclick=\"window.location='".$_SERVER['PHP_SELF']."?addcart=. $row[id] . '\" ></input></p>";
        }
    } else {
        echo "0 results";
    }
?>


</body>
</html>