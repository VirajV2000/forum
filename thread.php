<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss-Coding forum</title>
    <style>
        #ques{
            min-height: 433px;
        }
        </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <?php include 'partials/_header.php';?>
    <?php include 'partials/_dbconnect.php';?>
    <?php
      $id=$_GET['threadid'];
      $sql="Select * from thread where thread_id=$id";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
      $title=$row['thread_title'];
      $desc=$row['thread_description'];  

    }
    
    ?>
    <!-- to insert a comment into db -->
    <?php
     $method= $_SERVER['REQUEST_METHOD'];
     //insert into comment db
     $showAlert=false;
     if($method=='POST'){
        $comment=$_POST['comment'];
        $sno=$_POST['sno'];
        $sql="INSERT INTO `comment` ( `comment_by`, `comment_content`, `thread_id`, `comment_time`) VALUES ( '$sno', '$comment', '$id', current_timestamp());";
        $result=mysqli_query($conn,$sql);
        $showAlert=true;
        if($showAlert)
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your comment has been added!. 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
     }
    ?>

    <div class="container">
        <div class="jumbotron bg-secondary my-3 py-2 px-2">
            <h1 class="display-4"><?php echo $title; ?> </h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge.Keep it friendly.
Be courteous and respectful. Appreciate that others may have an opinion different from yours.
Stay on topic. ...
Share your knowledge.</p>
            <p class="lead">
                <p>Posted by :<b>Viraj</b></p>
            </p>
        </div>
    </div>
    
    <?php
    if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']=="true"){
       // echo $_SESSION['sno'];
        echo '<div class="container">
        <h1 class="py-2">Post a comment</h1>
        <form action="'. $_SERVER['REQUEST_URI'].'" method="post">

            <div class="form-group-3">
                <label for="description" class="form-label">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" style="height: 100px"></textarea>
                <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            </div>

            <button type="submit" class="btn btn-success my-2">Submit</button>
        </form>
    </div>';
    }
    else{
        echo '<div class="container">
        <h1 class="py-2">Post a comment</h1>
                    <p class="lead">You are not logged in .Please login to be able to post a comments.</p>
               </div>';
    }
     
    ?>

    <div class="container" id="ques">
        <h1 class="py-3">Discussions</h1>
        <?php
      $id=$_GET['threadid'];
      $sql="Select * from comment where thread_id=$id";
      $result=mysqli_query($conn,$sql);
      $noResult=true;
      while($row=mysqli_fetch_assoc($result)){
    $noResult=false;
      $id=$row['comment_id'];
      $content= $row['comment_content'];
      $comment_time=$row['comment_time'];
      $thread_user_id=$row['comment_by'];
      $sql2="select user_email from users where sno='$thread_user_id'";      
      $result2=mysqli_query($conn,$sql2);
      $row2=mysqli_fetch_assoc($result2);

        echo '<div class="media d-flex my-3" >
            <img class="mr-3" src="img/userdefault.png" alt="Generic placeholder image" width="64px" height="34px">
            <div class="media-body">
               <p class="fw-bold my-0">'.$row2['user_email'].' at '.$comment_time.'</p>
                '.$content.'
            </div>
        </div>';
    }
    if($noResult)
    {
        echo '<div class="jumbotron jumbotron-fluid bg-secondary py-3">
        <div class="container">
          <p class="display-4">No comments found</p>
          <p class="lead">Be the first one to ask .</p>
        </div>
      </div>';
    }
    ?>
      <!-- Remove later,Just to check the alignment -->
        <!-- <div class="media d-flex my-3">
            <img class="mr-3" src="img/userdefault.png" alt="Generic placeholder image" width="64px" height="34px">
            <div class="media-body">
                <h5 class="mt-0">Media heading</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
                odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div> -->
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