
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
				
			}
			
		});
		
    });
	
});

document.getElementById('miFormulario').addEventListener('submit', function(event) {

    event.preventDefault();

	const id = document.getElementById('ID');
    const date = document.getElementById('Date');
	const description = document.getElementById('Description');
	const url = document.getElementById('URL');
	const Img = document.getElementById('Img');

    if (!(id.value.trim()==='' description.value.trim()==='' url.value.trim()==='' || dateInput.value==='' || Img.files.length===0)){
		
		update.get(id, (q) =>{
			
			if (q){
				
				
				
			}else{
				
				
				
			}
			
		});
		
		//this.submit();
		
    }
	
});