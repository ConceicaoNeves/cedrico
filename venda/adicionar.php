<?php
//Header
include_once '../venda/includes/header2.php';
include "../venda/php_action/connect.php";
include 'includes/message.php';

?> 
<body style="background-color: #8b7293">
<body background="../atestes.png"> 
<br><br><br>
<div class="container">
    <div class ="col s12 m6 push-m3">
    <div class="card-panel purple lighten-5">
    <a href="#modal" class ="modal-trigger"><i class ="material-icons">arrow_back_ios</i></a>        
            <!-- Modal Structure -->
                <div id="modal" class="modal">
                    <div class="modal-content">
                    <h5>Tem certeza que não deseja finalizar essa venda?</h5>
                    <p>A operação não poderá ser desfeita.</p>
                    </div>
                    <div class="modal-footer">
                                
                    <form action="../venda/index.php" method="POST">
                        <button type="submit" name="btn" class="btn green lighten-1">Sim, tenho certeza!</button>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                        </form>
                    </div>
                </div>
        <h3 class ="light">Nova Venda</h3>	
        <form action="../venda/php_action/creat.php" method="POST" >
        
        <div class="input-field col s12" >
            <select  id="idLivro" name="idLivro">
            <option value="text" disabled selected>Escolha o Livro</option>
            <?php
				$sql="SELECT idLivro, idLivro, titulo, preco
				from livro";

				$result=mysqli_query($connect,$sql);

				while ($livro=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $livro[0] ?>"><?php echo $livro[1]." - ".$livro[2]." - ".$livro[3].",00" ?></option>
                    <?php  endwhile; 
                    ?>
                
            </select>
            <label>Livro</label>
            </div>

            <div class="input-field col s12" >
            <select  id="preco" name="preco">
            <option value="text" disabled selected>Preço</option>
            <?php
				$sql="SELECT preco,idLivro,titulo
				from livro";

				$result=mysqli_query($connect,$sql);

				while ($valor=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $valor[0] ?>"><?php echo $valor[1]." - ".$valor[2] ." - ".$valor[0].",00"?></option>
                    <?php  endwhile; ?>
                
            </select>
            <label>Preço</label>
            </div>
        

            <div class="input-field col s12">
                <i class="material-icons prefix">calendar_month</i>
                <input id="icon_prefix" class="validate" type="date" name="dataVenda" id="dataVenda">
                <label for="dataVenda">Data</label>
            </div>
            <div class="input-field col s12">
                    <input type="text" name="cpfComprador" id="cpfComprador">
                    <label for="cpfComprador">Cpf Comprador</label>
                </div>
            <button type="submit" name="btn-registrarnovavenda" class="btn deep-purple lighten-2"><i class="material-icons left">shopping_cart_checkout</i>Registrar Nova Venda</button>
            <a href="../venda/index.php" type="submit" class="btn"><i class="material-icons left">receipt_long</i>Lista de Vendas</a>

            <br>
                <button class="btn-floating btn-small waves-effect waves-light red" 
                style="width: 50px; height: 50px; right: -95%; buttom: 0%"
                title="Sair" aria-pressed="false"> 
                <a href="../logout.php" class ="" ><i class="material-icons">exit_to_app</i></a>
                </button>
                <br> 
        </form>
    </div>
    </div>
</div>

<?php
//Footer
include_once '../venda/includes/footer.php';


