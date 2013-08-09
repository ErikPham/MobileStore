<?php

print_r($this->data);
?>

<form method="POST" action="<?php echo URL. 'backend/test/saveEdit'?>">
    <table>
        <tr>
            <td>Tên</td>
            <td><input name="name" value="<?php echo $this->data['name']; ?>"/>
                <input type="hidden" name="id" value="<?php echo $this->data['id']; ?>"/>
            </td>
        </tr>
        
        <tr>
            <td>Tuổi</td>
            <td><input name="age" value="<?php echo $this->data['age']; ?>"/></td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" value="Thêm"/></td>
        </tr>
    </table>
</form>