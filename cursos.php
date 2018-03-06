<?php sleep(2); ?>
<head>
<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.css">

	<script src="bower_components/jquery/dist/jquery.min.js"></script>
	<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
	<script src="bower_components/jquery-maskmoney/dist/jquery.maskMoney.min.js"></script>
	<script src="bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="bower_components/jquery.maskedinput/dist/jquery.maskedinput.min.js"></script>

</head>

<h3 class="page-header">Cursos</h3>
<div class="row">
	<div class="col-xs-10">
		<div class="row">
			<div class="col-xs-4">
				<img src="img/img1.png" alt="" class="img-responsive curso" 
				   data-value="Bootstrap" data-custo="20.00" data-image="img/img1.png" >
			</div>
			<div class="col-xs-4">
				<img src="img/img2.gif" alt="" class="img-responsive curso" 
				  data-value="Jquery" data-image="img/img2.gif" data-custo="30.00">
			</div>
			<div class="col-xs-4">
				<img src="img/img3.jpg" alt="" class="img-responsive curso" 
				   data-value="Css3" data-image="img/img3.jpg" data-custo="40.00">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<img src="img/img4.png" alt="" class="img-responsive curso" 
				   data-value="Android" data-image="img/img4.png" data-custo="50.00">
			</div>
			<div class="col-xs-4">
				<img src="img/img5.png" alt="" class="img-responsive curso" 
				   data-value="PHP" data-image="img/img5.png" data-custo="60.00">
			</div>
			<div class="col-xs-4">
				<img src="img/img6.png" alt="" class="img-responsive curso" 
				   data-value="Mysql" data-image="img/img6.png" data-custo="70.00">
			</div>
		</div>
	</div>


	<div class="col-xs-2">
	<table class="tb">
   				<thead>
  				</thead>
  				<tbody div id="totalvalorescarrinho">
				
			    </tbody>
			
	</table>


	<div id="carrinho">
			  CARRINHO DE COMPRAS 
			  <div id="Quantidadeitens"> </div> 
            <table class="tb">
   				<thead>
    				<tr>
      					<th scope="col">Produto</th>
      					<th scope="col">valor</th>
    				</tr>
  				</thead>
  				<tbody div id="produtoescolhido">
				
			    </tbody>
			
			</table>
			
			

		</div>
	</div>

	<div class="col-xs-2">

		<div id="carrinho1">
			CARRINHO DE COMPRAS-1
            <table class="tb">
   				<thead>
  				</thead>
  				<tbody div id="produtoescolhido1">
				
				</tbody>
				
			</table> 
		</div>
	
	</div>
	
</div>
<style>
	#carrinho{
		height: 80px;
		border: 1px solid #000;
	}
	
	#carrinho1{
		height: 70px;
		border: 1px solid #000;
	}

</style>
<script>
	$(function(){
        
		var arrayproduto = [];
		var arrayvalores = [];
		var arraylistatela = []; 
		
		$("input:apagarelemento").click(function(event)
		{ 
           alert("zzzzz");
        })
	    
		var linhacursocompleta   = "";

		$("#carrinho").show();
		$("#carrinho1").hide();

		$(".curso").draggable({
			revert : true,
			cursor : 'pointer',
			start : function() { 
				  //$("#carrinho").show(); 
				  },
			stop : function() { 
				     //$("#carrinho").hide(); 
					 }
		});


		$("#carrinho").droppable({
			accept : '.curso',
			drop : function(event, ui){
				//alert("Curso adicionado ao carrinho");
				//pegar o elemento solto
				var elem = ui.draggable;
				var curso = elem.attr("data-value");
				var custo = elem.attr("data-custo");
				
				
				var carrinhohtml = $("#carrinho").html();
                var totalvalores = 0;
           
		        
				//var listacursohtml = $("tbody#produtoescolhido").html();
			    linhacurso ='<tr><td> <input type="button" value="(x)" id="apagarelemento" />'+ curso +
				            '</td><td> '+ custo +' </td></tr>';

				//alert(arraylistatela.length);
				arraylistatela.push(linhacurso);
				//alert(arraylistatela.length);
				//alert(linhacurso);


				arrayproduto.push(curso);
                arrayvalores.push(custo);

				linhacursocompleta = "";
				arraylistatela.forEach(function( linha ) {
					linhacursocompleta = linhacursocompleta + linha;  //totalvalores + Number( valor ) ;
                });

				//alert(linhacursocompleta);

				arrayvalores.forEach(function(valor) {
					totalvalores = totalvalores + Number( valor ) ;
                });

				//alert(totalvalores);

				$("#carrinho").height( $("#carrinho").height() +20  );
				$("tbody#produtoescolhido").html( linhacursocompleta );   
				$("#Quantidadeitens").html( arrayproduto.length + "item" );
				$("#totalvalorescarrinho").html("<tr><td>Total : </td><td>"+ totalvalores.toFixed(2) + "</td></tr>" );
				//alert("Curso " + curso + ", adicionado ao carrinho!");
			}
		})
		
		$("#carrinho1").droppable({
			accept : '.curso',
			drop : function(event, ui){
				//alert("Curso adicionado ao carrinho");
				//pegar o elemento solto
				var elem = ui.draggable;
				var curso = elem.attr("data-image");
				var carrinhohtml = $("#carrinho1").html();
                
				//alert(curso);
           
				var listacursohtml1 = $("tbody#produtoescolhido1").html();
				var linhacurso1 ='<tr>'+
				'<img src="'+ curso +'" class="img-responsive curso" </img>  </tr> <tr> 10,00 </tr>';
				
				alert(linhacurso1);
				alert(listacursohtml1);

				$("#carrinho1").height( $("#carrinho1").height() +20  );
				$("tbody#produtoescolhido1").html(listacursohtml1 + linhacurso1 );   

				//alert("Curso " + curso + ", adicionado ao carrinho!");
			}
		})



	})
</script>