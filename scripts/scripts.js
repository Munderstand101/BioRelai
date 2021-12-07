
function afficher(id){
	

	
	let voir = "Voir les produits proposés par ce producteur";
	let cacher = "Cacher les produits proposés par ce producteur";

	let test = document.querySelectorAll('.produits')
	

	for(let i = 0; i < test.length; i++) {	
		if (test[i].id != id) {
			test[i].classList.add('hidden');
			document.getElementById("btnProduits"+test[i].id).value = voir;
		}
	 }
		 
	let current = document.getElementById(id).classList.toggle('hidden')
	document.getElementById("btnProduits"+id).value = current?voir:cacher;
	


		 
//	 let elemts = document.getElementsByClassName('produits');
//	 for(var i = 0; i < elemts.length; i++) {
//		 elemts[i].style.display="none";
//	 }
//	 
//	 let elemts2 = document.getElementsByClassName('btnProduits');
//	 for(var i = 0; i < elemts2.length; i++) {
//		 elemts2[i].value = "Voir les produits proposés par ce producteur";
//	 }
//	 
//	 
//	if(document.getElementById(id).value == "Voir les produits proposés par ce producteur"){
//		console.log('here')
//		document.getElementById(id).style.display="block";
//		document.getElementById("btnProduits"+id).value = "Cacher les produits proposés par ce producteur";
//	} 
//	else{
//		console.log('here 2')
//		document.getElementById(id).style.display="none";
//		document.getElementById("btnProduits"+id).value = "Voir les produits proposés par ce producteur";
//	}
	
}


/*
var element = document.getElementById('1');


element.addEventListener('click', function() {

    alert("test");
    

});

*/	 