<!DOCTYPE html>
<html lang='pt-br'>
<?php
include 'conecta.php';
include 'verifica.php';

session_start();
if (isset($_SESSION['nome']))
        {
            include 'header.php';
echo"
<div id='page-wrapper'>
            <div class='row'>
                <div class='col-lg-12'>
                    <h1 class='page-header'>Registro da Consulta</h1>
                </div>";
   
    
    $id = $_GET['id'];
    
    mysqli_select_db($conecta,"n2") or
    print(mysqli_error());
    
    //echo ;
    
    $sql = "SELECT * FROM `tb_consulta`
        LEFT JOIN tb_paciente ON tb_paciente.cpf = tb_consulta.cpf_paciente
        LEFT JOIN tb_medico ON tb_medico.crm = tb_consulta.crm
        WHERE id = $id";      
    
    $result=mysqli_query($conecta,$sql);
    
    echo "<form>";
    
    while($consulta=mysqli_fetch_array($result))
    {
                                   

        echo "
                                       
                                        <div class='form-group'>
                                            <label>Paciente</label>
                                            <input type='' class='form-control' name='nome' value='$consulta[nome]' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>CPF do Paciente</label>
                                            <input type='' class='form-control' name='cpf_paciente' value='$consulta[cpf_paciente]' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>Médico</label>
                                            <input type='' class='form-control' name='cpf_paciente' value='$consulta[nome_m] (CRM: $consulta[crm])' disabled>
                                        </div>

                                        <div class='form-group'>
                                            <label>Especialidade</label>
                                            <input type='' class='form-control' name='cpf_paciente' value='$consulta[especialidade]' disabled>
                                        </div>

                                        <div class='form-group input-group'>
                                            <label>Data</label><p>     
                                            <input name='data_consulta' id='data_consulta' maxlength='10' required='' type='date' class='form-control' value='$consulta[data_consulta]' disabled>
                                        </div>

                                        <div class='form-group'>                                            
                                             <label>Horario</label> 
                                             <input class='form-control' name='hora' value='$consulta[horario]' type='time' maxlength='14' disabled>                                            
                                        </div>
                                            
                                        <div class='form-group'>                                            
                                             <label>Diagnostico</label> 
                                             <textarea class='form-control' name='diagnostico' maxlength='500' disabled>$consulta[diagnostico]</textarea> 
                                                                                   
                                        </div>

                                        <div class='form-group'>                                            
                                             <label>Tratamento</label> 
                                             <textarea class='form-control' name='tratamento' maxlength='500' disabled>$consulta[tratamento]</textarea>                                            
                                        </div>

                                        <div class='form-group'>                                            
                                             <label>Exames</label> 
                                             <textarea class='form-control' name='exames' maxlength='500' disabled>$consulta[exames]</textarea>                                           
                                        </div>
                                            
                                    
                                        
                                        <a class='btn btn-primary' href='index.php'>Voltar</a> ";
                                        
      
      
    }
   
    echo "</form>";
    
    mysqli_free_result($result);
    
    mysqli_query($conecta,$sql); 
    
    //encerra a conex�o.
    mysqli_close($conecta);
    echo "
                                
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                 </div>
    <!-- jQuery -->
    <script src='../../vendor/jquery/jquery.min.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='../../vendor/bootstrap/js/bootstrap.min.js'></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src='../../vendor/metisMenu/metisMenu.min.js'></script>

    <!-- Morris Charts JavaScript -->
    <script src='../../vendor/raphael/raphael.min.js'></script>
    <script src='../../vendor/morrisjs/morris.min.js'></script>
    <script src='../../data/morris-data.js'></script>

    <!-- Custom Theme JavaScript -->
    <script src='../../dist/js/sb-admin-2.js'></script>
                </body>";}
                else{
    header('location:../../../../produtos.php');
}
?>
                </html>