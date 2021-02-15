
<h1 style="font-weight: bold; font-size: large">Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Post');
?>

<!-- <form action="/posts/add" method="Post" id="post">
  <div class="form-group">
    <label for="title">Title</label>
    <label style="display: none">We need to use name attributes for all the inputs</label>
    <input type="title" name="title" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea type="body" name="body" class="form-control" id="body"></textarea>
  </div>
  <button type="submit" name="Save Post" class="btn btn-default">Save Post</button>
</form> -->