<?php foreach($categories as $category): ?>
    <div>
        <h4><a href="<?=route('category.show', ['id' => $category['id']])?>"><?=$category['name']?></a></h4>
        <br>
        <p><?=$category['description']?></p>
        <p><?=$category['created_at']?></p>
    </div><hr/><br>
<?php endforeach; ?>