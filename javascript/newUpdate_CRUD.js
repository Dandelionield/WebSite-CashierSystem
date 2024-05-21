
document.getElementById('CRUD').addEventListener('submit', function(event) {

    event.preventDefault();

	const id = document.getElementById('ID');
    const date = document.getElementById('Date');
	const description = document.getElementById('Description');
	const url = document.getElementById('URL');
	const Img = document.getElementById('Img');
	const preview = document.getElementById('preview');
	
	const Delete = document.getElementById('Delete');

    if (id.value.trim()!=='' || description.value.trim()!=='' || url.value.trim()!=='' || date.value!=='' || Img.files.length!==0 || preview.getAttribute('src').trim()!==''){
		
		let dmy = new Date(date.value);
		let Image;
		
		dmy.setDate(dmy.getDate() + 1);
		
		update.get(id.value.trim(), (q) =>{
			
			if (q){
				
				q.setDate(dmy);
				q.setDescription(description.value.trim());
				q.setLink(url.value.trim());
				
				if (preview.getAttribute('src')!==q.getImg()){
					
					q.setImg("http://localhost/WebSite-CashierSystem/styles/imagenes/downloads/"+Img.files[0].name);
					
					Image = new ImageUploader(Img.files[0], Img.files[0].name);
					
					Image.upload();
					
				}
				
				q.edit();
				
			}else{
				
				let p = new update(
				
					id.value.trim()+"", 
					dmy, description.value.trim()+"", 
					url.value.trim()+"", 
					"http://localhost/WebSite-CashierSystem/styles/imagenes/downloads/"+Img.files[0].name
					
				);
				
				p.set();
				
				Image = new ImageUploader(Img.files[0], Img.files[0].name);
				
				Image.upload();
				
			}
			
			Delete.click();
			
		});
		
		//this.submit();
		
    }
	
});//*/

document.getElementById('Edit').addEventListener('click', function(){
	
	const date = document.getElementById('Date');
	const description = document.getElementById('Description');
	const url = document.getElementById('URL');
	const Img = document.getElementById('Img');
	
	const Remove = document.getElementById('Remove');
	
	date.readOnly = false;
	description.readOnly = false;
	url.readOnly = false;
	Img.disabled = false;
	
	Remove.disabled = true;
	
});

document.getElementById('Remove').addEventListener('click', function(){
	
	const Delete = document.getElementById('Delete');
	
	const ID = document.getElementById('ID');
	
	const id = ID.value;
	
	update.get(id, (q) =>{
		
		q.remove();
		
	});
	
	Delete.click();
	
});