<form method="POST" action="<?php echo URL. 'backend/test/saveAdd'?>">
    <table>
        <tr>
            <td>Tên</td>
            <td><input name="name" /></td>
        </tr>
        
        <tr>
            <td>Tuổi</td>
            <td><input name="age"/></td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" value="Thêm"/></td>
        </tr>
    </table>
</form>