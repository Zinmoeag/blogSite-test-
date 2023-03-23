
const dropZone = document.querySelector(".drop-zone");
const photoInput = document.querySelector("#photo");
const prevUrl = document.querySelector(".prev-url");

const preventDefault = (e)=>{
	e.preventDefault();
	e.stopPropagation();
}

const dark =()=>{
	dropZone.classList.add("dark");
}

const returnNormal =()=>{
	dropZone.classList.remove("dark");
}


const showFileToClient =(file) =>{

	const Reader = new FileReader();

	Reader.onload=()=>{

		prevUrl.src = Reader.result
	}

	//read method
	Reader.readAsDataURL(file[0]);

}


["dragenter","dragover","dragleave","drop"].forEach(event =>{
	dropZone.addEventListener(event, preventDefault)
});


// stylling 
["dragenter","dragover"].forEach(event =>{
	dropZone.addEventListener(event, dark)
});

["dragleave","drop"].forEach(event =>{
	dropZone.addEventListener(event, returnNormal)
});


//data handling

dropZone.addEventListener("drop",function(e){

	photoInput.files = e.dataTransfer.files;

	//show image to client
	showFileToClient(e.dataTransfer.files);

})





