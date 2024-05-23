
class ImageUploader{
	
    constructor(file, name) {
        
		this._file = file;
		this._name = name;
		
    }

    upload(){
		
        const formData = new FormData();
        formData.append('image', this._file);
		formData.append('fileName', this._name);

        fetch('http://localhost/WebSite-CashierSystem/php/ImageUploader.php',{
			
            method: 'POST',
            body: formData
			
        }).then(
		
			response => response.json()
			
		).then(data =>{
			
            
			
        }).catch(e =>{
			
            console.error('Error uploading image:', e);
			
        });
		
    }
	
}