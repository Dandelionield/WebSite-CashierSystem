/*const { update } = require('./update.js');

const p = update.get("1.4.8");

console.log(p.toString());

p.end();//*/

//import update from './update.js';

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

						UpdateContainer.innerHTML = `
						
							<h3 class = "tittle">${id}</h3>
					
							<img src = "./prueba.JPG"></img>
							
							<h5 class = "date"><p>${(dd<10 ? "0"+dd : dd+"")+"/"+(mm<10 ? "0"+mm : mm+"")+"/"+yyyy}</p></h5>
							
							<p class = "description">${q.getDescription()}</p>
							
							<h4>
							
								<a href = "${q.getLink()}">
								
									Descargar CashierSystem_v${id}
								
								</a>
							
							</h4>
							
							<form>
					
								<fieldset class = "form">
									
									<div>
									
										<textarea class = "input" type = "text" name = "Comment" id = "Comment" placeholder = "Comentario"></textarea>
									
										<div>
										
											<input class = "input-submit" type = "submit" name = "Submit" id = "Submit" value = "Comentar">
											
											<button type="button" class = "input-submit" name = "Delete" id = "Delete">Cancelar</button>
										
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