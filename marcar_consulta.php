<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Klinik</title>
        <link rel="shortcut icon" href="img/favicon.png">
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include 'nav.php'; ?>
        
        <!-- Contact-->
        <section class="page-section marcar_consulta" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Marcar Consulta</h2>
                </div>
                <form id="contactForm"  action="php/insere_consulta.php" method="post">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        
                        <div class="col-md-4">

                            <div class="form-group">
                                <input class="form-control" id="cpf_paciente" name="cpf_paciente"  placeholder="CPF do Paciente *" required="required" data-validation-required-message="Insira o CPF do paciente." /> 
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="crm" name="crm" type="" placeholder="CRM *" required="required" data-validation-required-message="Insira o CRM."> 
                                <option>Médico</option>
                                <?php 
                                    include 'php/conecta.php';
                                    mysqli_select_db($conecta,"n2") or
                                    print(mysqli_error());
                                    
                                    
                                    $sql2 = "SELECT * FROM `tb_medico`";    
                                    
                                    $result2=mysqli_query($conecta,$sql2);
                                    
                                    
                                    
                                    while($consulta2=mysqli_fetch_array($result2))
                                    {
                                        echo "<option value='$consulta2[crm]'>$consulta2[nome_m] (CRM: $consulta2[crm])</option>";
                                    }
                                
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="data" name="data_consulta" type="date" placeholder="Data da consulta *" required="required" data-validation-required-message="Insira a data da consulta." /> 
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="horario" name="horario" type="time" placeholder="Horario *" required="required" data-validation-required-message="Insira o horario da consulta." /> 
                            </div>
                            <div class="text-center">
                            <div id="success"></div>
                                <button class="btn btn-primary btn-xl text-uppercase" type="submit">cadastrar</button>
                            </div>                            
                        </div>    
                    </div>   
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">APS - Desenvolvimento de Software para Web</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a><a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right"><a class="mr-3" href="#!">Universidade Anhembi Morumbi</a></div>
                </div>
            </div>
        </footer>


        <!-- Validação CEP -->
        <script type='text/javascript' >
        
            function limpa_formulário_cep() {
                    //Limpa valores do formulário de cep.
                    document.getElementById('logradouro').value=('');
                    document.getElementById('bairro').value=('');
                    document.getElementById('cidade').value=('');
                    document.getElementById('estado').value=('');
                
            }

            function meu_callback(conteudo) {
                if (!('erro' in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('logradouro').value=(conteudo.logradouro);
                    document.getElementById('bairro').value=(conteudo.bairro);
                    document.getElementById('cidade').value=(conteudo.localidade);
                    document.getElementById('estado').value=(conteudo.uf);
                    
                } //end if.
                else {
                    //CEP não Encontrado.
                    limpa_formulário_cep();
                    alert('CEP não encontrado.');
                }
            }
                
            function pesquisacep(valor) {

                //Nova variável 'cep' somente com dígitos.
                var cep = valor.replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != '') {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com '...' enquanto consulta webservice.
                        document.getElementById('logradouro').value='...';
                        document.getElementById('bairro').value='...';
                        document.getElementById('cidade').value='...';
                        document.getElementById('estado').value='...';
                        

                        //Cria um elemento javascript.
                        var script = document.createElement('script');

                        //Sincroniza com o callback.
                        script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);

                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert('Formato de CEP inválido.');
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            };

        </script>

        <!-- Validação CPF-->
        <script>
            function verificarCPF(c){
                var i;
                s = c;
                var c = s.substr(0,9);
                var dv = s.substr(9,2);
                var d1 = 0;
                var v = false;
            
                for (i = 0; i < 9; i++){
                    d1 += c.charAt(i)*(10-i);
                }
                if (d1 == 0){
                    alert('CPF Inválido')
                    v = true;
                    return false;
                }
                d1 = 11 - (d1 % 11);
                if (d1 > 9) d1 = 0;
                if (dv.charAt(0) != d1){
                    alert('CPF Inválido')
                    v = true;
                    return false;
                }
            
                d1 *= 2;
                for (i = 0; i < 9; i++){
                    d1 += c.charAt(i)*(11-i);
                }
                d1 = 11 - (d1 % 11);
                if (d1 > 9) d1 = 0;
                if (dv.charAt(1) != d1){
                    alert('CPF Inválido')
                    v = true;
                    return false;
                }
                if (!v) {
                    alert(' CPF Válido')
                }
            }
        </script>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
