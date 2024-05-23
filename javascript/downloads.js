
const cn = new Conexion("http://localhost/WebSite-CashierSystem/php/inConexion.php", "http://localhost/WebSite-CashierSystem/php/outConexion.php");

cn.sentence("SELECT * FROM `users` WHERE active = '1'", (q) => {

	if (q){

		if (q.length !== 0){
			
			if (q[0][4]==1){
			
				const header = document.querySelector('header');
				const a = document.createElement('a');
				a.href = 'newUpdate.html';

				const img = document.createElement('img');
				img.src = 'styles/imagenes/add.png';
				img.alt = 'logo';

				a.appendChild(img);
				header.appendChild(a);
				
			}
			
		}
		
	}

});

update.getAll((p) =>{
	
    if (p){
		
		var lista = document.getElementById("list");
		
		for (let i=0; i<p.length; i++){
			
			let q = p[i];
			
			var li = document.createElement("li");
			
			let dd = q.getDate().getDate();
			let mm =q.getDate().getMonth() + 1;
			let yyyy = q.getDate().getFullYear();
			
			li.innerHTML = `
			
				<div class = "version">
						
					<button class = "version-button", id = "version-button">
				
						<h3 class = "name"><b>${q.getID()}</b></h3>
					
					</button>
				
					<h5 class = "date"><p>${(dd<10 ? "0"+dd : dd+"")+"/"+(mm<10 ? "0"+mm : mm+"")+"/"+yyyy}</p></h5>
				
				</div>
			`;
			
			lista.appendChild(li);
			
		};
		
		const Buttons = document.querySelectorAll('.version-button');

		Buttons.forEach(boton => {
			
			boton.addEventListener('click', () => {
				
				const id = boton.querySelector('h3 b').textContent;
				
				update.get(id, (q) =>{
					
					if (q){
						
						let dd = q.getDate().getDate();
						let mm =q.getDate().getMonth() + 1;
						let yyyy = q.getDate().getDate();
						
						const UpdateContainer = document.getElementById('update-container');
						
						console.log(q.getImg());
						
						UpdateContainer.innerHTML = `
						
							<h3 class = "tittle">${id}</h3>
					
						<img src = "${q.getImg()}"></img>
							
							<h5 class = "date"><p>${(dd<10 ? "0"+dd : dd+"")+"/"+(mm<10 ? "0"+mm : mm+"")+"/"+yyyy}</p></h5>
							
							<p class = "description">${q.getDescription()}</p>
							
							<h4>
							
								<a href = "${q.getLink()}">
								
									Descargar CashierSystem_v${id}
								
								</a>
							
							</h4>
							
							<form action="php/comment.php" method="post">
					
								<fieldset class = "form">
									
									<div>
										<input class="input" type="hidden" name="version" value="${id}">
									
										<textarea class = "input" type = "text" name = "Comment" id = "Comment" placeholder = "Comentario"></textarea>
									
										<div>

											<input class = "input-submit" type = "submit" value = "Comentar">

											<button type="button" class = "input-submit" id = "Delete">Cancelar</button>

										</div>
										
									</div>
									
								</fieldset>
								
							</form>
						
						`;
						
						document.getElementById('Delete').addEventListener('click', function(){
	
							document.getElementById('Comment').value = '';
							
						});//*/
						
					}
					
				});
				
			});
		});
		
	}
	
});