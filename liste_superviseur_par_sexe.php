<?php
// session_start();
  include_once 'connexion.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 

</head>
<body>


    <form action="" method="post">
    <center style="margin-top: 50px;" id="id_list_deroulante_ss"> 
           
           <label for="sexe">sexe : </label>
           <select name="sexe" id="sexe"> 
                <option value="none">Selectionner un sexe</option>
                <option value="M">M</option>
                <option value="F">F</option>
                </center>
                <center>
           </select>
                         <br/><br/>
                       <h3 style="margin-top: 30px;">LISTE DES ELECTEURS PAR SEXE </h3></center>
         <table class="table table-bordered border-primary container prime" id="first"  >
        <thead>
             <th >N°</th> 
                <th scope="col">Numéro CNI</th>
                <th scope="col">Nom & prénoms</th>
                <th scope="col">Sexe</th>
               
</thead>

<tbody id = 'table'>

</tbody>
</table>
            
</form>
 
<script src="../Public/js/bootstrap.js"></script>
<script src="../Public/js/bootstrap.bundle.js"></script>
<script src="../Public/js/custom.js"></script>
<script>



let i = 0;
 
    let createelement = function(data) {

      let tr = document.createElement('tr');
      let td0 = document.createElement('td');
      let td1 = document.createElement('td');
      let td2 = document.createElement('td');
      let td3 = document.createElement('td');


      
      td0.innerText = i;
      i += 1;
      td1.innerText = data.NUMCNI_AGENT;
      td2.innerText = data.NOM + ' ' + data.PRENOMS;
      td3.innerText = data.SEXE;
      tr.appendChild(td0);
      tr.appendChild(td1);
      tr.appendChild(td2);
      tr.appendChild(td3);


      document.querySelector('#table').appendChild(tr);
    }


let xhr = new XMLHttpRequest();

document.querySelector('#sexe').addEventListener('change', function(){
  document.querySelector('#table').innerHTML = '';
  i = 1;
  let data = {

    sexe : document.querySelector('#sexe').value
  }
  xhr.open('POST', 'superviseur_sexe.php', true);
  xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8');
  xhr.send(JSON.stringify(data));

  xhr.onreadystatechange = () => {
    if(xhr.readyState === 4) {

      let _data = xhr.responseText.split("}{");
      if(_data.length == 1) {
          let seule = JSON.parse( _data.join());
          createelement(seule);
          } else{
            premier = JSON.parse( _data.slice(0,1).join() + '}');
            dernier = JSON.parse('{' + _data.slice( _data.length - 1).join());
            createelement(premier);
            if(_data.length > 2) {
              for(j = 1; j <= _data.length - 2; j ++ ) {
                let milieu = JSON.parse('{' + _data[j] + '}');
                createelement(milieu);
            }
            }
            createelement(dernier);
    }
  }

}
})



      
</script>
<script src="jquery.main.js"></script>
  <script src="etat.js"></script>
</body>
</html>  






