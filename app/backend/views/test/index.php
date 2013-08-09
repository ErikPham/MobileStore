<?php
print_r($this->testList);
?>
<table border="1">
    <?php foreach($this->testList as $list) :?>
    <tr>
        <td><?php echo $list['name']; ?></td>
        <td><?php echo $list['age']; ?></td>
        <td>
            <a href="test/edit/<?php echo $list['id']; ?>">Edit</a>
            <a href="test/delete/<?php echo $list['id']; ?>">Delete</a>

        </td>
    </tr>
    
    <?php endforeach; ?>
</table>