<!DOCTYPE html>
<html>
        <?php
        $backgroundImg = "./img/sea.jpg";
        
        if(!empty($_GET['keyword']) && empty($_GET['category']))
        {
            include 'api/pixabayAPI.php';
            if(isset($_GET['layout'])){
            $imageURLs = getImageURLs($_GET['keyword'], $orientation=$_GET['layout']);
            }
            else
            {
                $imageURLs = getImageURLs($_GET['keyword']);
            }
            $backgroundImg = $imageURLs[array_rand($imageURLs)];
        }
        else if(empty($_GET['keyword']) && !empty($_GET['category']))
        {
            include 'api/pixabayAPI.php';
            if(isset($_GET['layout'])){
            $imageURLs = getImageURLs($_GET['category'], $orientation=$_GET['layout']);
            }
            else
            {
                $imageURLs = getImageURLs($_GET['category']);
            }
            $backgroundImg = $imageURLs[array_rand($imageURLs)];
        }
        
        ?>
    <head>
        <title>Image Carousel</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style> @import url("css/styles.css");</style>
        <style>
            body{
                background-image:url('<?=$backgroundImg ?>');
                background-repeat:no-repeat;
                background-size:cover;
                background-attachment: fixed;
                background-position: center;
            }
        </style>
    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <?php
            if(!isset($imageURLs))
            {
                echo "<h2> Type a keyword to display a sliceshow <br/> with random images from Pixabay </h2>";
            }
            else{
                
?>

        <div id="carousel-example-generic" class ="carousel slide" data-ride="carousel">
            
            <ol class="carousel-indicators">
                <?php
                for($i = 0; $i < 5; $i++)
                {
                    echo "<li data-target='carousel-example-generic' data-slide-to='$i'";
                    echo ($i==0)?" class='active'": "";
                    echo "></li>";
                }
                ?>
            </ol>
            
            <div class="carousel-inner" role="listbox">
            <?php
                for($i = 0; $i < 5; $i++)
                {
                    do{
                        $randomNumber = rand(0,count($imageURLs));
                    }
                    while(!isset($imageURLs[$randomNumber]));
                    
                    echo '<div class="item ';
                    echo ($i == 0)?"active": "";
                    echo '">';
                    echo '<img src="'.$imageURLs[$randomNumber].'">';
                    echo '</div>';
                    unset($imageURLs[$randomNumber]);
                }
            ?>
            </div>
            
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            
        </div>       
        <?php
            }
        ?>
        
        <form>
            <input type="text" name="keyword" placeholder="Keyword">
            <input type="submit" value="Submit">
            <br><br>
            <select id="dropdown" name="category">
            <option value="">Select...</option>
            <option value="sky">sky</option>
            <option value="bird">bird</option>
            <option value="dog">dog</option>
            <option value="otters">otters</option>
            <option value="forest">forest</option>
            </select>

            <br><br>
            <input type="radio" name="layout" value="Horizontal">Horizontal
            <input type="radio" name="layout" value="Vertical">Vertical
        </form>

    </body>
</html>
