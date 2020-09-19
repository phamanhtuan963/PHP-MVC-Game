<?php
    require_once ("Game.php");
    class Database{

        public function getGameList()
        {
            //return $gamelist;
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mvc";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            $sql = "SELECT * FROM game where quantity > 0";
            $result = mysqli_query($conn, $sql);

            return $result;


            /*$gamelist = array();
            $gamelist[] = new Game("BBBBB", 10000, "aa", "Hoho");
            $gamelist[] = new Game("Adventure Space", 10000, "image", "Big Boy");
            $gamelist[] = new Game("a", 10000, "image", "Haha");
            return $gamelist;*/
        }


        public function  getGame($id)
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mvc";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            $sql = "SELECT *
                    FROM game 
                    WHERE id='{$id}'";
            $game = mysqli_query($conn, $sql);
            return $game;



            //return $result;
            /*$gamelist = $this->getGameList();
            foreach($gamelist as $key => $game)
            {
                if($game->title == $title);
                    return $game ;
            }*/
        }
        public function getlogin()
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mvc";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $sql = 'SELECT username, password FROM admin';
            $result = mysqli_query($conn, $sql);
            //mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);


            if(isset($_REQUEST['username'])&&isset($_REQUEST['password']))
            {
                if($_REQUEST['username']==$row['username'] && $_REQUEST['password'] == $row['password'])
                {
                    return 'login';
                }
                else
                {
                    echo "<script type='text/javascript'>alert('Wrong pass');</script>";;
                }
            }

        }

        public function insert_data()
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mvc";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            //if(isset($_POST['title']) && isset($_POST['price']) && isset($_FILES['image']) && isset($_POST['producer']))
            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];
                $price = $_POST['price'];
                //$image = basename($_FILES['image']['name']);
                $image = $_FILES['image']['name'];
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                $producer = $_POST['producer'];
                $quantity = $_POST['quantity'];
                $sql = "INSERT INTO game (title,price,image,producer,quantity) VALUES ('$title','$price','$image','$producer','$quantity')";
                // Upload file
                move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$image);

                $result = mysqli_query($conn, $sql);
                if($result)
                {
                    return "INSERT DATA successfully";
                }
                else
                {
                    return "Error";
                }
            }
            else{
                return "";
            }
        }

        public function import()
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mvc";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if(isset($_POST["Import"]))
            {
                $filename = $_FILES["file"]["tmp_name"];
                

                if($_FILES["file"]["size"] > 0)
                {
                    $file = fopen($filename, "r");
                    while(($getData = fgetcsv($file,10000,",")) !== FALSE)
                    {
                        $sql = "INSERT into game (title,price,image,producer,quantity) values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";

                        $result = mysqli_query($conn, $sql);

                        if(!isset($result))
                        {
                            echo "<script type=\"text/javascript\">
                              alert(\"Invalid File:Please Upload CSV File.\");
                              window.location = \"index.php\"
                              </script>";
                        }
                        else
                        {
                            echo "<script type=\"text/javascript\">
                                alert(\"CSV File has been successfully Imported.\");
                                window.location = \"index.php\"
                              </script>";
                        }
                    }
                    fclose($file);
                }
            }
        }

        public function addCart($id)
        {
            $mangCart = array();

            $mangCart = $this->getGameList($id);

            $idchonsp = $mangCart[0] -> id;

            $cart = new Game($id,$mangCart[0]->title,$mangCart[0]->price);

            if($_SESSION['cart'][$idchonsp])
            {
                $_SESSION['cart'][$idchonsp]->quantity =+ 1;
            }

            else
            {
                $_SESSION['cart'][$idchonsp] = $cart;

                $_SESSION['cart'][$idchonsp]->quantity = 1;
            }
        }

        public function delete($id)
        {
            unset($_SESSION['cart'][$id]);
        }

        public function updatecart()
        {
            foreach ($_POST['quantity'] as $id => $quantity)
            {
                if($quantity==0)
                {
                    unset($_SESSION['cart'][$id]);
                }

                else
                {
                    $_SESSION['cart'][$id]->quantity = $quantity;
                }
            }
        }

    }
    //$tmp = new Database();
    //$tmp->getGame("a");
    //var_dump($tmp);
?>