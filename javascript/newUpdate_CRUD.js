
document.getElementById('CRUD').addEventListener('submit', function(event) {

    event.preventDefault();

	const id = document.getElementById('ID');
    const date = document.getElementById('Date');
	const description = document.getElementById('Description');
	const url = document.getElementById('URL');
	const Img = document.getElementById('Img');

    if (id.value.trim()!=='' || description.value.trim()!=='' || url.value.trim()!=='' || date.value!=='' || Img.files.length!==0){
		
		update.get(id.value.trim(), (q) =>{
			
			if (q){
				
				let dmy = new Date(date.value);
				let Image = new ImageUploader(Img.files[0]);
				
				dmy.setDate(dmy.getDate() + 1);
				
				console.log(q+"\n\n");
				
				q.setDate(dmy);
				q.setDescription(description.value.trim());
				q.setLink(url.value.trim());
				q.setImg("http://localhost/WebSite-CashierSystem/styles/imagenes/downloads/"+Img.files[0].name);
				
				console.log("\n\n"+q);
				
				q.edit();
				
				//Image.upload("http://localhost/WebSite-CashierSystem/styles/imagenes/downloads");
				
			}else{
				
				
				
			}
			
		});
		
		//this.submit();
		
    }
	
});//*/