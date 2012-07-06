(function () {
	var input = document.getElementById("vImage"), 
	formdata = false;
        function showUploadedItem (source) {
  		var img = document.getElementById("vImageload");
	  	img.src = source;
                img.style.display = "block";
                /*
                img  = document.createElement("img");
                list.innerHTML = '';
                img.width = 209;
                img.height = 162;
  		list.appendChild(img);
                */
	}   
        if (window.FormData) {
  		
  		document.getElementById("vFire").style.display = "none";
	}
        
	input.addEventListener("change", function (evt) {
                formdata = new FormData();
                var img = document.getElementById("vImageload");
	  	img.style.display = "none";
 		//$("#vImageload").attr('images/card_loader.gif');
                
                //console.log(this.files.length);
 		var i = 0, len = this.files.length, img, reader, file;
                for ( i = 0; i < len; i++ ) {
			file = this.files[i];
                        //console.log(file);
			if (!!file.type.match(/image.*/)) {
                                
				if ( window.FileReader ) {
					reader = new FileReader();
					reader.onloadend = function (e) { 
                                                //console.log(e.target.result)
						//showUploadedItem(e.target.result, file.fileName);
					};
					reader.readAsDataURL(file);
				}
				if (formdata) {
					formdata.append("vImage[]", file);
				}
			}	
		}
                if(window.FileReader!='undefined')
		if (formdata) {
                        
			$.ajax({
				url: "users/upload/",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function (res) {
                                    showUploadedItem('uploads/tmp/2_'+res);
				    //$("#service_card_image_loader").html(res) ; 
				}
			});
		}
	}, false);
}());
