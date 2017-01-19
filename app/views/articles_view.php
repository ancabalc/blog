<h1>Page Articles</h1>

<div>
    Articles List:
    <?php for($i=0; $i<count($articles); $i++) {?>
        <div>
            <div><?php echo $articles[$i]["title"]; ?></div>
            <div><?php echo $articles[$i]["body"]; ?></div>
        </div>
    <?php }?>
</div>