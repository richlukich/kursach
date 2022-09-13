<?php
session_start();
$connect=mysqli_connect('localhost','root','root','kursach');
$result= mysqli_query($connect," SELECT * FROM `reviews` ORDER BY `reviews`.`added_on` DESC");
?>
<?php if ($_SESSION['txt3']){ ?>
    <script type="text/javascript">
        alert ('Статья успешно сохранена')
    </script>
    <?php } 
    unset ($_SESSION['txt3']); ?> 
    
<?php if ($_SESSION['txt2']){ ?>
    <script type="text/javascript">
        alert ('Статья успешно удалена!')
    </script>
    <?php } 
    unset ($_SESSION['txt2']); ?>
<head>
<meta charset="UTF-8">
<title> Сайт ресторанных критиков </title>
<link rel="stylesheet" type="text/css" href="css/moderation.css">
</head>

<body>
<div class="reviews">
    
    <?php
        while ($reviews=mysqli_fetch_assoc($result))
        {
    ?>      
            <form action="article1.php" target="_blank" method="post" enctype="multipart/form-data">
                <div class="review">
                    <div class="article">
                        <input type="hidden" value= "<?php echo $reviews['article']; ?>" name="article" >
                        <?php echo $reviews['article']; ?>  
                    </div>

                    <div class="date">
                        <?php echo $reviews['added_on']; ?>
                    </div>

                    <div class="text">
                        <?php echo  $reviews['review']; ?>
                    </div>

                    <button class="button"> Читать далее </button>
                </div>
            </form>

    <?php
        }
    ?>
</div>
</body>