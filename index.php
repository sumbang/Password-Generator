<!Doctype html>

<html>

<head> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title> Générateur de mot de passe !! </title>

<script type="text/javascript" src="jquery-1.5.1.min.js"> </script>

<script type="text/javascript" src="jquery.complexify.js"></script>

<script type="text/javascript">

  $("document").ready(function(){
    
    
   $("#bt1").click(function(){

       $("#password").complexify({}, function (valid, complexity) {
    
            if (!valid) {
    
                $('#progress').css({'width':complexity + '%'}).removeClass('progressbarValid').addClass('progressbarInvalid');
    
            } else {
    
                $('#progress').css({'width':complexity + '%'}).removeClass('progressbarInvalid').addClass('progressbarValid');
    
            }
    
            $('#complexity').html(Math.round(complexity) + '%');
    
        });

   });

  $("#bt").click(function(){

       var taille=$("#longueur").val(); 
      
       if( document.getElementById("cf").checked==true ) check=1; else check=0;

       if( document.getElementById("kt").checked==true ) carac=1; else carac=0;

       if( document.getElementById("pt").checked==true ) point=1; else point=0;

       if( document.getElementById("ac").checked==true ) accent=1; else accent=0;
      
       $.post('generate.php', {                  
         
          generate:1,taille:taille,cf:check,kt:carac,pt:point,ac:accent 
         
          }, function(data){ 
        
             $("#password").val(data);
         
          }  );   



  });

 

  });
 
</script>


<style type="text/css">

 .body{
 	background-color: #FFFFFF; margin: 0px auto;
 }

 #page{

 	margin: 30px auto; width: 800px; border: 2px solid #DEDEDC; height: 450px;
  }

  footer{

 	margin: 5px auto; width: 800px; height: 30px; font-size: 10pt; font-family: Arial; color: #000000;
  }

  .texte{ font-size: 10pt; font-family: Arial; color: #000000; margin: 10px; line-height: 35px; }

  h2 { color: #000000; font-family: Arial; text-align: center; margin: 20px; padding-bottom: 20px; }

  h3 { color: #930404; font-family: Arial; text-align: left; margin: 10px 10px; padding-bottom: 20px; }
 
  input { cursor: pointer; }

 #gen{

 	float: left; width: 350px;
 }

 #pass{

 	float: right; width: 350px;
 }

 input[type="button"]{

 	background-color: #930404; border-radius: 5px 5px 5px 5px; padding: 10px; border: 0px; margin-top: 10px; color: #FFFFFF; font-family: Arial;
 }


 #progressbar {
        width:240px;
        height:48px;
        display:block;
        border-left:1px solid #ccc;
        border-right:1px solid #ccc;
        border-top:1px solid #ccc;
        border-top-right-radius: 8px;
        border-top-left-radius: 8px;
        overflow:hidden;
        background-color: white;
    }

    #progress {
        display:block;
        height:100px;
        width:0%;
    }

    .progressbarValid {
        background-color:green;
        background-image: -o-linear-gradient(-90deg, #8AD702 0%, #389100 100%);
      background-image: -moz-linear-gradient(-90deg, #8AD702 0%, #389100 100%);
      background-image: -webkit-linear-gradient(-90deg, #8AD702 0%, #389100 100%);
      background-image: -ms-linear-gradient(-90deg, #8AD702 0%, #389100 100%);
      background-image: linear-gradient(-90deg, #8AD702 0%, #389100 100%);
    }

    .progressbarInvalid {
        background-color:red;
        background-image: -o-linear-gradient(-90deg, #F94046 0%, #92080B 100%);
      background-image: -moz-linear-gradient(-90deg, #F94046 0%, #92080B 100%);
      background-image: -webkit-linear-gradient(-90deg, #F94046 0%, #92080B 100%);
      background-image: -ms-linear-gradient(-90deg, #F94046 0%, #92080B 100%);
      background-image: linear-gradient(-90deg, #F94046 0%, #92080B 100%);
    }

    #status {
        height:150px;
        width:240px;
        border:1px solid #ccc;
        border-bottom-right-radius: 8px;
        border-bottom-left-radius: 8px;
        background-color: white;
    }

    #password {
        width:100%;
        height:40px;
        font-size:30px;
        line-height:40px;
        border-radius: 8px;
        padding: 4px;

        margin-left: -15px; margin-top: -20px;

        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        margin-bottom: 9px;
        color: #555555;
        border: 1px solid #cccccc;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        -webkit-text-security: disc;
        -webkit-appearance: textfield;
        outline: none;
    }

    #complexityLabel {
        width:100%;
        text-align:center;
        margin-top:10px;
        font-size:20px;
        line-height:30px;
    }

    #complexity {
        width:100%;
        text-align:center;
        font-family:"Helvetica Neue", "Helvetica", Arial, sans-serif;
        font-weight:bold;
        font-size:70px;
        line-height:80px;
        margin-top:10px;

      }

   #bt1{ margin-top: -25px; margin-bottom: 8px; }

</style>

</head>

<body>

<div id="page">

  <h2> Générateur de mots de passe </h2>
  
  <div class="texte" id="gen">

     <span>Longueur du mot de passe :  <input type="number" size="2" name="longueur" id="longueur" value=""  />  </span> <br/>

     <span ><input type="checkbox" name="cf" id="cf"  /> &nbsp; Ne pas utiliser de chiffres  </span> <br/> 

     <span><input type="checkbox" name="kt" id="kt"  /> &nbsp; Ne pas utiliser de caractères spéciaux </span> <br/> 

     <span><input type="checkbox" name="pt" id="pt"  /> &nbsp; Ne pas utiliser la ponctuation </span>  <br/> 

     <span><input type="checkbox" name="ac" id="ac"  /> &nbsp; Ne pas utiliser de caractères accentués </span>  <br/> 

     <span><b>RMQ : La longueur de votre mot de passe doit être entre 8 et 128, sinon elle sera prise dans cet interval </b></span>  <br/> 

     <span><input type="button" name="bt" id="bt" value="Générer le mot de passe"  /> </span> 

  </div>


<div id="pass">

	<h3> Mot de passe généré </h3>
   
       <div class="texte">

     <span><input type="text" size="35" name="password" id="password" class="texte" style="height:25px; padding:5px"  readonly="readonly"  />  </span> 

     <input type="button" name="bt1" id="bt1" value="Tester la force du mot de passe"  /> </span>

    <div id="progressbar"><div id="progress"></div></div>

    <div id="status">
     
        <div id="complexity">0%</div>
     
        <div id="complexityLabel">Complexe</div>
    
    </div>

  </div>

</div>


</div>

<footer> &copy; <?php  echo date("Y"); ?> Générateur de mots de passe - Created by Sumbang Christian Baurel </footer>

</body>

</html>