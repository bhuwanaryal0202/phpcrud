<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST))   {
$id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id']: NULL;
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
  $title = isset($_POST['title']) ? $_POST['title'] : '';
  $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');

  $stmt = $pdo->prepare('INSERT INTO  contacts VALUES (?, ?, ?, ?, ?, ?)');
  $stmt->execute([$id, $name, $email, $phone, $title, $created]);

  $msg = 'Created Sucessfully!';
}
?>
<?=template_header('Create')?>
<div class="content update">
        <h2>Create Contact</h2>
      <form action="create.php" method="post">
         <lable for="id">ID</lable>
         <lable for="name">Name</lable>
         <input type="text" name="id" placeholder="26" value="auto" id="id">
         <input type="text" name="name" placeholder="john Doe" id="name">
         <lable for="emali">Emali</lable>
         <lable for="phone">Phone</lable>
         <input type="text" name="email" placeholder="johndoe@example.com" id="email">
         <input type="text" name="phone" placeholder="2025550143" id="phone">
         <lable for="title">Title</lable>
         <lable for="created">Created</lable>
         <input type="text" name="title" placeholder="Employee" id="title">
         <input type="detetime-local" name="created" value="<?=date('Y-m-d\TH:1')?>" id="created">
         <input type="submit" value="create">
      </form>
      <?php if ($msg): ?>
      <p><?=$msg?></p>
      <?php endif; ?>
</div>

      <?=template_footer()?>