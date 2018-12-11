<?php
// If no search is done, redirect to home page
if(!isset($_POST['sanahaku'])){
    header('location: index.php');
}
require_once("includes/functions.php");
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Vantaan Duunihaku</title>
</head>
<body>
<div class="jumbotron text-center text-white rounded-0" id="jumbotron">
    <h1 class="display-4" style="font-family: vantaa;">Vantaan Duunihaku</h1>
</div>

<div class="container-fluid border border ml-1 mr-1">
    <div class="row">
        <div class="col-md-3" style="background: rgb(249,246,242);min-height: 300px;" id="searchFormDiv">
            <h4 class="font-weight-light text-dark text-center">Haku</h4><hr>
            <?php
            require_once('includes/searchForm.php');
            ?>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <div class="col-md-9 pl-1 pr-1" id="jobListings" style="overflow: scroll">
            <table class="table table-striped border">
                <tbody>
                <?php
                    require_once('includes/jobListings.php');
                ?>

                </tbody>
            </table>
            <button type="button" class="btn btn-success fixed-bottom" style="display: none" id="top">Back to top</button>
        </div>
    </div>
</div>
</div>

<script
        src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

<script src="js/main.js"></script>
</body>
</html>