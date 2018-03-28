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
	<div class="col-xs-8">
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


	<div class="col-xs-4">
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
   					    <th scope="col"> </th>
      					<th scope="col">Produto</th>
      					<th scope="col">valor</th>
    				</tr>
  				</thead>
  				<tbody class="produtoescolhido">
				
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
	

</style>
<script>
	$(function(){
        
		var arrayproduto   = [];
		var arrayvalores   = [];
		var arraylistatela = []; 

    
		var linhacursocompleta   = "";

		$("#carrinho").show();

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


		$("#carrinho").droppable(
		{
			accept : '.curso',
			drop : function(event, ui)
			{
				//alert("Curso adicionado ao carrinho");
				//pegar o elemento solto
				var elem = ui.draggable;
				var curso = elem.attr("data-value");
				var custo = elem.attr("data-custo");
				
				
				var carrinhohtml = $("#carrinho").html();
                var totalvalores = 0;
                linhacurso = "";
		        
				//var listacursohtml = $("tbody#produtoescolhido").html(); 
			    linhacurso ='<div class="linha" id="linha_' + (arraylistatela.length +1)  +'" ><tr><td>'+
			             	'<input type="button" value="(x)" class="apagarelemento" '+
							 'id="btapagarelemento_' +( arraylistatela.length+1)+'"/>'+ '</td>' +
				            
							'<td>' + curso +
				            '</td><td> '+ custo +' </td></tr> </div>';
                // alert(linhacurso); 
				//alert(arraylistatela.length);
				arraylistatela.push(linhacurso);
				//alert(arraylistatela.length);
				//alert(linhacurso);


				arrayproduto.push(curso);
                arrayvalores.push(custo);

				$("tbody.produtoescolhido").html( "" );
				linhacursocompleta = "";
				arraylistatela.forEach(function( linha ) {
					linhacursocompleta = linhacursocompleta + linha;  //totalvalores + Number( valor ) ;
                });
				//alert(linhacursocompleta );

				//alert(linhacursocompleta);

				arrayvalores.forEach(function(valor) {
					totalvalores = totalvalores + Number( valor ) ;
                });

				//alert(totalvalores);

				$("#carrinho").height( $("#carrinho").height() +20  );
				$("tbody.produtoescolhido").append( linhacursocompleta );   
				$("#Quantidadeitens").html("Quantidade :" + arrayproduto.length  );
				$("#totalvalorescarrinho").html("<tr><td>Total : </td><td>"+ totalvalores.toFixed(2) + "</td></tr>" );
				//alert("Curso " + curso + ", adicionado ao carrinho!");
				//var allListElements = $( "tbody#produtoescolhido" );
  		        //alert(allListElements);
 			  
			    $(".apagarelemento").click(  function ()
			  //$("tbody.produtoescolhido").on("click", '.apagarelemento', function () 
			  //{
		  	  // $("tbody#produtoescolhido").find(".apagarelemento") .click(function(event)
				{ 
                    
					
					//alert("zzzzz");
					alert(this.id);
				//	alert( this.id.indexOf("_")  );
					alert( this.id.substr( this.id.indexOf("_") + 1 , this.id.length - this.id.indexOf("_")  )  );
                    var totalvalores = 0;
					var quantidade = 0;
					var nomediv       = this.id;
					var posseparador  = this.id.indexOf("_");
					var idposicaorray = 
					  this.id.substr( this.id.indexOf("_") + 1 , this.id.length - this.id.indexOf("_")  ); 
					//var quantidade = 0;
					alert(idposicaorray);
					
					
					arraylistatela[Number( idposicaorray)-1] = "";
					arrayproduto[Number( idposicaorray)-1]  = ""; //splice( Number( idposicaorray)-1,1 );
                    arrayvalores[Number( idposicaorray)-1]   = "0";
					
					$(this).remove();
					$('#linha_'+idposicaorray ).remove();
                          
					
					totalvalores = 0;
					arrayvalores.forEach(function(valor) 
					{
					  totalvalores = totalvalores + Number( valor ) ;
					  if ( Number( valor ) > 0 )
					    {
							quantidade = quantidade + 1;
						}
					});

					$("#totalvalorescarrinho").html("");
					$("#totalvalorescarrinho").html("<tr><td>Total : </td><td>"+totalvalores.toFixed(2)+"</td></tr>" );
					$("#Quantidadeitens").html("");
					$("#Quantidadeitens").html("Quantidade : "+ quantidade  );
					$("#carrinho").height( $("#carrinho").height() - 20  );

                    //alert("excluir");
                })  



			}
		})
		


	})
</script>