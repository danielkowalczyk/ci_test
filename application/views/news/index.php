<a href="<?php echo base_url(); ?>news/create">Dodaj newsa</a><br>
    
<?php foreach ( $news as $news_item ): ?>
    <h2><?php echo $news_item['title'] ?></h2>
    <div id="main">
        <?php echo $news_item['text'] ?>
    </div>
    <p><a href="<?php echo base_url().'news/'.$news_item['slug'] ?>">View article</a></p>
<?php endforeach; ?>
