<?php
    mysqli_select_db($conecta,'n2') or
    print(mysqli_error());
    
    $sql = 'SELECT  nome FROM `tb_medico`';    
    
    $result=mysqli_query($conecta,$sql);
?>