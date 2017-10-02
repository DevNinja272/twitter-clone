<html>
<head>
    <link rel="stylesheet" type="text/css" href="twitter_style.css">
    <title>Twitter Clone</title>
</head>
<body>

<?php

if (isset($_POST['submit'])) {

    $data_missing = array();

    if (empty($_POST['twitter_post'])) {
        // Adds name to array
        $data_missing[] = 'Post';
    } else {
        // Trim white space from the name and store the name
        $post = trim($_POST['twitter_post']);
    }

    if (empty($data_missing)) {

        require_once('../mysqli_connect.php');

        $query = "INSERT INTO messages (post) VALUES (?)";
        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($stmt, "s", $post);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if ($affected_rows == 1) {
            echo 'Post posted';
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        } else {
            echo 'Error Occurred<br />';
            echo mysqli_error();
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }

    } else {
        echo 'You need to enter the following data<br />';
        foreach ($data_missing as $missing) {
            echo "$missing<br />";
        }
    }
}
?>

<nav class="topnav" id="myTopnav">
    <a href="#home">Home</a>
    <a href="#moments">Moments</a>
    <a href="#notifications">Notifications</a>
    <a href="#about">Messages</a>
</nav>

<div class="wrapper">

    <div class="profile">Profile Picture and Info</div>
    <div class="trends">Trends for you</div>


    <div class="tweet">
        <div class="my_tweet">
            <form action="twitterClone.php" method="post">
                <input type="text" name="twitter_post" maxlength="140" placeholder="What's happening?" value=""/>
                <p>
                    <input type="submit" name="submit" value="Send"/>
                </p>
            </form>
        </div>
        <br>
    </div>
    <div class="past_tweets">
        <?php
        // Get a connection for the database
        require_once('../mysqli_connect.php');

        // Create a query for the database
        $query = "SELECT post FROM messages";

        // Get a response from the database by sending the connection
        // and the query
        $response = @mysqli_query($dbc, $query);

        // If the query executed properly proceed
        if ($response) {

            // mysqli_fetch_array will return a row of data from the query
            // until no further data is available
            $pastTweetArr = [];
            while ($row = mysqli_fetch_array($response)) {
                array_push($pastTweetArr, $row['post']);
            }

            // The ordering of the results will be newest tweet at the top
            $length = count($pastTweetArr);
            for($i = $length - 1; $i >= 0 ; $i--)
            {
                if($i != $length - 1) { echo '<hr>'; }
                echo '<p>Tweet: ' . $pastTweetArr[$i] . '</p>';
            }

            echo '<br>';
        } else {
            echo "Couldn't issue database query<br />";
            echo mysqli_error($dbc);
        }

        // Close connection to the database
        mysqli_close($dbc);
        ?>
    </div>

    <div class="follow_suggestions">Who to follow</div>
    <footer class="footer">Twitter Footer</footer>



</div>


</body>
</html>
