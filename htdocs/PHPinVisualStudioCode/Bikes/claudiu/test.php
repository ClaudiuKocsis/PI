<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>Selector</title>

<style>
*{
	margin:0;
	box-sizing: border-box;
}

body {
	font-family: "Roboto", sans-serif;
	background: #f7f6ff;
}


.container{
	margin-top: 2px;
	padding: 2px;
}

.select-box{
	position:relative;
	display: flex;
	width: 250px;
	flex-direction: column;
}

.select-box .options-container{
	background: #2f3640;
	color: #f5f6fa;
	max-height: 0;
	width: 100%;
	opacity: 0;
	transition: all 0.4s;
	border-radius: 8px;
	overflow: hidden;
	
	order: 1;
	
	/*position: absolute;
	z-index: 100;*/
}

.selected{
	background: #2f3640;
	border-radius: 8px;
	margin-bottom: 8px;
	color: #f5f6fa;
	position: relative;

	order: 0;
}

.selected::after{
	content:"";
	background: url("arrow-down.png");
	background-size: contain;
	background-repeat: no-repeat;
	
	position: absolute;
	height: 100%;
	width: 32px;
	right: 10px;
	top: 10px;
	
	transition: all 0.4s;
}

.select-box .options-container.active{
	max-height: 240px;
	opacity: 1;
	overflow-y: scroll;
	/* margin-top:104px; */
	margin-top:54px;
}

.select-box .options-container.active + .selected::after{
	transform: rotateX(180deg);
	top: -12px;
}

/*scrollbar*/
.select-box .options-container::-webkit-scrollbar{
	width: 8px;
	background: #0d141f;
	border-radius: 0 8px 8px 0;
}

.select-box .options-container::-webkit-scrollbar-thumb{
	background: #525861;
	border-radius: 0 8px 8px 0;
}

.select-box .option,
.selected{
	/*padding: 12px 24px;*/
	cursor: pointer;
}

.selected{
	padding: 12px 24px;
}

/*culoare pe fundal pe elementul pe care pun cursor*/
.select-box .option:hover{
	background: #414b57
}

.select-box label{
	cursor: pointer;
	display: block;
	padding: 12px 24px;
}
/*dispar butoanele radio*/
.select-box .option .radio{
	display: none;
}


/* searchbox */

.search-box. options-container.active + .selected::after{
	transform: rotateX(180deg);
	top: -6px;
}


.search-box input{
	width: 100%;
	padding: 12px 16px;
	font-family: "Roboto", sans-serif;
	font-size: 16px;
	position: absolute;
	border-radius: 8px 8px 0 0;
	z-index: 100;
	border: 8px solid #2f3640;
	opacity: 0;
	pointer-events: none;
	transition: all 0.4s;
}
.search-box input:focus{
	outline: none;
}

.select-box .options-container.active ~ .search-box input {
	opacity: 1;
	pointer-events: auto;
}

</style>


</head>
<body>
<form method="post" action="test5.php">

<div class="container">
<div class="select-box">
<div class="options-container">

<div class='option'>
<input type='radio' class='radio' id="1" name='produs' value="iaurt" />
<label for="1" >iaurt</label>
</div>

<div class='option'>
<input type='radio' class='radio' id="2" name='produs' value="detergent" />
<label for="2" >detergent</label>
</div>

<div class='option'>
<input type='radio' class='radio' id="3" name='produs' value="zahar" />
<label for="3" >zahar</label>
</div>



</div><!--end div options-container-->

<div class="selected">Produs</div>

<div class="search-box">
      <input type="text" placeholder="Caută ..." name = "my_search_box">
	  
</div><!--end div search-box-->


</div> <!--end div select-box-->
</div> <!--end div container-->




<div class="container">
<div class="select-box">
<div class="options-container">

<div class='option'>
<input type='radio' class='radio' id="1" name='tip' value="de fructe" />
<label for="1" >de fructe</label>
</div>

<div class='option'>
<input type='radio' class='radio' id="2" name='tip' value="de vase" />
<label for="2" >de vase</label>
</div>

<div class='option'>
<input type='radio' class='radio' id="3" name='tip' value="brun" />
<label for="3" >brun</label>
</div>


</div><!--end div options-container-->

<div class="selected">Tip de produs</div>

<div class="search-box">
      <input id = "myForm" type="text" placeholder="Caută ..." value="ALO" name="my_search_box"/>
	  
</div><!--end div search-box-->


</div> <!--end div select-box-->
</div> <!--end div container-->




<div class="container">
<div class="select-box">
<div class="options-container">

<div class='option'>
<input type='radio' class='radio' id="1" name='cul' value="de piersici" />
<label for="1" >de piersici</label>
</div>

<div class='option'>
<input type='radio' class='radio' id="2" name='cul' value="lichid" />
<label for="2" >lichid</label>
</div>

<div class='option'>
<input type='radio' class='radio' id="3" name='cul' value="cuburi" />
<label for="3" >cuburi</label>
</div>

</div><!--end div options-container-->

<div class="selected">Culoare / Porționare</div>

<div class="search-box">
      <input type="text" placeholder="Caută ..." name = "my_search_box"/>
	  
</div><!--end div search-box-->


</div> <!--end div select-box-->
</div> <!--end div container-->



<input id="submit" type="submit">
</form>

<script language="javascript" type="text/javascript">

const selectedAll = document.querySelectorAll(".selected");

selectedAll.forEach((selected) => {
const optionsContainer = selected.previousElementSibling;
const searchBox = selected.nextElementSibling;

const optionsList = optionsContainer.querySelectorAll(".option");

selected.addEventListener("click", () =>{
	
	/*inchide optiunea deschisa cand deschizi alta*/
	if(optionsContainer.classList.contains("active")){
		optionsContainer.classList.remove("active");
		
	}else{
		let currentActive = document.querySelector(".options-container.active");
		
		if (currentActive){
			currentActive.classList.remove("active");
		}
		
		optionsContainer.classList.add("active");
		
	}
	/* problema este ca searchbox nu se goleste dupa se face selectia. Probabil cele doua linii de mai jos trebuie puse in alt loc.*/
	searchBox.value = "";
    filterList("");
	
	if(optionsContainer.classList.contains("active")){
		
		searchBox.focus();
	}
});

optionsList.forEach(o =>{
	o.addEventListener("click", () =>{
		selected.innerHTML = o.querySelector("label").innerHTML;
		optionsContainer.classList.remove("active");
		for(var i=0; i<=2; i++)
	{
		document.getElementsByName("my_search_box")[i].value = "";
	}
	});
	
});

searchBox.addEventListener("keyup", function(e){
	filterList(e.target.value);
});

const filterList = searchTerm =>{
	searchTerm = searchTerm.toLowerCase();
	optionsList.forEach( option => {
		let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
		if (label.indexOf(searchTerm) != -1) {
			option.style.display = "block";
		}else{option.style.display = "none";
		}
			
	});
};

});
</script>
</body>
</html>
