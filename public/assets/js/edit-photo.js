const editPhotoForm = document.querySelector("#edit-photo-form");
const editPhoto = document.querySelector("#edit-photo");
const userPhotoPreview = document.querySelector("#user-photo-preview");

const nameEditBtn = document.querySelector("#name-edit-btn");
const nameUpdateForm = document.querySelector("#name-update-form");
const updateNameBtn = document.querySelector("#update-name-btn");
const nameDisplay = document.querySelector("#name-display");

// console.log(editPhotoForm,editPhoto);

editPhoto.onchange =()=>{

	const Reader = new FileReader();

	const IncomeUserPic = editPhoto.files[0];

	Reader.onload=()=>{
		userPhotoPreview.src = Reader.result;
	}

	Reader.readAsDataURL(IncomeUserPic);
}


nameEditBtn.onclick=()=>{
	nameUpdateForm.classList.remove("hide");
}

updateNameBtn.onclick=()=>{

	nameDisplay.innerHTML = document.querySelector(".name-edit-input").value;
	nameUpdateForm.classList.add("hide");
	
}



//copy link feature


const copyLinkFeature =(el)=>{
	// console.log("jj");

	const userLink = window.location.href;

	navigator.clipboard.writeText(userLink);

	flashMessage(el)
	// console.log(userLink);
}

const flashMessage=(el)=>{

	el.innerHTML = "copied";
	el.classList.remove("btn-outline-dark");
	el.classList.add("btn-dark");

}