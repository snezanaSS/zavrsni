<?php include('db.php');?>

<?php

$sqlComments = "SELECT posts.id, comments.id, comments.author, comments.post_id, comments.text
FROM posts JOIN comments ON comments.post_id = posts.id WHERE posts.id = {$_GET['post_id']}";
$statementComments = $connection->prepare($sqlComments);

$statementComments->execute();

$statementComments->setFetchMode(PDO::FETCH_ASSOC);

$comments = $statementComments->fetchAll();
?>
<button class="btn btn-default" id="button" onclick="myFunction()">Hide Comments</button>



<hr>
<ul id='hide'>
<?php foreach($comments as $comment){ ;?>
    <li>
        <h6><?php echo($comment['author']); ?></h6>
        <p><?php echo($comment['text']); ?></p>
    </li>
<hr>
<?php } ;?>
</ul>

<script>
    var comments = document.getElementById('hide')
    var button = document.getElementById('button')
    function myFunction(){
        
        if(button.innerHTML == "Show Comments"){
            comments.classList.remove("hide")
            button.innerHTML = "Hide Comments"
        } else{
            comments.className = "hide"
            button.innerHTML = "Show Comments"
        }
    }
</script>