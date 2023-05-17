<?php
    include('connect.php');
    $id=$_GET['id'];
    $result = $db->prepare("SELECT * FROM contact WHERE id= ?");
    $result->bindParam(1, $id);
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
?>
<form action="edit.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
Nom<br>
<input type="text" name="nom" value="<?php echo $row['nom']; ?>" /><br>
Email<br>
<input type="text" name="email" value="<?php echo $row['email']; ?>" /><br>
Sujet<br>
<input type="text" name="sujet" value="<?php echo $row['sujet']; ?>" /><br>
Message<br>
<textarea name="msg" cols="33" rows="10" /><?php echo $row['message']; ?></textarea><br>
<input type="submit" value="Enregister" />
</form>
<?php
     }
?>