<h2><?=$category['name']?></h2>
    <div>
        <h4><a href="<?=route('news.index')?>"><?=$category['name']?></a></h4>
        <br>
        <p><?=$category['description']?></p>
        <p><?=$category['created_at']?></p>
    </div><hr/><br>