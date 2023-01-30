<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss-Coding forum</title>
    <style>
    #maincontainer {
        min-height: 80vh;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <!-- search results  -->


    <div class="container my-3" id="maincontainer">
        <h1>Search results for <em>"<?php echo $_GET['search'];?>"</em></h1>
        <div class="re
        <?php
            $query=$_GET['search'];
            $noResult=true;
            $sql="SELECT * FROM `thread` WHERE MATCH (thread_title,thread_description) against('$query')";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                $noResult=false;
                $title=$row['thread_title'];
                $desc=$row['thread_description'];
                $thread_id=$row['thread_id'];
                $url="thread.php?threadid=".$thread_id;
                echo '<div class="results"><h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
                <p>'.$desc.'</p>
            </div>';
           }
           if($noResult)
           {
            echo '<div class=" jumbotron jumbotron-fluid  py-3">
            <div class="container bg-secondary py-3">
              <p class="display-4">No search found</p>
              <p class="lead">Suggestions:

             <li> Make sure that all words are spelled correctly.</li>
             <li> Try different keywords.</li>
             <li>Try more general keywords.</li>
             <li>Try fewer keywords.</li>
               .</p>
            </div>
          </div>';
           }
  ?>
    </div>


    <?php include 'partials/_footer.php';?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>

</html>