<?php
    //start session
    session_start();
    if(isset($_POST['siteName'])){
        //echo 'submitted';
        //check whether the session is set or not
        if(isset($_SESSION['bookmarks'])){
            // if session is already set then add the site name with url to the session
            $_SESSION['bookmarks'][$_POST['siteName']] = $_POST['url'];
        }else{
            // if session is not set initialise an array
            $_SESSION['bookmarks'] = Array($_POST['siteName']=>$_POST['url']);
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bookmarker</title>
        <link rel='stylesheet' href='https://bootswatch.com/4/cyborg/bootstrap.min.css'>
    </head>
    <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bookmarker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown03">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search">
            </form>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label>Website Name</label>
                        <input type="text" class="form-control" name="siteName">
                    </div>
                    <div class="form-group">
                        <label>Url</label>
                        <input type="text" class="form-control" name="url">
                    </div>
                    <input type="submit" value="Submit" class="btn btn-light">
                </form>

            </div>
            <div class="col-md-5">
                <?php if(isset($_SESSION['bookmarks'])): ?>
                <ul class="list-group">
                    <?php foreach($_SESSION['bookmarks'] as $siteName=>$url): ?>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>"><?php echo $siteName; ?></a>
                        </li> 
                    <?php endforeach; ?>                   
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </body>
</html>
