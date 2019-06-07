<html>
<head>
    <title>Dab Lite Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
    <table>
        <?php 
            $servername = 'localhost:8889';
            $username = 'root';
            $password = 'password';
            $db = 'dab_lite_practice_db';

            $button = $_GET [ 'submit' ]; 
            $search = $_GET [ 'k' ];
            
        //ADVERT CHECK (6/19)
        // needs more parameters 
            //would take: img_url as the background img for li, 
            //would take: comp_des as a p, but in a div with title
            //would take: 
        function displayAd($img, $des, $web, $title, $cat, $contact) {
            echo "
            <li class='list-group-item' >
                <div class='row'>
                    <div style='background-image: url($img)' class='col-6'>
                        <a style='background-color: white' href='$web' target='_blank'>$title</a>
                        <p style='background-color: white'>$des</p>
                    </div>
                    <div class='col-6>
                        <a href='$cat' target='_blank'>
                            <img style='width: 50px' alt='$title Online Catalog' src='https://media.istockphoto.com/vectors/open-magazine-line-icon-vector-id847207226?k=6&m=847207226&s=612x612&w=0&h=sfbzXif1O9DSNpfuwNj72LOlIOaw4u3sUY3MTgd8GP0=' />
                        </a>
                        <a href='$contact' target='_blank'>
                            <img style='width: 50px' alt='$title Contact page' src='../images/contact-icon' />
                        </a>
                "; 
        }

        // x value check function
            function dispFilterLogo($str) {
                switch($str) {
                    case "cad":
                        echo "<img style='width: 50px' alt='cad' src='../images/cad' />";
                        break;
                    case "bim":
                        echo "<img style='width: 50px' alt='bim' src='../images/bim' />";
                        break;
                    case "leed":
                        echo "<img style='width: 50px' alt='leed' src='../images/leedv4' />";
                        break;
                    case "lbc":
                        echo "<img style='width: 50px' alt='lbc' src='../images/lbc' />";
                        break;
                    case "c2c":
                        echo "<img style='width: 50px' alt='c2c' src='../images/c2c' />";
                        break;
                    case "epd":
                        echo "<img style='width: 50px' alt='epd' src='../images/epd' />";
                        break;
                    case "hpd":
                        echo "<img style='width: 50px' alt='hpd' src='../images/hpd' />";
                        break;
                    default:
                        echo "<h3>X</h3>";
                }
            }
            
        //FILTERS (CHECK)
            $cadCheck = $_GET [ 'cad' ];
            $bimCheck = $_GET [ 'bim' ];
            $leedCheck = $_GET [ 'leed' ];
            $lbcCheck = $_GET [ 'lbc' ];
            $c2cCheck = $_GET [ 'c2c' ];
            $epdCheck = $_GET [ 'epd' ];
            $hpdCheck = $_GET [ 'hpd' ];
            
            $filters = array('cad'=>$cadCheck, 'bim'=>$bimCheck, 'leed'=>$leedCheck, 'epd'=>$epdCheck, 'hpd'=>$hpdCheck, 'lbc'=>$lbcCheck, 'c2c'=>$c2cCheck);
            // if the filter is selected the value becomes the name of the filter
                // ie if Cad is checked the value for $cadCheck = cad
            // echo " CAD = $cadCheck, BIM = $bimCheck, LEED = $leedCheck, EPD = $epdCheck, HPD = $hpdCheck, LBC = $lbcCheck, C2C = $c2cCheck";

            if( !$button ) 
                echo "you didn't submit a keyword"; 
            else { 
                if( strlen( $search ) <= 1 ) 
                    echo "Search term too short"; 
                    else { 
                        echo "You searched for <b> $search </b> <hr size='1' > </ br > ";

                        $conn = new mysqli($servername, $username, $password, $db);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        } 
                        echo "Connected successfully </ br > ";
                        
                        mysqli_select_db($conn, $db);

                        $search_exploded = explode ( " ", $search ); 
                        $x = 0; 
                        foreach( $search_exploded as $search_each ) {
                            $x++; 
                            $construct = ""; 
                            if( $x == 1 ) 
                                $construct .="keywords LIKE '%$search_each%'"; 
                            else 
                                $construct .="AND keywords LIKE '%$search_each%'"; 
                        }
                        
                        $query = " SELECT * FROM manufacturers WHERE $construct "; 

                        foreach($filters as $x => $x_value) {
                            if($x_value == '') {
                    
                            } else {
                                echo "$x was clicked";
                                echo "<br />";
                                $query.= " AND $x != 'NULL'";
                            }    
                        } 

                        $run = mysqli_query($conn, $query); 
                        
                        $foundnum = mysqli_num_rows($run); 
                        
                        if ($foundnum == 0) 
                            echo "Sorry, there are no matching result for <b> $search </b>. 
                            </br> 
                            </br> 1. Try more general words. for example: If you want to search 'how to create a website' then use general keyword like 'create' 'website' 
                            </br> 2. Try different words with similar meaning 
                            </br> 3. Please check your spelling"; 
                        else { 
                            echo "
                            $foundnum results found !<p>
                            <table class='table'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th scope='col'>Division</th>
                                        <th scope='col'>Manufacturer</th>
                                        <th scope='col'>Description</th>
                                        <th scope='col'>Online Catalog</th>
                                        <th scope='col'>Contact</th>
                                        <th scope='col'>CAD</th>
                                        <th scope='col'>BIM</th>
                                        <th scope='col'>LEED V4</th>
                                        <th scope='col'>LBC</th>
                                        <th scope='col'>C2C</th>
                                        <th scope='col'>HPD</th>
                                        <th scope='col'>EPD</th>
                                    </tr>
                                </thead>
                            "; 
                            while( $row = mysqli_fetch_assoc( $run ) ) {
                            //Normal
                                $division = $row ['division'];
                                $title = $row ['man_title']; 
                                $web = $row ['web']; 
                                $cat = $row ['cat'];
                                $contact = $row ['contact'];
                                $description = $row['keywords'];
                                $cad = $row ['cad']; 
                                $bim = $row ['bim'];
                                $leed = $row ['leed'];  
                                $lbc = $row ['lbc']; 
                                $c2c = $row ['c2c']; 
                                $hpd = $row ['hpd']; 
                                $epd = $row ['epd']; 
                            //Advertisement
                                $advert = $row['advert'];
                                $img_url = $row['img_url'];
                                $comp_des = $row['comp_des'];

                                $description = str_replace('|', ' ', $description);
                                $shortDes = wordwrap($description, 25, "<br>\n");
                                $certifications = array('cad'=>$cad, 'bim'=>$bim, 'leed'=>$leed, 'lbc'=>$lbc, 'c2c'=>$c2c, 'epd'=>$epd, 'hpd'=>$hpd);
                                
                                // if($advert == "1") {
                                //     displayAd($img_url, $comp_des, $web, $title, $cat, $contact);
                                // }
                           
                                echo "
                                    <tr>
                                        <td>$division</td>
                                        <td>
                                            <a style='background-color: white' href='$web' target='_blank'>$title</a>
                                        </td>
                                        <td style='font-size:small'>$shortDes</td>
                                        <td>
                                            <a href='$cat' target='_blank'>
                                                <img style='width: 50px' alt='$title Online Catalog' src='https://media.istockphoto.com/vectors/open-magazine-line-icon-vector-id847207226?k=6&m=847207226&s=612x612&w=0&h=sfbzXif1O9DSNpfuwNj72LOlIOaw4u3sUY3MTgd8GP0=' />
                                            </a>
                                        </td>
                                        <td>
                                            <a href='$contact' target='_blank'>
                                                <img style='width: 50px' alt='$title Contact page' src='../images/contact-icon' />
                                            </a>
                                        </td>
                                ";
                                foreach($certifications as $x => $x_value) {
                                    echo "<td class='$x'>";
                                    if($x_value !== NULL) {
                                        echo "<a href='$x_value' target='_blank'>";
                                        dispFilterLogo($x); //just the img
                                        echo "</a>";
                                    }
                                    else {
                                        echo "<h3>X</h3>";
                                    }
                                    echo "</td>";
                                } 
                            } 
                        } 
                    } 
                } 
            ?> 
    </table>           
</body>
</html>