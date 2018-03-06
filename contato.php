<?php sleep(2); ?>
<h3 class="page-header">Contato</h3>
<form id="formcontato">
	<div class="row">
		<div class="col-xs-6 form-group">
			Nome:
			<input type="text" name="nome" id="nome" class="form-control">
		</div>
		<div class="col-xs-6 form-group">
			E-mail:
			<input type="text" name="email" id="email" class="form-control">
		</div>
	</div>	
	<div class="row">
		<div class="form-group col-xs-3">
			Salário: 
			<input type="text" name="salario" id="salario" class="form-control">
		</div>
		<div class="form-group col-xs-3">
			Cpf: 
			<input type="text" name="cpf" id="cpf" class="form-control">
		</div>
		<div class="form-group col-xs-3">
			Idade:
			<input type="text" name="idade" id="idade" class="form-control">
		</div>
		<div class="form-group col-xs-3">
			Telefone: 
			<input type="text" name="telefone" id="telefone" class="form-control">
		</div>
	</div>
	<input type="submit" value="CADASTRAR" class="btn btn-primary">
</form>
<?php echo "<p>Ola</p>"; ?>
<p>Ola</p>
<style>
	label.error{
		color: #A33;
	}
	input.error{
		border-color: #A33;
	}
	input.valid{
		border-color: #3A3;
	}
</style>
<script>
	$(function(){
		//numero obrigatorio
		$("#cpf").mask("999.999.999-99");
		// ?9 --- numero opcional
		$("#telefone").mask("(99) 9999-9999?9");
		$("#salario").maskMoney({
				decimal : ',', 
				thousands : '.',
				prefix : 'R$ '
		});

		$.validator.messages.required = "Campo é obrigatório";
		$.validator.messages.email = "E-mail é inválido";

		$("#formcontato").validate({
			rules : {
				nome : {
					required : true,
					minlength : 3
				},
				email : {
					required : true,
					email : true
				},
				idade : {
					required : true,
					range : [18,120]
				},
				salario : { required : true },
				cpf : { required : true },
				telefone : { required : true }
			},
			messages : {
				nome : {
					minlength : 'Minimo de {0} caracteres para o nome'
				},
				idade : {
					range : 'A idade deve ser entre {0} e {1}'
				}
			}
		});

		//$("#formcontato").submit();
	})
</script>