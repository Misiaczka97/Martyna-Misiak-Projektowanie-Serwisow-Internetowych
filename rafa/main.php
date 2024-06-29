<?php
    $head = file_get_contents("head.html");
    $nav = file_get_contents("block_navbar.php");
    $nav2 = file_get_contents("block_navbar_loggin.html");
    $main = file_get_contents("block_main.html");
    $foot = file_get_contents("block_footer.html");
    $content = "";
    $like = "LIKE '%'";
    if(!isset($_COOKIE['LIKE'])){
        setcookie("LIKE", "LIKE '%'", time() + (86400 * 30), "/");
    }

    if(!isset($_POST['type']) || $_POST['type']==''){
        if(!isset($_POST['like'])){
            setcookie("LIKE", "LIKE '%'", time() + (86400 * 30), "/");
            $content = $main . get_news($_COOKIE['LIKE']);
            
        } else{
            setcookie("LIKE", "= '".$_POST['like']."'", time() + (86400 * 30), "/");
            $content = $main . get_news($_COOKIE['LIKE']);

        }

    } elseif($_POST['type']=='content'){
        $content = get_content();

    } elseif($_POST['type']=='signin' || $_POST['type']=='return'){
        $content = $main . get_news($_COOKIE['LIKE']) . file_get_contents('block_login.html');
        
    } elseif($_POST['type']=='signup'){
        $content = $main . get_news($_COOKIE['LIKE']) . file_get_contents('block_register.html');
        
    } elseif($_POST['type']=='premium'){
        $content = file_get_contents('block_premium.html');

    } elseif($_POST['type']=='burger'){
        $content = $main . get_news($_COOKIE['LIKE']) . file_get_contents('block_category_popup.html');

    } elseif($_POST['type']=='search_element'){
        $content = $main . file_get_contents('block_search.html');

    } elseif($_POST['type']=='search'){
        $content = $main . get_news_by_search($_POST['value'], $_POST['sort']);

    } elseif($_POST['type']=='login'){
        get_login();

    } elseif($_POST['type']=='register'){
        set_login();
    }

    echo $head;
    if(isset($_COOKIE['EMAIL'])){
        echo $nav2;
    } else {
        echo $nav;
    }
    echo $content . $foot;

    function set_login(){
        $conn = sql_menager();

        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];

        if($conn){
            $kw = "INSERT INTO `users`( `nick`, `email`, `phone_number`, `password`, `premium_account`, `date_premium`) VALUES ('$name','$email','000000000','".base64_encode($password)."','0','00-00-0000')";
        
            mysqli_query($conn, $kw);
            header("Location: ".$_SERVER['REQUEST_URI']);
            exit();
        }
        mysqli_close($conn);
    }

    function get_login(){
        $conn = sql_menager();

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($conn){
            $kw = "SELECT 1 FROM `users` WHERE `email` = '$email' AND `password` = '".base64_encode($password)."';";
        
            $result = mysqli_query($conn, $kw);

            if($result && mysqli_num_rows($result) > 0){
            setcookie("EMAIL", $email, time() + (86400 * 30), "/");
            header("Location: ".$_SERVER['REQUEST_URI']);
            exit();
            } else {
            return "Email lub hasło niepoprawne";
            }
        }
        mysqli_close($conn);
    }

    function get_content(){
        $conn = sql_menager();
        $id = $_POST['id'];

        if ($conn){
            $kw = "SELECT `id`, `title`, `subtitle`, `rozpoczecie`, `rozwiniecie`, `zakonczenie`, `id_category`, `img_1`, `img_2`, `date` FROM `news` WHERE `id`=".$id."";

            $news = mysqli_query($conn, $kw);

            if ($news) { 
                while ($row = mysqli_fetch_assoc($news)) {
                    $title = $row['title'];
                    echo file_get_contents("block_navbar.php");
                    $result = include("block_post_site.php");
                    
                }
                
            } else {
                echo "Błąd w zapytaniu SQL: " . mysqli_error($conn);
            }
            
        } 
        mysqli_close($conn);
    }

    function get_news_by_search($value, $sort){
        $conn = sql_menager();

        if($conn){
            $kw = "SELECT `news`.`id`, `news`.`title`, `news`.`subtitle`, `news`.`rozpoczecie`, `news`.`rozwiniecie`, `news`.`zakonczenie`, `news`.`id_category`, `news`.`img_1`, `news`.`img_2`, `news`.`date` FROM `news` WHERE `news`.`title` LIKE '%$value%' OR `news`.`subtitle` = '%$value%'";
            $result = "";
            if($sort == 0){
                $kw .= " ORDER BY `news`.`date` ASC";
            }

            $news = mysqli_query($conn, $kw);

            if ($news) {
                $counter = 0; 
                $result .= "<div class='news_box'>";
                while ($row = mysqli_fetch_assoc($news)) {
                    if ($counter % 9 == 0 && $counter != 0) { // Dodanie nowego news_box po 9 kafelkach
                        $result .= "</div><div class='ads_box'> 
                            <div class='reklama'>reklama</div>
                            <div class='reklama'>reklama</div>
                            <div class='reklama'>reklama</div>
                        </div><div class='news_box'>";
                    }
                    $result .= "<div class='tile' value='".$row['id']."'> 
                        <img src='".$row['img_1']."' alt='baner'>
                        <a class='news'>".$row['title']."</a>
                        </div>";
                    $counter++;
                }
                $result .= "</div><div class='ad_horizontal'> reklama </div></main>";
                return $result;
            } else {
                echo "Błąd w zapytaniu SQL: " . mysqli_error($conn);
            }
    
            mysqli_close($conn);
        } else {
            echo "Błąd w połączeniu z bazą danych";
        }

    }


    function get_news($end) {
        $conn = sql_menager(); 
        
        if ($conn) { 
            $kw = "SELECT `news`.`id`, `news`.`title`, `news`.`subtitle`, `news`.`rozpoczecie`, `news`.`rozwiniecie`, `news`.`zakonczenie`, `news`.`id_category`, `news`.`img_1`, `news`.`img_2`, `news`.`date` FROM `news`, `category` WHERE `news`.`id_category` = `category`.`id` AND `category`.`name` $end;";
            $result = "";
            
            $news = mysqli_query($conn, $kw);
    
            if ($news) { 
                $counter = 0; 
                $result .= "<div class='news_box'>"; 
                while ($row = mysqli_fetch_assoc($news)) {
                    if ($counter % 9 == 0 && $counter != 0) { 
                        $result .= "</div><div class='ads_box'> 
                            <div class='reklama'>reklama</div>
                            <div class='reklama'>reklama</div>
                            <div class='reklama'>reklama</div>
                        </div><div class='news_box'>";
                    }
                    $result .= "<div class='tile' value='".$row['id']."'> 
                        <img src='".$row['img_1']."' alt='baner'>
                        <a class='news'>".$row['title']."</a>
                        </div>";
                    $counter++;
                }
                $result .= "</div><div class='ad_horizontal'> reklama </div></main>"; 
                return $result;
            } else {
                echo "Błąd w zapytaniu SQL: " . mysqli_error($conn);
            }
    
            mysqli_close($conn);
        } else {
            echo "Błąd w połączeniu z bazą danych";
        }
    }
    

    

    function sql_menager(){
        $ip = "127.0.0.1";
        $user = "root";
        $psw = "";
        $base = "rafa24";

        $conn = mysqli_connect($ip, $user, $psw, $base);

        return $conn;
    }
    
    session_write_close();
?>
