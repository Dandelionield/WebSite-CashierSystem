
document.addEventListener('DOMContentLoaded', function (){
	
    const inputs = document.querySelectorAll('.input-update');
	
	if (inputs){

		inputs.forEach(input =>{
			
			const placeholderText = input.getAttribute('placeholder');
			const titleBorder = input.nextElementSibling;
			titleBorder.innerText = placeholderText;
			
		});
		
	}
	
});

document.addEventListener('DOMContentLoaded', (event) =>{
	
    const ID = document.getElementById('ID');
	const date = document.getElementById('Date');
	const description = document.getElementById('Description');
	const url = document.getElementById('URL');
	const Img = document.getElementById('Img');
	const preview = document.getElementById('preview');
	
	const Edit = document.getElementById('Edit');
	const Remove = document.getElementById('Remove');

    ID.addEventListener('input', (event) => {
		
		const id = event.target.value;
		
		update.get(id, (q) =>{
			
			if (q){
				
				const date = document.getElementById('Date');
				const description = document.getElementById('Description');
				const url = document.getElementById('URL');
				const Img = document.getElementById('Img');
				
				let dd = q.getDate().getDate();
				let mm =q.getDate().getMonth() + 1;
				let yyyy = q.getDate().getFullYear();
				
				date.value = yyyy+"-"+(mm<10 ? "0"+mm : mm+"")+"-"+(dd<10 ? "0"+dd : dd+"");
				description.value = q.getDescription();
				url.value = q.getLink();
				preview.src = q.getImg();
				
				ID.readOnly = true;
				date.readOnly = true;
				description.readOnly = true;
				url.readOnly = true;
				Img.disabled = true;
				
				Edit.disabled = false;
				Remove.disabled = false;
				
			}
			
		});
		
    });
	
});

document.getElementById('Delete').addEventListener('click', function(){
	
	let inputs = document.querySelectorAll('.input-update');
	
	const preview = document.getElementById('preview');
	
	const Edit = document.getElementById('Edit');
	const Remove = document.getElementById('Remove');
	

	inputs.forEach(input =>{
		
		input.readOnly = false;
		input.value = '';
		
	});
	
	let inputs2 = document.querySelectorAll('.input-date');

	inputs2.forEach(input2 =>{
		
		input2.readOnly = false;
		input2.value = '';
		
	});
	
	Edit.disabled = true;
	Remove.disabled = true;
	
	preview.src = '';
	
});

document.getElementById('Img').addEventListener('change', function(event){
	
    const file = event.target.files[0];
	
    if (file){
		
        const reader = new FileReader();
		
        reader.onload = function(e){
			
            const preview = document.getElementById('preview');
            preview.src = e.target.result;
			
        }
        
        reader.readAsDataURL(file);
		
    }
	
});