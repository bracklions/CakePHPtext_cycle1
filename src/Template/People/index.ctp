<p>This is People table records.</p>
<?=$this->Form->create(null,
    ['type'=>'post',
     'url'=>['controller'=>'People',
             'action'=>'index']]) ?>
<div>find</div>
<div><?=$this->Form->text('People.find') ?></div>
<div><?=$this->Form->submit('検索') ?></div>
<?=$this->Form->end() ?>

<hr>
<table>
    <thead><tr>
        <th>id</th>
        <th>name</th>
        <th>mail</th>
        <th>age</th>
        <th></th>
    </thead></tr>
<?php foreach($data->toArray() as $obj): ?>
<tr>
    <td><?= h($obj->id) ?></td>
    <td><a href="<?=$this->Url->build(['controller'=>'People',
                                       'action'=>'edit']); ?>?id=<?=$obj->id ?>"><?= h($obj->name) ?></a></td>
    <td><?= h($obj->mail) ?></td>
    <td><?= h($obj->age) ?></td>
    <td><a href="<?=$this->Url->build(['controller'=>'People',
                                       'action'=>'delete']); ?>?id=<?=$obj->id ?>">delete</a></td>
</tr>
<?php endforeach; ?>
</table>