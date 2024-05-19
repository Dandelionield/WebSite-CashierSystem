
class ImageUploader{
	
    constructor(Img){
		
        this._data = new FormData();
		
		this._data.delete('Img');
        this._data.append('Img', Img);
		
    }

    setImage(Img){
		
        this._data.delete('Img');
        this._data.append('Img', Img);
		
    }

    upload(url){
		
        return new Promise((resolve, reject) =>{
			
            if (!url){
			
                reject('La URL de destino no está especificada.');
                return;
				
            }

            fetch(url,{
				
                method: 'POST',
                body: this.formData
				
            }).then(response =>{
				
                if (!response.ok){
					
                    throw new Error('La solicitud no se completó correctamente.');
					
                }
				
                return response.json();
				
            }).then(data =>{
				
                resolve(data);
				
            }).catch(error =>{
				
                reject(error);
				
            });
			
        });
		
    }
	
}